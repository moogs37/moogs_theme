<?php
/**
 * moogs functions and definitions
 *
 * @package moogs
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'moogs_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function moogs_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on moogs, use a find and replace
	 * to change 'moogs' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'moogs', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(array(
	  'primary-left' => __('Primary Left Menu', 'moogs'),
	  'primary-right' => __('Primary Right Menu', 'moogs'),
	  'footer' => __('Footer Menu', 'moogs'),
	));

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'moogs_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // moogs_setup
add_action( 'after_setup_theme', 'moogs_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function moogs_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'moogs' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'moogs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function moogs_scripts() {
	// Add your styles here
	wp_enqueue_style('foundation', get_stylesheet_directory_uri() . '/css/foundation.min.css', false, '5.1.4');
	wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', false, '4.0.3');
	wp_enqueue_style('moogs-style', get_stylesheet_uri(), array('foundation'), '1.0');

	// Add your scripts here
	wp_enqueue_script('moogs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);
	wp_enqueue_script('moogs-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);
	wp_enqueue_script('foundation', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '5.1.4', true);
	wp_enqueue_script('moogs', get_template_directory_uri() . '/js/moogs.js', array('jquery', 'foundation'), '1.0', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'moogs_scripts' );



/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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



/*
 * 	Foundation 5 Walker
 */
require_once('foundation-walker.php');

// Left top bar
function foundation_top_bar_l() {
	wp_nav_menu(array( 
		'container' => false,										// remove nav container
		'container_class' => 'menu',						// class of container
		'menu' => '',														// menu name
		'menu_class' => 'top-bar-menu left',		// adding custom nav class
		'theme_location' => 'primary-left',			// where it's located in the theme
		'before' => '',													// before each link <a> 
		'after' => '',													// after each link </a>
		'link_before' => '',										// before each link text
		'link_after' => '',											// after each link text
		'depth' => 5,														// limit the depth of the nav
		'fallback_cb' => false,									// fallback function (see below)
		'walker' => new top_bar_walker()
	));
}

// Right top bar
function foundation_top_bar_r() {
	wp_nav_menu(array( 
		'container' => false,										// remove nav container
		'container_class' => 'menu',						// class of container
		'menu' => '',														// menu name
		'menu_class' => 'top-bar-menu right',		// adding custom nav class
		'theme_location' => 'primary-right',		// where it's located in the theme
		'before' => '',													// before each link <a> 
		'after' => '',													// after each link </a>
		'link_before' => '',										// before each link text
		'link_after' => '',											// after each link text
		'depth' => 5,														// limit the depth of the nav
		'fallback_cb' => false,									// fallback function (see below)
		'walker' => new top_bar_walker()
	));
}