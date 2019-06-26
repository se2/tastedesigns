<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ttg-wp-theme
 */

get_header();
$theme_colors = new TasteColors(true);
?>

	<header class="page-header js-header-blog px-20 md:px-0">
		<h1 class="page-title font-title text-center text-taste-1 text-60 leading-69 mt-20 lg:mt-0 pb-50 lg:pb-0" <?php $theme_colors->getPrimaryColor(); ?>>
			<?php $search = isset($_GET['_search']) ? $_GET['_search'] : ''; ?>
			<?php printf( esc_html__( 'Search Results for: %s', 'ttg-wp' ), '"<span class="font-title js-search-title">' . $search . '</span>"' ); ?>
		</h1>
	</header><!-- .page-header -->

	<section id="primary" class="content-area js-content-blog">
		<main id="main" class="site-main">

		<div class="flex flex-wrap relative">
			<div class="search-results-area order-1">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'search' );
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>

			<?php get_sidebar('blogs'); ?>
		</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
