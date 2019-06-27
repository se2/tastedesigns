<?php
/**
 * Press module
 *
 * @category   Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$override = get_sub_field('override');
$colors = new TasteColors();

if (have_rows('press')) : ?>
  <div class="c-team w-full my-60 lg:my-80">
    <h1 class="font-title text-42 leading-57 lg:text-66 lg:leading-89 mb-50 xl:mb-0 text-taste-1 text-center lowercase" <?php $colors->getPrimaryColor(); ?>>
      <?php echo $title; ?>
    </h1>
    <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center mt-0 lg:mt-60 mx-20 lg:mx-30">
      <?php echo $subtitle; ?>
    </h2>
    <div class="c-team__content px-0 lg:px-10 flex flex-wrap mt-40 lg:mt-40">
      <?php while (have_rows('press')) : the_row(); ?>
        <div class="c-team__item w-full lg:w-1/3 px-0 lg:px-6 lg:py-24">
          <?php if (get_sub_field('url')) : ?>
            <a href="<?php the_sub_field('url'); ?>" target="_blank" class="no-underline">
          <?php endif; ?>
            <div class="c-team__item-inner px-20 py-20 lg:px-15 lg:py-16 hover:bg-taste-5"
            <?php if ($colors->isOverriden()) : ?>
              onMouseOver="this.style.backgroundColor='<?php echo $colors->getRawTertiary(); ?>'"
              onMouseOut="this.style.backgroundColor='transparent'"
            <?php endif; ?>
            >
              <div class="c-team__thumbnail w-full h-team-image-mobile lg:h-team-image bg-taste-9">
                <?php generate_image(get_sub_field('image'), 'c-team__image w-full h-full o-cover block', 'small'); ?>
              </div>
              <h1 class="font-title text-42 leading-57 text-taste-1 text-center mt-20" <?php $colors->getPrimaryColor(); ?>>
                <?php the_sub_field('title'); ?>
              </h1>
              <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center no-underline" <?php $colors->getSecondaryColor(); ?>>
                <?php the_sub_field('source'); ?>
              </h2>
            </div>
          <?php if (get_sub_field('url')) : ?>
            </a>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>
