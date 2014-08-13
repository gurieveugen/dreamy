    <!-- FOOTER -->
    <div class="footer left">
        <div class="footer-top left"></div><!--/footer-top-->
        <div class="wrapper">
            <div class="footer-widgets-content left">


                <div class="footer_box left">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 1')) : ?>
                    <?php endif; ?>       
                </div><!--/footer-widget-->
            
                <div class="footer_box left">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 2')) : ?>
                    <?php endif; ?>       
                </div><!--/footer-widget-->
            
                <div class="footer_box left">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 3')) : ?>
                    <?php endif; ?>       
                </div><!--/footer-widget-->

                <div class="footer_box left" style="margin-right: 0">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 4')) : ?>
                    <?php endif; ?>  
                </div><!--/footer-widget-->
                
            </div><!--/footer-widget-content-->

                    <?php
                    $copyright = get_theme_option(tk_theme_name . '_general_footer_copy');
                    if (empty($copyright)) {
                        $copyright = "© Copyright 2012. Powered by WordPress. - Dreamy Theme by <a href='index.php'>ThemesKingdom</a>";
                    }

                    $footer_logo = get_option(tk_theme_name . '_general_footer_logo');
                    if (empty($footer_logo)) {
                        $footer_logo = get_template_directory_uri() . "/style/img/logo.png";
                    }
                    ?>

            <?php
                $enable_rss = get_theme_option(tk_theme_name.'_social_enable_rss');
                $twitter_acc = get_theme_option(tk_theme_name.'_social_twitter');
                $facebook_acc = get_theme_option(tk_theme_name.'_social_facebook');
                $rss_acc = get_theme_option(tk_theme_name.'_social_rss_url');
                $google_acc = get_theme_option(tk_theme_name.'_social_google_plus');
                $linkedin = get_theme_option(tk_theme_name.'_social_linkedin');
            ?>
            <div class="footer-copyright-content left">
                <div class="footer-logo left"><a href="index.php"><img src="<?php echo $footer_logo; ?>" alt="logo" title="Logo" /></a></div><!--/footer-logo-->
                <div class="footer-copyright left"><?php echo $copyright; ?></div><!--/footer-copyright-->
                <div class="footer-soc-icons right">
                    <ul>
                        <?php if($twitter_acc){ ?>
                            <li>
                                    <div class="tooltip twitter-tool">
                                        <p><?php _e('Twitter', tk_theme_name); ?></p>
                                        <div class="back1"></div>
                                    </div>
                                <div class="soc-icon-1 left"><a href="http://twitter.com/<?php echo $twitter_acc; ?>"></a></div>
                            </li>
                        <?php } ?>

                        <?php if($facebook_acc){ ?>
                            <li>
                                    <div class="tooltip facebook-tool">
                                        <p><?php _e('Facebook', tk_theme_name); ?></p>
                                        <div class="back1"></div>
                                    </div>
                                <div class="soc-icon-2 left"><a href="http://facebook.com/<?php echo $facebook_acc; ?>"></a></div>
                            </li>
                        <?php } ?>

                        <?php if($linkedin) { ?>
                            <li>
                                    <div class="tooltip linkedin-tool">
                                        <p><?php _e('LinkedIn', tk_theme_name); ?></p>
                                        <div class="back1"></div>
                                    </div>
                                <div class="soc-icon-3 left"><a href="<?php echo $linkedin; ?>"></a></div>
                            </li>
                        <?php } ?>
                            
                        <?php if($google_acc){ ?>
                            <li>
                                    <div class="tooltip google-tool">
                                        <p><?php _e('Google Plus', tk_theme_name); ?></p>
                                        <div class="back1"></div>
                                    </div>
                                <div class="soc-icon-4 left"><a href="https://plus.google.com/<?php echo $google_acc; ?>"></a></div>
                            </li>
                        <?php } ?>

                        <?php if($rss_acc){ ?>
                            <li>
                                    <div class="tooltip rss-tool">
                                        <p><?php _e('RSS', tk_theme_name); ?></p>
                                        <div class="back1"></div>
                                    </div>
                                <div class="soc-icon-5 left"><a href="<?php echo $rss_acc; ?>"></a></div>
                            </li>
                        <?php } ?>

                    </ul>
                </div><!--/footer-soc-icons-->
            </div><!--/footer-copyright-content-->


        </div><!--/wrapper-->
    </div><!--/footer-->

</div><!--/container-->

<?php wp_footer();?>
</body>
</html>