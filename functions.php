<?php
global $wpdb;

require(  get_template_directory() . '/inc/theme-settings.php');                //Building theme administration

require(  get_template_directory() . '/inc/meta-boxes.php');                    //Building meta boxes

require(  get_template_directory() . '/inc/post-types.php');                    //Building post types

require(  get_template_directory() . '/inc/custom-taxonomies.php');             //Building post types

require(  get_template_directory() . '/inc/class-tgm-plugin-activation.php');             //Script for installing plugins


require_once 'includes/helper.php';
// =========================================================
// USE
// =========================================================
use Factory\Page;
use Factory\PostType;
use Factory\MetaBox;
use Factory\Taxonomy;
use Factory\LoremPosts;
use Factory\Controls\ControlsCollection;
use Factory\Controls\Text;
use Factory\Controls\Textarea;
use Factory\Controls\Select;
use Factory\Controls\Checkbox;
use Factory\Controls\Table;
use Factory\Controls\Image;   
// =========================================================
// THEME SETTINGS [PAGE]
// =========================================================
$theme_settings = new Page('Theme settings', 
    array(
        'icon_code' => 'f085'
    )
);

$section_top_bar = new ControlsCollection(
    array(  
        new Textarea('Text'),        
        new Text('Phone'),
        new Text('Email'),
        new Text('Facebook')
    )
);

$theme_settings->addControls('Top bar', $section_top_bar);
$theme_settings->initPage();

define('TDU', get_bloginfo('template_url'));

