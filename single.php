<?php get_header();
$prefix = 'tk_';

$blog_title = get_option('title_blog_page');
$program_title = get_option('title_program_page');
?>


    <!-- BG BLUE -->
    <div class="blue-page left">
        <div class="bg-blue-center-title left">
            <div class="wrapper">
                <div class="title-pages left">
                    <?php if(get_post_type() == $program_title){ ?>
                        <?php echo $program_title; ?>
                    <?php } elseif(get_post_type()=='pt_slides') { ?>
                    <?php _e('Slider', tk_theme_name); ?>
                        <?php } else {?>
                        <?php echo $blog_title; ?>
                    <?php } ?>
                </div><!--/wrapper-->
                <?php dimox_breadcrumbs(); ?>
            </div><!--/wrapper-->
        </div><!--/bg-blue-center-title-->
        <div class="bg-blue-down left"></div><!--/bg-blue-down-->
    </div><!--/blue-page-->


    <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();
        $category_list = get_the_category();
        $category_count =  count($category_list);
        $format = get_post_format();
        ?>
    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">

            <div class="left-page left">



                <div class="blog-one left">

                    <?php if($format == 'image' || $format == '') {
                        if(has_post_thumbnail()){?>
                    
                        <div class="bg-map-contact left">
                            <div class="gallery-single-images left">
                                <?php the_post_thumbnail('slider'); ?>
                            </div><!--/gallery-single-images-->
                        </div><!--/bg-map-contact-->
                        <div id="portfolio-loader2"></div>
                        <?php } ?>
                    <?php } elseif($format =='gallery') {
                        $slide_images = get_post_meta($post->ID, $prefix.'repeatable', true);
   
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
                               prevText: "Prev",
                               nextText: "Next",
                               initDelay: <?php echo $initdelay ?>,
                               randomize:<?php echo $randomize ?>,
                               video: true,
                               useCSS: false
                        });
                    });
                </script>

                        <div class="bg-map-contact left">
                            <div class="gallery-single-images left">
                                 <div class="flexslider">
                                    <ul class="slides">
                                        <?php foreach($slide_images as $the_image) { ?>
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

                    <?php } ?>



                    <div class="latest-news-home-one left">
                        <div class="latest-news-home-one-date left">
                            <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
                                <span><?php the_time('j') ?></span>
                                <p><?php the_time('M'); ?></p>
                            </a>
                        <div class="latest-news-background"></div>
                        </div><!--/latest-news-home-one-date-->
                        <div class="latest-news-home-one-content right">
                            <div class="latest-news-home-one-title left"><?php the_title(); ?></div><!--/latest-news-home-one-title-->
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
                                    <li><a href="<?php the_permalink(); ?>"><?php comments_popup_link('- Comments 0', '- 1 Comment', '- Comments % ', 'comments-link', ''); ?></a></li>
                                </ul>
                            </div><!--/latest-news-home-one-category-->
                        </div><!--/latest-news-home-one-content-->
                        <div class="blog-single-text shortcodes left">
                            <?php the_content();  ?>
                        </div><!--/blog-single-text-->
                    </div><!--/latest-news-home-one-->
                </div><!--/blog-one-->

            <?php 
                $show_share = get_theme_option(tk_theme_name.('_general_show_share'));
                if($show_share){
            ?>


                <div class="share-content left">
                    <div class="share-text left"><?php _e('Share this :', tk_theme_name); ?></div><!--/share-text-->
                    <div class="share-this-content left">
                        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div>

                            <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink($post->ID)?>&media=<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>" class="pin-it-button" count-layout="vertical"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>

                            <!-- Place this tag where you want the +1 button to render. -->
                            <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="200"></div>

                            <!-- Place this tag after the last +1 button tag. -->
                            <script type="text/javascript">
                              (function() {
                                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                po.src = 'https://apis.google.com/js/plusone.js';
                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                              })();
                            </script>

                    </div><!--/share-this-content-->
                </div><!--/share-content-->
            <?php } ?>



            <?php endwhile; endif;?>




      <!--COMMENTS-->
        <?php if ( comments_open() ) : ?>
            <?php comments_template(); // Get wp-comments.php template ?>
        <?php endif; ?>




        </div><!--/wrapper-->


        <!--SIDEBAR-->
        <div class="bg-sidebar right">
            <div class="sidebar-top left"></div><!--/sidebar-top-->

            <?php if(get_post_type() == 'pt_slides' ) {
                 tk_get_right_sidebar('Right', 'Single Slider'); ?>
            <?php } else{
                tk_get_right_sidebar('Right', 'Single Blog');
            } ?>
            <div class="sidebar-down left"></div><!--/sidebar-down-->
        </div><!--/bg-sidebar-->

        </div>
    </div><!--/content-->





<?php get_footer(); ?>