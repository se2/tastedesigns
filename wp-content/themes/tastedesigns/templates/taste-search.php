<?php
/**
 * Template Name: Search
 *
 * @category   Template
 * @package    Galileo
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

get_header();
$args = array (
  'post_type' => array('post', 'page', 'artist', 'project'),
  'posts_per_page' => 10,
  'facetwp' => true,
);
$query = new WP_Query($args);
?>

	<header class="page-header js-header-blog px-20 md:px-0">
		<h1 class="page-title font-title text-center text-taste-1 text-60 leading-69 mt-20 lg:mt-0 pb-50 lg:pb-0">
			<?php $search = isset($_GET['_search']) ? $_GET['_search'] : ''; ?>
			<?php printf( esc_html__( 'Search Results for: %s', 'ttg-wp' ), '"<span class="font-title js-search-title">' . $search . '</span>"' ); ?>
		</h1>
	</header><!-- .page-header -->

	<section id="primary" class="content-area js-content-blog">
		<main id="main" class="site-main">

		<div class="flex flex-wrap relative">
			<div class="search-results-area order-1">
        <div class="search-results-container">
          <?php
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
              get_template_part( 'template-parts/content', 'search' );
            endwhile;
          else :
            get_template_part( 'template-parts/content', 'none' );
          endif;
          ?>
        </div>
        <div class="c-button border-2 border-taste-4 px-21 inline-flex items-center fwp-load-more cursor-pointer uppercase text-14 tracking-3 text-taste-2 font-subtitle order-3">
          <span class="c-button__text uppercase text-14 text-taste-2 font-subtitle tracking-3">View more Results</span>
          <img src="<?php get_image_url('alternative-path.png'); ?>" alt="Arrow" class="c-button__icon h-auto ml-auto lg:ml-30">
        </div>
      </div>
			<?php get_sidebar('blogs'); ?>
		</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
