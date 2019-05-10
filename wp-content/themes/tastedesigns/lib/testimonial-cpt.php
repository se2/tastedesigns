<?php
/**
 * Register Testimonial Custom Post Type
 *
 * @category   CPT
 * @package    TTG
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

function testimonial_cpt() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'taste' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'taste' ),
		'menu_name'             => __( 'Testimonials', 'taste' ),
		'name_admin_bar'        => __( 'Testimonials', 'taste' ),
		'archives'              => __( 'Testimonials', 'taste' ),
		'attributes'            => __( 'Testimonial Attributes', 'taste' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'taste' ),
		'all_items'             => __( 'All Testimonials', 'taste' ),
		'add_new_item'          => __( 'Add New Testimonial', 'taste' ),
		'add_new'               => __( 'Add New', 'taste' ),
		'new_item'              => __( 'New Testimonial', 'taste' ),
		'edit_item'             => __( 'Edit Testimonial', 'taste' ),
		'update_item'           => __( 'Update Testimonial', 'taste' ),
		'view_item'             => __( 'View Testimonial', 'taste' ),
		'view_items'            => __( 'View Testimonials', 'taste' ),
		'search_items'          => __( 'Search Testimonials', 'taste' ),
		'not_found'             => __( 'Not found', 'taste' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'taste' ),
		'featured_image'        => __( 'Featured Image', 'taste' ),
		'set_featured_image'    => __( 'Set featured image', 'taste' ),
		'remove_featured_image' => __( 'Remove featured image', 'taste' ),
		'use_featured_image'    => __( 'Use as featured image', 'taste' ),
		'insert_into_item'      => __( 'Insert into testimonial', 'taste' ),
		'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'taste' ),
		'items_list'            => __( 'Testimonials list', 'taste' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'taste' ),
		'filter_items_list'     => __( 'Filter Testimonials list', 'taste' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'taste' ),
		'description'           => __( 'Testimonial', 'taste' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'rewrite'               => array( 'slug' => 'testimonials' ),
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'             => 'dashicons-testimonial',
	);
	register_post_type( 'testimonial', $args );
}

add_action( 'init', 'testimonial_cpt', 0 );
