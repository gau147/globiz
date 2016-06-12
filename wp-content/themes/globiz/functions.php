<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'DEVELOPMENT OFFICE', 'twentyfifteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfifteen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => __( 'SALES OFFICE', 'twentyfifteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfifteen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => __( 'CANADA SALES OFFICE', 'twentyfifteen' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfifteen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Social Links', 'twentyfifteen' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'Appears in the social footer section of the site.', 'twentyfifteen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';


/******************************** custom post for Testimonials ******************************/
 function testimonial(){
	$labels = array(
    'name' => 'Testimonials',
    'singular_name' => 'Testimonials',
    'add_new' => 'Add New Testimonial',
    'add_new_item' => 'Add New Testimonial',
    'edit_item' => 'Edit Testimonial',
    'new_item' => 'New Testimonial',
    'all_items' => 'All Testimonials',
    'view_item' => 'View Testimonial',
    'search_items' => 'Search Testimonial',
    'not_found' =>  'No Testimonial found',
    'not_found_in_trash' => 'No Testimonial found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Testimonial'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'testimonial'),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 139,
    'supports' => array( 'title', 'editor')
  ); 
	register_post_type('testimonial',$args);
	$labels = array(
    'name' => _x( 'testimonial', 'taxonomy general name' )
  ); 	
    
	     }
add_action('init','testimonial');


/******************code to add custom post type of Team Member in wordpress**********************/
 function team_member(){
	$labels = array(
    'name' => 'Team Members',
    'singular_name' => 'Team Members',
    'add_new' => 'Add New Team Members',
    'add_new_item' => 'Add New Team Members',
    'edit_item' => 'Edit Team Members',
    'new_item' => 'New Team Members',
    'all_items' => 'All Team Members',
    'view_item' => 'View Team Members',
    'search_items' => 'Search Team Members',
    'not_found' =>  'No Team Member found',
    'not_found_in_trash' => 'No Team Member found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Team Members'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'teammember'),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 149,
    'supports' => array( 'title', 'editor','thumbnail')
  ); 
	register_post_type('teammember',$args);
	$labels = array(
    'name' => _x( 'Team Member Position', 'taxonomy general name' ),
	'singular_name' => _x( 'Team Member Tag', 'taxonomy singular name' ),
           'search_items' =>  __( 'Search Team Member Tags' ),
            'all_items' => __( 'All Team Member Tags' ),
            'edit_item' => __( 'Edit Team Member Tag' ), 
            'update_item' => __( 'Update Team Member Tag' ),
            'add_new_item' => __( 'Add New Team Member Tag' ),
            'new_item_name' => __( 'New Team Member Tag Name' ),
            'menu_name' => __( 'Team Member Tags' ),
  ); 	
  /*register_taxonomy('teammember_category','teammember', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
	'rewrite' => array('slug' => 'funcontenttroller/cat', 'with_front' => true),
  )); */ 
	     }
add_action('init','team_member');

/******************************** custom post for Choose Us ******************************/
 function choose_us(){
	$labels = array(
    'name' => 'Choose Us',
    'singular_name' => 'Choose Us',
    'add_new' => 'Add New Choose Us',
    'add_new_item' => 'Add New Choose Us',
    'edit_item' => 'Edit Choose Us',
    'new_item' => 'New Choose Us',
    'all_items' => 'All Choose Us',
    'view_item' => 'View Choose Us',
    'search_items' => 'Search Choose Us',
    'not_found' =>  'No Choose Us found',
    'not_found_in_trash' => 'No Choose Us found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Choose Us'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'chooseus'),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 109,
    'supports' => array( 'title', 'editor')
  ); 
	register_post_type('faq',$args);
	$labels = array(
    'name' => _x( 'faq', 'taxonomy general name' )
  ); 	
    
	     }
add_action('init','choose_us');

/******************************** custom post for Clients Logo ******************************/
 function clients(){
	$labels = array(
    'name' => 'Clients',
    'singular_name' => 'Clients',
    'add_new' => 'Add New Client',
    'add_new_item' => 'Add New Client',
    'edit_item' => 'Edit Client',
    'new_item' => 'New Client',
    'all_items' => 'All Clients',
    'view_item' => 'View Clients',
    'search_items' => 'Search Clients',
    'not_found' =>  'No Client Us found',
    'not_found_in_trash' => 'No Client Us found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Clients'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'clients'),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 129,
    'supports' => array( 'title','thumbnail')
  ); 
	register_post_type('client',$args);
	$labels = array(
    'name' => _x( 'client', 'taxonomy general name' )
  ); 	
    
	     }
