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

// add Optima font faces
function ttg_wp_outputOptimaStyle() {
?>
<style type="text/css">
	@import url("https://fast.fonts.net/lt/1.css?apiType=css&c=7bc860a7-2bb9-40ad-a15f-35adc547eea0&fontids=1564435,1564459");

	@font-face {
		font-family: "Optima";
		src: url("Fonts/1564435/4a563a45-10fa-48cf-9e7c-b64763fffeb3.eot?#iefix");
		src: url("Fonts/1564435/4a563a45-10fa-48cf-9e7c-b64763fffeb3.eot?#iefix") format("eot"),url("Fonts/1564435/ae3b90ec-eda9-475f-96e7-c820511178fa.woff2") format("woff2"),url("Fonts/1564435/848b42ab-e442-4ad8-9298-e54e94c9fa67.woff") format("woff"),url("Fonts/1564435/a2f5cdb5-caec-4c24-b38b-7233e88e6f9e.ttf") format("truetype");
		font-weight: normal;
	}
	@font-face {
		font-family: "Optima";
		src: url("Fonts/1564459/87ffc405-f4b1-40ad-876d-cefca59b1468.eot?#iefix");
		src: url("Fonts/1564459/87ffc405-f4b1-40ad-876d-cefca59b1468.eot?#iefix") format("eot"),url("Fonts/1564459/652b24c6-75b5-4d55-b183-30204a40bd9e.woff2") format("woff2"),url("Fonts/1564459/11369adf-cc85-470c-be90-0c4a035a01a1.woff") format("woff"),url("Fonts/1564459/01e7c0c3-bd8a-437e-9bfd-f152be7861f3.ttf") format("truetype");
		font-weight: bold;
	}
</style>
<?php
}
add_action('wp_head', 'ttg_wp_outputOptimaStyle');
