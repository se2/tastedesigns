<?php
/*

template partial for single post type

*/
?>

<section id="project-<?php the_ID(); ?>" class="c-single-project min-h-full w-full">

  <?php
  /**
   * Page Title
   */
  ?>
  <div class="c-single-project__header lg:px-50 js-header-blog pb-80">
    <h1 class="c-single-project__title font-title text-center text-taste-1 text-60 leading-69 mt-20 lg:mt-0">
      projects
    </h1>
  </div>

  <?php
  /**
   * Featured Image
   */
  ?>
  <?php if (has_post_thumbnail()) : ?>
    <div class="c-single-project__image-wrapper w-full h-blog-image">
      <?php the_post_thumbnail('massive', [
        'class' => 'c-single-project__image w-full h-full h-blog-image'
      ]); ?>
    </div>
  <?php endif; ?>

  <?php
  /**
   * Title - Subtitle - Intro - Partners
   */
  ?>
  <div class="c-single-project__content pt-50 lg:pt-60 mx-auto border-b-2 border-taste-5 lg:border-b-0">
    <div class="c-single-project__inner mx-20 lg:mx-auto max-w-1000">
      <h2 class="font-subtitle text-12 leading-30.12 tracking-3.18 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center">
        <?php the_field('location'); ?>
      </h2>
      <h1 class="c-single-project__title font-title text-taste-1 text-48 leading-52.48 lg:text-66 lg:leading-89 text-center">
        <?php the_title(); ?>
      </h1>
      <div class="c-single-project__intro entry-content mt-40 mb-30 text-center font-body text-16 leading-24 text-taste-6">
        <?php the_content(); ?>
      </div>
      <?php if (have_rows('partners')) : ?>
        <div class="c-single-project__partners">
          <h2 class="font-subtitle text-12 leading-30.12 tracking-3.18 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center border-t-2 border-taste-5 max-w-498 mx-auto pt-30">
            Project Partners
          </h2>
          <div class="flex mt-20">
          <?php while (have_rows('partners')) : the_row(); ?>
            <div class="c-single-project__partner-item flex-1">
              <h4 class="c-single-project__intro entry-content text-center font-body text-16 leading-24 text-taste-1">
                <?php the_sub_field('title'); ?>:
              </h4>
              <h4 class="c-single-project__intro entry-content text-center font-body text-16 leading-24 text-taste-6">
                <?php the_sub_field('partner'); ?>
              </h4>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <?php
  /**
   * Project Editor
   */
  get_template_part('template-parts/page', 'blocks');
  ?>

  <?php
  /**
   * Gallery
   */
  ?>
  <div class="c-single-project__gallery pt-60">
    <h1 class="font-title text-30 leading-40 text-taste-3 text-center">
      Full Project Gallery
    </h1>
    <h4 class="entry-content text-center font-body text-16 leading-24 text-taste-1 mt-30">
      Photographer:
    </h4>
    <h4 class="entry-content text-center font-body text-16 leading-24 text-taste-6">
      <?php the_field('photographer'); ?>
    </h4>
    <div class="c-single-project__gallery-wrapper pt-40">
      <div class="c-single-project__gallery-inner mx-n5 flex flex-wrap">
        <?php $gallery = get_field('gallery'); ?>
        <?php foreach ($gallery as $image) : ?>
          <div class="c-single-project__gallery-image-warpper p-5 h-gallery-image
          <?php if ($image['width'] > $image['height']) : ?>w-1/2<?php else : ?>w-1/4<?php endif; ?>
          ">
            <div class="c-single-project__gallery-image-inner w-full h-full">
              <?php generate_image($image['ID'], 'c-single-project__gallery-image w-full h-full o-cover', 'medium'); ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="c-single-project__gallery-popup fixed w-full h-full top-0 left-0 px-70 pt-30 pb-20">
      <div class="c-single-project__gallery-popup-underlay absolute w-full h-full top-0 left-0 bg-taste-7 opacity-60"></div>
      <div class="c-single-project__gallery-popup-slider js-gallery-slider w-full h-m90 relative">
        <?php foreach ($gallery as $image) : ?>
          <?php generate_image($image['ID'], 'c-single-project__gallery-popup-image w-full h-full o-contain', 'massive'); ?>
        <?php endforeach; ?>
      </div>
      <div class="c-single-project__gallery-popup-thumbnails js-gallery-thumbnails w-full h-90 relative mt-15">
        <?php foreach ($gallery as $image) : ?>
          <?php generate_image($image['ID'], 'c-single-project__gallery-popup-image w-auto h-full mx-5', 'tiny'); ?>
        <?php endforeach; ?>
      </div>
      <img src="<?php get_image_url('arrow-left.png'); ?>" alt="Prev" class="w-auto h-40 mr-30 js-gallery-left relative">
      <img src="<?php get_image_url('arrow-right.png'); ?>" alt="Next" class="w-auto h-40 ml-30 js-gallery-right relative">
      <h3 class="font-body text-14 leading-21 tracking-3.5 text-light js-gallery-index text-center uppercase mt-15 relative">Image 02/50</h3>
    </div>
  </div>

  <?php
  /**
   * blog navigation - previous post || next post || view all
   */
  $nextPost = get_next_post();
  $prevPost = get_previous_post();
  ?>
  <div class="c-single-project__navigation px-20 lg:px-50 py-55 bg-light flex items-center flex-wrap">
    <div class="mx-auto md:hidden pb-50">
      <a class="border-b-4 border-taste-3 no-underline inline-block" href="<?php echo get_post_type_archive_link('project'); ?>">
        <span class="text-16 leading-30 tracking-3.56 lg:tracking-4.24 text-taste-1 uppercase">View all projects</span>
      </a>
    </div>

    <div class="min-w-full xs:min-w-158 lg:min-w-316 mr-auto">
      <?php if (!empty($prevPost)) : ?>
        <a class="no-underline block mr-auto w-full xs:w-auto" href="<?php echo get_permalink($prevPost); ?>">
          <div class="border-2 border-taste-4 py-30 px-15 lg:py-50 lg:px-21 items-center inline-flex flex-col lg:flex-row w-full">
            <img src="<?php get_image_url('reverse-path.png'); ?>" alt="Prev" class="w-40 h-auto lg:mr-30 align-middle">
            <span class="text-12 leading-17.12 tracking-2.57 lg:text-14 lg:leading-17 lg:tracking-3 text-taste-2 uppercase mt-15 lg:mt-0 lg:ml-auto">
              Previous project
            </span>
          </div>
        </a>
      <?php endif; ?>
    </div>

    <div class="mx-auto hidden md:block">
      <a class="border-b-4 border-taste-3 no-underline inline-block" href="<?php echo get_post_type_archive_link('project'); ?>">
        <span class="text-16 leading-30 tracking-4.24 text-taste-1 uppercase">View all projects</span>
      </a>
    </div>

    <div class="min-w-full xs:min-w-158 lg:min-w-316 ml-auto">
      <?php if (!empty($nextPost)) : ?>
        <a class="no-underline block w-full xs:w-auto mt-50 xs:mt-0" href="<?php echo get_permalink($nextPost); ?>">
          <div class="border-2 border-taste-4 py-30 px-15 lg:py-50 lg:px-21 items-center inline-flex flex-col lg:flex-row w-full">
            <span class="text-12 leading-17.12 tracking-2.57 lg:text-14 lg:leading-17 lg:tracking-3 text-taste-2 uppercase mt-15 lg:mt-0 lg:mr-auto order-2 lg-order-1">
              Next project
            </span>
            <img src="<?php get_image_url('alternative-path.png'); ?>" alt="Next" class="w-40 h-auto lg:ml-30 align-middle order-1 lg-order-2">
          </div>
        </a>
      <?php endif; ?>
    </div>
  </div>

</section>
