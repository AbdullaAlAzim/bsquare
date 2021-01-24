<?php
class Bsquare_Sidebar_About extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'bsquare_about',
            esc_html__('Bsquare:: About Sidebar', 'bsquare'),
            array('description' => esc_html__( 'About widget', 'bsquare' ))
        );
    }

    //Widget form inputs
    public function form($instance){
        //Defaults
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ,) );
        $title = esc_attr( $instance['title'] );
        
        $content = $instance['content'];
        ?>
        
       <p>
            <label for="<?php echo esc_html($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'bsquare'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_html($this->get_field_name('title')); ?>" id="<?php echo esc_html($this->get_field_id('title')); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        
        <p>
          <label for="<?php echo esc_html($this->get_field_id('content')); ?>"><?php esc_html_e('Add Content','bsquare'); ?></label>
          <textarea name="<?php echo esc_html($this->get_field_name('content')); ?>" id="<?php echo esc_html($this->get_field_id('content')); ?>" cols="30" rows="10" class="widefat"><?php echo esc_html($content); ?></textarea>
        </p>
        
      
        <?php
    }
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    $instance['content'] = (!empty($new_instance['content'])) ? strip_tags($new_instance['content']) : '';
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
        ?>
       
        <div class="sidebar-box ftco-animate">
            <h3 class="heading-sidebar"><?php echo esc_html($title);?></h3>
            <p><?php echo !empty($content) ? wp_kses_post($content) : ''; ?></p>
        </div>
       
<?php
       
    } 
}
/**
 * Register Sidebar Widget
 */
if ( ! function_exists( 'bsquare_about_init' ) ) {
  function bsquare_about_init() {
    register_widget( 'Bsquare_Sidebar_About' );
  }
  add_action( 'widgets_init', 'bsquare_about_init' );
}