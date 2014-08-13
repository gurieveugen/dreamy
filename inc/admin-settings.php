<?php
$args = array(
	'orderby'            => 'name',
	'hide_empty'         => 1,
	'depth'              => 10,
);
$categories = get_categories($args);

$new_array = array();

foreach ($categories as $category_list ) {
    $array_to_add = array(
                'id' => 'cat_'.$category_list->term_id,
                'name' => 'cat_'.$category_list->term_id,
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    '',
                ),
                'label' => $category_list->cat_name,
                'desc' => '',
            );
    array_push($new_array, $array_to_add );
}

$tabs = array(

        /*************************************************************/
        /************GENERAL OPTIONS*******************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'general',
        'name' => 'General Options',

        'fields' => array(

           array(
                'id' => 'header_logo',
                'name' => 'header_logo',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/logo.png",
                'label' => 'Header Logo',
                'desc' => 'JPEG, GIF or PNG image, 184x71px recommended, maximum 300x150,  up to 500KB',
            ),

           array(
                'id' => 'footer_logo',
                'name' => 'footer_logo',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/footer-logo.png",
                'label' => 'Footer Logo',
                'desc' => 'JPEG, GIF or PNG image, 83x36px recommended, up to 500KB',
            ),

            array(
                'id' => 'favicon',
                'name' => 'favicon',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/favicon.ico",
                'label' => 'Favicon',
                'desc' => 'File format: ICO, dimenstions: 16x16',

            ),

            array(
                'id' => 'google_analytics',
                'name' => 'google_analytics',
                'type' => 'textarea',
                'value' => '',
                'label' => 'Google Analytics code',
                'desc' => '',
                'options' => array(
                    'rows' => '5',
                    'cols' => '80'
                )
            ),
            
            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),     


            array(
                'id' => 'show_share',
                'name' => 'show_share',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'If checked share buttons will be shown on single post',
                ),
                'label' => 'Show Share Buttons',
                'desc' => '',
            ),
            

            array(
                'id' => 'custom_sidebars',
                'name' => 'custom_sidebars',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Use different sidebars on page templates.',
                ),
                'label' => 'Custom Sidebars',
                'desc' => 'Check this box if you want to use custom sidebars on page templates, if unchecked the default sidebar will be used on every page.',
            ),
            
            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),     

            array(
                'id' => 'footer_copy',
                'name' => 'footer_copy',
                'type' => 'text',
                'value' => 'Copyright Information Goes Here © 2012. All Rights Reserved.',
                'label' => 'Footer Copy Text',
                'desc' => 'Text which appears in footer as copyright text',
                'options' => array(
                    'size' => '100'
                )
            ),

        ),
    ),


        /*************************************************************/
        /************HOME PAGE OPTIONS****************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'home',
        'name' => 'Home Page',

        'fields' => array(


            array(
                'id' => 'catchline',
                'name' => 'catchline',
                'type' => 'textarea',
                'value' => '',
                'label' => 'Home Page Catchline',
                'desc' => 'Set home page catchline text',
                'options' => array(
                    'rows' => '5',
                    'cols' => '80'
                )
            ),



            array(
                'id' => 'fullwidth',
                'name' => 'fullwidth',
                'type' => 'select',
                'value' => array(
                    array('Slide - Program', 'half'), // ARRAY ('TITLE', 'VALUE')
                    array('Slider Fullwidth', 'full-slide'), // ARRAY ('TITLE', 'VALUE')
                    array('Program Fullwidth', 'full-program'), // ARRAY ('TITLE', 'VALUE')
                    array('None', 'none') // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Slide Width',
                'desc' => '',
            ),

    
            
            array(
                'id' => 'latest_news',
                'name' => 'latest_news',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Disable Latest News',
                ),
                'label' => 'Disable Latest News on Home Page',
                'desc' => 'Check this box if you want to disable latest news on your Home page.',
            ),

            array(
                'id' => 'latest_number',
                'name' => 'latest_number',
                'type' => 'select',
                'value' => array(
                    array('2', '2'), // ARRAY ('TITLE', 'VALUE')
                    array('4', '4'), // ARRAY ('TITLE', 'VALUE')
                    array('6', '6'), // ARRAY ('TITLE', 'VALUE')
                    array('8', '8'), // ARRAY ('TITLE', 'VALUE')
                    array('10', '10'), // ARRAY ('TITLE', 'VALUE')
                    array('12', '12'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Number of Posts',
                'desc' => 'Select how many posts to show on Latest News section of your Home page.',
            ),

    array(
        'id' => 'box_1_hr',
        'name' => 'box_1_hr',
        'type' => 'hr',
        'options' => array(
            'width' => '100%',
            'color' => '#DFDFDF'
        )
    ),    


            array(
                'id' => 'disable_gallery',
                'name' => 'disable_gallery',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Disable Gallery',
                ),
                'label' => 'Disable Gallery on Home Page',
                'desc' => 'Check this box if you want to disable gallery on your Home page.',
            ),

            array(
                'id' => 'gallery_cat',
                'name' => 'gallery_cat',
                'type' => 'category',
                'value' => '',
                'taxonomy' => 'ct_gallery',
                'label' => 'Select Category',
                'desc' => 'Gallery section in Home page will show posts from this featured category',
            ),

            array(
                'id' => 'gallery_number',
                'name' => 'gallery_number',
                'type' => 'select',
                'value' => array(
                    array('4', '4'), // ARRAY ('TITLE', 'VALUE')
                    array('8', '8'), // ARRAY ('TITLE', 'VALUE')
                    array('12', '12'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Number of Posts',
                'desc' => 'Select how many posts to show on Gallery section of your Home page.',
            ),




            array(
                'id' => 'gallery_linking',
                'name' => 'gallery_linking',
                'type' => 'select',
                'value' => array(
                    array('Both link to single post', 'single'), // ARRAY ('TITLE', 'VALUE')
                    array('Image links to pirobox', 'image_pirobox'), // ARRAY ('TITLE', 'VALUE')
                    array('Both link to pirobox', 'pirobox'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Gallery Link',
                'desc' => '',
            ),

    array(
        'id' => 'box_1_hr',
        'name' => 'box_1_hr',
        'type' => 'hr',
        'options' => array(
            'width' => '100%',
            'color' => '#DFDFDF'
        )
    ),      
            
            array(
                'id' => 'use_home_content',
                'name' => 'use_home_content',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Enable page template on home page',
                ),
                'label' => '',
                'desc' => '',
            ),

            array(
                'id' => 'home_content',
                'name' => 'home_content',
                'type' => 'pages',
                'value' => '',
                'label' => 'Chose pag templatee to use on Home Content:',
                'desc' => 'Page template and content from this page will be shown on Home Page.',

            ),

    array(
        'id' => 'box_1_hr',
        'name' => 'box_1_hr',
        'type' => 'hr',
        'options' => array(
            'width' => '100%',
            'color' => '#DFDFDF'
        )
    ),           
            

        ),
    ),

        /*************************************************************/
        /************SLIDER OPTIONS*********************************/
        /*************************************************************/



    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'slider',
        'name' => 'Slider Options',

        'fields' => array(


            array(
                'id' => 'animation',
                'name' => 'animation',
                'type' => 'select',
                'value' => array(                    
                    array('Fade', 'fade'), // ARRAY ('TITLE', 'VALUE')
                    array('Slide', 'slide'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Select the way images change',
                'desc' => '',
            ),

            array(
                'id' => 'direction',
                'name' => 'direction',
                'type' => 'select',
                'value' => array(
                    array('Horizontal', 'horizontal'), // ARRAY ('TITLE', 'VALUE')
                    array('Vertical', 'vertical'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Select which direction does the images slide',
                'desc' => '',
            ),

            array(
                'id' => 'easing',
                'name' => 'easing',
                'type' => 'select',
                'value' => array(
                    array('Linear', 'linear'), // ARRAY ('TITLE', 'VALUE')
                    array('Swing', 'swing'), // ARRAY ('TITLE', 'VALUE')
                    array('easeOutBounce', 'easeOutBounce'), // ARRAY ('TITLE', 'VALUE')
                    array('easeInBounce', 'easeInBounce'), // ARRAY ('TITLE', 'VALUE')
                    array('easeInOutElastic', 'easeInOutElastic'), // ARRAY ('TITLE', 'VALUE')
                    array('easeInCirc', 'easeInCirc'), // ARRAY ('TITLE', 'VALUE')
                    array('easeInSine', 'easeInSine'), // ARRAY ('TITLE', 'VALUE')
                    array('easeInQuint', 'easeInQuint'), // ARRAY ('TITLE', 'VALUE')

                ),
                'label' => 'Select easing type',
                'desc' => '',
            ),

            array(
                'id' => 'slidespeed',
                'name' => 'slidespeed',
                'type' => 'text',
                'value' => 3000,
                'label' => 'Slideshow Speed',
                'desc' => 'Set the speed of the slideshow cycling, in milliseconds',
            ),

            array(
                'id' => 'animspeed',
                'name' => 'animspeed',
                'type' => 'text',
                'value' => 3000,
                'label' => 'Animation Speed',
                'desc' => 'Set the speed of animations, in milliseconds',
            ),

            array(
                'id' => 'initdelay',
                'name' => 'initdelay',
                'type' => 'text',
                'value' => 3000,
                'label' => 'Initialization Delay',
                'desc' => 'Set an initialization delay, in milliseconds',
            ),

            array(
                'id' => 'randomize',
                'name' => 'randomize',
                'type' => 'select',
                'value' => array(
                    array('Yes', 'true'), // ARRAY ('TITLE', 'VALUE')
                    array('No', 'false'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Randomize',
                'desc' => 'Randomize slide order',
            ),

            array(
                'id' => 'pauseonaction',
                'name' => 'pauseonaction',
                'type' => 'select',
                'value' => array(
                    array('Yes', 'true'), // ARRAY ('TITLE', 'VALUE')
                    array('No', 'false'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Pause On Action',
                'desc' => 'Pause the slideshow when interacting with control elements, highly recommended.',
            ),

            array(
                'id' => 'pauseonhover',
                'name' => 'pauseonhover',
                'type' => 'select',
                'value' => array(
                    array('Yes', 'true'), // ARRAY ('TITLE', 'VALUE')
                    array('No', 'false'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Pause On Hover',
                'desc' => 'Pause the slideshow when hovering over slider, then resume when no longer hovering.',
            ),

    ),


        ),
    

        /*************************************************************/
        /************COLOR OPTIONS*********************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'colors',
        'name' => 'Colors',

        'fields' => array(

           array(
                'id' => 'body_bg_img',
                'name' => 'body_bg_img',
                'type' => 'file',
                'value' => '',
                'label' => 'Body Background Image',
                'desc' => '',
                'clear' =>'' //if "YES" then clear button will appear
            ),

            array(
                'id' => 'body_img_position',
                'name' => 'body_img_position',
                'type' => 'select',
                'value' => array(
                    array('Left', 'left top'), // ARRAY ('TITLE', 'VALUE')
                    array('Center', 'center top'), // ARRAY ('TITLE', 'VALUE')
                    array('Right', 'right top'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Image Position',
                'desc' => '',
            ),

            array(
                'id' => 'body_img_repeat',
                'name' => 'body_img_repeat',
                'type' => 'select',
                'value' => array(
                    array('Tile', 'repeat'), // ARRAY ('TITLE', 'VALUE')
                    array('No Repeat', 'no-repeat'), // ARRAY ('TITLE', 'VALUE')
                    array('Tile Horizontally', 'repeat-x'), // ARRAY ('TITLE', 'VALUE')
                    array('Tile Vertically', 'repeat-y'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Image Repeat',
                'desc' => '',
            ),

            array(
                'id' => 'body_img_attachment',
                'name' => 'body_img_attachment',
                'type' => 'select',
                'value' => array(
                    array('Scroll', 'scroll'), // ARRAY ('TITLE', 'VALUE')
                    array('Fixed', 'fixed'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Image Attachment',
                'desc' => '',
            ),

            array(
                'id' => 'body_color',
                'name' => 'body_color',
                'type' => 'colorpicker',
                'value' => 'FFF',
                'label' => 'Body background color',
                'desc' => 'Set body background color',
            ),

            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),



            array(
                'id' => 'menu_change',
                'name' => 'menu_change',
                'type' => 'select',
                'value' => array(
                    array('Red', 'red'), // ARRAY ('TITLE', 'VALUE')
                    array('Blue', 'blue'), // ARRAY ('TITLE', 'VALUE')
                    array('Orange', 'orange'), // ARRAY ('TITLE', 'VALUE')
                    array('Green', 'green'), // ARRAY ('TITLE', 'VALUE')
                    array('Yellow', 'yellow'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Navigation Color',
                'desc' => 'Select color for navigation',
            ),

            array(
                'id' => 'menu_hover',
                'name' => 'menu_hover',
                'type' => 'colorpicker',
                'value' => 'ae420e',
                'label' => 'Navigation Hover Color',
                'desc' => 'Set hover color for navigation',
            ),

            array(
                'id' => 'menu_drop',
                'name' => 'menu_drop',
                'type' => 'colorpicker',
                'value' => 'ff754a',
                'label' => 'Dropdown navigation color',
                'desc' => 'Set background color for navigation dropdown',
            ),


            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),


            array(
                'id' => 'slider_change',
                'name' => 'slider_change',
                'type' => 'select',
                'value' => array(
                    array('Red', 'red'), // ARRAY ('TITLE', 'VALUE')
                    array('Blue', 'blue'), // ARRAY ('TITLE', 'VALUE')
                    array('Orange', 'orange'), // ARRAY ('TITLE', 'VALUE')
                    array('Green', 'green'), // ARRAY ('TITLE', 'VALUE')
                    array('Yellow', 'yellow'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Slider Color',
                'desc' => 'Select color for navigation',
            ),

            array(
                'id' => 'slider_background',
                'name' => 'slider_background',
                'type' => 'select',
                'value' => array(
                    array('Blue', 'blue'), // ARRAY ('TITLE', 'VALUE')
                    array('Red', 'red'), // ARRAY ('TITLE', 'VALUE')                    
                    array('Orange', 'orange'), // ARRAY ('TITLE', 'VALUE')
                    array('Green', 'green'), // ARRAY ('TITLE', 'VALUE')
                    array('Yellow', 'yellow'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Slider Background Color',
                'desc' => 'Select background style for slider',
            ),

            array(
                'id' => 'slider_hover',
                'name' => 'slider_hover',
                'type' => 'colorpicker',
                'value' => '0e7f30',
                'label' => 'Slider Text Hover Color',
                'desc' => 'Set hover color for "next" and "prev" buttons',
            ),

            array(
                'id' => 'breadcrumbs_hover',
                'name' => 'breadcrumbs_hover',
                'type' => 'colorpicker',
                'value' => 'A4D2F7',
                'label' => 'Breadcrumbs Hover and Current Color',
                'desc' => 'Set hover color and current item color for breadcrumbs',
            ),

            array(
                'id' => 'catchline',
                'name' => 'catchline',
                'type' => 'colorpicker',
                'value' => '00a3d1',
                'label' => 'Catchline Color',
                'desc' => 'Set color for catchline under the slider',
            ),

            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),

            array(
                'id' => 'program_change',
                'name' => 'program_change',
                'type' => 'select',
                'value' => array(
                    array('Yellow', 'yellow'), // ARRAY ('TITLE', 'VALUE')
                    array('Red', 'red'), // ARRAY ('TITLE', 'VALUE')
                    array('Blue', 'blue'), // ARRAY ('TITLE', 'VALUE')
                    array('Orange', 'orange'), // ARRAY ('TITLE', 'VALUE')
                    array('Green', 'green'), // ARRAY ('TITLE', 'VALUE')                   
                ),
                'label' => 'Program Color',
                'desc' => 'Select program color',
            ),


            array(
                'id' => 'program_hover',
                'name' => 'program_hover',
                'type' => 'colorpicker',
                'value' => 'ffcb00',
                'label' => 'Program Titles Hover Color',
                'desc' => 'Set hover for titles in program section ',
            ),


            array(
                'id' => 'latest_news_change',
                'name' => 'latest_news_change',
                'type' => 'select',
                'value' => array(
                    array('Green', 'green'), // ARRAY ('TITLE', 'VALUE')
                    array('Red', 'red'), // ARRAY ('TITLE', 'VALUE')
                    array('Blue', 'blue'), // ARRAY ('TITLE', 'VALUE')
                    array('Orange', 'orange'), // ARRAY ('TITLE', 'VALUE')                    
                    array('Yellow', 'yellow'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Latest News Color',
                'desc' => 'Select "Latest News" color',
            ),


            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),

            array(
                'id' => 'footer_background',
                'name' => 'footer_background',
                'type' => 'select',
                'value' => array(
                    array('Green', 'green'), // ARRAY ('TITLE', 'VALUE')
                    array('Red', 'red'), // ARRAY ('TITLE', 'VALUE')
                    array('Blue', 'blue'), // ARRAY ('TITLE', 'VALUE')
                    array('Orange', 'orange'), // ARRAY ('TITLE', 'VALUE')
                    array('Yellow', 'yellow'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Footer Background',
                'desc' => 'Set background color for footer',
            ),



            array(
                'id' => 'footer_hover',
                'name' => 'footer_hover',
                'type' => 'colorpicker',
                'value' => 'ffcb00',
                'label' => 'Footer link hover color',
                'desc' => 'Set hover color for links in footer',
            ),

        ),
    ),

    

        /*************************************************************/
        /************SOCIAL OPTIONS*********************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'social',
        'name' => 'Social',
        'fields' => array(

            array(
                'id' => 'rss_url',
                'name' => 'rss_url',
                'type' => 'text',
                'value' => '',
                'label' => 'RSS Feed URL',
                'desc' => 'Enter url of RSS feed you want to use. WordPress default is www.yoursite.com/feed/.',
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'google_plus',
                'name' => 'google_plus',
                'type' => 'text',
                'value' => '',
                'label' => 'Google Plus account',
                'desc' => 'Enter Google+ account (e.g. 123456789012345678901) or leave empty if you dont wish to use Google+',
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'facebook',
                'name' => 'facebook',
                'type' => 'text',
                'value' => '',
                'label' => 'Facebook account',
                'desc' => 'Enter Facebook account (e.g. themeskingdom) or leave empty if you dont wish to use Facebook',
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'twitter',
                'name' => 'twitter',
                'type' => 'text',
                'value' => '',
                'label' => 'Twitter account',
                'desc' => 'Enter Twitter account (e.g. themeskingdom) or leave empty if you dont wish to use Twitter',
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'linkedin',
                'name' => 'linkedin',
                'type' => 'text',
                'value' => '',
                'label' => 'Linkedin account',
                'desc' => 'Enter Linkedin account (e.g. http://www.linkedin.com/company/2687325) or leave empty if you dont wish to use Linkedin',
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),     
            
            array(
                'id' => 'twitter_auth',
                'name' => 'twitter_auth',
                'type' => 'label',
                'value' => '',
                'label' => '<a target="_blank" href="http://www.themeskingdom.com/knowledge-base/how-to-setup-twitter/">How to setup Twitter authentication</a> ',
            ),
                        
            array(
                'id' => 'twitter_consumer_key',
                'name' => 'twitter_consumer_key',
                'type' => 'text',
                'value' => '',
                'label' => 'Consumer key',
                'desc' => 'Application consumer key',
                'options' => array(
                    'size' => '80'
                )
            ),
            array(
                'id' => 'twitter_consumer_secret',
                'name' => 'twitter_consumer_secret',
                'type' => 'text',
                'value' => '',
                'label' => 'Consumer secret',
                'desc' => 'Application consumer secret',
                'options' => array(
                    'size' => '80'
                )
            ),
            array(
                'id' => 'twitter_access_token',
                'name' => 'twitter_access_token',
                'type' => 'text',
                'value' => '',
                'label' => 'Access token',
                'desc' => 'Application access token',
                'options' => array(
                    'size' => '80'
                )
            ),
            array(
                'id' => 'twitter_token_secret',
                'name' => 'twitter_token_secret',
                'type' => 'text',
                'value' => '',
                'label' => 'Access Token Secret',
                'desc' => 'Application access token secret',
                'options' => array(
                    'size' => '80'
                )
            ),
        ),
    ),

        /*************************************************************/
        /************CONTACT OPTIONS******************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'contact',
        'name' => 'Contact',
        'fields' => array(

            array(
                'id' => 'contact_subject',
                'name' => 'contact_subject',
                'type' => 'text',
                'value' => 'E-mail from '.tk_theme_name().' Theme',
                'label' => 'Subject for your contact form',
                'desc' => 'This will be subject when you receive e-mail from your site',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'name_error_message',
                'name' => 'name_error_message',
                'type' => 'text',
                'value' => 'Please insert your name!',
                'label' => 'Name error message',
                'desc' => 'Enter error message if name is not entered in contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'email_error_message',
                'name' => 'email_error_message',
                'type' => 'text',
                'value' => 'Please insert your e-mail!',
                'label' => 'E-mail error message',
                'desc' => 'Enter error message if e-mail is not entered in contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_error_message',
                'name' => 'message_error_message',
                'type' => 'text',
                'value' => 'Please insert your message!',
                'label' => 'Message text error message',
                'desc' => 'Enter error message if message text is not entered in contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_successful',
                'name' => 'message_successful',
                'type' => 'text',
                'value' => 'Message sent!',
                'label' => 'Message on successful e-mail send',
                'desc' => 'Enter notification text for successfully sent message',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_unsuccessful',
                'name' => 'message_unsuccessful',
                'type' => 'text',
                'value' => 'Some error occured!',
                'label' => 'Message for error on e-mail send',
                'desc' => 'Enter notification text for unsuccessfully sent message',
                'options' => array(
                    'size' => '100'
                )
            ),
            
            array(
                'id' => 'disable_captcha',
                'name' => 'disable_captcha',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Disable Captcha',
                ),
                'label' => 'Disable Captcha on Contact Page',
                'desc' => 'Check this box if you want to disable captcha on your Contact page.',
            ),


            array(
                'id' => 'show_map',
                'name' => 'show_map',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'If checked map will be removed',
                ),
                'label' => 'Remove  Map',
                'desc' => '',
            ),


            array(
                'id' => 'default_map',
                'name' => 'default_map',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'If checked map colors will be used',
                ),
                'label' => 'Default Map Color',
                'desc' => '',
            ),


            array(
                'id' => 'map_color',
                'name' => 'map_color',
                'type' => 'colorpicker',
                'value' => '',
                'label' => 'Google Map Color',
                'desc' => 'Set color of google map, leave empty for default color',
            ),

            array(
                'id' => 'googlemap_x',
                'name' => 'googlemap_x',
                'type' => 'text',
                'value' => '',
                'label' => 'Google map X coordinate',
                'desc' => 'Insert google map coordinate for your adress',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'googlemap_y',
                'name' => 'googlemap_y',
                'type' => 'text',
                'value' => '',
                'label' => 'Google map Y coordinate',
                'desc' => 'Insert google map coordinate for your adress',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'googlemap_zoom',
                'name' => 'googlemap_zoom',
                'type' => 'text',
                'value' => '15',
                'label' => 'Google map zoom factor',
                'desc' => 'Insert google map zoom factor',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'marker_title',
                'name' => 'marker_title',
                'type' => 'text',
                'value' => 'Marker',
                'label' => 'Marker Title',
                'desc' => 'Insert marker title.',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'google_map_type',
                'name' => 'google_map_type',
                'type' => 'select',
                'value' => array(
                    array('HYBRID', 'HYBRID'), // ARRAY ('TITLE', 'VALUE')
                    array('ROADMAP', 'ROADMAP'), // ARRAY ('TITLE', 'VALUE')
                    array('SATELLITE', 'SATELLITE'), // ARRAY ('TITLE', 'VALUE')
                    array('TERRAIN', 'TERRAIN'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Google Map type',
                'desc' => 'Select map type you want to use.',
            ),


        ),
    ),
        
);



?>