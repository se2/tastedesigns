<?php

/*

Blogs CTA
logic found in /lib/blogs_cta.php

*/
$link = get_query_var('link');
$background = get_query_var('background');
$backgroundImage = wp_get_attachment_image_src($background, 'small');
?>

<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="c-blogs-cta__link no-underline">
  <div class="c-blogs-cta">
    <div class="c-blogs-cta__background bg-cover bg-center bg-no-repeat" style="background-image:url(<?php echo $backgroundImage[0]; ?>);">
      <h1 class="c-blogs-cta__title">
        <?php echo $link['title']; ?>
      </h1>
    </div>
  </div>
</a>
