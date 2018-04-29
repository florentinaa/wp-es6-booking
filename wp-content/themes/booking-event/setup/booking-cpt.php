<?php 
//Adding CPT for Booking
add_action( 'init', 'booking_init' );

function booking_init() {
	$labels = array(
		'name' => _x( 'Bookings', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name' => _x( 'Booking', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name' => _x( 'Bookings', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar' => _x( 'Booking', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new' => _x( 'Add New', 'Booking', 'your-plugin-textdomain' ),
		'add_new_item' => __( 'Add New Booking', 'your-plugin-textdomain' ),
		'new_item' => __( 'New Booking', 'your-plugin-textdomain' ),
		'edit_item' => __( 'Edit Booking', 'your-plugin-textdomain' ),
		'view_item' => __( 'View Booking', 'your-plugin-textdomain' ),
		'all_items' => __( 'All Bookings', 'your-plugin-textdomain' ),
		'search_items' => __( 'Search Bookings', 'your-plugin-textdomain' ),
		'not_found' => __( 'No Bookings found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Bookings found in Trash.', 'your-plugin-textdomain' )
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
	register_post_type( 'booking', $args );
}
