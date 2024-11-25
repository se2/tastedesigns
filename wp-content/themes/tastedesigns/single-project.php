<?php

/**
 * The template for displaying single project
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ttg-wp-theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
      while (have_posts()) :
        the_post();

        get_template_part('template-parts/content-single', get_post_type());

        // the_post_navigation();
      endwhile; // End of the loop.
    ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
