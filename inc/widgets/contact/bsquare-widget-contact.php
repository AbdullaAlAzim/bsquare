<?php
class pluspoint_Widget_Contact_Info extends WP_Widget {
    public function __construct(){
        parent::__construct(
            'pluspoint_contact_info',
            esc_html__('bsquare:: Contact Info', 'bsquare'),
            array('description' => esc_html__( 'Contact Info widget to display your content.', 'bsquare' ))
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
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'bsquare'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'bsquare'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('address')); ?>" id="<?php echo esc_attr($this->get_field_id('address')); ?>" value="<?php echo esc_attr( $address ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'bsquare'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" value="<?php echo esc_attr( $phone ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'bsquare'); ?></label>
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
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2"><?php echo wp_kses_post($instance['title']); ?></h2>
                <div class="block-23 mb-3">
                  <ul>
                    <?php if(!empty($address)): ?>
                    <li><span class="icon icon-map-marker"></span><span class="text"><?php echo esc_html($address); ?></span>
                    </li>
                <?php endif; ?>
                  <?php if(!empty($phone)): ?>
                    <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo esc_html($phone); ?></span></a></li><?php endif; ?>
                    <?php if(!empty($email)): ?>
                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?php echo esc_html($email); ?></span></a></li>
                    <?php endif; ?>
                  </ul>
                </div>
            </div>
          </div>
<?php
       
    } 

}
/**
 * Register Sidebar Widget
 */
if ( ! function_exists( 'pluspoint_contact_info_init' ) ) {
  function pluspoint_contact_info_init() {
    register_widget( 'pluspoint_Widget_Contact_Info' );
  }
  add_action( 'widgets_init', 'pluspoint_contact_info_init');
}