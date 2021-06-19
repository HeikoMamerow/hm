<?php
// Remove emojis.
// Source: https://www.denisbouquet.com/remove-wordpress-emoji-code/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Remove Gutenberg css.
 */
add_action( 'wp_print_styles', 'wps_deregister_styles' );
function wps_deregister_styles() {
	wp_dequeue_style( 'wp-block-library' );
}

/**
 * Remove meta generator tags.
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Remove embeds script.
 */
function my_deregister_scripts() {
	wp_deregister_script( 'wp-embed' );
}

add_action( 'wp_footer', 'my_deregister_scripts' );

/**
 * Register and enqueue styles and scripts.
 */
function hm_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	// Add style when block 'code' is in use.
	if ( has_block( 'code' ) ) {
		wp_enqueue_style( 'prism-style', get_template_directory_uri() . '/assets/vendors/prism/prism.css', array(), $theme_version );
	}

	wp_enqueue_style( 'hm-style', get_template_directory_uri() . '/assets/css/main.css', array(), $theme_version );

	// Add scripts when block 'code' is in use.
	if ( has_block( 'code' ) ) {
		// Must load before prism-script.
		wp_enqueue_script( 'clipboard-script', get_template_directory_uri() . '/assets/vendors/prism/clipboard.min.js', array(), $theme_version, false );
		wp_script_add_data( 'clipboard-script', 'async', true );

		wp_enqueue_script( 'prism-script', get_template_directory_uri() . '/assets/vendors/prism/prism.js', array(), $theme_version, false );
		wp_script_add_data( 'prism-script', 'async', true );

		wp_enqueue_script( 'block-code-script', get_template_directory_uri() . '/assets/js/block-code.min.js', array(), $theme_version, false );
		wp_script_add_data( 'block-code-script', 'async', true );
	}

	wp_enqueue_script( 'menu', get_template_directory_uri() . '/assets/js/menu.min.js', array(), $theme_version, true );
}

add_action( 'wp_enqueue_scripts', 'hm_register_styles' );

/**
 * Tweak attributes for styles.
 */
function add_id_to_script( $tag, $handle ) {
	// Preload main.css.
	if ( 'hm-style' === $handle ) {
		$tag = str_replace( 'href', 'rel="preload" as="style" href', $tag );
	}

	// Preload prism.css.
	if ( 'prism-style' === $handle ) {
		$tag = str_replace( 'href', 'rel="preload" as="style" href', $tag );
	}

	return $tag;
}

add_filter( 'style_loader_tag', 'add_id_to_script', 10, 2 );


/**
 * Add logo support.
 */
function logo_setup() {
	$defaults = array(
		'height'      => 50,
		'width'       => 52,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'logo_setup' );


/**
 * Menus.
 */
function register_hm_menus() {
	register_nav_menus(
		array(
			'header-menu'       => __( 'Header Menu' ),
			'footer-menu'       => __( 'Footer Menu' ),
			'social-media-menu' => __( 'Social-Media Menu' ),
		)
	);
}

add_action( 'init', 'register_hm_menus' );

require_once 'functions-class-walker-nav-menu.php';


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function hm_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 560;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

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
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'hm' );

}

add_action( 'after_setup_theme', 'hm_theme_support' );