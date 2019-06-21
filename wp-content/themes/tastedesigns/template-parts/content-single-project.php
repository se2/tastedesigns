<?php
/*

template partial for single post type

*/
?>

<?php $theme_colors = new TasteColors(true); ?>

<section id="project-<?php the_ID(); ?>" class="c-single-project min-h-full w-full">

  <?php
  /**
   * Page Title
   */
  ?>
  <div class="c-single-project__header lg:px-50 js-header-blog pb-50 lg:pb-80">
    <h1 class="c-single-project__title font-title text-center text-taste-1 text-60 leading-69 mt-20 lg:mt-0" <?php $theme_colors->getPrimary(); ?>>
      client stories
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
  <div class="c-single-project__content pt-50 pb-70 xl:pb-0 lg:pt-60 mx-auto border-taste-5 lg:border-b-0">
    <div class="c-single-project__inner mx-20 lg:mx-auto max-w-1000">
      <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center">
        <?php the_field('location'); ?>
      </h2>
      <h1 class="c-single-project__title font-title text-taste-1 text-42 leading-57 lg:text-66 lg:leading-89 text-center">
        <?php the_title(); ?>
      </h1>
      <div class="c-single-project__intro entry-content mt-30 lg:mt-40 mb-30 text-center font-body text-16 leading-24 text-taste-6">
        <?php the_content(); ?>
      </div>
      <?php if (have_rows('partners')) : ?>
        <div class="c-single-project__partners">
          <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center border-t-2 border-taste-5 max-w-498 mx-auto pt-40 lg:pt-30">
            Project Partners
          </h2>
          <div class="flex flex-col lg:flex-row mt-20">
          <?php while (have_rows('partners')) : the_row(); ?>
            <div class="c-single-project__partner-item flex-1 my-10">
              <h4 class="c-single-project__intro entry-content text-center font-body text-16 leading-22 lg:leading-24 text-taste-1">
                <?php the_sub_field('title'); ?>:
              </h4>
              <h4 class="c-single-project__intro entry-content text-center font-body text-16 leading-22 lg:leading-24 text-taste-6">
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
  set_query_var('gallery', get_field('gallery'));
  get_template_part('template-parts/shared/gallery');
  ?>

  <?php
  /**
   * blog navigation - previous post || next post || view all
   */
  $nextPost = get_next_post();
  $prevPost = get_previous_post();
  ?>
  <div class="c-single-project__navigation px-10 py-40 lg:px-50 lg:py-55 bg-light flex items-center flex-wrap">
    <div class="min-w-99 lg:min-w-316 mr-auto">
      <?php if (!empty($prevPost)) : ?>
        <a class="no-underline block mr-auto w-full xs:w-auto" href="<?php echo get_permalink($prevPost); ?>">
          <div class="border-2 border-taste-4 px-10 pt-15 pb-10 lg:py-25 lg:px-20 items-center inline-flex flex-col lg:flex-row lg:w-full">
            <img src="<?php get_image_url('reverse-path.png'); ?>" alt="Prev" class="w-40 h-auto lg:mr-18 align-middle order-2 lg-order-1 mt-10 lg:mt-0">
            <div class="w-75 h-50 lg:w-99 lg:h-74 lg:mr-auto order-1 lg-order-2 bg-taste-9">
              <?php echo generate_image(get_post_thumbnail_id($prevPost->ID), 'w-full h-full o-cover'); ?>
            </div>
            <span class="text-12 leading-17.12 tracking-2.57 lg:text-14 lg:leading-17 lg:tracking-3 text-taste-2 uppercase mt-15 lg:mt-0 lg:ml-20 hidden order-3 lg:inline">
              Previous<br>project
            </span>
          </div>
        </a>
      <?php endif; ?>
    </div>

    <div class="mx-auto">
      <a class="border-b-2 lg:border-b-4 border-taste-3 no-underline inline-block" href="<?php echo get_post_type_archive_link('project'); ?>">
        <span class="text-11 tracking-2.91 lg:text-16 leading-30 lg:tracking-4.24 text-taste-1 uppercase hidden xs:inline">View all client stories</span>
        <span class="text-11 tracking-2.91 lg:text-16 leading-30 lg:tracking-4.24 text-taste-1 uppercase xs:hidden">View all</span>
      </a>
    </div>

    <div class="min-w-99 lg:min-w-316 ml-auto">
      <?php if (!empty($nextPost)) : ?>
        <a class="no-underline block w-full xs:w-auto" href="<?php echo get_permalink($nextPost); ?>">
          <div class="border-2 border-taste-4 px-10 pt-15 pb-10 lg:py-25 lg:px-20 items-center inline-flex flex-col lg:flex-row lg:w-full">
            <span class="text-12 leading-17.12 tracking-2.57 lg:text-14 lg:leading-17 lg:tracking-3 text-taste-2 uppercase mt-15 lg:mt-0 lg:mr-20 order-2 lg-order-1 hidden lg:inline">
              Next<br>project
            </span>
            <div class="w-75 h-50 lg:w-99 lg:h-74 lg-order-2 lg:ml-auto bg-taste-9">
              <?php echo generate_image(get_post_thumbnail_id($nextPost->ID), 'w-full h-full o-cover'); ?>
            </div>
            <img src="<?php get_image_url('alternative-path.png'); ?>" alt="Next" class="w-40 h-auto lg:ml-18 align-middle order-1 lg-order-3 mt-10 lg:mt-0">
          </div>
        </a>
      <?php endif; ?>
    </div>
  </div>

</section>
