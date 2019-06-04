<?php
/**
 * Helper Functions
 *
 * @category   Function
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

/**
 * Print clean current site's URL.
 */
function the_clean_url() {
	echo esc_attr( get_site_url() );
}


/**
 * Print CTA Button.
 *
 * @param array  $link Link ACF Array.
 * @param String $class CTA button's classes.
 */
function the_cta( $link, $class = 'button' ) {
	$link_str = '';
	if ( $link ) {
		$link_str = '<a class="' . $class . '" href="' . $link['url'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>';
	}
	echo $link_str;
}


/**
 * Print socials sharing icons.
 *
 * @param array $services Social sharing services.
 */
function the_socials_share( $services = array( 'email', 'facebook', 'twitter', 'google-plus', 'linkedin' ) ) {

	$urls = array(
		'email'        => array( 'fas fa-envelope', 'mailto:?subject=' . get_the_title() . '&amp;body=' . get_permalink() ),
		'google-plus'  => array( 'fab fa-google-plus-g', 'https://plus.google.com/share?url=' . get_permalink() ),
		'facebook'     => array( 'fab fa-facebook-f', 'https://www.facebook.com/sharer.php?u=' . get_permalink() ),
		'twitter'      => array( 'fab fa-twitter', 'https://twitter.com/intent/tweet?url=' . get_permalink() ),
		'linkedin'     => array( 'fab fa-linkedin', 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_permalink() . '&title=' . get_the_title() ),
		'pinterest'    => array( 'fab fa-pinterest', 'http://pinterest.com/pin/create/link/?url=' . get_permalink() ),
		'tumblr'       => array( 'fab fa-tumblr', 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_permalink() . '&title={title}' . get_the_title() ),
	);

	$socials = '<div class="social-buttons">';

	foreach ( $services as $key => $service ) {
		if ( isset( $urls[ $service ] ) ) {
			$socials .= '<a class="social-button ' . $service . '" href="' . $urls[ $service ][1] . '" target="_blank"><i class="' . $urls[ $service ][0] . '"></i></a>';
		}
	}

	$socials .= '</div>';

	echo $socials; //phpcs:ignore

}

/**
 * Multiple delimiters explode.
 */
function multiexplode( $delimiters, $string ) {
	$ready  = str_replace( $delimiters, $delimiters[0], $string );
	$launch = explode( $delimiters[0], $ready );
	return $launch;
}

// Pagination.
if ( ! function_exists( 'ttg_pagination' ) ) :
	function ttg_pagination() {
		global $wp_query;

		$big = 999999999; // This needs to be an unlikely integer

		// For more options and info view the docs for paginate_links()
		// http://codex.wordpress.org/Function_Reference/paginate_links
		$paginate_links = paginate_links(
			array(
				'base'      => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'mid_size'  => 5,
				'prev_next' => false,
				'prev_prev' => false,
				'prev_text' => __( '&laquo;', 'ttg-wp' ),
				'next_text' => __( '&raquo;', 'ttg-wp' ),
				'type'      => 'list',
			)
		);

		$paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination text-center list-reset' role='navigation' aria-label='Pagination'>", $paginate_links );
		$paginate_links = str_replace( '<li><span class="page-numbers dots">', "<li><a href='#'>", $paginate_links );
		$paginate_links = str_replace( '</span>', '</a>', $paginate_links );
		$paginate_links = str_replace( "<li><span class='page-numbers current'>", "<li class='current'>", $paginate_links );
		$paginate_links = str_replace( "<li><a href='#'>&hellip;</a></li>", "<li><span class='dots'>&hellip;</span></li>", $paginate_links );
		$paginate_links = preg_replace( '/\s*page-numbers/', '', $paginate_links );

		// Display the pagination if more than one page is found.
		if ( $paginate_links ) {
			echo $paginate_links;
		}
	}
endif;

/**
 * Generate image
 */
function generate_image($id, $class = 'c-image', $size = 'tiny', $echo = true) {
	if ($echo) {
		echo wp_get_attachment_image($id, $size, '', array('class'=>$class));
	} else {
		return wp_get_attachment_image($id, $size, '', array('class'=>$class));
	}
}

/**
 * Get image URL
 */
function get_image_url($name, $echo = true) {
	if ($echo) {
		echo get_stylesheet_directory_uri() . '/img/' . $name;
	} else {
		return get_stylesheet_directory_uri() . '/img/' . $name;
	}
}

/**
 * Smooth out the gallery's output
 */
function evening_the_odds($gallery, $desktop = true) {
	$max_space = $desktop ? 4 : 2;
	$has_breach = false;
	do {
		// Reset marker
		$has_breach = false;
		$space = 0;
		for ($i = 0; $i < count($gallery); $i++) {
			// Iterate through the array
			if ($gallery[$i]['width'] > $gallery[$i]['height']) {
				$space += 2;
			} else {
				$space++;
			}
			// Check for potential breach
			if ($space == $max_space) { // Current row is filled, all is safe, move to next row
				$space = 0;
			} else if ($space > $max_space) { // Current row cannot be filled, there's now a breach, panic!!!
				$fill_complete = false;
				// Grab the closest filler
				for ($j = $i; $j < count($gallery); $j++) {
					if ($gallery[$j]['width'] <= $gallery[$j]['height']) {
						array_splice($gallery, $i, 0, array($gallery[$j]));
						array_splice($gallery, $j + 1, 1);
						$fill_complete = true;
						break;
					}
				}
				// If there's no filler anymore
				if (!$fill_complete) {
					$odd = $gallery[$i - 1];
					array_splice($gallery, $i - 1, 1);
					array_push($gallery, $odd);
				}
				// Proof that there's a breach
				$has_breach = true;
				// Gallery is altered, escape now or stuck here for eternity
				break;
			}
		}
	} while ($has_breach);
	return $gallery;
}
