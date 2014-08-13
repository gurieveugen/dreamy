<?php
/*---------------------------------------------------------------------------------*/
/* Ad widget */
/*---------------------------------------------------------------------------------*/
class App_Ad extends WP_Widget {

   function App_Ad() {
	   $widget_ops = array('description' => 'Advertising box, insert your Ad link and image' );
       parent::WP_Widget(false, __(tk_theme_name.' - Ad', tk_theme_name),$widget_ops);
   }

   function widget($args, $instance) {
        extract( $args );
        $unique_id = $args['widget_id'];
       $url = $instance['url'];
       $ad_image = $instance['ad_image'];
       
                 echo $before_widget; ?>

                <div class="ad-holder">
                    <div class="ad-image"><a href="<?php echo $url?>"><img src="<?php echo $ad_image?>" /></a></div>
                </div>

                <?php echo $after_widget; ?>
	<?php }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('my-upload');
        wp_enqueue_style('thickbox');
       $url = esc_attr($instance['url']);
       $ad_image = esc_attr($instance['ad_image']);


       ?>
       <p>
                        <label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Ad Link:',tk_theme_name); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('url'); ?>"  value="<?php echo $url; ?>" class="widefat" id="<?php echo $this->get_field_id('url'); ?>" />
       </p>
       <p>
                        <label for="<?php echo $this->get_field_id('ad_image'); ?>"><?php _e('Image:',tk_theme_name); ?></label>
                        <input type="text" name="<?php echo $this->get_field_name('ad_image'); ?>"  value="<?php echo $ad_image; ?>" class="widefat upload-url input_box" id="<?php echo $this->get_field_id('ad_image'); ?>" />
                        <input class="st_upload_button" id="" type="button" value="Upload" />

       </p>

      <?php
    }


}
register_widget('App_Ad');
?>