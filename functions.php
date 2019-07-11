<?php
/**
 * Viral functions and definitions.
 *
 * @package Viral
 */

if ( ! function_exists( 'viral_pro_setup' ) ) :

function viral_pro_setup() {

	load_theme_textdomain( 'viral-pro', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'viral-blog-header', 665, 365, true);
	add_image_size( 'viral-big-thumb', 548, 464, true);
	add_image_size( 'viral-medium-thumb', 548, 260, true);
	add_image_size( 'viral-small-thumb', 272, 200, true);
	add_image_size( 'viral-small-thumb-alt', 272, 230, true);
	add_image_size( 'viral-100x70', 100, 70, true);
	add_image_size( 'viral-100x100', 100, 100, true);
	add_image_size( 'viral-359x260', 367, 260, true);
	add_image_size( 'viral-1200x540', 1200, 540, true);

	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'viral-pro' ),
		'top-menu' => esc_html__( 'Top Header Menu', 'viral-pro' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'custom-background', apply_filters( 'viral_pro_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( '.vl-site-title', '.vl-site-description' ),
	) );
}
endif; // viral_pro_setup
add_action( 'after_setup_theme', 'viral_pro_setup' );


function viral_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'viral_pro_content_width', 740 );
}
add_action( 'after_setup_theme', 'viral_pro_content_width', 0 );

/**
 * Register widget area.
 */
function viral_pro_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'viral-pro' ),
		'id'            => 'viral-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Ads', 'viral-pro' ),
		'id'            => 'viral-header-ads',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Middle Section - Right Sidebar', 'viral-pro' ),
		'id'            => 'viral-frontpage-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'viral-pro' ),
		'id'            => 'viral-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'viral-pro' ),
		'id'            => 'viral-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'viral-pro' ),
		'id'            => 'viral-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'viral-pro' ),
		'id'            => 'viral-footer4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'viral_pro_widgets_init' );

if ( ! function_exists( 'viral_pro_fonts_url' ) ) :
/**
 * Register Google fonts for Viral.
 *
 * @return string Google fonts URL for the theme.
 */
function viral_pro_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Roboto Condensed, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Roboto Condensed font: on or off', 'viral-pro' ) ) {
		$fonts[] = 'Roboto Condensed:300italic,400italic,700italic,400,300,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Roboto, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'viral-pro' ) ) {
		$fonts[] = 'Roboto:300,400,400i,500,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'viral-pro' );

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
			'family' =>  urlencode( implode( '|', $fonts ) ) ,
			'subset' =>  urlencode( $subsets ) ,
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function viral_pro_scripts() {
	wp_enqueue_style( 'viral-fonts', viral_pro_fonts_url(), array(), null );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.6.2' );
	wp_enqueue_style( 'jquery-mCustomScrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css', array(), '3.1.5' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '4.6.2' );
	wp_enqueue_style( 'viral-style', get_stylesheet_uri() );

	wp_register_script( 'youtube-api', '//youtube.com/iframe_api' , array(), 'v3', false );
	wp_enqueue_script( 'jquery-mCustomScrollbar', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.js', array('jquery'), '3.1.5', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '2016427', true );
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js', array('jquery'), '1.4.0', true );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery'), '2016427', true );
	wp_enqueue_script( 'viral-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '2016427', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'viral_pro_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function viral_pro_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_script( 'viral-admin-scripts', get_template_directory_uri() . '/inc/js/admin-scripts.js', array('jquery'), '2016427', true );
	wp_enqueue_style( 'viral-admin-style', get_template_directory_uri() . '/inc/css/admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'viral_pro_admin_scripts' );

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
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Hooks additions.
 */
require get_template_directory() . '/inc/hooks.php';

/**
 * Widgets additions.
 */
require get_template_directory() . '/inc/widgets/widget-fields.php';
require get_template_directory() . '/inc/widgets/widget-contact-info.php';
require get_template_directory() . '/inc/widgets/widget-personal-info.php';
require get_template_directory() . '/inc/widgets/widget-timeline.php';
require get_template_directory() . '/inc/widgets/widget-category-block.php';
require get_template_directory() . '/inc/widgets/widget-advertisement.php';

/**
 * Demo Import Codes
 */
require get_template_directory() . '/inc/importer.php';


if( !function_exists('et_youtube_duration') ){
    function et_youtube_duration( $duration ) {
       preg_match_all( '/(\d+)/', $duration ,$parts );
    
        //Put in zeros if we have less than 3 numbers.
       if ( count( $parts[0] ) == 1 ) {
           array_unshift( $parts[0], "0", "0" );
       } elseif ( count( $parts[0] ) == 2 ) {
           array_unshift( $parts[0], "0" );
       }
    
       $sec_init = $parts[0][2];
       $seconds = $sec_init%60;
       $seconds = str_pad( $seconds, 2, "0", STR_PAD_LEFT );
       $seconds_overflow = floor( $sec_init/60 );
    
       $min_init = $parts[0][1] + $seconds_overflow;
       $minutes = ( $min_init )%60;
       $minutes = str_pad( $minutes, 2, "0", STR_PAD_LEFT );
       $minutes_overflow = floor( ( $min_init )/60 );
    
       $hours = $parts[0][0] + $minutes_overflow;    
    
       if($hours != 0){
           return $hours.':'.$minutes.':'.$seconds;
       } else {
           return $minutes.':'.$seconds;
       }        
    }
}

