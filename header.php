<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
    
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
                <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
                
    <title>
        <?php
        global $page, $paged;

        wp_title('|', true, 'right');

        bloginfo('name');

        $site_description = get_bloginfo('description', 'display');
        if ($site_description && ( is_home() || is_front_page() ))
            echo " | $site_description";

        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', tk_theme_name), max($paged, $page));
        ?>
    </title>

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link href='http://fonts.googleapis.com/css?family=Medula+One' rel='stylesheet' type='text/css' />


        <?php $favicon = get_theme_option(tk_theme_name.'_general_favicon'); if(empty($favicon)) { $favicon = get_template_directory_uri()."/style/img/favicon.ico"; }?>
        <link rel="shortcut icon" href="<?php echo $favicon;?>" />


        <!--[if IE 8]>
        <link href="<?php echo get_template_directory_uri(); ?>/style/ie8-media.css" media="screen and (min-width: 250px;)" rel="stylesheet"/>
        <![endif]-->
        
    <?php
        $g_analitics = get_theme_option(tk_theme_name.'_general_google_analytics');
        if( isset ($g_analitics) && $g_analitics != ''){
            echo $g_analitics;
        }
    ?>


    <?php
        wp_head();
        get_template_part('/inc/change-colors');
    ?>

</head>

<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=113020565471594";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php if ( ! isset( $content_width ) ) $content_width = 980; ?>

<div id="container">



    <!-- HEADER -->
    <div class="header left">
        <div class="head-parallax">
         <div id="parallax" class="parallax-viewport">
             <ul>
                <li class="parallax-layer">
                    <img src="<?php echo get_template_directory_uri(); ?>/style/img/rays.png" alt="background rays" />
                </li>
             </ul>
         </div>
        <div class="bg-header-shadow left">
            <div class="wrapper zindex">

                <!--LOGO-->
                <div class="logo left">
                   <?php
                        $logo = get_option(tk_theme_name . '_general_header_logo');
                        if (empty($logo)) {
                            $logo = get_template_directory_uri() . "/style/img/logo.png";
                        }
                    ?>
                    <a href="<?php echo home_url() ?>" >
                        <img src="<?php echo $logo; ?>" alt="logo" />
                    </a>
                </div><!--/logo-->

                <!--MENU-->
                <div class="bg-menu right">
                    <div class="bg-menu-left left"></div>
                    <nav>
                       
                          <?php
                            if (function_exists('has_nav_menu') && has_nav_menu('primary')) {
                                $nav_menu = array('title_li' => '', 'theme_location' => 'primary', 'menu_class' => 'sf-menu',  'link_before' => '<div class="bullet left"></div>');
                                wp_nav_menu($nav_menu);
                            } else {
                                ?>
                                <ul class="sf-menu">
                                    <?php
                                    $pageargs = array(
                                        'depth' => 3,
                                        'title_li' => '',
                                        'echo' => 1,
                                        'authors' => '',
                                        'link_after' => '',
                                        'link_before'  => '<div class="bullet left"></div>',
                                        'walker' => '');
                                    wp_list_pages($pageargs); }
                                    ?>
                                </ul>
                    </nav>
                    <div class="bg-menu-right left"></div>
                </div><!--/bg-menu-->


            </div><!--/wrapper-->
            <div class="bg-blue-top left"></div><!--/bg-blue-top-->

        </div><!--/bg-header-shadow-->
        
        </div>
    </div><!--/header-->