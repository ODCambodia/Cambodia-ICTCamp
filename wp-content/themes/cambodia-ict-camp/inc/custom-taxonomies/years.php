<?php
add_action( 'init', 'create_camp_years_hierarchical_taxonomy', 0 );

function create_camp_years_hierarchical_taxonomy()
{
	$labels = [
		'name'              => _x( 'Years', 'taxonomy general name' ),
		'single_name'       => _x( 'Year', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Years' ),
		'all_items'         => __( 'All Years' ),
		'parent_item'       => __( 'Parent Year' ),
		'parent_item_colon' => __( 'Parent Year:' ),
		'edit_item'         => __( 'Edit Year' ),
		'update_item'       => __( 'Update Year' ),
		'add_new_item'      => __( 'Add New Year' ),
		'new_item_name'     => __( 'New Year Name' ),
		'menu_name'         => __( 'Years' ),
	];

	register_taxonomy( 'camp_year', ['page', 'post', 'sessions', 'partners', 'speakers', 'organizers', 'supporters'], [
	    'hierarchical'      => true,
	    'labels'            => $labels,
	    'show_ui'           => true,
	    'show_admin_column' => true,
	    'query_var'         => true,
	    'rewrite'           => [ 'slug' => 'camp_year' ]
	]);
}
