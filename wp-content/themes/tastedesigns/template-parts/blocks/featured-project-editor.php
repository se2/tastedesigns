<?php
/**
 * Featured Project Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$visible = get_sub_field('visible');
$project = get_sub_field('project');
if ($visible && $project) :
  global $post;
  $post = $project;
  setup_postdata($post);
?>

  <section class="c-featured-project w-full relative py-80">
    <div class="c-featured-project__inner flex">
      <div class="c-featured-project__content w-34% px-50">
        <h2 class="font-title text-42 leading-57 text-taste-4">
          Featured Project
        </h2>
        <?php if (get_field('location')) : ?>
          <h3 class="font-subtitle text-16 leading-24 tracking-4.24 text-taste-2 uppercase mt-45">
            <?php the_field('location'); ?>
          </h3>
        <?php endif; ?>
        <h1 class="font-title text-66 leading-89 text-taste-1">
          <?php the_title(); ?>
        </h1>
        <div class="c-featured-project__body font-body text-16 leading-19 text-taste-6">
          <?php the_excerpt(); ?>
        </div>
        <div class="c-featured-project__separator h-4 w-full bg-taste-5 mt-70"></div>
        <?php if (have_rows('partners')) : ?>
          <h3 class="font-subtitle text-16 leading-24 tracking-4.24 text-taste-2 uppercase mt-30">
            Project Partners
          </h3>
          <?php while (have_rows('partners')) : the_row(); ?>
            <p class="font-body text-16 leading-19 text-taste-6"><?php echo get_sub_field('partner'); ?></p>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <div class="c-featured-project__gallery w-66%">
        <div class="c-featured-project__gallery-inner js-project-gallery">
          <?php $gallery = get_field('gallery'); ?>
          <?php $count = 0; ?>
          <?php foreach ($gallery as $image) : $count++; ?>
            <div class="c-featured-project__image-wrapper p-10 js-project-gallery-item">
              <?php generate_image($image['ID'], 'c-featured-project__image w-full h-featured', 'large'); ?>
            </div>
            <?php if ($count == 4) : break; endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="c-featured-project__bottom w-full px-50 mt-50 flex items-center">
      <a href="<?php echo get_permalink($project); ?>" class="no-underline">
        <div class="c-featured-project__button border-2 border-taste-4 py-25 px-21 items-center inline-flex">
          <span class="font-18 leading-21 tracking-3 text-taste-2 uppercase">Full Project Details</span>
          <img src="<?php get_image_url('alternative-path.png'); ?>" alt="Enter" class="w-50 h-auto ml-30 align-middle">
        </div>
      </a>
      <a href="<?php echo get_post_type_archive_link('project'); ?>" class="border-b-4  border-taste-3 no-underline ml-auto">
        <span class="font-18 leading-21 tracking-3 text-taste-2 uppercase">View All Projects</span>
        </div>
      </a>
    </div>
  </section>

<?php
  wp_reset_postdata();
endif;
