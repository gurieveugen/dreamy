<?php get_header();
$prefix = 'tk_';
?>


    <!-- BG BLUE -->
    <?php
        $fullwidth = get_theme_option(tk_theme_name.'_home_fullwidth');
        if($fullwidth !=='none'){
    ?>

    <div class="blue-page left">
        
        <div class="bg-blue-center left">
            <div class="wrapper">


                <?php
                    $animation = get_theme_option(tk_theme_name.('_slider_animation'));
                    if(!$animation) {$animation ='fade';}                    
                    $direction = get_theme_option(tk_theme_name.('_slider_direction'));
                    if(!$direction) {$direction ='horizontal';}
                    $easing = get_theme_option(tk_theme_name.('_slider_easing'));
                    if(!$easing) {$easing ='linear';}
                    $slidespeed = get_theme_option(tk_theme_name.('_slider_slidespeed'));
                    if(!$slidespeed) {$slidespeed =3000;}
                    $animspeed = get_theme_option(tk_theme_name.('_slider_animspeed'));
                    if(!$animspeed) {$animspeed =1000;}
                    $initdelay = get_theme_option(tk_theme_name.('_slider_initdelay'));
                    if(!$initdelay) {$initdelay =3000;}
                    $randomize = get_theme_option(tk_theme_name.('_slider_randomize'));
                    if(!$randomize) {$randomize = 'true';}
                    $pauseaction = get_theme_option(tk_theme_name.('_slider_pauseonaction'));
                    if(!$pauseaction) {$pauseaction = 'true';}
                    $pausehover = get_theme_option(tk_theme_name.('_slider_pauseonhover'));
                    if(!$pausehover) {$pausehover = 'true';}

                ?>


                
            <script type="text/javascript">
                jQuery(document).ready(function($){

                    jQuery('.flexslider').flexslider({
                           animation: '<?php echo $animation; ?>',
                           direction: '<?php echo $direction; ?>',
                           pauseOnAction: <?php echo $pauseaction; ?>,
                           pauseOnHover: <?php echo $pausehover; ?>,
                           easing: '<?php echo $easing; ?>',
                           slideshowSpeed:<?php echo $slidespeed;?>,
                           animationSpeed:<?php echo $animspeed; ?>,
                           slideshow: true,                         
                           prevText: "<?php _e('Prev', tk_theme_name); ?>",
                           nextText: "<?php _e('Next', tk_theme_name); ?>",
                           initDelay: <?php echo $initdelay ?>,
                           randomize:<?php echo $randomize ?>,
                           video: true,
                           useCSS: false
                    });
                });
            </script>



                <?php 
                      
                    if($fullwidth=='full-slide') {

                ?>

                <div class="flexslider full-width-slide" >
                    <ul class="slides">

                        <?php
                            $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1, 'post_type' => 'pt_slides', 'posts_per_page' => -1);

                            //The Query
                            query_posts($args);

                            //The Loop
                            if ( have_posts() ) : while ( have_posts() ) : the_post();
                            $video_link = get_post_meta($post->ID, $prefix.'video_link', true);
                            ?>
                                <?php if(has_post_thumbnail()){ ?>
                                    <li>
                                        <?php the_post_thumbnail('fullwidth-slider'); ?>
                                        <div class="hover-slider"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                    </li>
                                <?php } else if($video_link) { ?>
                                    <li>
                                        <?php tk_video_player($video_link); ?>                                       
                                    </li>
                                <?php } ?>
                        <?php endwhile; endif; ?>
                        
                    </ul>
                </div><!--/flexslider-->
                

                <?php } elseif($fullwidth == 'full-program') { ?>

                <div class="bg-scroll-home fullwidth-program right">
                    <div class="bg-scroll-home-title"><span><?php _e('Our Programs2', tk_theme_name); ?></span></div><!--/bg-scroll-home-title-->
                    <div class="bg-scroll-home-content right">

                              <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">

                                <?php
                                    $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1, 'post_type' => 'pt_programs', 'posts_per_page' => -1);

                                    //The Query
                                    query_posts($args);

                                    //The Loop
                                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                                    $program_excerpt = get_post_meta($post->ID, $prefix.'program_excerpt', true);
                                ?>

                                  <li>
                                    <div class="scroll-pane-one left">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <p><?php echo $program_excerpt; ?></p>
                                    </div><!--/scroll-pane-one-->
                                 </li>
                                 
                                <?php endwhile; endif; ?>

                              </ul>


                    </div><!--/bg-scroll-home-content-->
                </div><!--/bg-scroll-home-->
            <?php } elseif($fullwidth == 'half') { ?>

                <div class="flexslider" >                  
                        <ul class="slides">

                            <?php
                                $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1, 'post_type' => 'pt_slides', 'posts_per_page' => -1);

                                //The Query
                                query_posts($args);

                                //The Loop
                                if ( have_posts() ) : while ( have_posts() ) : the_post();

                                $video_link = get_post_meta($post->ID, $prefix.'video_link', true);
                            ?>
                                <?php if(has_post_thumbnail()){ ?>
                                    <li>
                                        <?php the_post_thumbnail('slider'); ?>
                                        <div class="hover-slider"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                    </li>
                                <?php } else if($video_link) { ?>
                                    <li>
                                        <?php tk_video_player($video_link); ?>                                       
                                    </li>
                                <?php } ?>

                            <?php endwhile; endif; ?>

                        </ul>          
                </div><!--/flexslider-->





                <div class="bg-scroll-home right">
                    <div class="bg-scroll-home-title"><span><?php _e('Once upon a time...', tk_theme_name); ?></span></div><!--/bg-scroll-home-title-->
                    <div class="bg-scroll-home-content right">

                              <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
                                <?php
                                    $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1, 'post_type' => 'pt_programs', 'posts_per_page' => -1);

                                    //The Query
                                    query_posts($args);

                                    //The Loop
                                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                                    $program_excerpt = get_post_meta($post->ID, $prefix.'program_excerpt', true);
                                ?>

                                  <li>
                                    <div class="scroll-pane-one left">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <p><?php echo $program_excerpt; ?></p>
                                    </div><!--/scroll-pane-one-->
                                 </li>

                                <?php endwhile; endif; ?>
                              </ul>

                    </div><!--/bg-scroll-home-content-->
                </div><!--/bg-scroll-home-->


            <?php } ?>

            </div><!--/wrapper-->
        </div><!--/bg-blue-center-->
        <div class="bg-blue-down left"></div><!--/bg-blue-down-->
    </div><!--/blue-page-->
