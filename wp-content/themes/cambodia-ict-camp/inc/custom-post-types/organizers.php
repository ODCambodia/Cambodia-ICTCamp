<?php
add_action( 'init', 'create_organizers_custom_post_type' );

function create_organizers_custom_post_type() 
{
    $labels = [
        'name'                => _x( 'Organizers', 'Post Type General Name', 'cambodiaictcamp' ),
        'singular_name'       => _x( 'Organizer', 'Post Type Singular Name', 'cambodiaictcamp' ),
        'menu_name'           => __( 'Organizers', 'cambodiaictcamp' ),
        'parent_item_colon'   => __( 'Parent Organizer', 'cambodiaictcamp' ),
        'all_items'           => __( 'All Organizers', 'cambodiaictcamp' ),
        'view_item'           => __( 'View Organizer', 'cambodiaictcamp' ),
        'add_new_item'        => __( 'Add New Organizer', 'cambodiaictcamp' ),
        'add_new'             => __( 'Add New', 'cambodiaictcamp' ),
        'edit_item'           => __( 'Edit Organizer', 'cambodiaictcamp' ),
        'update_item'         => __( 'Update Organizer', 'cambodiaictcamp' ),
        'search_items'        => __( 'Search Organizer', 'cambodiaictcamp' ),
        'not_found'           => __( 'Not Found', 'cambodiaictcamp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cambodiaictcamp' ),
    ];

    $args = [
        'label'               => __( 'Organizers', 'cambodiaictcamp' ),
        'description'         => __( 'Organizers', 'cambodiaictcamp' ),
        'labels'              => $labels,
        'supports'            => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
        'taxonomies'          => ['category', 'year'],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_icon'           => 'dashicons-nametag',
        'menu_position'       => null,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    ];

    register_post_type( 'organizers', $args );
}