if ( ! function_exists( 'register_slider_plugin' ) ) {
    add_action( 'tgmpa_register', 'register_slider_plugin' );
    function register_slider_plugin() {

        $plugins = array(
            array(
                'name'                  => 'ThemesKingdom Shortcodes', // The plugin name
                'slug'                  => 'shortcodes', // The plugin slug (typically the folder name)
                'source'                => get_template_directory() . '/inc/plugins/shortcodes.zip', // The plugin source
                'required'              => false, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),            
        );
            
            
            $config = array(
            'domain'            => 'tkingdom',                  // Text domain - likely want to be the same as your theme.
            'default_path'      => '',                          // Default absolute path to pre-packaged plugins
            'parent_menu_slug'  => 'themes.php',                // Default parent menu slug
            'parent_url_slug'   => 'themes.php',                // Default parent URL slug
            'menu'              => 'install-required-plugins',  // Menu slug
            'has_notices'       => true,                        // Show admin notices or not
            'is_automatic'      => true,                        // Automatically activate plugins after installation or not
            'message'           => '',                          // Message to output right before the plugins table
            'strings'           => array(
                'page_title'                                => __( 'Install Required Plugins', 'tkingdom' ),
                'menu_title'                                => __( 'Install Plugins', 'tkingdom' ),
                'installing'                                => __( 'Installing Plugin: %s', 'tkingdom' ), // %1$s = plugin name
                'oops'                                      => __( 'Something went wrong with the plugin API.', 'tkingdom' ),
                'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
                'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
                'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
                'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
                'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
                'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
                'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
                'return'                                    => __( 'Return to Required Plugins Installer', 'tkingdom' ),
                'plugin_activated'                          => __( 'Plugin activated successfully.', 'tkingdom' ),
                'complete'                                  => __( 'All plugins installed and activated successfully. %s', 'tkingdom' ), // %1$s = dashboard link
                'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
        );
        tgmpa( $plugins, $config );
    } // function
} // if

function tk_theme_name(){
    return 'dreamy';
}
define( 'tk_theme_name', 'dreamy' );
update_option('tk_theme_name', tk_theme_name);

$lang = get_template_directory() . '/languages/';                               //Make this theme available for translation.
load_theme_textdomain(tk_theme_name, $lang);

add_theme_support( 'automatic-feed-links' );                                    //Add default posts and comments RSS feed links to <head>

add_theme_support( 'post-thumbnails' );                                         //This enables Post Thumbnails support for this theme.
        add_image_size( 'slider', 556 , 400 , true );
        add_image_size( 'gallery-front', 176 , 151 , true );
        add_image_size( 'blog', 176 , 151 , true );
        add_image_size( 'fullwidth-slider', 873 , 400 , true );
        
register_nav_menu( 'primary', __( 'Primary Menu', tk_theme_name ) );                //This theme uses wp_nav_menu()

//THEME NAME
$tk_theme_name = tk_theme_name;

function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



        /*************************************************************/
        /************LOAD STYLES************************************/
        /*************************************************************/

        function tk_add_stylesheet() {
                wp_register_style('main_style', get_stylesheet_uri());
                wp_enqueue_style('main_style');
                wp_register_style('superfish', get_template_directory_uri().'/script/menu/superfish.css');
                wp_enqueue_style('superfish');
                wp_register_style('fancybox', get_template_directory_uri().'/script/fancybox/source/jquery.fancybox.css');
                wp_enqueue_style('fancybox');             
                wp_register_style('flexslider', get_template_directory_uri().'/script/flexslider/flexslider.css');
                wp_enqueue_style('flexslider');
                wp_register_style('jplayer', get_template_directory_uri().'/script/jplayer/skin/blue.monday/jplayer.blue.monday.css');
                wp_enqueue_style('jplayer');
                wp_register_style('jcarusel', get_template_directory_uri().'/script/jcarusel/skin.css');
                wp_enqueue_style('jcarusel');
                wp_register_style('parallax', get_template_directory_uri().'/script/jparallax/css/jquery.parallax.css');
                wp_enqueue_style('color-style');
                wp_register_style('shortcodes', get_template_directory_uri() . '/style/shortcodes.css');
                wp_enqueue_style('shortcodes');
                wp_register_style('fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
                wp_enqueue_style('fontawesome');                


                
                $browser = $_SERVER['HTTP_USER_AGENT'];

                // Macintosh
                $mac = strpos($browser, 'Macintosh') ? true : false;

                // Windows
                $win = strpos($browser, 'Windows') ? true : false;

                
               if (strpos($browser, 'iPad')) {
                    wp_register_style('ipad', get_template_directory_uri().'/style/ipad.css');
                    wp_enqueue_style('ipad');
                }

                if (strpos($browser, 'MSIE 8.0')) {
                    wp_register_style('ie8', get_template_directory_uri().'/style/ie8.css');
                    wp_enqueue_style('ie8');
                }

                if (strpos($browser, 'MSIE 9.0')) {
                    wp_register_style('ie8', get_template_directory_uri().'/style/ie9.css');
                    wp_enqueue_style('ie8');
                }


                if(!empty($win)) {
                    if($win == 'Windows') {
                        if (strpos($browser, 'Firefox')) {
                            wp_register_style('firefox', get_template_directory_uri().'/style/firefox-win.css');
                            wp_enqueue_style('firefox');
                        }}
                 }
                }
        add_action( 'wp_enqueue_scripts', 'tk_add_stylesheet' );



        /*************************************************************/
        /************LOAD SCRIPTS***********************************/
        /*************************************************************/
        
        function tk_add_scripts() {
            
            wp_enqueue_script('jquery');
            wp_enqueue_script('superfish', get_template_directory_uri().'/script/menu/superfish.js' );
            wp_enqueue_script('my-commons', get_template_directory_uri().'/script/common.js' );
            wp_enqueue_script('fancybox', get_template_directory_uri().'/script/fancybox/source/jquery.fancybox.js' );
            wp_enqueue_script('jscolor', get_template_directory_uri().'/script/jscolor/jscolor.js' );
            wp_enqueue_script('flexslider', get_template_directory_uri().'/script/flexslider/jquery.flexslider.js' );
            wp_enqueue_script('isotope', get_template_directory_uri().'/script/isotope/jquery.isotope.min.js' );
            wp_enqueue_script('easing', get_template_directory_uri().'/script/easing/jquery.easing.1.3.js' );
            wp_enqueue_script('spiner', get_template_directory_uri().'/script/spiner/spin.min.js' );
            wp_enqueue_script('jplayer', get_template_directory_uri().'/script/jplayer/js/jquery.jplayer.min.js' );
            wp_enqueue_script('respond', get_template_directory_uri().'/script/respond.src.js' );
            wp_enqueue_script('carusel', get_template_directory_uri().'/script/jcarusel/jquery.jcarousel.js' );
            wp_enqueue_script('jParallax', get_template_directory_uri().'/script/jparallax/js/jquery.parallax.js' );
            wp_enqueue_script('EventFrame', get_template_directory_uri().'/script/jparallax/js/jquery.event.frame.js' );


            if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
        }  
        add_action('wp_enqueue_scripts', 'tk_add_scripts');          
                        
                        

        /*************************************************************/
        /************VIDEO PLAYER***********************************/
        /*************************************************************/

        function tk_video_player($url) {

		if(!empty($url)){
		$key_str1='youtube';
		$key_str2='vimeo';

		$pos_youtube = strpos($url, $key_str1);
		$pos_vimeo = strpos($url, $key_str2);
			if (!empty($pos_youtube)) {
			$url = str_replace('watch?v=','',$url);
			$url = explode('&',$url);
			$url = $url[0];
			$url = str_replace('http://www.youtube.com/','',$url);
		?>
			<div class="holder play3">
                                                        <iframe src="http://www.youtube.com/embed/<?php echo $url;?>?rel=0" frameborder="0" allowfullscreen></iframe>
			</div>
		<?php  }
		if (!empty($pos_vimeo)) {
			$url = explode('.com/',$url);
		?>

		<div class="holder play3">
                                    <iframe  id="getVideo" src="http://player.vimeo.com/video/<?php echo $url[1];?>?api=1&player_id=player_1" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		</div>
		<?php  }
		if (empty($pos_vimeo) && empty($pos_youtube)) {

		  echo "Video only allowes vimeo and youtube!";
		}

   }}

   
   
        /*************************************************************/
        /************GET VIDEO IMAGE***********************************/
        /*************************************************************/
   
   
        function get_video_image($url, $post_ID) {

		if(!empty($url)){
		$key_str1='youtube';
		$key_str2='vimeo';

		$pos_youtube = strpos($url, $key_str1);
		$pos_vimeo = strpos($url, $key_str2);
                                if (!empty($pos_youtube)) {
			$url = str_replace('watch?v=','',$url);
			$url = explode('&',$url);
			$url = $url[0];
			$url = str_replace('http://www.youtube.com/','',$url);
		?>
                                <img src="http://img.youtube.com/vi/<?php echo $url;?>/0.jpg" title="<?php echo get_the_title($post_ID)?>" alt="<?php echo get_the_title($post_ID)?>" />
		<?php  }
		if (!empty($pos_vimeo)) {
                                    $url = explode('.com/',$url);
                                    $data = @file_get_contents("http://vimeo.com/api/v2/video/".$url[1].".json");
                        if($data){
                                    $data = file_get_contents("http://vimeo.com/api/v2/video/".$url[1].".json");
                        }else{
                            curl_setopt($ch=curl_init(), CURLOPT_URL, "http://vimeo.com/api/v2/video/".$url[1].".json");
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            $response = curl_exec($ch);
                            curl_close($ch);
                            $data = $response;
                        }
                                    $data = json_decode($data);                                    
                                    ?>
                                    <img src="<?php echo $data[0]->thumbnail_medium;?>" title="<?php echo get_the_title($post_ID)?>" alt="<?php echo get_the_title($post_ID)?>" />
		  <?php }
		if (empty($pos_vimeo) && empty($pos_youtube)) {

		  echo "Video only allowes vimeo and youtube!";
		}
        }}
   
   
        /*************************************************************/
        /************REGISTER POST FORMATS************************/
        /************************************************************/

            $post_formats = array( 
                                    'aside', 
                                    'gallery', 
                                    'link', 
                                    'image', 
                                    'quote', 
                                    'audio',
                                    'video');

            add_theme_support( 'post-formats', $post_formats ); 

            add_post_type_support( 'post', 'post-formats' );

            add_post_type_support( 'pt_gallery', 'post-formats' );

   
            
        /* * ********************************************************** */
        /* * **********RANDOM GENERATOR******************** */
        /* * ********************************************************** */

        function generateRandomString($length = 10) {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }            
                        
            
        /*************************************************************/
        /************ENQUEUE ADMINSCRIPT**************************/
        /************************************************************/

            function enqueue_admin_script($hook) {
                    if ($hook == 'post.php' || $hook == 'post-new.php') {
                            wp_register_script('adminscript', get_template_directory_uri() . '/script/adminscript/adminscript.js', 'jquery');
                            wp_enqueue_script('adminscript');
                    }
            }
            add_action('admin_enqueue_scripts','enqueue_admin_script',10,1);


   
            
        /*************************************************************/
        /************AUDIO PLAYER***********************************/
        /************************************************************/

        function tk_jplayer($postid) {
            $audio_link = get_post_meta($postid, 'tk_audio_link', true); 
              ?>
                      <script type="text/javascript">

                              jQuery(document).ready(function(){

                                  if(jQuery().jPlayer) {
                                      jQuery("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
                                          ready: function () {
                                              jQuery(this).jPlayer("setMedia", {

                                                  mp3: "<?php echo $audio_link; ?>",
                                                  end: ""
                                              });
                                          },
                                          swfPath: "<?php echo get_template_directory_uri(); ?>/script/player",
                                          cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
                                          supplied: "mp3, all",
                                          swfPath: "<?php echo get_template_directory_uri()?>/script/jplayer/js"
                                      });

                                  }
                              });
                      </script>
      <?php
      }

      
        /*************************************************************/
        /************GET CUSTOM THUMB SIZE***********************/
        /************************************************************/

            /*
             * $height -> height of new image
             * $width -> width of new image
             * $src -> url of image you want to get thumb from
             */
            function tk_get_thumb($width, $height, $src)
            {
                $size = getimagesize($src);               
                if($width >= $size[0] || $height >= $size[1]){
                      echo $src;
                }else {
                if(strpos($src, '.jpg')){
                    $new_src = explode('.jpg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpg';
                        echo $new_src;
                }elseif(strpos($src, '.jpeg')){
                    $new_src = explode('.jpeg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpeg';
                    echo $new_src;
                }elseif(strpos($src, '.gif')){
                    $new_src = explode('.gif', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.gif';
                    echo $new_src;
                }elseif(strpos($src, '.png')){
                    $new_src = explode('.png', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.png';
                    echo $new_src;
                }
                }
            }
            
            
        /*************************************************************/
        /************GET CUSTOM THUMB SIZE v2***************/
        /************************************************************/  
            
            
    function tk_get_thumb_new($width, $height, $src)
            {
                if(strpos($src, '.jpg')){
                    $new_src = explode('.jpg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpg';
                        return $new_src;
                }elseif(strpos($src, '.jpeg')){
                    $new_src = explode('.jpeg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpeg';
                    return $new_src;
                }elseif(strpos($src, '.gif')){
                    $new_src = explode('.gif', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.gif';
                    return $new_src;
                }elseif(strpos($src, '.png')){
                    $new_src = explode('.png', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.png';
                    return $new_src;
                }
            }           



            
        /*************************************************************/
        /************LOAD WIDGETS**********************************/
        /*************************************************************/

        require_once (TEMPLATEPATH . '/inc/widgets/widget-twitter.php');
        require_once (TEMPLATEPATH . '/inc/widgets/widget-newsletter.php');
        require_once (TEMPLATEPATH . '/inc/widgets/widget-ad.php');
        require_once (TEMPLATEPATH . '/inc/widgets/widget-testimonial.php');


        

        /*************************************************************/
        /************INCREASE IMAGE QUALITY***********************/
        /************************************************************/

            function jpeg_quality_callback($arg)
            {
            return (int)100;
            }

            add_filter('jpeg_quality', 'jpeg_quality_callback');



        /*************************************************************/
        /************REMOVE IMAGE SIZE*****************************/
        /************************************************************/

            add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
             add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
             // Removes attached image sizes as well
             add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
             function remove_thumbnail_dimensions( $html ) {
             $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
             return $html;
             }

            
            
        /*************************************************************/
        /************IMAGE WITHOUT DIMENSIONS********************/
        /************************************************************/

            function tk_thumbnail($post_id, $img_size) {
                    $thumbnail = get_the_post_thumbnail($post_id, $img_size);
                    $thumbnail = preg_replace( '/(width|height)=\"\d*\"\s/', "", $thumbnail );
                    echo $thumbnail;
            }

            
        /*************************************************************/
        /************EXCERPT LENGTH*******************************/
        /************************************************************/

            function the_excerpt_length($charlength) {
                    $excerpt = get_the_excerpt();
                    $charlength++;

                    if ( strlen( $excerpt ) > $charlength ) {
                            $subex = substr( $excerpt, 0, $charlength - 5 );
                            $exwords = explode( ' ', $subex );
                            $excut = - ( strlen( $exwords[ count( $exwords ) - 1 ] ) );
                            if ( $excut < 0 ) {
                                    echo substr( $subex, 0, $excut );
                            } else {
                                    echo $subex;
                            }
                            echo '...';
                    } else {
                            echo $excerpt;
                    }
            }


            
        /*************************************************************/
        /************GET URL OF CURENT PAGE**********************/
        /************************************************************/

        function get_page_url(){

	$pageURL = 'http';
	if (isset($_SERVER["HTTPS"])) {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;

        }
        
        

        /*************************************************************/
        /************CHOSE SIDEBAR POSITION************************/
        /************************************************************/

        function tk_get_left_sidebar($sidebar_position, $sidebar_name) {

            $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');
            if($sidebar_position == 'Left'){
                if($sidebar_option !== 'yes') { ?>

                    <div id="sidebar" class="left">
                           <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Default/Home')) : ?>
                            <?php endif; ?>
                    </div>

               <?php } else { ?>

                    <div id="sidebar" class="left">
                           <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar_name)) : ?>
                           <?php endif; ?>
                    </div>

            <?php }
            }
        }


        
        function tk_get_right_sidebar($sidebar_position, $sidebar_name) {
            $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');
            if($sidebar_position == 'Right'){?>
            <?php
                $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');

                if($sidebar_option !== 'yes') { ?>

                <div id="sidebar" class="right">
                    <div class="sidebar_widget_holder widget-form">
                        <div class="bg-scroll-home-title ico-dummy"><span>Going on a bear hunt...</span></div>
                        <p>Come an have a look around our marvalous nursery! Just leave your name and number  and we'll be in touch</p>
                       <!--  <form action="#" class="contact-form">
                            <input type="text" placeholder="Enter your Name" value="">
                            <input type="email" placeholder="Enter your Email" value="">
                            <input type="text" placeholder="Enter your Contact Number" value="">
                            <input type="submit" value="Book a Show Around">
                        </form> -->
                        <?php echo do_shortcode('[contact-form-7 id="590" title="Sidebar form"]'); ?>
                    </div>
                   <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Default Sidebar')) : ?>
                    <?php endif; ?>
                </div><!--/#sidebar-->

               <?php } else { ?>

            <div id="sidebar" class="right">
                    <div class="sidebar_widget_holder widget-form">
                        <div class="bg-scroll-home-title ico-dummy"><span>Going on a bear hunt...</span></div>
                        <p>Come an have a look around our marvalous nursery! Just leave your name and number  and we'll be in touch</p>
                        <!-- <form action="#" class="contact-form">
                            <input type="text" placeholder="Enter your Name" value="">
                            <input type="email" placeholder="Enter your Email" value="">
                            <input type="text" placeholder="Enter your Contact Number" value="">
                            <input type="submit" value="Book a Show Around">
                        </form> -->
                        <?php echo do_shortcode('[contact-form-7 id="590" title="Sidebar form"]'); ?>
                    </div>
                   <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar_name)) : ?>
                   <?php endif; ?>
            </div><!--/#sidebar-->
            <?php }
             }
        }


        /*************************************************************/
        /**********************LOGIN LOGO AND LINK****************/
        /************************************************************/

add_filter( 'wpcf7_form_class_attr', 'your_custom_form_class_attr' );

function your_custom_form_class_attr( $class ) {
    $class .= ' contact-form';
    return $class;
}

add_action("login_head", "my_login_head");
function my_login_head() {
        $logo = get_option(tk_theme_name . '_general_header_logo');
        if (empty($logo)) {
            $logo = get_template_directory_uri() . "/style/img/logo.png";
        }
	echo "
	<style>
	body.login #login h1 a {
		background: url('".$logo."') no-repeat center top transparent;
		height: 90px;
                background-size:auto !important;
	}
	</style>
	";
}

function the_url( $url ) {
    return home_url();
}
add_filter( 'login_headerurl', 'the_url' );
        


        /*************************************************************/
        /************REGISTERING SIDEBARS**************************/
        /************************************************************/


        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Default Sidebar',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Blog',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Single Blog',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}


        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Single Slider',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Single Gallery',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}


        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Page',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Testimonials',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Archive/Search',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Contact',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Footer Widget 1',
                        'before_widget' => '<div class="footer-widget-holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2>',
                        'after_title'   => '</h2>' )
                        );
	}

	if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Footer Widget 2',
                        'before_widget' => '<div class="footer-widget-holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2>',
                        'after_title'   => '</h2>' )
                        );
	}

	if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Footer Widget 3',
                        'before_widget' => '<div class="footer-widget-holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2>',
                        'after_title'   => '</h2>' )
                        );
	}

	if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Footer Widget 4',
                        'before_widget' => '<div class="footer-widget-holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2>',
                        'after_title'   => '</h2>' )
                        );
	}


        
        /*************************************************************/
        /************SET DEFAULTS*********************************/
        /*************************************************************/
        if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
            update_option('dreamy_colors_body_bg_img', get_template_directory_uri().'/style/img/bg-body.jpg');
        }




        /*************************************************************/
        /************BREADCRUMBS***********************************/
        /*************************************************************/



   function dimox_breadcrumbs() {

  $delimiter = '&raquo;';
  $home = 'Home'; // text for the 'Home' link
  $before = '<li class="current">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb

  if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '  <div class="breadcrumbs-content"><ul><li style="background: none; padding: 0;">'.__('You are here:', tk_theme_name).' </li>';

    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li>';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
      
        if(get_post_type() == 'pt_gallery') {
        $portfolio_id = get_option('id_gallery_page');
        $portfolio_link = get_page_link($portfolio_id);

        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' .$portfolio_link . '">' . $post_type->labels->singular_name . '</a></li>';
        echo $before . get_the_title() . $after;
      } elseif(get_post_type() == 'pt_programs') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . get_the_title() . $after;
      } else {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>';
        echo $before . get_the_title() . $after;
      }
  }

      else {
        $cat = get_the_category(); $cat = $cat[0];
        echo '<li>'.get_category_parents($cat, TRUE, '</li> ');
        echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before . __('Search results for', tk_theme_name).' "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before .  __('Posts tagged', tk_theme_name).'"' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before .__( 'Articles posted by', tk_theme_name).$userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . __('Error 404', tk_theme_name) . $after;
    }



    echo '</ul></div>';

  }
} // end dimox_breadcrumbs()




        /*************************************************************/
        /************SAVE TEMPLATE  ID AND NAME*******************/
        /*************************************************************/

        
        
        
        
        

 add_action ( 'publish_page', 'saveContactID' );

