
<?php
class pluspoint_Widget_Recent_news extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'pluspoint_recent_news',
            esc_html__('bsquare:: Recent news', 'plus-point'),
            array('description' => esc_html__( 'Widgets to display recent posts', 'plus-point' ))
        );
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
        //Popular Post Query
        $limit = '';
        if (! empty( $instance['number'] ) ) {
            $limit .= $instance['number'];
        }
        $query_args = array( 
            'post_type' => 'post',
             'posts_per_page' => $limit, 
            'ignore_sticky_posts' => true 
        );
        $the_query = new WP_Query( $query_args );?>               
           
     <div class="sidebar-box ftco-animate">
               <?php if ( ! empty( $instance['title'] ) ):?>
                    <h3><?php echo esc_html($instance['title']);?></h3>
                <?php endif;?>


                <?php if( $the_query->have_posts() ): while( $the_query->have_posts() ): $the_query->the_post() ; 
                	  $gggg = wp_get_attachment_image_url(get_post_thumbnail_id(),'full');
                	?>
              <div class="block-21 mb-4 d-flex">
              	  <?php if( has_post_thumbnail() ) :?>
                <a class="blog-img mr-4" style="background-image: url('<?php echo esc_url($gggg); ?>)');"></a>
                  <?php endif; ?>
                <div class="text">
                  <h3 class="heading"><a href="#"><?php the_title(); ?></a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> <?php the_time( 'M d, Y' ); ?></a></div>
                    <div><a href="#"><span class="icon-person"></span> <?php the_author(); ?></a></div>
                  </div>
                </div>
              </div>
            
             <?php endwhile; endif;  ?>
            </div>
<?php
        
    }
 
    //Widget Input field
    public function form($instance){
        if( isset($instance['title'])){
            $title = $instance[ 'title' ];
        }
        else{
            $title = '';
        }
        if( isset($instance['number'])){
            $number = $instance[ 'number' ];
        }
        else{
            $number = '5';
        }
    ?>
    <p>
        <label for="<?php echo esc_html($this->get_field_id( 'title' )); ?>">
            <?php esc_html_e('Title:', 'plus-point') ?>
        </label>
        <input class="widefat" type="text" name="<?php echo esc_html($this->get_field_name('title'));?>" id="<?php echo esc_html($this->get_field_id( 'title' )); ?>" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
        <label for="<?php echo esc_html($this->get_field_id( 'number' )); ?>"><?php esc_html_e('Number of post to show:', 'plus-point'); ?></label>
        <input class="tiny-text" type="number" name="<?php echo esc_html($this->get_field_name( 'number' )); ?>" id="<?php echo esc_html($this->get_field_id( 'number' )); ?>" value="<?php echo esc_attr( $number ); ?>">
    </p>
    <?php
    }

        // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
    return $instance;
    }
} 

if ( ! function_exists( 'pluspoint_recent_news_init' ) ) {
  function pluspoint_recent_news_init() {
    register_widget( 'pluspoint_Widget_Recent_news' );
  }
  add_action( 'widgets_init', 'pluspoint_recent_news_init');
}
