<?php
/*

template partial for archive post type

*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('min-h-full w-full'); ?>>
  <?php if (has_post_thumbnail()): ?>
    <?php ttg_wp_post_thumbnail(); ?>
  <?php else: ?>
    <?php $default_feature_image = get_field( 'default_feature_image', 'option' ); ?>
    <a class="post-thumbnail" href="<?php echo get_permalink(); ?>" aria-hidden="true" tabindex="-1">
      <img src="<?php echo $default_feature_image['url']; ?>" alt="placeholder" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="">
    </a>
  <?php endif; ?>

  <header class="entry-header">
    <div class="font-subtitle text-12 lg:text-16 text-taste-2 uppercase entry-header__author">
      <?php echo $author; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $primaryCat; ?>
    </div>
    <h1 class="entry-title">
      <a href="<?php echo get_permalink(); ?>" class="font-title text-42 leading-57 lg:text-58 lg:leading-78 text-taste-1 no-underline entry-title__title"><?php the_title(); ?></a>
    </h1>
  </header>
  <div class="entry-content">
    <?php
    the_excerpt();
    ?>
  </div>
  <footer class="entry-footer">
    <a href="<?php echo get_permalink(); ?>" class="font-subtitle text-taste-2 no-underline text-12 lg:text-16">Continue Reading</a>
  </footer>
</article>
