<?php
/**
 * Plugin Name: Flamingo Essential
 * Plugin URI: https://themeforest.net/user/codexcoder
 * Description: The essential plugin.
 * Author: CodexCoder
 * Author URI: http://codexcoder.com/
 * Version: 1.0.0
 * Text Domain: flamingo
 */
if(! function_exists('flamingo_admin_menu_enqueue_style')): 
function flamingo_admin_menu_enqueue_style() {
    wp_enqueue_style('theone-admin-style', plugins_url( 'css/theone-admin-style.css', __FILE__ ), null);
}
endif;
add_action( 'admin_enqueue_scripts', 'flamingo_admin_menu_enqueue_style');


/**
*  Flamingo Custom Post type
*/
 /** 
 *  Portfolio
 */
 if(!class_exists('Flamingo_Portfolio_Post_Type')) :

    class Flamingo_Portfolio_Post_Type {

        public static $post_type        = 'portfolio';
        public static $texonomy_type    = 'portfolio_cat';
        public static $texonomy_type_tag = 'portfolio_tag';
        public static $menu_position    = 5;

        public static function register(){

        $labels = array(
        'name'               => esc_html__( 'Portfolios',  'flamingo' ),
        'singular_name'      => esc_html__( 'Portfolio', 'flamingo'  ),
        'menu_name'          => esc_html__( 'Portfolios',  'flamingo'  ),
        'name_admin_bar'     => esc_html__( 'Portfolio', 'flamingo'  ),
        'add_new'            => esc_html__( 'Add New',  'flamingo'  ),
        'add_new_item'       => esc_html__( 'Add New Portfolio', 'flamingo'  ),
        'new_item'           => esc_html__( 'New Portfolio', 'flamingo'  ),
        'edit_item'          => esc_html__( 'Edit Portfolio', 'flamingo'  ),
        'view_item'          => esc_html__( 'View Portfolio', 'flamingo'  ),
        'all_items'          => esc_html__( 'All Portfolios', 'flamingo'  ),
        'search_items'       => esc_html__( 'Search Portfolios', 'flamingo'  ),
        'parent_item_colon'  => esc_html__( 'Parent Portfolios:', 'flamingo'  ),
        'not_found'          => esc_html__( 'No Portfolios found.', 'flamingo'  ),
        'not_found_in_trash' => esc_html__( 'No Portfolios found in Trash.', 'flamingo'  )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => self::$post_type ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => self::$menu_position ,
        'supports'           => array( 'title','editor'  ),
        'menu_icon'          => 'dashicons-images-alt2',

    );

    $args = apply_filters('presscore_post_type_'. self::$post_type. '_args', $args );

    register_post_type( self::$post_type, $args );

    flush_rewrite_rules();

    /**
     * Texonomy Register 
     */
    //category
    $port_labels = array(
        'name'              => esc_html__( 'Portfolio Categories', 'flamingo' ),
        'singular_name'     => esc_html__( 'Category', 'flamingo' ),
        'search_items'      => esc_html__( 'Search Categories', 'flamingo' ),
        'all_items'         => esc_html__( 'All Categories', 'flamingo' ),
        'parent_item'       => esc_html__( 'Parent Category', 'flamingo' ),
        'parent_item_colon' => esc_html__( 'Parent Category:', 'flamingo' ),
        'edit_item'         => esc_html__( 'Edit Category', 'flamingo' ),
        'update_item'       => esc_html__( 'Update Category', 'flamingo' ),
        'add_new_item'      => esc_html__( 'Add New Category', 'flamingo' ),
        'new_item_name'     => esc_html__( 'New Category Name', 'flamingo' ),
        'menu_name'         => esc_html__( 'Categories', 'flamingo' ),
    );

    $port_args = array(
        'hierarchical'      => true,
        'labels'            => $port_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => self::$texonomy_type ),
    );

    register_taxonomy( self::$texonomy_type , array( self::$post_type ), $port_args );
    //tags
    $port_labels = array(
        'name'              => esc_html__( 'Portfolio Tags', 'flamingo' ),
        'singular_name'     => esc_html__( 'Tag', 'flamingo' ),
        'search_items'      => esc_html__( 'Search Tags', 'flamingo' ),
        'all_items'         => esc_html__( 'All Tags', 'flamingo' ),
        'parent_item'       => esc_html__( 'Parent Tag', 'flamingo' ),
        'parent_item_colon' => esc_html__( 'Parent Tag:', 'flamingo' ),
        'edit_item'         => esc_html__( 'Edit Tag', 'flamingo' ),
        'update_item'       => esc_html__( 'Update Tag', 'flamingo' ),
        'add_new_item'      => esc_html__( 'Add New Tag', 'flamingo' ),
        'new_item_name'     => esc_html__( 'New Tag Name', 'flamingo' ),
        'menu_name'         => esc_html__( 'Tags', 'flamingo' ),
    );

    $port_args = array(
        'hierarchical'      => true,
        'labels'            => $port_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => self::$texonomy_type_tag ),
    );

    register_taxonomy( self::$texonomy_type_tag , array( self::$post_type ), $port_args );
        }
    }

