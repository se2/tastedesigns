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

/**
 * Taste Colors Management
 */
class TasteColors {
	const PRIMARY = 'primary';
	const SECONDARY = 'secondary';
	const TERTIARY = 'tertiary';
	const COLOR = 1;
	const BACKGROUND = 2;
	const BORDER = 3;
	const FILL = 4;

	private $colors;
	private $override;
	private $option;
	private $id;

	public function __construct($option = false, $id = false) {
		$this->colors = array();
		$this->override = false;
		$this->option = $option;
		$this->id = $id;
		$this->collectThemeColors();
	}

	private function collectThemeColors() {
		while ($this->haveRowColors()) {
			the_row();
			$this->override = get_sub_field('override_default_colors');
			if ($this->override) {
				$keys = array(self::PRIMARY, self::SECONDARY, self::TERTIARY);
				foreach ($keys as $key) {
					$color = get_sub_field($key.'_color');
					$color_alternative = get_sub_field($key.'_color_alternative');
					if (!empty($color) && $color != 'other') {
						$this->colors[$key] = $color;
					} else if (!empty($color_alternative)) {
						$this->colors[$key] = $color_alternative;
					}
				}
			}
		}
	}

	private function haveRowColors() {
		if ($this->option) {
			return have_rows('colors', 'option');
		} else if ($this->id) {
			return have_rows('colors', $this->id);
		} else {
			return have_rows('colors');
		}
	}

	private function generateProperty($property, $color) {
		switch ($property) {
			case self::COLOR:
				return 'color:'.$color.';';
			case self::BORDER:
				return 'border-color:'.$color.';';
			case self::BACKGROUND:
				return 'background-color:'.$color.';';
			case self::FILL:
				return 'fill:'.$color.';';
		}
	}

	private function generateStyle($type, $color) {
		$style = 'style="';
		if (is_array($type)) {
			foreach ($type as $property) {
				$style .= $this->generateProperty($property, $color);
			}
		} else {
			$style .= $this->generateProperty($type, $color);
		}
		$style .= '"';
		return $style;
	}

	public function getPrimary($type = self::COLOR, $echo = true) {
		if ($this->override) {
			$style = $this->generateStyle($type, $this->getRawPrimary());
			if ($echo) {
				echo $style;
			} else {
				return $style;
			}
		}
	}

	public function getSecondary($type = self::COLOR, $echo = true) {
		if ($this->override) {
			$style = $this->generateStyle($type, $this->getRawSecondary());
			if ($echo) {
				echo $style;
			} else {
				return $style;
			}
		}
	}

	public function getTertiary($type = self::COLOR, $echo = true) {
		if ($this->override) {
			$style = $this->generateStyle($type, $this->getRawTertiary());
			if ($echo) {
				echo $style;
			} else {
				return $style;
			}
		}
	}

	public function isOverriden() {
		return $this->override;
	}

	public function getRawPrimary() {
		if ($this->override) {
			return $this->colors[self::PRIMARY];
		}
	}

	public function getRawSecondary() {
		if ($this->override) {
			return $this->colors[self::SECONDARY];
		}
	}

	public function getRawTertiary() {
		if ($this->override) {
			return $this->colors[self::TERTIARY];
		}
	}
}

/**
 * Add styles to Menu
 */
function custom_menu_styles($menu_html, $style) {
	return str_replace('<a href', '<a '.$style.' href', $menu_html);
}

/**
 * Generate custom SVG HTML
 */
function get_arrow_svg($class, $style = '') {
	echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 97.95 35.98" class="'.$class.'" '.$style.'><title>Arrow-right</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M78.4.69a2.46,2.46,0,0,0,0,3.45l11.4,11.41H2.42a2.44,2.44,0,0,0,0,4.87H89.76L78.37,31.83a2.47,2.47,0,0,0,0,3.45,2.42,2.42,0,0,0,3.43,0L97.25,19.71a2.72,2.72,0,0,0,.51-.77A2.36,2.36,0,0,0,98,18a2.45,2.45,0,0,0-.7-1.7L81.81.75A2.38,2.38,0,0,0,78.4.69Z"/></g></g></svg>';
}

/**
 * Generate custom SVG HTML
 */
function get_quote_svg($class, $style = '') {
	echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 145.88 99.01" class="'.$class.'" '.$style.'><title>quote</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M70.88,35.5A35.48,35.48,0,0,1,35.38,71a34.32,34.32,0,0,1-4.2-.25A25.4,25.4,0,0,0,48.67,99C22.57,90.84,1.55,67.71.07,39.76c-.54-10.26,2.1-20.6,9.17-28.29a35.51,35.51,0,0,1,61.64,24ZM110.38,0A35.7,35.7,0,0,0,84.24,11.47c-7.07,7.69-9.71,18-9.17,28.29,1.48,27.95,22.5,51.08,48.6,59.25a25.4,25.4,0,0,1-17.49-28.26,34.32,34.32,0,0,0,4.2.25,35.5,35.5,0,0,0,0-71Z"/></g></g></svg>';
}
