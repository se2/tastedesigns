<?php
/**
 * Register Taste Artist Post Type
 *
 * @category   CPT
 * @package    TTG
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */


// register Taste Artist post-type
function tst_registerPostType_Artist()
{
	$singular = 'Artist';
	$plural = $singular . 's';

	$labels = array(
		'name'               => $plural,
		'singular_name'      => $singular,
		'menu_name'          => $plural,
		'name_admin_bar'     => $singular,
		'add_new'            => 'Add New ' . $singular,
		'add_new_item'       => 'Add New ' . $singular,
		'new_item'           => 'New ' . $singular,
		'edit_item'          => 'Edit ' . $singular,
		'view_item'          => 'View ' . $singular,
		'all_items'          => 'All ' . $plural,
		'search_items'       => 'Search ' . $plural,
		'parent_item_colon'  => 'Parent ' . $plural,
		'not_found'          => 'No ' . $plural . ' found',
		'not_found_in_trash' => 'No ' . $plural . ' found in trash',
	);

	$args = array(
		'labels'             => $labels,
		'description'        => '',
		'menu_icon'			 =>	'dashicons-id-alt',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'artist' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'artist', $args );
}
add_action('init', 'tst_registerPostType_Artist', 0);