add_action('init','clients');

/******************************** custom post for Service Post ******************************/
 function services(){
	$labels = array(
    'name' => 'Services',
    'singular_name' => 'Services',
    'add_new' => 'Add New Service',
    'add_new_item' => 'Add New Service',
    'edit_item' => 'Edit Service',
    'new_item' => 'New Service',
    'all_items' => 'All Service',
    'view_item' => 'View Service',
    'search_items' => 'Search Service',
    'not_found' =>  'No Service Us found',
    'not_found_in_trash' => 'No Service Us found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Services'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'services'),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 159,
    'supports' => array( 'title', 'editor','thumbnail')
  ); 
	register_post_type('service',$args);
	$labels = array(
    'name' => _x( 'service', 'taxonomy general name' )
  ); 	
    
	     }
add_action('init','services');


/******************************** custom post for About Us Post ******************************/
 function about_us_services(){
	$labels = array(
    'name' => 'About Services',
    'singular_name' => 'About Services',
    'add_new' => 'Add New About Service',
    'add_new_item' => 'Add New About Service',
    'edit_item' => 'Edit About Service',
    'new_item' => 'New About Service',
    'all_items' => 'All About Service',
    'view_item' => 'View About Service',
    'search_items' => 'Search About Service',
    'not_found' =>  'No About Service Us found',
    'not_found_in_trash' => 'No About Service Us found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'About Services'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'about_services'),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 169,
    'supports' => array( 'title', 'editor','thumbnail')
  ); 
	register_post_type('about_service',$args);
	$labels = array(
    'name' => _x( 'about_service', 'taxonomy general name' )
  ); 	
    
	     }
add_action('init','about_us_services');

/**** Client Logo Size **/
add_image_size( 'client-logo', 192,120, true );

/**** Team Size Image **/
add_image_size( 'team-size', 600,680, true );

/**** Work Image **/
add_image_size( 'work-size', 600,400, false );

/**** Work Image **/
add_image_size( 'work-size-detail', 600,400, true );
/******************code to add custom post type of Work in wordpress**********************/
// News Post type

add_action('init', 'work');

function work() {

	$labels = array(
		'name' => _x('Work', 'post type general name'),
		'singular_name' => _x('Work', 'post type singular name'),
		'add_new' => _x('Add New', 'Work'),
		'add_new_item' => __('Add New Work'),
		'edit_item' => __('Edit Work'),
		'new_item' => __('New Work'),
		'view_item' => __('View Work'),
		'search_items' => __('Search Work'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 

	register_post_type( 'work' , $args );
}



// Custom Taxonomy

function add_work_taxonomies() {

	register_taxonomy('project', 'work', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Work Category', 'taxonomy general name' ),
			'singular_name' => _x( 'Work-Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Work-Categories' ),
			'all_items' => __( 'All Work-Categories' ),
			'parent_item' => __( 'Parent Work-Category' ),
			'parent_item_colon' => __( 'Parent Work-Category:' ),
			'edit_item' => __( 'Edit Work-Category' ),
			'update_item' => __( 'Update Work-Category' ),
			'add_new_item' => __( 'Add New Work-Category' ),
			'new_item_name' => __( 'New Work-Category Name' ),
			'menu_name' => __( 'Work Categories' ),
		),

		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'project', // This controls the base slug that will display before each term
			'with_front' => true, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
}
add_action( 'init', 'add_work_taxonomies', 0 );

/** Add Multiple image to Work Post **/
add_filter('images_cpt','my_image_cpt');
function my_image_cpt(){

     $cpts = array('work');
     return $cpts;
}

function add_favicon() {
  	$favicon_url = get_stylesheet_directory_uri() . '/favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

// Now, just make sure that function runs when you're on the login page and admin pages  
add_action('admin_head', 'add_favicon');

function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
 background-image: url('<?php echo get_template_directory_uri();?>/images/logo3.png');  //Add your own logo image in this url 
padding-bottom: 30px; 
width:317px;
background-size:320px;
margin-bottom:0px;
} 
</style>
 <?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );
