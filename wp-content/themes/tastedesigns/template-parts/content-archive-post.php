<?php
/*

template partial for archive post type

*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('min-h-full w-full'); ?>>
  <?php ttg_wp_post_thumbnail(); ?>
  <header class="entry-header <?php echo (has_post_thumbnail()) ? '' : 'is-top'; ?>">
    <div class="font-subtitle text-12 lg:text-16 text-taste-2 uppercase entry-header__author">
      <?php echo $author; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $primaryCat; ?>
    </div>
    <h1 class="entry-title">
      <a href="<?php echo get_permalink().'?a=1'; ?>" class="font-title text-taste-1 no-underline entry-title__title"><?php the_title(); ?></a>
    </h1>
  </header>
  <div class="entry-content">
    <?php
    the_excerpt();
    ?>
  </div>
  <footer class="entry-footer">
    <a href="<?php echo get_permalink().'?a=1'; ?>" class="font-subtitle text-taste-2 no-underline text-12 lg:text-16">Continue Reading</a>
  </footer>
</article>
