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
		@font-face {
			font-family: "Optima Roman";
			src: url("<?php echo get_stylesheet_directory_uri(); ?>/fonts/848b42ab-e442-4ad8-9298-e54e94c9fa67.woff") format("woff");
		}
		@font-face {
			font-family: "Optima Demi Bold";
			src: url("<?php echo get_stylesheet_directory_uri(); ?>/fonts/11369adf-cc85-470c-be90-0c4a035a01a1.woff") format("woff");
		}
	</style>
	<?php
}
add_action('wp_head', 'ttg_wp_outputOptimaStyle');

function ttg_wp_ouputPrimaryColorStyle() {

	$primaryColorField = get_field('theme_primaryColor', 'options');
	$secondaryColorField = get_field('theme_secondaryColor', 'options');

	if ( !empty( $primaryColorField ) )
	{
		$primaryColorHex = $primaryColorField;
	}
	else
	{
		$primaryColorHex = '#4F4137';
	}

	if ( !empty( $secondaryColorField ) )
	{
		$secondaryColorHex = $secondaryColorField;
	}
	else
	{
		$secondaryColorHex = '#E8E0DA';
	}

	if (
		!empty( $primaryColorHex ) &&
		!empty( $secondaryColorHex )
	)
	{
		?>
		<style>
			html
			{
				--themeColorPrimary: <?php echo $primaryColorHex; ?>;
				--themeColorSecondary: <?php echo $secondaryColorHex; ?>;
			}
		</style>
		<?php
	}


	?>
	<?php

}
add_action('wp_head', 'ttg_wp_ouputPrimaryColorStyle');

/**
 * Color Scheme
 */
function ttg_wp_color_scheme() {
	get_template_part('template-parts/settings/color-scheme');
}
add_action('wp_head', 'ttg_wp_color_scheme');
