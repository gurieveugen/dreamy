<?php 
/*

Template Name: Gallery

*/
get_header(); 
$prefix = 'tk_';
?>




    <!-- BG BLUE -->
    <div class="blue-page left">
        <div class="bg-blue-center-title left">
            <div class="wrapper">
                <div class="title-pages left"><?php the_title(); ?></div><!--/wrapper-->
                        <?php dimox_breadcrumbs(); ?>
            </div><!--/wrapper-->
        </div><!--/bg-blue-center-title-->
        <div class="bg-blue-down left"></div><!--/bg-blue-down-->
    </div><!--/blue-page-->



    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">

            <div class="full-pages left">

                <div class="gallery-filter left">
                    <div class="gallery-filter-text left"><span><?php _e('Filter :', tk_theme_name); ?></span></div><!--/gallery-filter-text-->
                    <div class="gallery-filter-link left">
                        <nav>
                            <ul>
                                <li><a  href="#" data-filter="*" class="active-project"><?php _e('All', tk_theme_name) ?></a></li>
                                <?php
                                  global $wpdb;
                                  $post_type_ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE post_type = 'pt_gallery' AND post_status = 'publish'");
                                  if(!empty ($post_type_ids )){
                                    $post_type_cats = wp_get_object_terms( $post_type_ids, 'ct_gallery',array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'ids') );
                                    if($post_type_cats){
                                      $post_type_cats = array_unique($post_type_cats);
                                    }
                                  }
                                  $include_category = null;
                                    if(!empty ($post_type_ids )){
                                         foreach ($post_type_cats as $category_list) {
                                            $cat = 	$category_list.",";
                                            $include_category = $include_category.$cat;
                                            $cat_name = get_term($category_list, 'ct_gallery');
                                    ?>
                                <li>
                                    <a href="#" data-filter="<?php echo '.class-'.$category_list?>"><?php echo $cat_name->name ?></a>
                                </li>
                         <?php } } ?>
                            </ul>
                        </nav>
                    </div><!--/gallery-filter-link-->
                </div><!--/gallery-filter-->

                <div class="portfolio-loader" id="portfolio-loader"></div>

                
                <div class="gallery-home-content left">

                    
                <?php
                        $gallery_link = get_theme_option(tk_theme_name.'_home_gallery_linking');

                        if(empty($gallery_link)) {
                            $gallery_link = 'single';
                        }

                        $args=array('post_type' => 'pt_gallery', 'post_status' => 'publish', 'ignore_sticky_posts'=> 1, 'posts_per_page' => -1);

                        //The Query
                        query_posts($args);

                        //The Loop
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $post_category = wp_get_post_terms( $post->ID, 'ct_gallery' );
                        $format = get_post_format();
                 

                        if($format == 'gallery'){ 
                        $slide_images = get_post_meta($post->ID, $prefix.'repeatable', true); ?>
                        
                        <div class="gallery-home-one left <?php foreach($post_category as $post_cat){echo 'class-'.$post_cat->term_id.' ';}?>">
                            <div class="gallery-home-images-content left">
                                <div class="gallery-home-images left">
                                    
                                    <?php if($gallery_link  == 'single' || $gallery_link == '') { ?>
                                        <?php if(!empty($slide_images)){?><img src="<?php tk_get_thumb(176, 151, $slide_images[0]); ?>" /><?php } ?>
                                        <a href="<?php the_permalink(); ?>"><p></p></a>
                                    <?php } elseif($gallery_link  == 'image_pirobox' || $gallery_link == 'pirobox') { ?>
                                        <?php 
                                            $random_name = generateRandomString();
                                            if(!empty($slide_images)){?><img src="<?php tk_get_thumb(176, 151, $slide_images[0]); ?>" />
                                            <?php foreach(array_slice($slide_images, 1) as $the_image) {    ?>
                                                <a href="<?php echo $the_image; ?>" class="fancybox" rel="<?php echo $random_name; ?>"><p></p></a>
                                            <?php } ?>
                                        <?php } ?>
                                        <a href="<?php echo $slide_images[0]; ?>" class="fancybox" rel="<?php echo $random_name; ?>"><p></p></a>
                                    <?php } ?>
                                </div><!--/gallery-home-images-->
                            </div><!--/gallery-home-images-content-->
                            <?php if($gallery_link  == 'image_pirobox' || $gallery_link  == 'single' || $gallery_link == '') { ?>
                                <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                            <?php } elseif($gallery_link == 'pirobox') { ?>
                                <div class="gallery-home-text left"><a href="<?php echo $the_image; ?>" class="fancybox" rel="name"><?php the_title(); ?></a></div>
                            <?php } ?>
                        </div><!--/gallery-home-one-->

                        <?php }elseif($format == 'video'){
                            $video_link = get_post_meta($post->ID, $prefix.'video_link', true);
                            $video_test = strpos($video_link, 'youtube');
                            if($video_test) {
                                $video = 'video';
                            } else {
                                $video = 'vimeo';
                            }
                            
                            
                            ?>
                        <div class="gallery-home-one video-image left <?php foreach($post_category as $post_cat){echo 'class-'.$post_cat->term_id.' ';}?>">
                            <div class="gallery-home-images-content left">
                                <div class="gallery-home-images left">
                                    <?php if(!empty($video_link)){get_video_image($video_link, $post->ID); }?>


                                    <?php if($gallery_link  == 'single') { ?>
                                            <a href="<?php the_permalink(); ?>"><p></p></a>
                                    <?php } elseif($gallery_link  == 'image_pirobox') { ?>
                                            <a  class="<?php echo $video; ?>" href="<?php echo $video_link; ?>"><p></p></a>
                                    <?php } elseif($gallery_link == 'pirobox')  { ?>
                                            <a class="<?php echo $video; ?>" href="<?php echo $video_link; ?>" ><p></p></a>
                                    <?php } else { ?>
                                            <a href="<?php the_permalink(); ?>"><p></p></a>
                                    <?php } ?>

                      
                                </div><!--/gallery-home-images-->
                            </div><!--/gallery-home-images-content-->

                                    <?php if($gallery_link  == 'single') { ?>
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } elseif($gallery_link  == 'image_pirobox') { ?>
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } elseif($gallery_link == 'pirobox')  { ?>
                                            <div class="gallery-home-text left"><a href="<?php echo $video_link; ?>" class="<?php echo $video; ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } else { ?>
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } ?>


                        </div><!--/gallery-home-one-->


                            <?php }elseif($format == 'image' || $format = ''){
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'gallery-front');
                                $image_big = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');

                            ?>

                        <div class="gallery-home-one left <?php foreach($post_category as $post_cat){echo 'class-'.$post_cat->term_id.' ';}?>">
                            <div class="gallery-home-images-content left">
                                <div class="gallery-home-images left">
                                        <?php if(!empty($image)){?>
                                            <img src="<?php echo $image[0]; ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />
                                        <?php  } // if has image set?>

                                    <?php if($gallery_link  == 'single') { ?>
                                            <a href="<?php the_permalink(); ?>"><p></p></a>
                                    <?php } elseif($gallery_link  == 'image_pirobox') { ?>
                                            <a href="<?php echo $image_big[0]; ?>" class="fancybox"><p></p></a>
                                    <?php } elseif($gallery_link == 'pirobox')  { ?>
                                            <a href="<?php echo $image_big[0]; ?>" class="fancybox"><p></p></a>
                                    <?php } else { ?>
                                            <a href="<?php the_permalink(); ?>"><p></p></a>
                                    <?php } ?>

                                </div><!--/gallery-home-images-->
                            </div><!--/gallery-home-images-content-->


                                    <?php if($gallery_link  == 'single') { ?>
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } elseif($gallery_link  == 'image_pirobox') { ?>
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } elseif($gallery_link == 'pirobox')  { ?>
                                            <div class="gallery-home-text left"><a href="<?php echo $image_big[0]; ?>" class="fancybox"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } else { ?>
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } ?>


                            
                        </div><!--/gallery-home-one-->


                        <?php } else {
                           $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'gallery-front');
                           $image_big = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
                         ?>
                        <div class="gallery-home-one left <?php foreach($post_category as $post_cat){echo 'class-'.$post_cat->term_id.' ';}?>">
                            <div class="gallery-home-images-content left">
                                <div class="gallery-home-images left">
                                    <?php the_post_thumbnail('gallery-front'); ?>

                                    <?php if($gallery_link  == 'single') { ?>
                                            <a href="<?php the_permalink(); ?>"><p></p></a>
                                    <?php } elseif($gallery_link  == 'image_pirobox') { ?>
                                            <a href="<?php echo $image_big[0]; ?>" class="fancybox"><p></p></a>
                                    <?php } elseif($gallery_link == 'pirobox')  { ?>
                                            <a href="<?php echo $image_big[0]; ?>" class="fancybox"><p></p></a>
                                    <?php } else { ?>
                                            <a href="<?php the_permalink(); ?>"><p></p></a>
                                    <?php } ?>

                                </div><!--/gallery-home-images-->
                            </div><!--/gallery-home-images-content-->
                                    <?php if($gallery_link  == 'single') { ?>
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } elseif($gallery_link  == 'image_pirobox') { ?>
                                            <div class="gallery-home-text left"><a href="<?php echo $image_big[0]; ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } elseif($gallery_link == 'pirobox')  { ?>
                                            <div class="gallery-home-text left"><a href="<?php echo $image_big[0]; ?>" class="fancybox"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } else { ?>
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } ?>
                        </div><!--/gallery-home-one-->
                        <?php } ?>
                        
                    <?php
                        endwhile;
                        endif;
                    ?>

                    
                </div><!--/gallery-home-content-->

            </div><!--/full-pages-->

        </div><!--/wrapper-->
    </div><!--/content-->





<?php get_footer(); ?>