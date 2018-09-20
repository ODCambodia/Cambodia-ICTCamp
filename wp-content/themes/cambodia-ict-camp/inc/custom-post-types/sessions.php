<?php
add_action( 'init', 'create_sessions_custom_post_type' );

function create_sessions_custom_post_type() 
{
    $labels = [
        'name'                => _x( 'Sessions', 'Post Type General Name', 'cambodiaictcamp' ),
        'singular_name'       => _x( 'Session', 'Post Type Singular Name', 'cambodiaictcamp' ),
        'menu_name'           => __( 'Sessions', 'cambodiaictcamp' ),
        'parent_item_colon'   => __( 'Parent Session', 'cambodiaictcamp' ),
        'all_items'           => __( 'All Sessions', 'cambodiaictcamp' ),
        'view_item'           => __( 'View Session', 'cambodiaictcamp' ),
        'add_new_item'        => __( 'Add New Session', 'cambodiaictcamp' ),
        'add_new'             => __( 'Add New', 'cambodiaictcamp' ),
        'edit_item'           => __( 'Edit Session', 'cambodiaictcamp' ),
        'update_item'         => __( 'Update Session', 'cambodiaictcamp' ),
        'search_items'        => __( 'Search Session', 'cambodiaictcamp' ),
        'not_found'           => __( 'Not Found', 'cambodiaictcamp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cambodiaictcamp' ),
    ];

    $args = [
        'label'               => __( 'sessions', 'cambodiaictcamp' ),
        'description'         => __( 'Agenda Sessions', 'cambodiaictcamp' ),
        'labels'              => $labels,
        'supports'            => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
        'taxonomies'          => ['category', 'session_type', 'year'],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_icon'           => 'dashicons-clock',
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    ];

    register_post_type( 'sessions', $args );
}