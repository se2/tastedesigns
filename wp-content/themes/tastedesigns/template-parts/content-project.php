<?php
/**
 * Template part for displaying projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
 */

?>

<div id="project-<?php the_ID(); ?>" <?php post_class('c-project w-full md:w-1/2 lg:w-1/3'); ?>>
  <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		<?php the_post_thumbnail('post-thumbnail', array('class' => 'c-project__image')); ?>
	</a>
  <?php the_title('<a class="c-project__title text-14 leading-17 tracking-3.71 lg:tracking-4.24 lg:leading-19 lg:text-16 text-center text-taste-3 font-body no-underline uppercase" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>'); ?>
</div><!-- #project-<?php the_ID(); ?> -->
