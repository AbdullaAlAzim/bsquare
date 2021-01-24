<?php
/**
 * BSQUARE functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BSQUARE
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'bsquare_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bsquare_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on BSQUARE, use a find and replace
		 * to change 'bsquare' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bsquare', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary-menu', 'bsquare' ),
			)
		);

		register_nav_menus(
			array(
				'menu-2' => esc_html__( 'Footer-menu', 'bsquare' ),
			)
		);
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'bsquare_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'bsquare_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bsquare_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bsquare_content_width', 640 );
}
add_action( 'after_setup_theme', 'bsquare_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bsquare_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'bsquare' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bsquare' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

		register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar', 'bsquare' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'bsquare' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bsquare_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bsquare_scripts() {
	wp_enqueue_style( 'bsquare-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'bsquare-style', 'rtl', 'replace' );
	//css
	wp_enqueue_style( 'bsquare-fonts', '//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet"' );
	wp_enqueue_style( 'bsquare-bootstrap', get_template_directory_uri() . '/assets/css/open-iconic-bootstrap.min.css');
	wp_enqueue_style( 'bsquare-animate', get_template_directory_uri() . '/assets/css/animate.css');
	wp_enqueue_style( 'bsquare-owl', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style( 'bsquare-default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
	wp_enqueue_style( 'bsquare-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css');
	wp_enqueue_style( 'bsquare-aos', get_template_directory_uri() . '/assets/css/aos.css');
	wp_enqueue_style( 'bsquare-ionicons', get_template_directory_uri() . '/assets/css/ionicons.min.css');
	wp_enqueue_style( 'bsquare-datepicker', get_template_directory_uri() . '/assets/css/bootstrap-datepicker.css');
	wp_enqueue_style( 'bsquare-timepicker', get_template_directory_uri() . '/assets/css/jquery.timepicker.css');
	wp_enqueue_style( 'bsquare-flaticon', get_template_directory_uri() . '/assets/css/flaticon.css');
	wp_enqueue_style( 'bsquare-icomoon', get_template_directory_uri() . '/assets/css/icomoon.css');
	wp_enqueue_style( 'bsquare-main-style', get_template_directory_uri() . '/assets/css/style.css');

   // jQuery 
	
    wp_enqueue_script( 'bsquare-popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'bsquare-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'bsquare-easing-js', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array('jquery'), '', true );
    wp_enqueue_script( 'bsquare-waypoints-js', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'bsquare-stellar-js', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'bsquare-owl-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'bsquare-popup-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '', false );
    wp_enqueue_script( 'bsquare-aos-js', get_template_directory_uri() . '/assets/js/aos.js', array('jquery'), '', true );
    wp_enqueue_script( 'bsquare-animateNumber-js', get_template_directory_uri() . '/assets/js/jquery.animateNumber.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'bsquare-datepicker-js', get_template_directory_uri() . '/assets/js/bootstrap-datepicker.js', array('jquery'), '', true );
    wp_enqueue_script( 'bsquare-scrollax-js', get_template_directory_uri() . '/assets/js/scrollax.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'bsquare-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true );

	wp_enqueue_script( 'bsquare-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bsquare_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Require tgm plugin activation file
 */
require get_template_directory() . '/inc/tgm-plugin-activation/tgm-plugin-setup.php';
require_once get_template_directory() . '/inc/kirki.php';
/**
 * All Widgets
 */
require get_template_directory() . '/inc/widgets/footer-about/bsquare-widget-about.php';
require get_template_directory() . '/inc/widgets/contact/bsquare-widget-contact.php';
require get_template_directory() . '/inc/widgets/catagories-blog/class-widget-catagories-blog.php';
require get_template_directory() . '/inc/widgets/sidebar-about/class-widget-sidebar-about.php';
require get_template_directory() . '/inc/widgets/tags-blog/class-widget-tags-blog.php';
require get_template_directory() . '/inc/widgets/recent-post/class-widget-recent-post.php';
require get_template_directory() . '/inc/widgets/service-list/class-widget-service-list.php';
require get_template_directory() . '/inc/widgets/footer-menu/class-widget-footer-menu.php';


require get_template_directory() . '/inc/includes/comment-template.php';


function bsquare_reply_link($content) {
    $bsquare_classes = 'reply';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $bsquare_classes, $content);
}
add_filter('comment_reply_link', 'bsquare_reply_link', 99);


function bsquare_move_comment( $fields ) {
    $comment_field = $fields[ 'comment' ];
    unset( $fields[ 'comment' ] );
    $fields[ 'comment' ] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'bsquare_move_comment' );

/*function bsquare_header_text_color(){ ?>

	<style>
		.hero-wrap .subtitle{

			color: #<?php echo get_header_textcolor(); ?>;


		}
	</style>


<?php 
}

add_action('wp_head', 'bsquare_header_text_color');*/



 
 
							 





