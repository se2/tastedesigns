<?php
/**
 * Featured Project Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$project = get_sub_field('project');
$autoplay = get_sub_field('autoplay');
if ($project) :
  global $post;
  $post = $project;
  setup_postdata($post);
  $colors = new TasteColors();
?>

  <section class="c-featured-project w-full relative pt-30 pb-80 lg:py-80">
    <div class="c-featured-project__inner flex flex-col lg:flex-row">
      <div class="c-featured-project__gallery w-full lg:w-66% order lg:pl-40">
        <h2 class="font-title text-30 leading-40 text-taste-4 text-center mb-22 lg:hidden" <?php $colors->getTertiaryColor(); ?>>
          Featured Project
        </h2>
        <div class="c-featured-project__gallery-inner js-project-gallery relative" data-slick='{"autoplay": <?php echo $autoplay; ?>}''>
          <?php $gallery = get_field('gallery'); ?>
          <?php $count = 0; ?>
          <?php foreach ($gallery as $image) : $count++; ?>
            <div class="c-featured-project__image-wrapper py-10 px-10 lg:pl-0 lg:pr-20 js-project-gallery-item">
              <a href="<?php echo get_permalink($project); ?>" class="no-underline">
                <?php generate_image($image['ID'], 'c-featured-project__image w-full h-featured-mobile lg:h-featured', 'large'); ?>
              </a>
            </div>
            <?php if ($count == 4) : break; endif; ?>
          <?php endforeach; ?>
        </div>
        <div class="c-featured-project__link-wrapper w-full items-center hidden lg:flex">
          <a href="<?php echo get_post_type_archive_link('project'); ?>" class="c-featured-project__link border-b-4 no-underline mt-50 lg:mt-45 ml-auto pb-5 lg:pb-0 block" <?php $colors->getSecondaryBorder(); ?>>
            <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase" <?php $colors->getPrimaryColor(); ?>>
              View All Projects
            </span>
          </a>
        </div>
      </div>
      <div class="c-featured-project__content w-full lg:w-34% px-20 lg:px-50">
        <h2 class="font-title text-42 leading-57 text-taste-4 hidden lg:block" <?php $colors->getTertiaryColor(); ?>>
          Featured Project
        </h2>
        <?php if (get_field('location')) : ?>
          <h3 class="font-subtitle text-14 leading-21 tracking-3.71 lg:text-16 lg:leading-24 lg:tracking-4.24 text-taste-2 uppercase mt-30 lg:mt-45" <?php $colors->getPrimaryColor(); ?>>
            <?php the_field('location'); ?>
          </h3>
        <?php endif; ?>
        <h1 class="font-title text-42 leading-57 lg:text-64 lg:leading-89 text-taste-1 break-words" <?php $colors->getPrimaryColor(); ?>>
          <?php the_title(); ?>
        </h1>
        <div class="c-featured-project__body font-body text-14 leading-17 lg:text-16 lg:leading-19 text-taste-6">
          <?php the_excerpt(); ?>
        </div>
        <div class="c-featured-project__separator h-4 w-full bg-taste-5 mt-50 lg:mt-70"></div>
        <?php if (have_rows('partners')) : ?>
          <h3 class="font-subtitle text-14 leading-21 tracking-3.71 lg:text-16 lg:leading-24 lg:tracking-4.24 text-taste-2 uppercase mt-40 lg:mt-30" <?php $colors->getPrimaryColor(); ?>>
            Project Partners
          </h3>
          <?php while (have_rows('partners')) : the_row(); ?>
            <p class="font-body text-14 leading-17 lg:text-16 lg:leading-19 text-taste-6">
              <?php echo get_sub_field('partner'); ?>
            </p>
          <?php endwhile; ?>
        <?php endif; ?>
        <a href="<?php echo get_permalink($project); ?>" class="no-underline w-full lg:w-auto">
          <div class="c-featured-project__button border-2 border-taste-4 py-25 px-21 items-center inline-flex w-full lg:w-auto mt-50" <?php $colors->getSecondaryBorder(); ?>>
            <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase" <?php $colors->getPrimaryColor(); ?>>
              Full Project Details
            </span>
            <?php get_arrow_svg('w-50 h-auto ml-auto lg:ml-30 align-middle fill-taste-1', $colors->getPrimaryFill(false)); ?>
          </div>
        </a>
      </div>
    </div>
    <div class="c-featured-project__bottom w-full px-20 lg:px-50 flex lg:hidden items-center flex-col lg:flex-row">
      <a href="<?php echo get_post_type_archive_link('project'); ?>" class="c-featured-project__link border-b-4 no-underline mt-50 lg:mt-120 mx-auto pb-5 lg:pb-0 block" <?php $colors->getSecondaryBorder(); ?>>
        <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase" <?php $colors->getPrimaryColor(); ?>>
          View All Projects
        </span>
      </a>
    </div>
  </section>

<?php
  wp_reset_postdata();
endif;
