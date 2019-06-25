<?php if (is_home()) : ?>
  <?php if (get_field('excerpt', get_option('page_for_posts'))) : ?>
    <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center mb-50 lg:mb-60 mx-20 lg:mx-50 js-subtitle">
      <?php the_field('excerpt', get_option('page_for_posts')); ?>
    </h2>
  <?php endif; ?>
<?php else : ?>
  <?php if (get_field('excerpt')) : ?>
    <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center mt-40 lg:mt-60 mx-20 lg:mx-0 js-subtitle">
      <?php the_field('excerpt'); ?>
    </h2>
  <?php endif; ?>
<?php endif; ?>
