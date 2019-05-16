<?php
/**
 * Enqueue scripts and styles.
 */
function ttg_wp_scripts() {
  wp_enqueue_style('ttg-wp-style', get_template_directory_uri() . '/dist/app.css');
  wp_enqueue_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery']);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Custom fonts
	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Abril+Fatface|Heebo:300', NULL, NULL);

	// Font Awesome
	wp_enqueue_style( 'font-awesome-free', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css' );
}
add_action( 'wp_enqueue_scripts', 'ttg_wp_scripts' );
