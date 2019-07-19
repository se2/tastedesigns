<?php
/**
 * Template part for displaying projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
 */

?>

<div id="project-<?php the_ID(); ?>" <?php post_class('c-project w-full lg:w-1/3'); ?>>
  <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
    <div class="c-project__image bg-taste-9">
		  <?php generate_image(get_post_thumbnail_id(), 'w-full h-full o-cover', 'small'); ?>
    </div>
	</a>
  <?php the_title('<a class="c-project__title text-14 leading-17 tracking-3.71 lg:tracking-4.24 lg:leading-19 lg:text-16 text-center text-taste-3 font-body no-underline uppercase" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>'); ?>
</div><!-- #project-<?php the_ID(); ?> -->
