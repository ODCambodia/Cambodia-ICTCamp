<?php

// Get style from Parent Theme
add_action( 'wp_enqueue_scripts', 'camp_theme_enqueue_styles', PHP_INT_MAX );

function camp_theme_enqueue_styles()
{
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', ['parent-style'] );
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
require_once( __DIR__ . '/inc/custom-meta-boxes/speakers/social-media-links.php' );
require_once( __DIR__ . '/inc/custom-meta-boxes/speakers/expertise.php' );

// Register Custom Meta Boxes for Session post type
require_once( __DIR__ . '/inc/custom-meta-boxes/sessions/hall.php' );
require_once( __DIR__ . '/inc/custom-meta-boxes/sessions/time.php' );

// Widget
require_once( __DIR__ . '/widgets/camp-posts-no-img.php' );

// Template tags
require_once( __DIR__ . '/inc/template-tags.php' );