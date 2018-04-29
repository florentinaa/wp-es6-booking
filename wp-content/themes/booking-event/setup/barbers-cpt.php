<?php
//Adding CPT for Barbers
add_action( 'init', 'barbers_init' );

function barbers_init() {
	$labels = array(
		'name' => _x( 'Barbers', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name' => _x( 'Barber', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name' => _x( 'Barbers', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar' => _x( 'Bareber', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new' => _x( 'Add New', 'Barber', 'your-plugin-textdomain' ),
		'add_new_item' => __( 'Add New Barber', 'your-plugin-textdomain' ),
		'new_item' => __( 'New Barber', 'your-plugin-textdomain' ),
		'edit_item' => __( 'Edit Barber', 'your-plugin-textdomain' ),
		'view_item' => __( 'View Barber', 'your-plugin-textdomain' ),
		'all_items' => __( 'All Barbers', 'your-plugin-textdomain' ),
		'search_items' => __( 'Search Barbers', 'your-plugin-textdomain' ),
		'not_found' => __( 'No Barbers found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Barbers found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Description.', 'your-plugin-textdomain' ),
		'public' => false,
		'show_ui' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
	);
	register_post_type( 'barber', $args );
}
