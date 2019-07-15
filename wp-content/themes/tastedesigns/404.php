<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ttg-wp-theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<article class="mx-20 lg:mx-0 lg:px-50">
					<header class="page-header mb-20">
						<h1 class="page-title font-title text-taste-1 text-42 leading-57 lg:text-64 lg:leading-89 text-center lg:text-left"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ttg-wp' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content text-center lg:text-left">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ttg-wp' ); ?></p>

						<?php get_search_form(); ?>

					</div><!-- .page-content -->
				</article>

				<?php get_sidebar('blogs'); ?>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
