<?php
/*---------------------------------------------------------------------------------*/
/* Twitter widget */
/*---------------------------------------------------------------------------------*/
class App_Testimonials extends WP_Widget {

   function App_Testimonials() {
	   $widget_ops = array('description' => 'Displays testimonials' );
       parent::WP_Widget(false, __(tk_theme_name.' - Testimonials', tk_theme_name),$widget_ops);
   }

   function widget($args, $instance) {
    extract( $args );
	   $title = $instance['title'];
 ?>

		<?php echo $before_widget; ?>


<?php if ($title) echo $before_title . $title . $after_title; ?>
        <div class="slide-wrap">
            <ul class="slides">
                <?php
                $prefix = 'tk_';
                $args = array('post_type' => 'pt_testimonial');

                // The Query
                $the_query = new WP_Query( $args );

                // The Loop
                while ($the_query->have_posts() ) : $the_query->the_post();
                        $id = $the_query->post->ID;
                        $job_position = get_post_meta($id, $prefix.'job_title', true);

                   ?>

                <li>
                        <div class="testimonials left">
                            <div class="testimonials-title left">
                                <span><?php the_title(); ?></span>
                                <p><?php echo $job_position; ?></p>
                            </div><!--testimonials-title-->
                            <div class="testimonials-content left">
                                <img src="<?php echo get_template_directory_uri(); ?>/style/img/testimonials-arrow.png" alt="" title=""  />
                                <p><?php the_content(); ?></p>
                            </div><!--testimonials-content-->
                        </div><!--testimonials-->
                </li>



            <?php
                 endwhile;
             ?>
            </ul>
        </div><!-- slide wrap -->
         <?php echo $after_widget; ?>




            <script type="text/javascript">
                jQuery(document).ready(function(){

                    jQuery('.slide-wrap').flexslider({
                           animation: 'fade',                         
                           slideshow: false,
                           useCSS: true,
                           controlNav: false,
                           prevText: "Prev",
                           nextText: "Next"
                        
                    });
                });


            </script>

                    
          <?php }
       

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {
       
        if(isset($instance['title'])){
            $title = esc_attr($instance['title']);
        }else{
            $title = '';
        }
        
       ?>
       <p>
	   	 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',tk_theme_name); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
       </p>

      <?php
   }

}
register_widget('App_Testimonials');
?>