<?php get_header();
$prefix = 'tk_';
?>




    <!-- BG BLUE -->
    <div class="blue-page left">
       
        <div class="bg-blue-center-title left">
            <div class="wrapper">
                <div class="title-pages left"><?php the_title(); ?> </div><!--/wrapper-->
                <?php dimox_breadcrumbs(); ?>
            </div><!--/wrapper-->
        </div><!--/bg-blue-center-title-->
        <div class="bg-blue-down left"></div><!--/bg-blue-down-->
    </div><!--/blue-page-->





    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">
            
            <div class="full-pages left"> 
                <div class="left-page left">

                    <!--/ Format Standard -->
                    <div class="blog-one-single left"> 
                        <div class="left shortcodes">                                
                                    <?php
                                    /* Run the loop to output the page.
                                                             * If you want to overload this in a child theme then include a file
                                                             * called loop-page.php and that will be used instead.
                                    */
                                    //get_template_part( 'loop', 'page' );
                                    wp_reset_query();
                                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                                            the_content();
                                        endwhile;
                                    else:
                                    endif;
                                    wp_reset_query();
                                    ?>
                        </div><!-- /contact-text -->
                        
                    </div><!-- /blog-one-single -->
                    
                </div><!-- /content-left -->
                
            <!--SIDBAR-->
            <div class="bg-sidebar right">
                <div class="sidebar-top left"></div><!--/sidebar-top-->                
                    <?php
                         tk_get_right_sidebar('Right', 'Page');
                    ?>              
                <div class="sidebar-down left"></div><!--/sidebar-down-->
            </div><!--/bg-sidebar-->

            </div><!-- /full-pages -->
            
        </div><!-- /wrapper -->
    </div><!--/content-->


<?php get_footer(); ?>

    
    