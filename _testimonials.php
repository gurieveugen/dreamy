<?php 
/*

Template Name: Testimonials

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

            <div class="left-page left">
            <?php
                    $args=array('post_status' => 'publish', 'post_type'=>'pt_testimonial', 'ignore_sticky_posts'=> 1);

                    //The Query
                    query_posts($args);

                    //The Loop
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $job_position = get_post_meta($post->ID, $prefix.'job_title', true);
                    
               ?>

                
                <div class="testimonials-one left">
                    <div class="testimonials-title left">
                        <span><?php the_title(); ?></span>
                        <p><?php echo $job_position; ?></p>
                    </div><!--testimonials-title-->
                    <div class="testimonials-content left">
                        <img src="<?php echo get_template_directory_uri(); ?>/style/img/testimonials-arrow.png" alt="arrow" />
                        <div class="testimonials-content-text left">
                            <?php the_content(); ?>
                        </div><!--testimonials-content-text-->
                    </div><!--testimonials-content-->
                </div><!--/testimonials-one-->

                <?php endwhile; endif; ?>


            </div><!--/left-page-->


            <!--SIDBAR-->
            <div class="bg-sidebar right">
                <div class="sidebar-top left"></div><!--/sidebar-top-->
                    <?php tk_get_right_sidebar('Right', 'Testimonials'); ?>
                <div class="sidebar-down left"></div><!--/sidebar-down-->
            </div><!--/bg-sidebar-->


        </div><!--/wrapper-->
    </div><!--/content-->












<?php get_footer(); ?>