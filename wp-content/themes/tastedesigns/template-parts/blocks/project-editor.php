<?php
/**
 * Project Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$background = get_sub_field('background');
while (have_rows('group')) : the_row();
  $type = get_sub_field('block_type');
  $title = get_sub_field('title');
  $subtitle = get_sub_field('subtitle');
  $content = get_sub_field('content');
endwhile;
?>

<section class="c-project-block w-full flex mt-90 relative">
  <div class="c-project-block__image-wrapper
  <?php if ($type == 'is-alternative') : ?>order-2<?php endif; ?>
  <?php if ($type == 'is-background-full') : ?>w-full h-full absolute top-0 left-0<?php else : ?>w-1/2 relative<?php endif; ?>
  ">
    <?php generate_image($background, 'c-project-block__image w-full h-full o-cover absolute top-0 left-0', 'massive'); ?>
  </div>
  <div class="c-project-block__content pl-145 w-1/2 relative
  <?php if ($type == 'is-default') : ?>bg-taste-5<?php else : ?>bg-light<?php endif; ?>
  <?php if ($type == 'is-alternative') : ?>order-1 pt-35 pb-45 pr-175<?php else : ?>pt-75 pb-65 pr-145<?php endif; ?>
  <?php if ($type == 'is-background-full') : ?>ml-auto pt-65 pb-75 pr-145 bg-transparent<?php else : ?>pt-75 pb-65<?php endif; ?>
  ">
    <div class="c-project-block__content-inner
    <?php if ($type == 'is-background-full') : ?>bg-light py-65 px-45<?php endif; ?>
    ">
      <h2 class="font-subtitle text-16 leading-15.69 tracking-4.63 text-taste-2 uppercase">
        <?php echo $subtitle; ?>
      </h2>
      <h1 class="font-title text-42 leading-50 text-taste-1 mt-10">
        <?php echo $title; ?>
      </h1>
      <div class="c-project-block__body font-body text-16 leading-24 text-taste-6
      <?php if ($type == 'is-background-full') : ?>has-bullet-point<?php endif; ?>
      ">
        <?php echo $content; ?>
      </div>
    </div>
  </div>
</section>