<?php } ?>





    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">
            <?php $catchline = get_theme_option(tk_theme_name.'_home_catchline'); ?>
            <?php if(isset($catchline)) { ?>
                <div class="home-text left">
                    <?php echo $catchline; ?>
                </div><!--/home-text-->
            <?php }

                $show_home_content= get_theme_option(tk_theme_name.'_home_use_home_content');
            ?>



               
                    <?php
                    if($show_home_content == 'yes') {                                           
                    
                    $page_id =  get_theme_option(tk_theme_name.'_home_home_content');
                    
                    $blog_template_id = get_option('id_blog_page');
                    $gallery_template_id = get_option('id_gallery_page');
                    $contact_template_id = get_option('id_contact_page');
                    $fullwidtht_template_id = get_option('id_fullwidth_page');
                                

                   $get_content = query_posts( 'page_id=' . get_theme_option(tk_theme_name.'_home_home_content') );


            //Content from other pages on home
            if ($show_home_content == 'yes' ){
                    $page_id =  get_theme_option(tk_theme_name.'_home_home_content');
                    $page_template = get_post_meta( $page_id, '_wp_page_template', true );


                    if($page_template == 'default') {
                        get_template_part('home_page');
                    } elseif ($page_template == '_blog.php'){
                        get_template_part('home_blog');
                    } elseif ($page_template == '_contact.php'){
                        get_template_part('home_contact');
                    } elseif ($page_template == '_full_width.php'){
                        get_template_part('home_fullwidth');
                    }elseif ($page_template == '_gallery.php'){
                        get_template_part('home_gallery');
                    } else {
                        get_template_part('home_page');
                    }

             } //ends show_home_content


          } ?>

            
            
            <?php
                $latest_news = get_theme_option(tk_theme_name.('_home_latest_news'));
                 if($latest_news !== 'yes') {
             ?> 

            <div class="border-pages left"></div><!--/border-pages-->

            
            <?php $blog_link = get_option('id_blog_page'); ?>
            <div class="latest-news-home left">
                <div class="latest-news-home-title left">
                    <span><?php _e('Latest News', tk_theme_name); ?></span>
                    <p>-</p>
                    <a href="<?php echo get_page_link($blog_link); ?>"><?php _e('View all', tk_theme_name); ?></a>
                </div><!--/latest-news-home-title-->



                    <?php
                        $latest_news = get_theme_option(tk_theme_name.'_home_latest_number');
                        $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1, 'posts_per_page' => $latest_news);

                        //The Query
                        query_posts($args);

                        //The Loop
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $get_categories = get_the_category();
                        $category_count =  count($get_categories);
                    ?>

                <div class="latest-news-home-one blog-check left">
                    <div class="latest-news-home-one-date left">
                        <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
                        <span><?php the_time('j') ?></span>
                        <p><?php the_time('M'); ?></p>
                        </a>
                        <div class="latest-news-background"></div>
                    </div><!--/latest-news-home-one-date-->

                    <div class="latest-news-home-one-content right">


                        <div class="latest-news-home-one-title left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/latest-news-home-one-title-->
                        <div class="latest-news-home-one-category left">
                            <ul>
                                
                                <?php
                                        $i = 1;
                                            foreach($get_categories as $category) {
                                              if($category_count == $i) {
                                                    $comma = '';
                                                } else {
                                                    $comma = ', ';
                                                }
                                    ?>
                                    <li><a href="<?php echo get_category_link($category->cat_ID); ?>"><?php echo $category->name.$comma.' ' ?></a></li>
                                   
                                <?php $i++; } ?>
                                 <li><p>-</p></li>
                                <li><a href="<?php the_permalink(); ?>"><?php echo comments_number('No Comments', 'One Comment', 'Comments %'); ?></a></li>
                            </ul>
                        </div><!--/latest-news-home-one-category-->
                        <div class="latest-news-home-one-text left">
                            <p><?php the_excerpt_length(140); ?></p>
                        </div><!--/latest-news-home-one-text-->
                    </div><!--/latest-news-home-one-content-->

                </div><!--/latest-news-home-one-->



                <?php endwhile; endif; ?>

            </div><!--/latest-news-home-->