function saveContactID($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_contact.php") {
        update_option('id_contact_page',$post_ID);
        update_option('title_contact_page',$the_title);
    }

    $oldblog = get_option('id_contact_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_contact.php") {
            update_option('id_contact_page','');
        }
    }
}
        
        
        
        
 add_action ( 'publish_page', 'saveBlogId' );

function saveBlogId($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_blog.php") {
        update_option('id_blog_page',$post_ID);
        update_option('title_blog_page',$the_title);
    }

    $oldblog = get_option('id_blog_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_blog.php") {
            update_option('id_blog_page','');
        }
    }
}


 add_action ( 'publish_page', 'saveGalleryID' );

function saveGalleryID($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_gallery.php") {
        update_option('id_gallery_page',$post_ID);
        update_option('title_gallery_page',$the_title);
    }

    $oldblog = get_option('id_gallery_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_gallery.php") {
            update_option('id_gallery_page','');
        }
    }
}



 add_action ( 'publish_page', 'saveFullwidthID' );

function saveFullwidthID($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_full_width.php") {
        update_option('id_fullwidth_page',$post_ID);
        update_option('title_fullwidth_page',$the_title);
    }

    $oldblog = get_option('id_fullwidth_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_full_width.php") {
            update_option('id_fullwidth_page','');
        }
    }
}







        /*************************************************************/
        /************TWITTER SCRIPT*********************************/
        /*************************************************************/


    //gets twitter relative time
    function twitter_time($get_twitter_time) {

       $base = strtotime("now"); 
       //get timestamp when tweet created 
       $tweet_time = strtotime($get_twitter_time); 
       //get difference 
       $time_result = $base - $tweet_time; 
       //calculate different time values 
       $minute = 60;
       $hour = $minute * 60; 
       $day = $hour * 24; 
       $week = $day * 7; 
       if(is_numeric($time_result) && $time_result > 0) { 
       //if less then 3 seconds 
       if($time_result < 3) return "right now"; 
       //if less then minute 
       if($time_result < $minute) return floor($time_result) . " seconds ago"; 
       //if less then 2 minutes 
       if($time_result < $minute * 2) return "about 1 minute ago"; 
       //if less then hour 
       if($time_result < $hour) return floor($time_result / $minute) . " minutes ago"; 
       //if less then 2 hours 
       if($time_result < $hour * 2) return "about 1 hour ago"; 
       //if less then day
       if($time_result < $day) return floor($time_result / $hour) . " hours ago"; 
       //if more then day, but less then 2 days 
       if($time_result > $day && $time_result < $day * 2) return "yesterday"; 
       //if less then year 
       if($time_result < $day * 365) return floor($time_result / $day) . " days ago"; 
       //else return more than a year 
        return "over a year ago"; }      
       } //twitter time


