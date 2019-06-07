<?php
/**
 * Register Team Custom Post Type
 *
 * @category   CPT
 * @package    TTG
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

function team_cpt() {

	$labels = array(
		'name'                  => _x( 'Team', 'Post Type General Name', 'taste' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'taste' ),
		'menu_name'             => __( 'Team', 'taste' ),
		'name_admin_bar'        => __( 'Team', 'taste' ),
		'archives'              => __( 'Team', 'taste' ),
		'attributes'            => __( 'Team Attributes', 'taste' ),
		'parent_item_colon'     => __( 'Parent Team:', 'taste' ),
		'all_items'             => __( 'All Team Members', 'taste' ),
		'add_new_item'          => __( 'Add New Team Member', 'taste' ),
		'add_new'               => __( 'Add New', 'taste' ),
		'new_item'              => __( 'New Team Member', 'taste' ),
		'edit_item'             => __( 'Edit Team Member', 'taste' ),
		'update_item'           => __( 'Update Team Member', 'taste' ),
		'view_item'             => __( 'View Team Member', 'taste' ),
		'view_items'            => __( 'View Team Members', 'taste' ),
		'search_items'          => __( 'Search Team Members', 'taste' ),
		'not_found'             => __( 'Not found', 'taste' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'taste' ),
		'featured_image'        => __( 'Featured Image', 'taste' ),
		'set_featured_image'    => __( 'Set featured image', 'taste' ),
		'remove_featured_image' => __( 'Remove featured image', 'taste' ),
		'use_featured_image'    => __( 'Use as featured image', 'taste' ),
		'insert_into_item'      => __( 'Insert into team', 'taste' ),
		'uploaded_to_this_item' => __( 'Uploaded to this team', 'taste' ),
		'items_list'            => __( 'Team Members list', 'taste' ),
		'items_list_navigation' => __( 'Team Members list navigation', 'taste' ),
		'filter_items_list'     => __( 'Filter Team Members list', 'taste' ),
	);
	$args = array(
		'label'                 => __( 'Team', 'taste' ),
		'description'           => __( 'Team', 'taste' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'rewrite'               => array( 'slug' => 'team' ),
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'             => 'dashicons-admin-users',
	);
	register_post_type( 'team', $args );
}

add_action( 'init', 'team_cpt', 0 );
