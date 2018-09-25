<?php

// Get style from Parent Theme
add_action( 'wp_enqueue_scripts', 'camp_theme_enqueue_styles', PHP_INT_MAX );

function camp_theme_enqueue_styles()
{
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', ['parent-style'] );
}

// Include custom script
add_action( 'wp_enqueue_scripts', 'camp_theme_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'camp_theme_enqueue_scripts' );

function camp_theme_enqueue_scripts()
{
    wp_enqueue_media();
    wp_enqueue_script( 'child-custom-script', get_stylesheet_directory_uri() . '/js/custom-script.js', ['jquery'], '1.0', true );
}

// Add Google Font
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

function add_google_fonts()
{
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Battambang', false );
}

// Register Custom Taxonomies
require_once( __DIR__ . '/inc/custom-taxonomies/years.php' );
require_once( __DIR__ . '/inc/custom-taxonomies/session-types.php' );

// Register Custom Post Types
require_once( __DIR__ . '/inc/custom-post-types/announcements.php' );
require_once( __DIR__ . '/inc/custom-post-types/organizers.php' );
require_once( __DIR__ . '/inc/custom-post-types/partners.php' );
require_once( __DIR__ . '/inc/custom-post-types/sessions.php' );
require_once( __DIR__ . '/inc/custom-post-types/speakers.php' );
require_once( __DIR__ . '/inc/custom-post-types/supporters.php' );

// Register Custom Meta Boxes for Speaker post type
require_once( __DIR__ . '/inc/custom-meta-boxes/speakers/expertise.php' );
require_once( __DIR__ . '/inc/custom-meta-boxes/speakers/organization.php' );
require_once( __DIR__ . '/inc/custom-meta-boxes/speakers/social-media-links.php' );

// Register Custom Meta Boxes for Session post type
require_once( __DIR__ . '/inc/custom-meta-boxes/sessions/hall.php' );
require_once( __DIR__ . '/inc/custom-meta-boxes/sessions/time.php' );

// Widget
add_action( 'widgets_init', 'register_camp_widgets' );

function register_camp_widgets()
{
	register_widget( 'Camp_Themes_Widget' );
}

require_once( __DIR__ . '/widgets/camp-posts-no-img.php' );
require_once( __DIR__ . '/widgets/camp-themes.php' );

// Template tags
require_once( __DIR__ . '/inc/template-tags.php' );

// Register Custom Form Fields for Taxonomy
require_once( __DIR__ . '/inc/taxonomy-form-fields/categories/colors.php' );
require_once( __DIR__ . '/inc/taxonomy-form-fields/categories/images.php' );
