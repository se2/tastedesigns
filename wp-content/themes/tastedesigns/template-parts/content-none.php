<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
 */

?>

<section class="no-results not-found">
	<header class="page-header mb-20">
		<h1 class="page-title font-title text-taste-1 text-48 leading-52.48 lg:text-60 lg:leading-69"><?php esc_html_e( 'Nothing Found', 'ttg-wp' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ttg-wp' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<h2 class="font-subtitle text-12 leading-30.12 tracking-3.18 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ttg-wp' ); ?></h2>
			<?php
			get_search_form();

		else :
			?>

			<h2 class="font-subtitle text-12 leading-30.12 tracking-3.18 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ttg-wp' ); ?></h2>
			<?php
			// get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
