<?php
/**
 * Featured Project Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$project = get_sub_field('project');
if ($project) :
  global $post;
  $post = $project;
  setup_postdata($post);
  $colors = get_theme_colors();
  $override = !empty($colors);
?>

  <section class="c-featured-project w-full relative pt-30 pb-80 lg:py-80">
    <div class="c-featured-project__inner flex flex-col lg:flex-row">
      <div class="c-featured-project__gallery w-full lg:w-66% order lg:pl-40">
        <h2 class="font-title text-30 leading-40 text-taste-4 text-center mb-22 lg:hidden"
        <?php if ($override) : ?>
          style="color:<?php echo $colors['tertiary']; ?>;"
        <?php endif; ?>
        >
          Featured Project
        </h2>
        <div class="c-featured-project__gallery-inner js-project-gallery">
          <?php $gallery = get_field('gallery'); ?>
          <?php $count = 0; ?>
          <?php foreach ($gallery as $image) : $count++; ?>
            <div class="c-featured-project__image-wrapper py-10 px-10 lg:pl-0 lg:pr-20 js-project-gallery-item">
              <?php generate_image($image['ID'], 'c-featured-project__image w-full h-featured-mobile lg:h-featured', 'large'); ?>
            </div>
            <?php if ($count == 4) : break; endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="c-featured-project__content w-full lg:w-34% px-20 lg:px-50">
        <h2 class="font-title text-42 leading-57 text-taste-4 hidden lg:block"
        <?php if ($override) : ?>
          style="color:<?php echo $colors['tertiary']; ?>;"
        <?php endif; ?>
        >
          Featured Project
        </h2>
        <?php if (get_field('location')) : ?>
          <h3 class="font-subtitle text-14 leading-21 tracking-3.71 lg:text-16 lg:leading-24 lg:tracking-4.24 text-taste-2 uppercase mt-30 lg:mt-45"
          <?php if ($override) : ?>
            style="color:<?php echo $colors['primary']; ?>;"
          <?php endif; ?>
          >
            <?php the_field('location'); ?>
          </h3>
        <?php endif; ?>
        <h1 class="font-title text-58 leading-78 lg:text-66 lg:leading-89 tc-primary break-words"
        <?php if ($override) : ?>
          style="color:<?php echo $colors['primary']; ?>;"
        <?php endif; ?>
        >
          <?php the_title(); ?>
        </h1>
        <div class="c-featured-project__body font-body text-14 leading-17 lg:text-16 lg:leading-19 text-taste-6">
          <?php the_excerpt(); ?>
        </div>
        <div class="c-featured-project__separator h-4 w-full bg-taste-5 mt-50 lg:mt-70"></div>
        <?php if (have_rows('partners')) : ?>
          <h3 class="font-subtitle text-14 leading-21 tracking-3.71 lg:text-16 lg:leading-24 lg:tracking-4.24 text-taste-2 uppercase mt-40 lg:mt-30"
          <?php if ($override) : ?>
            style="color:<?php echo $colors['primary']; ?>;"
          <?php endif; ?>
          >
            Project Partners
          </h3>
          <?php while (have_rows('partners')) : the_row(); ?>
            <p class="font-body text-14 leading-17 lg:text-16 lg:leading-19 text-taste-6">
              <?php echo get_sub_field('partner'); ?>
            </p>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="c-featured-project__bottom w-full px-20 lg:px-50 mt-50 flex items-center flex-col lg:flex-row">
      <a href="<?php echo get_permalink($project); ?>" class="no-underline w-full lg:w-auto">
        <div class="c-featured-project__button border-2 border-taste-4 py-25 px-21 items-center inline-flex w-full lg:w-auto"
        <?php if ($override) : ?>
          style="border-color:<?php echo $colors['secondary']; ?>;"
        <?php endif; ?>
        >
          <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase"
          <?php if ($override) : ?>
            style="color:<?php echo $colors['primary']; ?>;"
          <?php endif; ?>
          >
            Full Project Details
          </span>
          <img src="<?php get_image_url('alternative-path.png'); ?>" alt="Enter" class="w-50 h-auto ml-auto lg:ml-30 align-middle">
        </div>
      </a>
      <a href="<?php echo get_post_type_archive_link('project'); ?>" class="c-featured-project__link border-b-4 no-underline mt-50 lg:mt-0 mx-auto lg:mr-0 lg:ml-auto pb-5 lg:pb-0"
      <?php if ($override) : ?>
        style="border-color:<?php echo $colors['secondary']; ?>;"
      <?php endif; ?>
      >
        <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase"
        <?php if ($override) : ?>
          style="color:<?php echo $colors['primary']; ?>;"
        <?php endif; ?>
        >
          View All Projects
        </span>
      </a>
    </div>
  </section>

<?php
  wp_reset_postdata();
endif;
