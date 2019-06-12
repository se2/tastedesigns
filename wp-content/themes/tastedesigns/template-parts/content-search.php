<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (has_post_thumbnail()): ?>
    <?php ttg_wp_post_thumbnail(); ?>
  <?php else: ?>
    <?php $default_feature_image = get_field( 'default_feature_image', 'option' ); ?>
    <a class="post-thumbnail" href="<?php echo get_permalink(); ?>" aria-hidden="true" tabindex="-1">
      <img src="<?php echo $default_feature_image['url']; ?>" alt="placeholder" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
    </a>
  <?php endif; ?>

	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<span><?php the_author(); ?></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span><?php the_category(); ?></span>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark" class="font-title text-taste-1 no-underline entry-title__title">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<a href="<?php echo get_permalink(); ?>" class="font-subtitle text-taste-2 no-underline text-12 lg:text-16">Continue Reading</a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
