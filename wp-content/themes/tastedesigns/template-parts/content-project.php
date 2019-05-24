<?php
/**
 * Template part for displaying projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
 */

?>

<div id="project-<?php the_ID(); ?>" <?php post_class('c-project w-1/3'); ?>>
  <?php ttg_wp_post_thumbnail(); ?>
  <?php the_title('<a class="font-body no-underline uppercase" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>'); ?>
</div><!-- #project-<?php the_ID(); ?> -->
