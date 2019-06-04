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

<section class="c-project-block w-full flex flex-col xl:flex-row xl:mt-90 relative">
  <div class="c-project-block__image-wrapper
  <?php if ($type == 'is-default') : ?>
    xl:w-1/2 relative h-project-block xl:h-auto
  <?php elseif ($type == 'is-alternative') : ?>
    xl:w-1/2 relative xl-order-2 h-project-block xl:h-auto
  <?php elseif ($type == 'is-background-full') : ?>
    w-full xl:h-full absolute top-0 left-0 h-full xl:h-auto
  <?php endif; ?>
  ">
    <?php generate_image($background, 'c-project-block__image w-full h-full o-cover absolute top-0 left-0', 'massive'); ?>
  </div>
  <div class="c-project-block__content pl-20 xl:pl-145 xl:w-1/2 relative
  <?php if ($type == 'is-default') : ?>
    bg-taste-5 pt-50 xl:pt-75 pb-50 xl:pb-65 pr-20 xl:pr-145
  <?php elseif ($type == 'is-alternative') : ?>
    bg-light xl-order-1 pt-50 xl:pt-35 pb-50 xl:pb-45 pr-20 xl:pr-175
  <?php elseif ($type == 'is-background-full') : ?>
    ml-auto pt-100 xl:pt-65 pb-100 xl:pb-50 xl:pb-75 pr-20 xl:pr-145 bg-transparent
  <?php endif; ?>
  ">
    <div class="c-project-block__content-inner
    <?php if ($type == 'is-background-full') : ?>
      bg-light py-65 px-40 xl:px-45
    <?php endif; ?>
    ">
      <h2 class="font-subtitle text-14 leading-15.69/14 tracking-4.05 xl:text-16 xl:leading-15.69 xl:tracking-4.63 text-taste-2 uppercase">
        <?php echo $subtitle; ?>
      </h2>
      <h1 class="font-title text-40 leading-50/40 xl:text-42 xl:leading-50/42 text-taste-1 mt-10">
        <?php echo $title; ?>
      </h1>
      <div class="c-project-block__body font-body text-14 leading-21 xl:text-16 xl:leading-24 text-taste-6
      <?php if ($type == 'is-background-full') : ?>
        has-bullet-point
      <?php endif; ?>
      ">
        <?php echo $content; ?>
      </div>
    </div>
  </div>
</section>
