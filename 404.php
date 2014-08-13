<?php
get_header()

?>



    <!-- BG BLUE -->
    <div class="blue-page left">        
        <div class="bg-blue-center-title left">
            <div class="wrapper">
                <div class="title-pages left"><?php _e('404 - Error', tk_theme_name); ?></div><!--/wrapper-->
                    <?php dimox_breadcrumbs(); ?>
            </div><!--/wrapper-->
        </div><!--/bg-blue-center-title-->
        <div class="bg-blue-down left"></div><!--/bg-blue-down-->
    </div><!--/blue-page-->






    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">

            <div class="left-page left">

                <div class="page-404 left">
                    <p><?php _e('Looks like the page you were looking for does not exist. Sorry about that.', tk_theme_name); ?></p>
                    <span><?php _e('Check the web address for typos, or go to', tk_theme_name); ?> <a href="<?php echo home_url(); ?>"><?php _e('HOME PAGE', tk_theme_name); ?></a></span>
                </div><!--/page-404-->

            </div><!--/left-page-->


            <!--SIDBAR-->
            <div class="bg-sidebar right">
                <div class="sidebar-top left"></div><!--/sidebar-top-->

                    <?php tk_get_right_sidebar('Right', 'Default')?>

                <div class="sidebar-down left"></div><!--/sidebar-down-->
            </div><!--/bg-sidebar-->


        </div><!--/wrapper-->
    </div><!--/content-->


<?php
    get_footer();
?>