endif;

/** 
 *  Service
 */
 if(!class_exists('Flamingo_Service_Post_Type')) :

    class Flamingo_Service_Post_Type {

        public static $post_type        = 'service';
        public static $texonomy_type    = 'service_cat';
        public static $texonomy_type_tag = 'service_tag';
        public static $menu_position    = 5;

        public static function register(){

        $labels = array(
        'name'               => esc_html__( 'Services',  'flamingo' ),
        'singular_name'      => esc_html__( 'Service', 'flamingo'  ),
        'menu_name'          => esc_html__( 'Services',  'flamingo'  ),
        'name_admin_bar'     => esc_html__( 'Service', 'flamingo'  ),
        'add_new'            => esc_html__( 'Add New',  'flamingo'  ),
        'add_new_item'       => esc_html__( 'Add New Service', 'flamingo'  ),
        'new_item'           => esc_html__( 'New Service', 'flamingo'  ),
        'edit_item'          => esc_html__( 'Edit Service', 'flamingo'  ),
        'view_item'          => esc_html__( 'View Service', 'flamingo'  ),
        'all_items'          => esc_html__( 'All Services', 'flamingo'  ),
        'search_items'       => esc_html__( 'Search Services', 'flamingo'  ),
        'parent_item_colon'  => esc_html__( 'Parent Services:', 'flamingo'  ),
        'not_found'          => esc_html__( 'No Services found.', 'flamingo'  ),
        'not_found_in_trash' => esc_html__( 'No Services found in Trash.', 'flamingo'  )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => self::$post_type ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => self::$menu_position ,
        'supports'           => array( 'title','editor', 'thumbnail'  ),
        'menu_icon'          => 'dashicons-admin-site',

    );

    $args = apply_filters('presscore_post_type_'. self::$post_type. '_args', $args );

    register_post_type( self::$post_type, $args );

    flush_rewrite_rules();

    /**
     * Texonomy Register 
     */
    //category
    $port_labels = array(
        'name'              => esc_html__( 'Service Categories', 'flamingo' ),
        'singular_name'     => esc_html__( 'Category', 'flamingo' ),
        'search_items'      => esc_html__( 'Search Categories', 'flamingo' ),
        'all_items'         => esc_html__( 'All Categories', 'flamingo' ),
        'parent_item'       => esc_html__( 'Parent Category', 'flamingo' ),
        'parent_item_colon' => esc_html__( 'Parent Category:', 'flamingo' ),
        'edit_item'         => esc_html__( 'Edit Category', 'flamingo' ),
        'update_item'       => esc_html__( 'Update Category', 'flamingo' ),
        'add_new_item'      => esc_html__( 'Add New Category', 'flamingo' ),
        'new_item_name'     => esc_html__( 'New Category Name', 'flamingo' ),
        'menu_name'         => esc_html__( 'Categories', 'flamingo' ),
    );

    $port_args = array(
        'hierarchical'      => true,
        'labels'            => $port_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => self::$texonomy_type ),
    );

    register_taxonomy( self::$texonomy_type , array( self::$post_type ), $port_args );
    //tags
    $port_labels = array(
        'name'              => esc_html__( 'Service Tags', 'flamingo' ),
        'singular_name'     => esc_html__( 'Tag', 'flamingo' ),
        'search_items'      => esc_html__( 'Search Tags', 'flamingo' ),
        'all_items'         => esc_html__( 'All Tags', 'flamingo' ),
        'parent_item'       => esc_html__( 'Parent Tag', 'flamingo' ),
        'parent_item_colon' => esc_html__( 'Parent Tag:', 'flamingo' ),
        'edit_item'         => esc_html__( 'Edit Tag', 'flamingo' ),
        'update_item'       => esc_html__( 'Update Tag', 'flamingo' ),
        'add_new_item'      => esc_html__( 'Add New Tag', 'flamingo' ),
        'new_item_name'     => esc_html__( 'New Tag Name', 'flamingo' ),
        'menu_name'         => esc_html__( 'Tags', 'flamingo' ),
    );

    $port_args = array(
        'hierarchical'      => true,
        'labels'            => $port_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => self::$texonomy_type_tag ),
    );

    register_taxonomy( self::$texonomy_type_tag , array( self::$post_type ), $port_args );
        }
    }

