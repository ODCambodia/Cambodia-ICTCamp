<?php
add_action( 'init', 'create_partners_custom_post_type' );

function create_partners_custom_post_type() 
{
    $labels = [
        'name'                => _x( 'Parnters', 'Post Type General Name', 'cambodiaictcamp' ),
        'singular_name'       => _x( 'Partner', 'Post Type Singular Name', 'cambodiaictcamp' ),
        'menu_name'           => __( 'Parnters', 'cambodiaictcamp' ),
        'parent_item_colon'   => __( 'Parent Partner', 'cambodiaictcamp' ),
        'all_items'           => __( 'All Parnters', 'cambodiaictcamp' ),
        'view_item'           => __( 'View Partner', 'cambodiaictcamp' ),
        'add_new_item'        => __( 'Add New Partner', 'cambodiaictcamp' ),
        'add_new'             => __( 'Add New', 'cambodiaictcamp' ),
        'edit_item'           => __( 'Edit Partner', 'cambodiaictcamp' ),
        'update_item'         => __( 'Update Partner', 'cambodiaictcamp' ),
        'search_items'        => __( 'Search Partner', 'cambodiaictcamp' ),
        'not_found'           => __( 'Not Found', 'cambodiaictcamp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cambodiaictcamp' ),
    ];

    $args = [
        'label'               => __( 'Parnters', 'cambodiaictcamp' ),
        'description'         => __( 'Parnters', 'cambodiaictcamp' ),
        'labels'              => $labels,
        'supports'            => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
        'taxonomies'          => ['category', 'year'],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_icon'           => 'dashicons-groups',
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    ];

    register_post_type( 'partners', $args );
}