<?php
class Bsquare_Catagories_Blog extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'bsquare_catagories_blog',
            esc_html__('Bsquare:: Catagories Blog', 'bsquare'),
            array(
                'classname'      => 'bsquare_widget',
                'description' => esc_html__( 'Widgets to display catagories', 'bsquare' )
            )
        );
    }
 
    //Widget Input field
    public function form($instance){
        //Defaults
        $instance = wp_parse_args( (array) $instance, array( 'title' => '','checkbox_count'=>'on') );
        $title = esc_attr( $instance['title'] );
        $hierarchical = false;
        $dropdown = false;
        ?>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'bsquare'); ?></label>
            <input type="text" class="widefat" name="<?php echo esc_html($this->get_field_name('title')); ?>" id="<?php echo esc_html($this->get_field_id('title')); ?>" value=" <?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'checkbox_count' ], 'on' ); ?> id="<?php echo esc_html($this->get_field_id( 'checkbox_count' )); ?>" name="<?php echo esc_html($this->get_field_name( 'checkbox_count' )); ?>" /> 
            <label for="<?php echo esc_html($this->get_field_id( 'checkbox_count' )); ?>"><?php esc_html_e('Show post count:', 'bsquare'); ?></label>
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['checkbox_count'] = ( ! empty( $new_instance['checkbox_count'] ) ) ?  $new_instance['checkbox_count'] : '';
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
       
    ?>

      <div class="sidebar-box ftco-animate">
        <?php if ( ! empty( $instance['title'] ) ):?>
            <h3 class="heading-sidebar"><?php echo esc_html($instance['title']);?></h3>
        <?php endif;?>
        
          <ul class="categories">
            <?php
                 $categories = get_terms('category', array(
                        'orderby'   => 'name',
                        'hide_empty'    => true,
                    ));
                 foreach($categories as $category) :
                    $category_link = get_term_link( $category, $category->slug );
                    $cat_count = $category->count ;    
              ?>
              <li>
                <a href="<?php echo esc_url($category_link );?>"><?php echo esc_html($category->name ); ?> 
                  <span>
                    (<?php 
                        if( $instance['checkbox_count'] == true ){
                            if($cat_count < 10){
                                echo '0'. esc_html($cat_count);
                            }
                            else echo  esc_html($cat_count) ;
                        } 
                    ?>)
                  </span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        
      </div><!-- /.widget -->
        
<?php
      
    }

} 

if ( ! function_exists( 'Bsquare_Catagories_init' ) ) {
  function Bsquare_Catagories_init() {
    register_widget( 'Bsquare_Catagories_Blog' );
  }
  add_action( 'widgets_init', 'Bsquare_Catagories_init' );
}

