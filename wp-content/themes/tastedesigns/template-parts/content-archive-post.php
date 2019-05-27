<?php
/*

template partial for archive post type

*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('min-h-full'); ?> style="margin:2rem 0;">

  <a href="<?php echo get_permalink(); ?>" ><?php ttg_wp_post_thumbnail(); ?></a>
  <header class="entry-header">
    <div>
      <?php echo $author; ?> | <?php echo $primaryCat; ?>
    </div>
    <h1 class="entry-title">
      <a href="<?php echo get_permalink(); ?>" ><?php the_title(); ?></a>
    </h1>
  </header>
  <div class="entry-content">
    <?php
    the_excerpt();
    ?>
  </div>
  <footer>
    <a href="<?php echo get_permalink(); ?>" >Continue Reading</a>
  </footer>
</article>
