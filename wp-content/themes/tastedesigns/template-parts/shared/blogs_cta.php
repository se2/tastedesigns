<?php

/*

Blogs CTA
logic found in /lib/blogs_cta.php

*/
$link = get_query_var('link');
$background = get_query_var('background');
?>

<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="c-blogs-cta__link">
  <div class="c-blogs-cta bg-taste-5 pt-60 relative">
    <div class="c-blogs-cta__background absolute">
      <?php echo generate_image($background, 'c-blogs-cta__image', 'small'); ?>
    </div>
    <h1 class="c-blogs-cta__title">
      <?php echo $link['title']; ?>
    </h1>
  </div>
</a>
