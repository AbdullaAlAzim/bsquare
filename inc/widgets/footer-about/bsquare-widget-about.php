<?php
class Pluspoint_Widget_About extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'pluspoint_about',
            esc_html__('bsquare:: Footer About', 'bsquare'),
            array('description' => esc_html__( 'About widget', 'bsquare' ))
        );
    }
    //Widget form inputs
    public function form($instance){
        //Defaults
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ,'social_link1' =>'', 'social_link2' =>'', 'social_link3' =>'',) );
        $title = esc_attr( $instance['title'] );
        
        $content = $instance['content'];
        $social_link1 = $instance['social_link1'];
        $social_link2 = $instance['social_link2'];
        $social_link3 = $instance['social_link3'];

        ?>
        
       <p>
            <label for="<?php echo esc_html($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'bsquare'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_html($this->get_field_name('title')); ?>" id="<?php echo esc_html($this->get_field_id('title')); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        
        <p>
          <label for="<?php echo esc_html($this->get_field_id('content')); ?>"><?php esc_html_e('Add Content','bsquare'); ?></label>
          <textarea name="<?php echo esc_html($this->get_field_name('content')); ?>" id="<?php echo esc_html($this->get_field_id('content')); ?>" cols="30" rows="10" class="widefat"><?php echo esc_html($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('social_link1')); ?>"><?php esc_html_e('Social Link: Facebook', 'bsquare'); ?></label>
            <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('social_link1')); ?>" id="<?php echo esc_attr($this->get_field_id('social_link1')); ?>" value=" <?php echo esc_attr( $social_link1 ); ?>">
        </p>
        

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('social_link2')); ?>"><?php esc_html_e('Social Link: Twitter', 'bsquare'); ?></label>
            <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('social_link2')); ?>" id="<?php echo esc_attr($this->get_field_id('social_link2')); ?>" value=" <?php echo esc_attr( $social_link2 ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('social_link3')); ?>"><?php esc_html_e('Social Link: Linkedin', 'bsquare'); ?></label>
            <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('social_link3')); ?>" id="<?php echo esc_attr($this->get_field_id('social_link3')); ?>" value=" <?php echo esc_attr( $social_link3 ); ?>">
        </p>
      
        <?php
    }
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    $instance['content'] = (!empty($new_instance['content'])) ? strip_tags($new_instance['content']) : '';
    $instance['social_link1'] = (!empty($new_instance['social_link1'])) ? strip_tags($new_instance['social_link1']) : '';
    $instance['social_link2'] = (!empty($new_instance['social_link2'])) ? strip_tags($new_instance['social_link2']) : '';
    $instance['social_link3'] = (!empty($new_instance['social_link3'])) ? strip_tags($new_instance['social_link3']) : '';
    return $instance;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) { 
        $title = $instance['title'];
        $content = $instance['content'];
        $social_link1 = $instance['social_link1'];
        $social_link2 = $instance['social_link2'];
        $social_link3 = $instance['social_link3'];

        ?>
             

          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><?php echo esc_html($title);?></h2>
              <p><?php echo !empty($content) ? wp_kses_post($content) : ''; ?></p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <?php if (!empty($social_link1)): ?>
                <li class="ftco-animate"><a href="<?php echo esc_url(trim($social_link1));?>"><span class="icon-twitter"></span></a></li>
                <?php endif; ?>
                  <?php if (!empty($social_link2)): ?>
                <li class="ftco-animate"><a href="<?php echo esc_url(trim($social_link2));?>"><span class="icon-facebook"></span></a></li>
                  <?php endif; ?>
                   <?php if (!empty($social_link3)): ?>
                <li class="ftco-animate"><a href="<?php echo esc_url(trim($social_link3));?>"><span class="icon-instagram"></span></a></li>
              <?php endif; ?>
              </ul>
            </div>
          </div>
<?php
       
    } 
}
/**
 * Register Sidebar Widget
 */
if ( ! function_exists( 'pluspoint_about_init' ) ) {
  function pluspoint_about_init() {
    register_widget( 'Pluspoint_Widget_About' );
  }
  add_action( 'widgets_init', 'pluspoint_about_init' );
}