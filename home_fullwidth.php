<?php $prefix = 'tk_';
$page_id = get_theme_option(tk_theme_name.'_home_home_content');
?>

    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">

            <div class="full-pages left">
                <div class="content-left left">

                    <!--/ Format Standard -->
                    <div class="blog-one-single left">
                        <div class="contact-text left shortcodes">
                                <?php
                                /* Run the loop to output the page.
                                                         * If you want to overload this in a child theme then include a file
                                                         * called loop-page.php and that will be used instead.
                                */
                                wp_reset_query();
                                query_posts( 'page_id='.$page_id);
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

            </div><!-- /full-pages -->

        </div><!-- /wrapper -->
    </div><!--/content-->
