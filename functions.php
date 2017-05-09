<?php
/**
 * joecue functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package joecue
 */

if ( ! function_exists( 'joecue_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function joecue_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on joecue, use a find and replace
	 * to change 'joecue' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'joecue', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'joecue' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'joecue_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'joecue_setup' );

// Custom Image Sizes
add_image_size( 'homepage_post_thumbnail', 355, 100, array( 'center', 'top' ) );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function joecue_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'joecue_content_width', 640 );
}
add_action( 'after_setup_theme', 'joecue_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function joecue_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'joecue' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'joecue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Sidebar', 'joecue' ),
		'id'            => 'home-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'joecue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'joecue_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function joecue_scripts() {
	
	wp_enqueue_style( 'architect-font', 'https://fonts.googleapis.com/css?family=Architects+Daughter' );
	
	wp_enqueue_style( 'exo2-font', 'https://fonts.googleapis.com/css?family=Exo+2' );
	
	wp_enqueue_style( 'guy-font', 'https://fonts.googleapis.com/css?family=Luckiest+Guy' );

	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/foundation/css/foundation.css' );
	
	wp_enqueue_style( 'joecue-style', get_stylesheet_uri() );
	
	/* Add Foundation 6 JS Support */ 

    wp_enqueue_script( 'foundation-what-input', get_template_directory_uri() . '/foundation/js/vendor/what-input.min.js', array('jquery','foundation-foundation'), '20151123', true ); 

    wp_enqueue_script( 'foundation-foundation', get_template_directory_uri() . '/foundation/js/foundation.min.js', array('jquery'), '20151123', true );

    wp_enqueue_script( 'foundation-foundation-init', get_template_directory_uri() . '/foundation/js/app.js', array('jquery', 'foundation-foundation'), '20151123', true ); 
 
/* End Foundation 6 JS Support */ 
	
	wp_enqueue_script( 'joecue-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'joecue-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'joecue_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function jq_add_classes_to_img($html, $id) {

    //fetching attachment by post $id
    $attachment = get_post($id); 
    $mime_type = $attachment->post_mime_type;

    //get an valid array of images types   
    $image_exts = array( 'image/jpg', 'image/jpeg', 'image/jpe', 'image/gif', 'image/png' );

    //checking the above mime-type
    if (in_array($mime_type, $image_exts)) { 

        // the image link would be great
        $src = wp_get_attachment_url( $id );
					
        // enter you custom output here
        $html = '<a href="' . $src .  '" class=""><div class="stacktwo"><img src="'. $src .'" /></div></a>';
        return $html; // return new $html    
    }
        return $html;
}

add_filter('media_send_to_editor', 'jq_add_classes_to_img', 20, 2);

// Change excerpt length
function jq_custom_excerpt_length( $length ){
	return 30;
}
add_filter( 'excerpt_length', 'jq_custom_excerpt_length' );