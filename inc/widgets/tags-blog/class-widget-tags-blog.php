<?php
class Bsquare_Tags_Blog extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'bsquare_tags_blog',
            esc_html__('Bsquare:: Tags Blog', 'bsquare'),
            array(
                'classname'      => 'bsquare_widget',
                'description' => esc_html__( 'Widgets to display tags', 'bsquare' )
            )
        );
    }
 
    //Widget Input field
    public function form($instance){
        //Defaults
        if( isset($instance['title'])){
            $title = $instance[ 'title' ];
        }
        else{
            $title = '';
        }
        ?>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'bsquare'); ?></label>
            <input type="text" class="widefat" name="<?php echo esc_html($this->get_field_name('title')); ?>" id="<?php echo esc_html($this->get_field_id('title')); ?>" value=" <?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
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
            <div class="tagcloud">
                  <?php
                     $tags = get_terms('post_tag', array(
                            'orderby'       => 'name',
                            'hide_empty'    => true,
                        ));
                     foreach($tags as $tag) :
                        $tag_link = get_term_link( $tag, $tag->slug );
                        $cat_count = $tag->count;    
                  ?>
                      <a href="<?php echo esc_url($tag_link );?>" class="tag-cloud-link"><?php echo esc_html($tag->name ); ?></a>
                  <?php endforeach; ?>
            </div><!-- /.widget-wrapper -->
        </div><!-- /.widget -->
<?php
       
    }

} 


if ( ! function_exists( 'Bsquare_tags_init' ) ) {
  function Bsquare_tags_init() {
    register_widget( 'Bsquare_Tags_Blog' );
  }
  add_action( 'widgets_init', 'Bsquare_tags_init' );
}