endif;

/** 
 *  Team Member
 */
 if(!class_exists('Flamingo_Member_Post_Type')) :

    class Flamingo_Member_Post_Type {

        public static $post_type        = 'member';
        public static $texonomy_type    = 'member_cat';
        public static $texonomy_type_tag = 'member_tag';
        public static $menu_position    = 5;

        public static function register(){

        $labels = array(
        'name'               => esc_html__( 'Members',  'flamingo' ),
        'singular_name'      => esc_html__( 'Member', 'flamingo'  ),
        'menu_name'          => esc_html__( 'Members',  'flamingo'  ),
        'name_admin_bar'     => esc_html__( 'Member', 'flamingo'  ),
        'add_new'            => esc_html__( 'Add New',  'flamingo'  ),
        'add_new_item'       => esc_html__( 'Add New Member', 'flamingo'  ),
        'new_item'           => esc_html__( 'New Member', 'flamingo'  ),
        'edit_item'          => esc_html__( 'Edit Member', 'flamingo'  ),
        'view_item'          => esc_html__( 'View Member', 'flamingo'  ),
        'all_items'          => esc_html__( 'All Members', 'flamingo'  ),
        'search_items'       => esc_html__( 'Search Members', 'flamingo'  ),
        'parent_item_colon'  => esc_html__( 'Parent Members:', 'flamingo'  ),
        'not_found'          => esc_html__( 'No Members found.', 'flamingo'  ),
        'not_found_in_trash' => esc_html__( 'No Members found in Trash.', 'flamingo'  )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => self::$post_type ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => self::$menu_position ,
        'supports'           => array( 'title','editor','thumbnail'  ),
        'menu_icon'          => 'dashicons-admin-site',

    );

    $args = apply_filters('presscore_post_type_'. self::$post_type. '_args', $args );

    register_post_type( self::$post_type, $args );

    flush_rewrite_rules();

    /**
     * Texonomy Register 
     */
    //category
    $port_labels = array(
        'name'              => esc_html__( 'Member Categories', 'flamingo' ),
        'singular_name'     => esc_html__( 'Category', 'flamingo' ),
        'search_items'      => esc_html__( 'Search Categories', 'flamingo' ),
        'all_items'         => esc_html__( 'All Categories', 'flamingo' ),
        'parent_item'       => esc_html__( 'Parent Category', 'flamingo' ),
        'parent_item_colon' => esc_html__( 'Parent Category:', 'flamingo' ),
        'edit_item'         => esc_html__( 'Edit Category', 'flamingo' ),
        'update_item'       => esc_html__( 'Update Category', 'flamingo' ),
        'add_new_item'      => esc_html__( 'Add New Category', 'flamingo' ),
        'new_item_name'     => esc_html__( 'New Category Name', 'flamingo' ),
        'menu_name'         => esc_html__( 'Categories', 'flamingo' ),
    );

    $port_args = array(
        'hierarchical'      => true,
        'labels'            => $port_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => self::$texonomy_type ),
    );

    register_taxonomy( self::$texonomy_type , array( self::$post_type ), $port_args );
    //tags
    $port_labels = array(
        'name'              => esc_html__( 'Member Tags', 'flamingo' ),
        'singular_name'     => esc_html__( 'Tag', 'flamingo' ),
        'search_items'      => esc_html__( 'Search Tags', 'flamingo' ),
        'all_items'         => esc_html__( 'All Tags', 'flamingo' ),
        'parent_item'       => esc_html__( 'Parent Tag', 'flamingo' ),
        'parent_item_colon' => esc_html__( 'Parent Tag:', 'flamingo' ),
        'edit_item'         => esc_html__( 'Edit Tag', 'flamingo' ),
        'update_item'       => esc_html__( 'Update Tag', 'flamingo' ),
        'add_new_item'      => esc_html__( 'Add New Tag', 'flamingo' ),
        'new_item_name'     => esc_html__( 'New Tag Name', 'flamingo' ),
        'menu_name'         => esc_html__( 'Tags', 'flamingo' ),
    );

    $port_args = array(
        'hierarchical'      => true,
        'labels'            => $port_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => self::$texonomy_type_tag ),
    );

    register_taxonomy( self::$texonomy_type_tag , array( self::$post_type ), $port_args );
        }
    }

