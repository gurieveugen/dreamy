        
<?php

        /*************************************************************/
        /************COLOR SCHEME**********************************/
        /*************************************************************/

            //Body style
            $body_bg_image = get_theme_option(tk_theme_name.'_colors_body_bg_img');
            if(!$body_bg_image) {
                $body_bg_image = get_template_directory_uri().'/style/img/pattern.png';
            }
            $body_image_position = get_theme_option(tk_theme_name.'_colors_body_img_position');
            $body_image_repeat = get_theme_option(tk_theme_name.'_colors_body_img_repeat');
            $body_image_attachment = get_theme_option(tk_theme_name.'_colors_body_img_attachment');
            $body_color = get_theme_option(tk_theme_name.'_colors_body_color');


            //Menu Color

            $menu_color = get_theme_option(tk_theme_name.'_colors_menu_change');
            $hover_menu = get_theme_option(tk_theme_name.'_colors_menu_hover');
            if((!$menu_color || $menu_color == 'red')) {
                $menu_color = '';
            } else {
                $menu_color = '-'.$menu_color;
            }


            //Slider Color

            $slider_color = get_theme_option(tk_theme_name.'_colors_slider_change');
            $hover_slider = get_theme_option(tk_theme_name.'_colors_slider_hover');
            if((!$slider_color || $slider_color == 'green')) {
                $slider_color = '';
            } else {
                $slider_color = '-'.$slider_color;
            }

            $latest_news_color = get_theme_option(tk_theme_name.'_colors_latest_news_change');
            if((!$latest_news_color || $latest_news_color == 'green')) {
                $latest_news_color = '';
            } else {
                $latest_news_color = '-'.$latest_news_color;
            }


            $program_color = get_theme_option(tk_theme_name.'_colors_program_change');
            $program_hover = get_theme_option(tk_theme_name.'_colors_program_hover');
            
            if((!$program_color || $program_color == 'yellow')) {
                $program_color = '';
            } else {
                $program_color = '-'.$program_color;
            }

            $slider_background = get_theme_option(tk_theme_name.'_colors_slider_background');
             
            if(!$slider_background) {
                $slider_background = 'blue';
            }

            $dropdown = get_theme_option(tk_theme_name.'_colors_menu_drop');

            $breadcrumbs = get_theme_option(tk_theme_name.'_colors_breadcrumbs_hover');

            $footer_hover = get_theme_option(tk_theme_name.'_colors_footer_hover');
            $footer_background = get_theme_option(tk_theme_name.'_colors_footer_background');
            if(!$footer_background) {
                $footer_background = 'green';
            }


            $catchline_color = get_theme_option(tk_theme_name.'_colors_catchline');

        ?>                
                    
<style type="text/css">
        /*BODY*/
        body{
            background-color: <?php echo '#'.$body_color?>;
            background-attachment: <?php echo $body_image_attachment?>;
            background-image: url(<?php echo $body_bg_image?>);
            background-position: <?php echo $body_image_position?>;
            background-repeat: <?php echo $body_image_repeat?>;
        }

        .bg-menu-left {
            background:url(<?php echo get_template_directory_uri(); ?>/style/img/bg-menu-left<?php echo $menu_color; ?>.png) no-repeat;
        }

        .bg-menu nav {
            background:url(<?php echo get_template_directory_uri(); ?>/style/img/bg-menu-center<?php echo $menu_color; ?>.png) repeat-x;
        }

        .bg-menu-right {
            background:url(<?php echo get_template_directory_uri(); ?>/style/img/bg-menu-right<?php echo $menu_color; ?>.png) no-repeat;
        }

        .flex-direction-nav {
            background:url(<?php echo get_template_directory_uri(); ?>/script/flexslider/theme/bg-arrow<?php echo $slider_color; ?>.png) no-repeat;
        }

        .hover-slider {
            background:url(<?php echo get_template_directory_uri(); ?>/style/img/pixel<?php echo $slider_color; ?>.png) repeat;
        }

        .hover-slider a:hover {
            color:#<?php echo $hover_slider; ?>;
        }

        .bg-scroll-home-title {
            background:url(<?php echo get_template_directory_uri(); ?>/style/img/bg-scroll-home-title<?php echo $program_color; ?>.png) no-repeat;
        }

        .jcarousel-skin-tango .jcarousel-next-vertical {
            background:url(<?php echo get_template_directory_uri(); ?>/style/img/arrow-down-scroll<?php echo $program_color; ?>.png) no-repeat top right;
        }

        .jcarousel-skin-tango .jcarousel-prev-vertical {
            background:url(<?php echo get_template_directory_uri(); ?>/style/img/arrow-up-scroll<?php echo $program_color; ?>.png) no-repeat top left;
        }

        .latest-news-background {
             background:url(<?php echo get_template_directory_uri(); ?>/style/img/latest-news-home-one-date<?php echo $latest_news_color; ?>.png) no-repeat top;
        }

        .bg-blue-center {
            background:url("<?php echo get_template_directory_uri(); ?>/style/img/bg-<?php echo $slider_background ?>-center.png") repeat left top;
        }

        .bg-blue-center-title {
            background:url("<?php echo get_template_directory_uri(); ?>/style/img/bg-<?php echo $slider_background ?>-center.png") repeat left top;
        }

        .footer-top {
            background:url("<?php echo get_template_directory_uri(); ?>/style/img/footer-top<?php if($footer_background=='green') { echo ''; } else { echo '-'.$footer_background; } ?>.png") repeat-x top left;
        }

        .footer {
            background:url("<?php echo get_template_directory_uri(); ?>/style/img/bg-<?php echo $footer_background ?>-center.png") repeat left top;
        }

        .bg-blue-top  {
            background:url("<?php echo get_template_directory_uri(); ?>/style/img/bg-<?php echo $slider_background ?>-top.png") repeat-x left top;
        }

        .bg-blue-down  {
            background:url("<?php echo get_template_directory_uri(); ?>/style/img/bg-<?php echo $slider_background ?>-down.png") repeat-x left top;
        }

        .bg-menu nav ul li > a:hover, nav ul .current-menu-item > a {
            color:#<?php echo $hover_menu; ?> !important;
        }

        .flex-direction-nav li a:hover, .blog-hover a:hover, .breadcrumbs-content ul li a:hover {
            color:#<?php echo $hover_slider; ?> !important;
            -webkit-transition: color 120ms linear;
            -moz-transition: color 120ms linear;
            transition: color 120ms linear;
        }
        .scroll-pane-one a:hover {
            color:#<?php echo $program_hover; ?>;
        }

        .sub-menu-top {
            background:url(<?php echo get_template_directory_uri(); ?>/script/menu/img/nav-top<?php echo $menu_color; ?>.png) no-repeat !important;
            height:6px;
        }

        .sub-menu-bottom {
            background:url(<?php echo get_template_directory_uri(); ?>/script/menu/img/nav-bottom<?php echo $menu_color; ?>.png) no-repeat !important;
            height:7px;
        }

        .sub-menu .menu-item {
            background:url(<?php echo get_template_directory_uri(); ?>/script/menu/img/nav-center<?php echo $menu_color; ?>.png) repeat-y !important;
        }
       
        
        .footer_box li a:hover, .copyright a:hover, .footer_box tbody a {
            color:#<?php echo $footer_hover ?> !important;
        }

        .home-text,  .home-text a  {
            color:#<?php echo $catchline_color?>;
    }


</style>                      