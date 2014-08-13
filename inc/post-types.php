<?php 
add_action( 'init', 'post_types_adding' );

function post_types_adding() {

        /**************************************************************/
        /************SLIDER POST TYPE********************************/
        /*************************************************************/

  $labels = array(
    'name' => __('Slider', tk_theme_name),
    'singular_name' => __('Slider', tk_theme_name),
    'add_new' => __('Add New', tk_theme_name),
    'add_new_item' => __('Add New Slide', tk_theme_name),
    'edit_item' => __('Edit Slide', tk_theme_name),
    'new_item' => __('New Slide', tk_theme_name),
    'all_items' => __('All Slides', tk_theme_name),
    'view_item' => __('View this Slide', tk_theme_name),
    'search_items' => __('Search Slides', tk_theme_name),
    'not_found' =>  __('No Slides', tk_theme_name),
    'not_found_in_trash' => __('No Slides in Trash', tk_theme_name),
    'parent_item_colon' => '',
    'menu_name' => __('Slider', tk_theme_name),

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'pt-slides'),
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => get_template_directory_uri().'/style/img/slider.png',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-post-format' ),
);
  register_post_type('pt_slides',$args);

          /**************************************************************/
        /************PROGRAM POST TYPE********************************/
        /*************************************************************/

  $labels = array(
    'name' => __('Program', tk_theme_name),
    'singular_name' => __('Program', tk_theme_name),
    'add_new' => __('Add New', tk_theme_name),
    'add_new_item' => __('Add New Program', tk_theme_name),
    'edit_item' => __('Edit Program', tk_theme_name),
    'new_item' => __('New Program', tk_theme_name),
    'all_items' => __('All Programs', tk_theme_name),
    'view_item' => __('View this Program', tk_theme_name),
    'search_items' => __('Search Programs', tk_theme_name),
    'not_found' =>  __('No Programs', tk_theme_name),
    'not_found_in_trash' => __('No Programs in Trash', tk_theme_name),
    'parent_item_colon' => '',
    'menu_name' => __('Program', tk_theme_name),

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'pt-programs'),
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => get_template_directory_uri().'/style/img/clipboard-list.png',
    'supports' => array('title', 'editor', 'excerpt', 'custom-post-format' ),
);
  register_post_type('pt_programs',$args);


        /**************************************************************/
        /************GALLERY POST TYPE********************************/
        /*************************************************************/

  $labels = array(
    'name' => __('Gallery', tk_theme_name),
    'singular_name' => __('Gallery', tk_theme_name),
    'add_new' => __('Add New', tk_theme_name),
    'add_new_item' => __('Add New Photo', tk_theme_name),
    'edit_item' => __('Edit Photo', tk_theme_name),
    'new_item' => __('New Photo', tk_theme_name),
    'all_items' => __('All Photos', tk_theme_name),
    'view_item' => __('View this Photo', tk_theme_name),
    'search_items' => __('Search Gallery', tk_theme_name),
    'not_found' =>  __('No Photos', tk_theme_name),
    'not_found_in_trash' => __('No Photos in Trash', tk_theme_name),
    'parent_item_colon' => '',
    'menu_name' => __('Gallery', tk_theme_name),

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'pt-photos'),
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => get_template_directory_uri().'/style/img/portfolio.png',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-post-format' ),
);
  register_post_type('pt_gallery',$args);


          /**************************************************************/
         /************TESTIMONIALS POST TYPE************************/
        /*************************************************************/

  $labels = array(
    'name' => __('Testimonials', tk_theme_name),
    'singular_name' => __('Testimonials', tk_theme_name),
    'add_new' => __('Add New', tk_theme_name),
    'add_new_item' => __('Add New Testimonial', tk_theme_name),
    'edit_item' => __('Edit Testimonial', tk_theme_name),
    'new_item' => __('New Testimonial', tk_theme_name),
    'all_items' => __('All Testimonials', tk_theme_name),
    'view_item' => __('View this Testimonial', tk_theme_name),
    'search_items' => __('Search Testimonials', tk_theme_name),
    'not_found' =>  __('No Testimonials', tk_theme_name),
    'not_found_in_trash' => __('No Testimonials in Trash', tk_theme_name),
    'parent_item_colon' => '',
    'menu_name' => __('Testimonials', tk_theme_name),

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'pt-testimonial'),
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => get_template_directory_uri().'/style/img/testimonials.png',
    'supports' => array('title', 'editor', 'excerpt', 'custom-post-format' ),
);
  register_post_type('pt_testimonial',$args);


  flush_rewrite_rules();

}

?>