endif;
/** 
 *  Pricing
 */
 if(!class_exists('Flamingo_Pricing_Post_Type')) :

    class Flamingo_Pricing_Post_Type {

        public static $post_type        = 'pricing';
        public static $texonomy_type    = 'pricing_cat';
        public static $texonomy_type_tag = 'pricing_tag';
        public static $menu_position    = 5;

        public static function register(){

        $labels = array(
        'name'               => esc_html__( 'Pricings',  'flamingo' ),
        'singular_name'      => esc_html__( 'Pricing', 'flamingo'  ),
        'menu_name'          => esc_html__( 'Pricings',  'flamingo'  ),
        'name_admin_bar'     => esc_html__( 'Pricing', 'flamingo'  ),
        'add_new'            => esc_html__( 'Add New',  'flamingo'  ),
        'add_new_item'       => esc_html__( 'Add New Pricing', 'flamingo'  ),
        'new_item'           => esc_html__( 'New Pricing', 'flamingo'  ),
        'edit_item'          => esc_html__( 'Edit Pricing', 'flamingo'  ),
        'view_item'          => esc_html__( 'View Pricing', 'flamingo'  ),
        'all_items'          => esc_html__( 'All Pricings', 'flamingo'  ),
        'search_items'       => esc_html__( 'Search Pricings', 'flamingo'  ),
        'parent_item_colon'  => esc_html__( 'Parent Pricings:', 'flamingo'  ),
        'not_found'          => esc_html__( 'No Pricings found.', 'flamingo'  ),
        'not_found_in_trash' => esc_html__( 'No Pricings found in Trash.', 'flamingo'  )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => self::$post_type ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => self::$menu_position ,
        'supports'           => array( 'title','editor'),
        'menu_icon'          => 'dashicons-admin-site',

    );

    $args = apply_filters('presscore_post_type_'. self::$post_type. '_args', $args );

    register_post_type( self::$post_type, $args );

    flush_rewrite_rules();

    /**
     * Texonomy Register 
     */
    //category
    $port_labels = array(
        'name'              => esc_html__( 'Pricing Categories', 'flamingo' ),
        'singular_name'     => esc_html__( 'Category', 'flamingo' ),
        'search_items'      => esc_html__( 'Search Categories', 'flamingo' ),
        'all_items'         => esc_html__( 'All Categories', 'flamingo' ),
        'parent_item'       => esc_html__( 'Parent Category', 'flamingo' ),
        'parent_item_colon' => esc_html__( 'Parent Category:', 'flamingo' ),
        'edit_item'         => esc_html__( 'Edit Category', 'flamingo' ),
        'update_item'       => esc_html__( 'Update Category', 'flamingo' ),
        'add_new_item'      => esc_html__( 'Add New Category', 'flamingo' ),
        'new_item_name'     => esc_html__( 'New Category Name', 'flamingo' ),
        'menu_name'         => esc_html__( 'Categories', 'flamingo' ),
    );

    $port_args = array(
        'hierarchical'      => true,
        'labels'            => $port_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => self::$texonomy_type ),
    );

    register_taxonomy( self::$texonomy_type , array( self::$post_type ), $port_args );
    //tags
    $port_labels = array(
        'name'              => esc_html__( 'Pricing Tags', 'flamingo' ),
        'singular_name'     => esc_html__( 'Tag', 'flamingo' ),
        'search_items'      => esc_html__( 'Search Tags', 'flamingo' ),
        'all_items'         => esc_html__( 'All Tags', 'flamingo' ),
        'parent_item'       => esc_html__( 'Parent Tag', 'flamingo' ),
        'parent_item_colon' => esc_html__( 'Parent Tag:', 'flamingo' ),
        'edit_item'         => esc_html__( 'Edit Tag', 'flamingo' ),
        'update_item'       => esc_html__( 'Update Tag', 'flamingo' ),
        'add_new_item'      => esc_html__( 'Add New Tag', 'flamingo' ),
        'new_item_name'     => esc_html__( 'New Tag Name', 'flamingo' ),
        'menu_name'         => esc_html__( 'Tags', 'flamingo' ),
    );

    $port_args = array(
        'hierarchical'      => true,
        'labels'            => $port_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => self::$texonomy_type_tag ),
    );

    register_taxonomy( self::$texonomy_type_tag , array( self::$post_type ), $port_args );
        }
    }

