<?php
/**
 * Register Project Custom Post Type
 *
 * @category   CPT
 * @package    TTG
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

function project_cpt() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'taste' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'taste' ),
		'menu_name'             => __( 'Projects', 'taste' ),
		'name_admin_bar'        => __( 'Projects', 'taste' ),
		'archives'              => __( 'Projects', 'taste' ),
		'attributes'            => __( 'Project Attributes', 'taste' ),
		'parent_item_colon'     => __( 'Parent Project:', 'taste' ),
		'all_items'             => __( 'All Projects', 'taste' ),
		'add_new_item'          => __( 'Add New Project', 'taste' ),
		'add_new'               => __( 'Add New', 'taste' ),
		'new_item'              => __( 'New Project', 'taste' ),
		'edit_item'             => __( 'Edit Project', 'taste' ),
		'update_item'           => __( 'Update Project', 'taste' ),
		'view_item'             => __( 'View Project', 'taste' ),
		'view_items'            => __( 'View Projects', 'taste' ),
		'search_items'          => __( 'Search Projects', 'taste' ),
		'not_found'             => __( 'Not found', 'taste' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'taste' ),
		'featured_image'        => __( 'Featured Image', 'taste' ),
		'set_featured_image'    => __( 'Set featured image', 'taste' ),
		'remove_featured_image' => __( 'Remove featured image', 'taste' ),
		'use_featured_image'    => __( 'Use as featured image', 'taste' ),
		'insert_into_item'      => __( 'Insert into project', 'taste' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'taste' ),
		'items_list'            => __( 'Projects list', 'taste' ),
		'items_list_navigation' => __( 'Projects list navigation', 'taste' ),
		'filter_items_list'     => __( 'Filter Projects list', 'taste' ),
	);
	$args = array(
		'label'                 => __( 'Projects', 'taste' ),
		'description'           => __( 'Projects', 'taste' ),
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
		'rewrite'               => array( 'slug' => 'projects' ),
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'             => 'dashicons-portfolio',
	);
	register_post_type( 'project', $args );

	// Project Type
	register_taxonomy(
		'project_type',
		'project',
		array(
			'hierarchical' => true,
			'labels'       => array(
				'name'         => 'Project Types',
				'add_new_item' => __( 'New Project Type' )
			),
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => 'project-type', // This controls the base slug that will display before each term
				'with_front' => false // Don't display the category base before
			)
		)
	);

	// Project Type
	register_taxonomy(
		'room_type',
		'project',
		array(
			'hierarchical' => true,
			'labels'       => array(
				'name'         => 'Room Types',
				'add_new_item' => __( 'New Room Type' )
			),
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => 'room-type', // This controls the base slug that will display before each term
				'with_front' => false // Don't display the category base before
			),
		)
	);
}

add_action( 'init', 'project_cpt', 0 );