function twitter_script($unique_id, $limit) {
    
require_once(dirname( __FILE__ ).'/script/twitter/TwitterAPIExchange.php');

/*GET TWITTER KEYS FROM ADMINISTRATION*/
$twitter_consumer_key = get_theme_option(tk_theme_name.'_social_twitter_consumer_key');
$twitter_consumer_secret = get_theme_option(tk_theme_name.'_social_twitter_consumer_secret');
$twitter_access_token = get_theme_option(tk_theme_name.'_social_twitter_access_token');
$twitter_token_secret = get_theme_option(tk_theme_name.'_social_twitter_token_secret');
$twitter_username = get_theme_option(tk_theme_name.'_social_twitter');


/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => $twitter_access_token,
    'oauth_access_token_secret' => $twitter_token_secret,
    'consumer_key' => $twitter_consumer_key,
    'consumer_secret' => $twitter_consumer_secret
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name='.$twitter_username;

if(!empty($unique_id)) {
    $getfield .= "&count=".$limit;
} else {
    $getfield .= "&count=1";
}

$requestMethod = 'GET';

/** Perform the request and echo the response **/
$twitter = new TwitterAPIExchange($settings);
$twitter_results = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

if($unique_id !== 'home') { ?>
    <ul class="twitter_ul">
<?php } 

foreach($twitter_results as $single_tweet) {        

//gets twitter content, time and name
$twitter_status = $single_tweet -> text;
$twitter_time = $single_tweet -> created_at;
$twitter_name = $single_tweet -> user -> screen_name;
        
$twitter_status = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\">\\2</a>", $twitter_status);
$twitter_status = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\">\\2</a>", $twitter_status);
$twitter_status = preg_replace("/@(\w+)/", "<a href=\"http://twitter.com/\\1\">@\\1</a>", $twitter_status);
$twitter_status = preg_replace("/#(\w+)/", "<a href=\"http://twitter.com/search?q=\\1\">#\\1</a>", $twitter_status);
        
        //checks if it's single tweet on home or twitter widget
        if($unique_id == 'home'){    
    ?>
                        
    <div class="home-twitter left">
        <div class="home-twitter-content">
            <img src="<?php echo get_template_directory_uri() ?>/style/img/twitter-home.png" alt="img" title="img" />
            <div class="home-twitter-text right">
                    <span><?php echo $twitter_status; ?></span>
                    <p><?php echo '@' . $twitter_name; ?></p>
            </div><!--/home-twitter-text-->
        </div><!--/home-twitter-content-->
    </div><!--/home-twitter-->       
            
    <?php 
    //use this if it's twitter widget
        } else { ?>    
            <li><div class="box-twitter-center left"><img src="<?php echo get_template_directory_uri(); ?>/style/img/twitter-img.png" /><span><?php echo $twitter_status; ?></span></div><span class="twitter-links"><?php echo twitter_time($twitter_time); ?></span></li>     
    <?php }//$unique_id == 'home' ?>      
<?php } ?>
    
<?php if($unique_id !== 'home') { ?>
    </ul>
<?php } ?>    
                        
<?php
} //twitter script

  function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}




 include("update_notifier.php");
 
 ?>