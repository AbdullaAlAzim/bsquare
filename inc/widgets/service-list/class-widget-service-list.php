<?php
class bsuare_Widget_Contact_Info extends WP_Widget {
    public function __construct(){
        parent::__construct(
            'bsquare_contact_info',
            esc_html__('bsquare:: Service List', 'bsquare'),
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
        if( isset($instance['service_one'])){
            $service_one = $instance['service_one'];
        }
        else{
            $service_one = '';
        }
        if( isset($instance['service_two'])){
            $service_two = $instance['service_two'];
        }
        else{
            $service_two = '';
        }
        if( isset($instance['service_three'])){
            $service_three = $instance['service_three'];
        }
        else{
            $service_three = '';
        }
        if( isset($instance['service_four'])){
            $service_four = $instance['service_four'];
        }
        else{
            $service_four = '';
        }
         if( isset($instance['service_five'])){
            $service_five = $instance['service_five'];
        }
        else{
            $service_five = '';
        }

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'bsquare'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('service_one')); ?>"><?php esc_html_e('service_one:', 'bsquare'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('service_one')); ?>" id="<?php echo esc_attr($this->get_field_id('service_one')); ?>" value="<?php echo esc_attr( $service_one ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('service_two')); ?>"><?php esc_html_e('service_two:', 'bsquare'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('service_two')); ?>" id="<?php echo esc_attr($this->get_field_id('service_two')); ?>" value="<?php echo esc_attr( $service_two ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('service_three')); ?>"><?php esc_html_e('service_three:', 'bsquare'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('service_three')); ?>" id="<?php echo esc_attr($this->get_field_id('service_three')); ?>" value="<?php echo esc_attr( $service_three ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('service_four')); ?>"><?php esc_html_e('service_four:', 'bsquare'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('service_four')); ?>" id="<?php echo esc_attr($this->get_field_id('service_four')); ?>" value="<?php echo esc_attr( $service_four ); ?>">
        </p>

         <p>
            <label for="<?php echo esc_attr($this->get_field_id('service_five')); ?>"><?php esc_html_e('service_five:', 'bsquare'); ?></label>
            <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('service_five')); ?>" id="<?php echo esc_attr($this->get_field_id('service_five')); ?>" value="<?php echo esc_attr( $service_five ); ?>">
        </p>
       
        <?php
    }
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = (!empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['service_one'] = (!empty( $new_instance['service_one'] ) ) ? strip_tags( $new_instance['service_one'] ) : '';
    $instance['service_two'] = (!empty( $new_instance['service_two'] ) ) ? strip_tags( $new_instance['service_two'] ) : '';
    $instance['service_three'] = (!empty( $new_instance['service_three'] ) ) ? strip_tags( $new_instance['service_three'] ) : '';
    $instance['service_four'] = (!empty( $new_instance['service_four'] ) ) ? strip_tags( $new_instance['service_four'] ) : '';
    $instance['service_five'] = (!empty( $new_instance['service_five'] ) ) ? strip_tags( $new_instance['service_five'] ) : '';
   
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
       
        $service_one = $instance['service_one'];
        $service_two = $instance['service_two'];
        $service_three = $instance['service_three'];
        $service_four = $instance['service_four'];
        $service_five = $instance['service_five'];
        ?>
  
            <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><?php echo wp_kses_post($instance['title']); ?></h2>
              <ul class="list-unstyled">

              <?php if(!empty($service_one)): ?>
                <li>
                  <span class="icon-long-arrow-right mr-2"></span><?php echo esc_attr($service_one); ?>
                </li>
              <?php endif; ?>
              <?php if(!empty($service_two)): ?>
                <li>
                  <span class="icon-long-arrow-right mr-2"></span><?php echo esc_attr($service_two); ?>
                </li>
                <?php endif; ?>
                 <?php if(!empty($service_three)): ?>
                <li>
                <span class="icon-long-arrow-right mr-2"></span><?php echo esc_attr($service_three); ?>
                </li>
                <?php endif; ?>
                <?php if(!empty($service_four)): ?>
                <li>
                   <span class="icon-long-arrow-right mr-2"></span><?php echo esc_attr($service_four); ?>
                </li>
                   <?php endif; ?>
                    <?php if(!empty($service_five)): ?>
                <li>
                <span class="icon-long-arrow-right mr-2"></span><?php echo esc_attr($service_five); ?>
                </li>
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
if ( ! function_exists( 'bsuare_contact_info_init' ) ) {
  function bsuare_contact_info_init() {
    register_widget( 'bsuare_Widget_Contact_Info' );
  }
  add_action( 'widgets_init', 'bsuare_contact_info_init');
}