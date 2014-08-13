<?php get_header();
$prefix = 'tk_';
?>


    <!-- BG BLUE -->
    <div class="blue-page left">
        <div class="bg-blue-center-title left">
            <div class="wrapper">
                <div class="title-pages left"><?php _e('Search', tk_theme_name); ?> </div><!--/wrapper-->
                <?php dimox_breadcrumbs(); ?>
            </div><!--/wrapper-->
        </div><!--/bg-blue-center-title-->
        <div class="bg-blue-down left"></div><!--/bg-blue-down-->
    </div><!--/blue-page-->





    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">

            <div class="left-page left">

                <?php
                    //The Loop
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $category_list = get_the_category();
                    $category_count =  count($category_list);

                    $format = get_post_format();

               ?>


                <!--Post Standard-->
                <div class="blog-one left">

                    <?php if($format == 'image' || $format == '') {
                         if(has_post_thumbnail()){?>
                        <div class="bg-map-contact left">
                            <div class="gallery-single-images for-image left">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slider'); ?></a>
                                <div class="blog-hover"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            </div><!--/gallery-single-images-->
                        </div><!--/bg-map-contact-->
                        <?php } ?>

                    <?php } elseif($format =='gallery') { ?>


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
                           pauseOnHover: <?php echo $pausehover ?>,
                           easing: '<?php echo $easing; ?>',
                           slideshowSpeed:<?php echo $slidespeed;?>,
                           animationSpeed:<?php echo $animspeed; ?>,
                           slideshow: false,
                           prevText: "Prev",
                           nextText: "Next",
                           initDelay: <?php echo $initdelay ?>,
                           randomize:<?php echo $randomize ?>,
                           video: true,
                           useCSS: false
                    });
                });


            </script>

                        <?php
                            $slide_images = get_post_meta($post->ID, $prefix.'repeatable', true);
                        ?>
                        <div class="bg-map-contact left">
                            <div class="gallery-single-images left">
                                 <div class="flexslider">
                                    <ul class="slides">
                                        <?php foreach($slide_images as $the_image) {    ?>

                                                <li>
                                                    <img src="<?php tk_get_thumb(556, 400, $the_image); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                                </li>


                                        <?php } ?>
                                    </ul>
                                </div><!--/flexslider-->
                            </div><!-- gallery-single-images -->
                        </div><!-- bg-map-contact -->
                    <?php } elseif($format == 'video') {
                        $video_link = get_post_meta($post->ID, $prefix.'video_link', true);
                    ?>
                        <div class="bg-map-contact left">
                            <div class="gallery-single-images left">
                            <?php
                               tk_video_player($video_link);
                            ?>
                        </div><!--/gallery-single-images-->
                        </div><!--  bg-map-contact-->
                    <?php } elseif($format == 'audio'){  ?>

                    <div class="bg-map-contact left">
                        <div class="gallery-single-images left">

                            <div class="blog-player left">
                                <?php tk_jplayer($post->ID); ?>
                                            <div id="jquery_jplayer_<?php echo $post->ID?>" class="jp-jplayer"></div>
                                            <div id="jp_container_<?php echo $post->ID?>" class="jp-audio">
                                                <div class="jp-type-single">
                                                    <div class="jp-gui jp-interface" id="jp_interface_<?php echo $post->ID; ?>">
                                                <ul class="jp-controls">
                                                    <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                                    <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                                                    <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                                    <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                                                </ul>
                                                <div class="jp-progress">
                                                    <div class="jp-seek-bar">
                                                        <div class="jp-play-bar"></div>
                                                    </div>
                                                </div>
                                                <div class="jp-volume-bar">
                                                    <div class="jp-volume-bar-value"></div>
                                                </div>
                                            </div><!--/jp-gui jp-interface-->
                                        </div><!--/jp-type-single-->
                                    </div><!--/jp-audio-->
                                </div><!--/blog-player-->

                        </div><!--/gallery-single-images-->
                    </div><!--/bg-map-contact-->



                    <?php }elseif($format == 'quote'){
                        $quote_text = get_post_meta($post->ID, $prefix.'quote', true);
                        $quote_author = get_post_meta($post->ID, $prefix.'quote_author', true);
                    ?>
                        <div class="bg-map-contact left">
                            <div class="gallery-single-images left">

                                <div class="post-quote left">
                                    <img src="<?php echo  get_template_directory_uri(); ?>/style/img/post-quote.png" alt="quote"  />
                                    <span><?php echo $quote_text; ?></span>
                                    <p><?php echo $quote_author; ?></p>
                                </div><!--/post-quote-->

                            </div><!--/gallery-single-images-->
                        </div><!--/bg-map-contact-->

                    <?php } elseif($format == 'link'){
                        $link_text = get_post_meta($post->ID, $prefix.'link_text', true);
                        $link_url = get_post_meta($post->ID, $prefix.'link_url', true);?>

                        <div class="bg-map-contact left">
                            <div class="gallery-single-images left">

                                <div class="post-link left">
                                     <div class="post-link-top left"><a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a></div><!--/post-link-top-->
                                     <div class="post-link-down left"><a href="<?php echo $link_url; ?>"><?php echo $link_url; ?></a></div><!--/post-link-down-->
                                </div><!--/post-link-->

                            </div><!--/gallery-single-images-->
                        </div><!--/bg-map-contact-->

                    <?php }  if($format !== 'image') {?>

                    <div class="latest-news-home-one blog-check left">
                        <div class="latest-news-home-one-date left">
                            <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
                                <span><?php the_time('j') ?></span>
                                <p><?php the_time('M'); ?></p>
                            </a>
                        <div class="latest-news-background"></div>
                        </div><!--/latest-news-home-one-date-->
                        <div class="latest-news-home-one-content right">
                            <?php if($format !== 'aside') { ?><div class="latest-news-home-one-title left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/latest-news-home-one-title--><?php } ?>
                            <div class="latest-news-home-one-category left">
                                <ul>
                                    <?php
                                            $i=1;
                                            foreach($category_list as $the_cat) {

                                                if($category_count == $i) {
                                                    $comma = '';
                                                } else {
                                                    $comma = ', ';
                                                }
                                        ?>

                                    <li><a href="<?php echo get_category_link($the_cat->cat_ID); ?>"><?php echo $the_cat->cat_name; ?><?php echo $comma; ?></a></li>
                                    <?php $i++; } ?>
                                    <li><p>-</p></li>
                                    <li><a href="<?php the_permalink(); ?>"><?php comments_popup_link('Comments 0', '1 Comment', 'Comments % ', 'comments-link', ''); ?></a></li>
                                </ul>
                            </div><!--/latest-news-home-one-category-->
                            <div class="latest-news-home-one-text left">
                                <p><?php the_excerpt_length(250); ?></p>
                            </div><!--/latest-news-home-one-text-->
                        </div><!--/latest-news-home-one-content-->
                    </div><!--/latest-news-home-one-->

                <?php } ?>
             </div><!--/blog-one-->
             
            <?php endwhile; else : ?>

            <h2 class="center"><?php _e("No posts found. Try a different search?", tk_theme_name)?></h2>

            <?php endif; ?>

                <div class="pagination left">

                        <?php
                        global $wp_query;

                        $big = 999999999; // need an unlikely integer

                        echo paginate_links( array(
                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' => '?paged=%#%',
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $wp_query->max_num_pages
                        ) );
                        ?>



                </div><!--/left-page-->


            </div><!--/left-page-->







            <!--SIDBAR-->
            <div class="bg-sidebar right">
                <div class="sidebar-top left"></div><!--/sidebar-top-->
                    <?php tk_get_right_sidebar('Right', 'Archive/Search'); ?>
                <div class="sidebar-down left"></div><!--/sidebar-down-->
            </div><!--/bg-sidebar-->


        </div><!--/wrapper-->
    </div><!--/content-->





<?php get_footer(); ?>