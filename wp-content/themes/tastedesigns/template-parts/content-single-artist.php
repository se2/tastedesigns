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
  <div class="c-single-artist__header px-20 lg:px-0">
    <h1 class="c-single-artist__title font-title text-center text-taste-1 text-60 leading-69 mt-20 lg:mt-0">
      gallery at taste
    </h1>
  </div>

  <?php
  /**
   * Featured Image
   */
  ?>
  <?php if (has_post_thumbnail()) : ?>
    <div class="c-single-artist__image-wrapper w-full px-20 lg:px-0 lg:w-1/2 mx-auto">
      <?php the_post_thumbnail('massive', [
        'class' => 'c-single-artist__image w-full'
      ]); ?>
    </div>
  <?php endif; ?>

  <?php
  /**
   * Title - Subtitle - Intro - Partners
   */
  ?>
  <div class="c-single-artist__content mx-auto border-taste-5 border-b-2">
    <div class="c-single-artist__inner mx-20 lg:mx-auto">
      <h1 class="c-single-artist__title font-title text-taste-1 text-42 leading-57 lg:text-66 lg:leading-89 text-center">
        <?php the_title(); ?>
      </h1>
      <div class="c-single-artist__intro entry-content text-center font-body text-24 text-taste-6">
        <?php the_content(); ?>
      </div>
    </div>
  </div>

  <?php
  /**
   * Gallery
   */
  get_template_part('template-parts/shared/gallery');
  ?>

  <?php
  /**
   * blog navigation -  view all
   */
  ?>
  <div class="c-single-artist__navigation px-20 bg-light flex items-center flex-wrap">
    <div class="mx-auto">
      <a class="border-b-2 lg:border-b-4 border-taste-3 no-underline inline-block" href="<?php echo get_post_type_archive_link('artist'); ?>">
        <span class="text-11 tracking-2.91 lg:text-18 leading-30.18 lg:tracking-4 text-taste-2 uppercase hidden xs:inline">View all artists</span>
        <span class="text-11 tracking-2.91 lg:text-18 leading-30.18 lg:tracking-4 text-taste-1 uppercase xs:hidden">View all</span>
      </a>
    </div>
  </div>

</section>