endif;
 /**
 * Testimonial Testimonial
 */

if(!class_exists('flamingo_Clint_Feedback')) :

    class flamingo_Clint_Feedback {

        public static $post_type        = 'testimonial';
        public static $texonomy_type    = 'testimonial_cat';
        public static $texonomy_type_tag    = 'testimonial_tag';
        public static $menu_position    = 5;

        public static function register(){

            $labels = array(
                'name'               => esc_html__( 'Testimonial',  'flamingo' ),
                'singular_name'      => esc_html__( 'Testimonial', 'flamingo'  ),
                'menu_name'          => esc_html__( 'Testimonial',  'flamingo'  ),
                'name_admin_bar'     => esc_html__( 'Testimonial', 'flamingo'  ),
                'add_new'            => esc_html__( 'Add New',  'flamingo'  ),
                'add_new_item'       => esc_html__( 'Add New Testimonial', 'flamingo'  ),
                'new_item'           => esc_html__( 'New Testimonial', 'flamingo'  ),
                'edit_item'          => esc_html__( 'Edit Testimonial', 'flamingo'  ),
                'view_item'          => esc_html__( 'View Testimonial', 'flamingo'  ),
                'all_items'          => esc_html__( 'All Testimonial', 'flamingo'  ),
                'search_items'       => esc_html__( 'Search Testimonial', 'flamingo'  ),
                'parent_item_colon'  => esc_html__( 'Parent Testimonial:', 'flamingo'  ),
                'not_found'          => esc_html__( 'No Testimonial found.', 'flamingo'  ),
                'not_found_in_trash' => esc_html__( 'No Testimonial found in Trash.', 'flamingo'  )
            );

            $args = array(
                'labels'             => $labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => self::$post_type ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => self::$menu_position ,
                'supports'           => array( 'title', 'editor'),
                'menu_icon'          => 'dashicons-format-chat',

            );

            $args = apply_filters('presscore_post_type_'. self::$post_type. '_args', $args );

            register_post_type( self::$post_type, $args );

            flush_rewrite_rules();

            /**
             * Texonomy Register
             */
            //category
            $port_labels = array(
                'name'              => esc_html__( 'Testimonial Categories', 'flamingo' ),
                'singular_name'     => esc_html__( 'Category', 'flamingo' ),
                'search_items'      => esc_html__( 'Search Categories', 'flamingo' ),
                'all_items'         => esc_html__( 'All Categories', 'flamingo' ),
                'parent_item'       => esc_html__( 'Parent Category', 'flamingo' ),
                'parent_item_colon' => esc_html__( 'Parent Category:', 'flamingo' ),
                'edit_item'         => esc_html__( 'Edit Category', 'flamingo' ),
                'update_item'       => esc_html__( 'Update Category', 'flamingo' ),
                'add_new_item'      => esc_html__( 'Add New Category', 'flamingo' ),
                'new_item_name'     => esc_html__( 'New Category Name', 'flamingo' ),
                'menu_name'         => esc_html__( 'Categories', 'flamingo' ),
            );

            $port_args = array(
                'hierarchical'      => true,
                'labels'            => $port_labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => array( 'slug' => self::$texonomy_type ),
            );

            register_taxonomy( self::$texonomy_type , array( self::$post_type ), $port_args );
            //tags
            $port_labels = array(
                'name'              => esc_html__( 'Testimonial Tags', 'flamingo' ),
                'singular_name'     => esc_html__( 'Tag', 'flamingo' ),
                'search_items'      => esc_html__( 'Search Tags', 'flamingo' ),
                'all_items'         => esc_html__( 'All Tags', 'flamingo' ),
                'parent_item'       => esc_html__( 'Parent Tag', 'flamingo' ),
                'parent_item_colon' => esc_html__( 'Parent Tag:', 'flamingo' ),
                'edit_item'         => esc_html__( 'Edit Tag', 'flamingo' ),
                'update_item'       => esc_html__( 'Update Tag', 'flamingo' ),
                'add_new_item'      => esc_html__( 'Add New Tag', 'flamingo' ),
                'new_item_name'     => esc_html__( 'New Tag Name', 'flamingo' ),
                'menu_name'         => esc_html__( 'Tags', 'flamingo' ),
            );

            $port_args = array(
                'hierarchical'      => true,
                'labels'            => $port_labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => array( 'slug' => self::$texonomy_type_tag ),
            );

            register_taxonomy( self::$texonomy_type_tag , array( self::$post_type ), $port_args );

        }
    }

