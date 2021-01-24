<?php
class bsuare_Widget_menu_Info extends WP_Widget {
    public function __construct(){
        parent::__construct(
            'pluspoint_menu_info',
            esc_html__('bsquare:: Footer menu', 'plus-point'),
            array('description' => esc_html__( 'Contact Info widget to display your content.', 'plus-point' ))
        );
    }

    //Widget Input Fields
    public function form($instance){
        if( isset($instance['title'])){
            $title = $instance['title'];
        }
        else{
            $title = '';
        }
        if( isset($instance['address'])){
            $address = $instance['address'];
        }
        else{
            $address = '';
        }
        if( isset($instance['phone'])){
            $phone = $instance['phone'];
        }
        else{
            $phone = '';
        }
        if( isset($instance['email'])){
            $email = $instance['email'];
        }
        else{
            $email = '';
        }
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'plus-point'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'plus-point'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('address')); ?>" id="<?php echo esc_attr($this->get_field_id('address')); ?>" value="<?php echo esc_attr( $address ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'plus-point'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" value="<?php echo esc_attr( $phone ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'plus-point'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('email')); ?>" id="<?php echo esc_attr($this->get_field_id('email')); ?>" value="<?php echo esc_attr( $email ); ?>">
        </p>
       
        <?php
    }
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = (!empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['address'] = (!empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
    $instance['phone'] = (!empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
    $instance['email'] = (!empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
   
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
       
        $address = $instance['address'];
        $phone = $instance['phone'];
        $email = $instance['email'];
        ?>
  

             <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
                   <?php
                      wp_nav_menu(
                        array(
                          'theme_location' => 'menu-2',
                          'menu_class'    => 'list-unstyled',
                          'link_before'   =>'<span class="icon-long-arrow-right mr-2"></span>',
                        
                        )
                      );
                   ?>
            </div>
          </div>


          
<?php
       
    } 

}
/**
 * Register Sidebar Widget
 */
if ( ! function_exists( 'bsuare_menu_info_init' ) ) {
  function bsuare_menu_info_init() {
    register_widget( 'bsuare_Widget_menu_Info' );
  }
  add_action( 'widgets_init', 'bsuare_menu_info_init');
}