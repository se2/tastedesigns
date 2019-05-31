<?php
/**
 * ttg-wp-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ttg-wp-theme
 */

if ( ! function_exists( 'ttg_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ttg_wp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ttg-wp-theme, use a find and replace
		 * to change 'ttg-wp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ttg-wp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ttg-wp' ),
			'menu-2' => esc_html__( 'Secondary', 'ttg-wp' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ttg_wp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add image sizes
		 */
		update_option( 'large_size_w', 1366 );
		update_option( 'large_size_h', 0 );
		update_option( 'large_crop', 0 );

		update_option( 'medium_size_w', 1024 );
		update_option( 'medium_size_h', 0 );
		update_option( 'medium_crop', 0 );

		add_image_size( 'massive', 1920 );
		add_image_size( 'small', 768 );
		add_image_size( 'tiny', 300 );

		/**
		 * Disable Wordpress's Image Compression
		 */
		add_filter('jpeg_quality', function($arg){return 100;});

		/**
		 * Remove testimonial's first open quote
		 */
		add_filter('the_content', function($content) {
			global $post;
			if ( ( is_object( $post ) && $post->post_type == 'testimonial' ) || ( is_array( $post ) && $post['post_type'] == 'testimonial' ) ) {
				$content = preg_replace('/^<p>“/', '<p>', $content);ltrim($content, '“');
			}
			return $content;
		});

		/**
		 * Modify Archive Title
		 */
		add_filter('get_the_archive_title', function($title) {
			if (is_category()) {
				$title = single_cat_title('', false);
			} else if (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
			} else if (is_tag()) {
        $title = single_tag_title('', false);
				} else if (is_tax()) {
        $title = single_term_title('', false);
			} else if (is_author()) {
        $title = get_the_author();
			}
			return $title;
		}, 10, 1);

		/**
		 * Hide counts from all dropdowns
		 */
		add_filter('facetwp_facet_dropdown_show_counts', '__return_false');
	}
endif;
add_action( 'after_setup_theme', 'ttg_wp_setup' );