endif;

//PostType Registretion
if(!function_exists('flamingo_custom_post')) :

    function flamingo_custom_post(){
        Flamingo_Portfolio_Post_Type::register();
        Flamingo_Service_Post_Type::register();
        Flamingo_Member_Post_Type::register();
        Flamingo_Pricing_Post_Type::register();
        flamingo_Clint_Feedback::register();
     
    }
endif;

add_action( 'init','flamingo_custom_post');

//Change Title placeholder
function flamingo_change_title_text( $title ){
     $screen = get_current_screen();

     if  ( 'portfolio' == $screen->post_type ) {
          $title = esc_html__( 'Enter Portfolio Name', 'flamingo'  );
     }
     if  ( 'service' == $screen->post_type ) {
          $title = esc_html__( 'Enter Service Name', 'flamingo'  );
     }
     if  ( 'pricing' == $screen->post_type ) {
          $title = esc_html__( 'Enter Pricing Plan', 'flamingo'  );
     }
     if  ( 'member' == $screen->post_type ) {
          $title = esc_html__( 'Enter Member Name', 'flamingo'  );
     }
     if  ( 'testimonial' == $screen->post_type ) {
          $title = esc_html__( 'Enter Testimonee Name', 'flamingo'  );
     }
  
     return $title;
}
add_filter( 'enter_title_here', 'flamingo_change_title_text' );


/*-----------------------------------------------------------*/
    /*   Add User Social Links 
    /*-----------------------------------------------------------*/
    if(!function_exists('cfw_add_user_social_links')) :
    function cfw_add_user_social_links( $user_contact ) {

    /* Add user contact methods */
    $user_contact['twitter']   = __('Twitter Link', 'flamingo');
    $user_contact['facebook']  = __('Facebook Link', 'flamingo');
    $user_contact['linkedin']  = __('LinkedIn Link', 'flamingo');
    $user_contact['github']    = __('Github Link', 'flamingo');
    $user_contact['instagram'] = __('Instagram Link', 'flamingo');
    $user_contact['dribbble']  = __('Dribbble Link', 'flamingo');
    $user_contact['behance']   = __('Behance Link', 'flamingo');
    $user_contact['skype']     = __('Skype Link', 'flamingo');

    return $user_contact;
    }
endif;
add_filter('user_contactmethods', 'cfw_add_user_social_links');

 if(!function_exists('cfw_get_user_social_links')) :
function cfw_get_user_social_links() {
    $return  = '<ul class="list-inline">';
    if(!empty(get_the_author_meta('twitter'))) {
        $return .= '<li><a href="'.get_the_author_meta('twitter').'" title="Twitter" target="_blank" id="twitter"><i class="fa fa-twitter"></i></a></li>';
    }
    if(!empty(get_the_author_meta('facebook'))) {
        $return .= '<li><a href="'.get_the_author_meta('facebook').'" title="Facebook" target="_blank" id="facebook"><i class="fa fa-facebook"></i></a></li>';
    }
    if(!empty(get_the_author_meta('linkedin'))) {
        $return .= '<li><a href="'.get_the_author_meta('linkedin').'" title="LinkedIn" target="_blank" id="linkedin"><i class="fa fa-linkedin"></i></a></li>';
    }
    if(!empty(get_the_author_meta('github'))) {
        $return .= '<li><a href="'.get_the_author_meta('github').'" title="Github" target="_blank" id="github"><i class="fa fa-github"></i></a></li>';
    }
    if(!empty(get_the_author_meta('instagram'))) {
        $return .= '<li><a href="'.get_the_author_meta('instagram').'" title="Instagram" target="_blank" id="instagram"><i class="fa fa-instagram"></i></a></li>';
    }
    if(!empty(get_the_author_meta('dribbble'))) {
        $return .= '<li><a href="'.get_the_author_meta('dribbble').'" title="Dribbble" target="_blank" id="dribbble"><i class="fa fa-dribbble"></i></a></li>';
    }
    if(!empty(get_the_author_meta('behance'))) {
        $return .= '<li><a href="'.get_the_author_meta('behance').'" title="Behance" target="_blank" id="behance"><i class="fa fa-behance"></i></a></li>';
    }
    if(!empty(get_the_author_meta('skype'))) {
        $return .= '<li><a href="'.get_the_author_meta('skype').'" title="Skype" target="_blank" id="skype"><i class="fa fa-skype"></i></a></li>';
    }
    $return .= '</ul>';

    return $return;
}
endif;
