<?php
/**
 * @param $class string extra class
 * @link https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin
 */
function bootstrap_breadcrumb($custom_home_icon = false, $custom_post_types = false) {
    wp_reset_query();
    global $post;
    
    $is_custom_post = $custom_post_types ? is_singular( $custom_post_types ) : false;
    
    if (!is_front_page() && !is_home()) {
        echo '<span class="breadcrumbs">';
        echo '<span><a href="';
        echo get_option('home');
       
        if( $custom_home_icon )
            echo $custom_home_icon;
            else
                bloginfo('name');
        echo "</a></span>";
        if ( has_category() ) {
            echo '<span class="active ion-ios-arrow-forward"<a href="'.esc_url( get_permalink( get_page( get_the_category($post->ID) ) ) ).'">';
            the_category(', ');
            echo '</a></span>';
        }
        if ( is_category() || is_single() || $is_custom_post ) {
            if ( is_category() )
                echo '<span class="active ion-ios-arrow-forward"><a href="'.esc_url( get_permalink( get_page( get_the_category($post->ID) ) ) ).'">'.get_the_category($post->ID)[0]->name.'</a></span>';
            if ( $is_custom_post ) {
                echo '<span class="active ion-ios-arrow-forward"><a href="'.get_option('home').'/'.get_post_type_object( get_post_type($post) )->name.'">'.get_post_type_object( get_post_type($post) )->label.'</a></span>';
                if ( $post->post_parent ) {
                    $home = get_page(get_option('page_on_front'));
                    for ($i = count($post->ancestors)-1; $i >= 0; $i--) {
                        if (($home->ID) != ($post->ancestors[$i])) {
                            echo '<span><a href="';
                            echo get_permalink($post->ancestors[$i]); 
                            echo '">';
                            echo get_the_title($post->ancestors[$i]);
                            echo "</a></span>";
                        }
                    }
                }
            }
            if ( is_single() )
                echo '<span class="active ion-ios-arrow-forward">'.get_the_title($post->ID).'</span>';
        } elseif ( is_page() && $post->post_parent ) {
            $home = get_page(get_option('page_on_front'));
            for ($i = count($post->ancestors)-1; $i >= 0; $i--) {
                if (($home->ID) != ($post->ancestors[$i])) {
                    echo '<span><a href="';
                    echo get_permalink($post->ancestors[$i]); 
                    echo '">';
                    echo get_the_title($post->ancestors[$i]);
                    echo "</a></span>";
                }
            }
            echo '<span class="active ion-ios-arrow-forward">'.get_the_title($post->ID).'</span>';
        } elseif (is_page()) {
            echo '<span class="active ion-ios-arrow-forward">'.get_the_title($post->ID).'</span>';
        } elseif (is_404()) {
            echo '<span class="active ion-ios-arrow-forward">404</span>';
        }
        echo '</span>';
    }
}