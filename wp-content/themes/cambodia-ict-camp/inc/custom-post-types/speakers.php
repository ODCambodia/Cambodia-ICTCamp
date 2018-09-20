<?php
add_action( 'init', 'create_speakers_custom_post_type' );

function create_speakers_custom_post_type() 
{
    $labels = [
        'name'                => _x( 'Speakers', 'Post Type General Name', 'cambodiaictcamp' ),
        'singular_name'       => _x( 'Speaker', 'Post Type Singular Name', 'cambodiaictcamp' ),
        'menu_name'           => __( 'Speakers', 'cambodiaictcamp' ),
        'parent_item_colon'   => __( 'Parent Speaker', 'cambodiaictcamp' ),
        'all_items'           => __( 'All Speakers', 'cambodiaictcamp' ),
        'view_item'           => __( 'View Speaker', 'cambodiaictcamp' ),
        'add_new_item'        => __( 'Add New Speaker', 'cambodiaictcamp' ),
        'add_new'             => __( 'Add New', 'cambodiaictcamp' ),
        'edit_item'           => __( 'Edit Speaker', 'cambodiaictcamp' ),
        'update_item'         => __( 'Update Speaker', 'cambodiaictcamp' ),
        'search_items'        => __( 'Search Speaker', 'cambodiaictcamp' ),
        'not_found'           => __( 'Not Found', 'cambodiaictcamp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cambodiaictcamp' ),
    ];

    $args = [
        'label'               => __( 'Speakers', 'cambodiaictcamp' ),
        'description'         => __( 'Speakers', 'cambodiaictcamp' ),
        'labels'              => $labels,
        'supports'            => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
        'taxonomies'          => ['category', 'year'],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_icon'           => 'dashicons-businessman',
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    ];

    register_post_type( 'speakers', $args );
}