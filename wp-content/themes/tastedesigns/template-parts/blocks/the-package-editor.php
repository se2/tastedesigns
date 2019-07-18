<?php
/**
 * The Package module
 *
 * @category   Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$background = get_sub_field('background');
$switch = get_sub_field('switch_card_background');
$anchor = get_sub_field('anchor');
// $override = get_sub_field('override');

$colors = new TasteColors();
?>

<div class="c-package js-package w-full bg-black relative px-20 py-60 lg:px-72 lg:pb-80 lg:pt-116" data-id="<?php echo $anchor ?>">
  <div class="c-package__background-wrapper absolute top-0 left-0 w-full h-full bg-black">
    <?php if (!empty($background)) : ?>
      <?php generate_image($background, 'c-package__background w-full h-full o-cover', 'large'); ?>
    <?php endif; ?>
  </div>
  <div class="absolute w-full h-full top-0 left-0" style="background-color: rgba(79,65,55,0.45);"></div>
  <div class="c-package__inner relative">
    <?php if ($title) : ?>
      <h1 class="font-title text-42 leading-50/42 text-center
      <?php if (!empty($background)) : ?>
        text-light
      <?php else : ?>
        text-taste-1
      <?php endif; ?>
      ">
        <?php echo $title; ?>
      </h1>
    <?php endif; ?>
    <?php if ($subtitle) : ?>
      <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 uppercase text-center mt-50 lg:mt-60 mx-20 lg:mx-30
      <?php if (!empty($background)) : ?>
        text-light
      <?php else : ?>
        text-taste-1
      <?php endif; ?>
      ">
        <?php echo $subtitle; ?>
      </h2>
    <?php endif; ?>
    <div class="flex flex-col lg:flex-row justify-center bg-light mt-50 lg:mt-116">
      <?php while (have_rows('first_card')) : the_row(); ?>
        <div class="w-full lg:w-1/2 px-40 py-65 lg:px-63 lg:py-76
        <?php if ($switch) : ?>
          bg-taste-5
        <?php endif; ?>
        ">
          <?php if (get_sub_field('subtitle')) : ?>
            <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-1 uppercase">
              <?php echo get_sub_field('subtitle'); ?>
            </h2>
          <?php endif; ?>
          <div class="c-package__content font-body text-14 leading-21 lg:text-16 lg:leading-24 text-taste-2">
            <?php echo get_sub_field('content'); ?>
          </div>
        </div>
      <?php endwhile; ?>
      <?php while (have_rows('second_card')) : the_row(); ?>
        <div class="w-full lg:w-1/2 px-40 py-65 lg:px-63 lg:py-76
        <?php if (!$switch) : ?>
          bg-taste-5
        <?php endif; ?>
        ">
          <?php if (get_sub_field('subtitle')) : ?>
            <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-1 uppercase">
              <?php echo get_sub_field('subtitle'); ?>
            </h2>
          <?php endif; ?>
          <?php if (get_sub_field('title')) : ?>
            <h1 class="font-title text-30 leading-50.30 text-taste-1">
              <?php echo get_sub_field('title'); ?>
            </h1>
          <?php endif; ?>
          <div class="c-package__content font-body text-14 leading-21 lg:text-16 lg:leading-24 text-taste-2">
            <?php echo get_sub_field('content'); ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>
