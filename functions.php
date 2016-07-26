<?php

// Include Scripts and CSS

function manly_theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap-3.3.5.css' );
	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/font-awesome-4.6.3/css/font-awesome.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'manly_theme_styles');

function manly_theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', 'false' );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', 'false' );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9');
  
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '', 'true');
}

add_action( 'wp_enqueue_scripts', 'manly_theme_js');


// Add WP Basic Features Support

if ( ! function_exists( 'manly_setup' ) ) :

	function manly_setup() {

	// Add Support for Feed Links
	
	add_theme_support( 'automatic-feed-links' );
	
	// Add Menu Support
	
	add_theme_support ( 'menus' );
	
	// Add Thumbnails Support
	
	add_theme_support( 'post-thumbnails' );
	
	// Add Support for Flexible Title Tag
	
	add_theme_support( 'title-tag' );
	
	}
endif;

add_action( 'after_setup_theme', 'manly_setup' );

// Check for Front Page being used

function manly_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'manly_filter_front_page_template' );

// Add Support for WooCommerce

add_action( 'after_setup_theme', 'manly_woocommerce_support' );
function manly_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Add Support for Google Fonts

function manly_google_fonts() {
  $query_args = array(
    'family' => 'Open+Sans:400,400i,600,600i,700,700i',
    'subset' => 'latin,latin-ext',
  );
  wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
            
add_action('wp_enqueue_scripts', 'manly_google_fonts');

// Create Recipe Post Type

add_action('init', 'manly_post_type_maker');
function manly_post_type_maker() {
    $args = array(
    	/*your custom post type arguments here*/
		'labels' => array(
        'name' => __( 'Recipes', 'manly-recipes-free' ),
        'singular_name' => __( 'Recipe', 'manly-recipes-free' )
      	),
      	'public' => true,
      	'has_archive' => true,
      	'taxonomies' => array('category', 'post_tag'),
      	'supports' => array( 'title', 'comments', 'editor', 'permalink', 'thumbnail' ),
    );
    register_post_type('recipe', $args);
}

// Add Recipe Post Type Custom Fields

require_once get_template_directory() . '/inc/recipes.php';

// Make Recipe Post Type Show Up In Categories, Tags

function manly_add_custom_types_to_tax( $query ) {
if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

	// Get all your post types
	$post_types = get_post_types();

	$query->set( 'post_type', $post_types );
	return $query;
	}
	}
	add_filter( 'pre_get_posts', 'manly_add_custom_types_to_tax' );

// Content Width Requirement

function manly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'manly_content_width', 800 );
}
add_action( 'after_setup_theme', 'manly_content_width', 0 );

// MENUS!

function manly_register_theme_menus() {

	register_nav_menus (
		array (
			'first-menu' => __( 'First Menu', 'manly-recipes-free'),
			'second-menu' => __( 'Second Menu', 'manly-recipes-free')
	));
}

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

// Register Menus
add_action ( 'init', 'manly_register_theme_menus');


// WIDGETS!

require_once get_template_directory() . '/inc/widgets.php';

// Include Sidebar Feature Widget
require_once get_template_directory() . '/inc/aboutbox-widget.php';

// Include Social Icons Widget
require_once get_template_directory() . '/inc/social-widget.php';

// Include Social Icons Footer Widget
require_once get_template_directory() . '/inc/social-widget-footer.php';

// THEME CUSTOMIZER!

require_once get_template_directory() . '/inc/wp-customize-image-reloaded.php';
require_once get_template_directory() . '/inc/theme-customizer.php';


// Adjust Wordpress Excerpt

function manly_new_excerpt($text) {
	if ($text == '') 	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text);
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 27);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, ' ... ');
			$text = implode(' ', $words);
		}
	}
	return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'manly_new_excerpt');

?>