<?php } ?>
            <?php
                $disable_gallery = get_theme_option(tk_theme_name.'_home_disable_gallery');
                if(!$disable_gallery){
            ?>

            <div class="border-pages left"></div><!--/border-pages-->
            



            <div class="gallery-home left">

                <?php
                    $gallery_id = get_option('id_gallery_page');
                    $gallery_category = get_theme_option(tk_theme_name.'_home_gallery_cat');
                    $gallery_number = get_theme_option(tk_theme_name.'_home_gallery_number')
                ?>

                <div class="latest-news-home-title left">
                    <span><?php _e('Our Gallery', tk_theme_name); ?></span>
                    <p>-</p>
                    <a href="<?php echo get_page_link($gallery_id); ?>"><?php _e('View all', tk_theme_name); ?></a>
                </div><!--/latest-news-home-title-->

                <div class="gallery-home-content left">


                    <?php
                        $gallery_link = get_theme_option(tk_theme_name.'_home_gallery_linking');
                        $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1, 'posts_per_page' => $gallery_number, 'tax_query' => array(array('taxonomy' => 'ct_gallery', 'field' => 'term_id', 'terms' => $gallery_category)), 'post_type' => 'pt_gallery');

                        //The Query
                        query_posts($args);

                        //The Loop
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $format = get_post_format();
                        $image_big = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
                        if($format == 'gallery'){
                        $slide_images = get_post_meta($post->ID, $prefix.'repeatable', true); ?>

                    <div class="gallery-home-one left">
                        <div class="gallery-home-images-content left">
                            <div class="gallery-home-images left">
                                <?php if(!empty($slide_images)){?><img src="<?php tk_get_thumb(176, 151, $slide_images[0]); ?>" /><?php }?>
                                <a href="<?php the_permalink(); ?>"><p></p></a>
                            </div><!--/gallery-home-images-->
                        </div><!--/gallery-home-images-content-->
                        <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                    </div><!--/gallery-home-one-->

                        <?php }elseif($format == 'video'){
                            $video_link = get_post_meta($post->ID, $prefix.'video_link', true);?>

                            <div class="gallery-home-one left">
                                <div class="gallery-home-images-content left">
                                    <div class="gallery-home-images left">
                                        <?php if(!empty($video_link)){get_video_image($video_link, $post->ID); }?>

                                    <?php if($gallery_link  == 'single') { ?>
                                            <a href="<?php the_permalink(); ?>"><p></p></a>
                                    <?php } elseif($gallery_link  == 'image_pirobox') { ?>
                                            <a  class="video" href="<?php echo $video_link; ?>"><p></p></a>
                                    <?php } elseif($gallery_link == 'pirobox')  { ?>
                                            <a class="video" href="<?php echo $video_link; ?>" ><p></p></a>
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
                                            <div class="gallery-home-text left"><a href="<?php echo $video_link; ?>" class="video"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } else { ?>
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } ?>
                            </div><!--/gallery-home-one-->

                            <?php }elseif($format == 'image'){
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'gallery-front');
                                $image_big = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
                            ?>
                    <div class="gallery-home-one left">
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
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } elseif($gallery_link == 'pirobox')  { ?>
                                            <div class="gallery-home-text left"><a href="<?php echo $image_big[0]; ?>" class="fancybox"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } else { ?>
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } ?>
                    </div><!--/gallery-home-one-->

                    <?php } else { ?>


                    <div class="gallery-home-one left">
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
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } elseif($gallery_link == 'pirobox')  { ?>
                                            <div class="gallery-home-text left"><a href="<?php echo $image_big[0]; ?>" class="fancybox"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } else { ?>
                                            <div class="gallery-home-text left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/gallery-home-text-->
                                    <?php } ?>

                    </div><!--/gallery-home-one-->

                    <?php } ?>


                    <?php endwhile; endif; ?>


                </div><!--/gallery-home-content-->

            </div><!--/gallery-home-->
        <?php } ?>

      
        </div><!--/wrapper-->
    </div><!--/content-->








<?php get_footer(); ?>