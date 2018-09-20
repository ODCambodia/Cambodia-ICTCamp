<?php
add_action( 'init', 'create_supporters_custom_post_type' );

function create_supporters_custom_post_type() 
{
    $labels = [
        'name'                => _x( 'Supporters', 'Post Type General Name', 'cambodiaictcamp' ),
        'singular_name'       => _x( 'Supporter', 'Post Type Singular Name', 'cambodiaictcamp' ),
        'menu_name'           => __( 'Supporters', 'cambodiaictcamp' ),
        'parent_item_colon'   => __( 'Parent Supporter', 'cambodiaictcamp' ),
        'all_items'           => __( 'All Supporters', 'cambodiaictcamp' ),
        'view_item'           => __( 'View Supporter', 'cambodiaictcamp' ),
        'add_new_item'        => __( 'Add New Supporter', 'cambodiaictcamp' ),
        'add_new'             => __( 'Add New', 'cambodiaictcamp' ),
        'edit_item'           => __( 'Edit Supporter', 'cambodiaictcamp' ),
        'update_item'         => __( 'Update Supporter', 'cambodiaictcamp' ),
        'search_items'        => __( 'Search Supporter', 'cambodiaictcamp' ),
        'not_found'           => __( 'Not Found', 'cambodiaictcamp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cambodiaictcamp' ),
    ];

    $args = [
        'label'               => __( 'Supporters', 'cambodiaictcamp' ),
        'description'         => __( 'Supporters', 'cambodiaictcamp' ),
        'labels'              => $labels,
        'supports'            => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
        'taxonomies'          => ['category', 'year'],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_icon'           => 'dashicons-megaphone',
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    ];

    register_post_type( 'supporters', $args );
}