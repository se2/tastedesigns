<?php
/**
 * Appreciation Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$testimonial = get_sub_field('testimonial');
$location = get_sub_field('location');
$title = get_sub_field('title');
$link = get_sub_field('url');
if ($testimonial) :
  global $post;
  $post = $testimonial;
  setup_postdata($post);
  $colors = new TasteColors();
?>

  <section class="c-appreciation w-full relative flex flex-col lg:flex-row">
    <div class="c-appreciation__content py-70 px-0 lg:pl-50 lg:pr-50 flex-1">
      <h2 class="font-title text-30 leading-40 text-center lg:text-left lg:text-42 lg:leading-57 text-taste-4" <?php $colors->getSecondary(); ?>>
        Appreciation
      </h2>
      <?php if ($location) : ?>
        <h3 class="font-subtitle text-14 leading-21 tracking-3.71 lg:text-16 lg:leading-24 lg:tracking-4.24 text-taste-2 uppercase mt-60 lg:mt-30 lg:mt-45 px-40 lg:px-0" <?php $colors->getPrimary(); ?>>
          <?php echo $location; ?>
        </h3>
      <?php endif; ?>
      <h1 class="font-title text-42 leading-57 lg:text-66 lg:leading-89 tc-primary break-words px-40 lg:px-0" <?php $colors->getPrimary(); ?>>
        <?php echo $title; ?>
      </h1>
      <div class="c-appreciation__content-inner pt-20 lg:pt-60 px-40 lg:px-0">
        <blockquote class="c-appreciation__quote font-body text-20 leading-36 lg:text-24 lg:leading-28 text-taste-6 lg:pl-75 lg:pr-0 pt-75 lg:pt-0 relative">
          <?php get_quote_svg('c-appreciation__quote-mark absolute top-0 left-0 w-90 h-65 lg:w-70 lg:h-50 o-contain fill-taste-1', $colors->getSecondary(TasteColors::FILL, false)); ?>
          <?php the_content(); ?>
          <h4 class="font-body text-18 leading-28 tracking-4 text-taste-2 uppercase flex flex-row items-center" <?php $colors->getPrimary(); ?>>
            <span class="w-50 h-2 bg-taste-3 mr-16" <?php $colors->getTertiary(TasteColors::BACKGROUND); ?>></span>
            <?php the_title(); ?>
          </h4>
        </blockquote>
        <?php if ($link) : ?>
          <a href="<?php echo $link['url']; ?>" targte="<?php echo $link['target']; ?>" class="no-underline w-full lg:w-auto lg:ml-75 mt-40 lg:mt-60 block">
            <div class="c-featured-project__button border-2 border-taste-4 py-25 px-60 w-full lg:w-auto  lg:items-center lg:inline-flex text-center" <?php $colors->getSecondary(TasteColors::BORDER); ?>>
              <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase text-center">Read Story</span>
            </div>
          </a>
        <?php endif; ?>
      </div>
    </div>
    <div class="c-appreciation__image-container lg:ml-50 w-full h-appreciation-mobile lg:h-auto lg:w-appreciation overflow-hidden relative">
      <?php generate_image(get_post_thumbnail_id(get_the_ID()), 'c-appreciation__image h-full w-full o-cover absolute top-0 left-0', 'medium'); ?>
    </div>
  </section>

<?php
  wp_reset_postdata();
endif;
