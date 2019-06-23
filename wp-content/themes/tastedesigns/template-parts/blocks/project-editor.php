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
  $bullet_point = get_sub_field('bullet_point');
  $title = get_sub_field('title');
  $subtitle = get_sub_field('subtitle');
  $content = get_sub_field('content');
  $cta = get_sub_field('call_to_action');
  $align = get_sub_field('align');
endwhile;
$colors = new TasteColors();
?>

<section class="c-project-block w-full flex flex-col xl:flex-row mt-50 xl:mt-80 relative">
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
    pt-100 xl:pt-65 pb-100 xl:pb-50 xl:pb-75 pr-20 xl:pr-145 bg-transparent
    <?php echo $align; ?>
  <?php endif; ?>
  ">
    <div class="c-project-block__content-inner
    <?php if ($type == 'is-background-full') : ?>
      bg-light py-65 px-40 xl:px-45
    <?php endif; ?>
    ">
      <h2 class="font-subtitle text-14 leading-15.69/14 tracking-4.05 xl:text-16 xl:leading-15.69 xl:tracking-4.63 text-taste-2 uppercase" <?php $colors->getSecondary(); ?>>
        <?php echo $subtitle; ?>
      </h2>
      <h1 class="font-title text-40 leading-50/40 xl:text-42 xl:leading-50/42 text-taste-1 mt-10" <?php $colors->getPrimary(); ?>>
        <?php echo $title; ?>
      </h1>
      <div class="c-project-block__body font-body text-14 leading-21 xl:text-16 xl:leading-24 text-taste-6
      <?php if ($type == 'is-background-full' && $bullet_point) : ?>
        has-bullet-point
      <?php endif; ?>
      ">
        <?php echo $content; ?>
      </div>
      <?php if ($cta) : ?>
      <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>" class="no-underline w-full lg:w-auto mt-35 block">
        <div class="c-project-block__button border-2 border-taste-4 py-25 px-21 items-center inline-flex w-full lg:w-auto" <?php $colors->getTertiary(TasteColors::BORDER); ?>>
          <span class="font-subtitle text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase" <?php $colors->getPrimary(); ?>>
            <?php echo $cta['title']; ?>
          </span>
          <?php get_arrow_svg('w-50 h-auto ml-auto lg:ml-30 align-middle fill-taste-1', $colors->getPrimary(TasteColors::FILL, false)); ?>
        </div>
      </a>
      <?php endif; ?>
    </div>
  </div>
</section>
