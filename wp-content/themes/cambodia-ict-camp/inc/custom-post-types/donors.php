<?php
add_action( 'init', 'create_donors_custom_post_type' );

function create_donors_custom_post_type() 
{
    $labels = [
        'name'                => _x( 'Donors', 'Post Type General Name', 'cambodiaictcamp' ),
        'singular_name'       => _x( 'Donor', 'Post Type Singular Name', 'cambodiaictcamp' ),
        'menu_name'           => __( 'Donors', 'cambodiaictcamp' ),
        'parent_item_colon'   => __( 'Parent Donor', 'cambodiaictcamp' ),
        'all_items'           => __( 'All donors', 'cambodiaictcamp' ),
        'view_item'           => __( 'View Donor', 'cambodiaictcamp' ),
        'add_new_item'        => __( 'Add New Donor', 'cambodiaictcamp' ),
        'add_new'             => __( 'Add New', 'cambodiaictcamp' ),
        'edit_item'           => __( 'Edit Donor', 'cambodiaictcamp' ),
        'update_item'         => __( 'Update Donor', 'cambodiaictcamp' ),
        'search_items'        => __( 'Search Donor', 'cambodiaictcamp' ),
        'not_found'           => __( 'Not Found', 'cambodiaictcamp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cambodiaictcamp' ),
    ];

    $args = [
        'label'               => __( 'donors', 'cambodiaictcamp' ),
        'description'         => __( 'donors', 'cambodiaictcamp' ),
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

    register_post_type( 'donors', $args );
}