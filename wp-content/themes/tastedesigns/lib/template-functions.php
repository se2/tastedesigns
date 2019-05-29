<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ttg-wp-theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ttg_wp_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ttg_wp_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ttg_wp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ttg_wp_pingback_header' );

/**
 * Friendly Block Titles
 * Credit: http://serversideguy.com/2017/03/28/how-can-i-create-custom-titles-for-advanced-custom-fields-flexible-content-blocks/
 */
function my_layout_title( $title, $field, $layout, $i ) {
	if ( $value = get_sub_field( 'layout_title' ) ) {
		return $value;
	} else {
		foreach ( $layout['sub_fields'] as $sub ) {
			if ( $sub['name'] == 'layout_title' ) {
				$key = $sub['key'];
				if ( is_array( $field['value'] ) && array_key_exists( $i, $field['value']) && $value = $field['value'][$i][$key] )
					return $value;
			}
		}
	}
	return $title;
}

add_filter( 'acf/fields/flexible_content/layout_title', 'my_layout_title', 10, 4 );

// disable srcset on frontend
function disable_wp_responsive_images() {
	return 1;
}

add_filter('max_srcset_image_width', 'disable_wp_responsive_images');
