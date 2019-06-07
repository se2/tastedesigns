<?php
/*

template partial for single post type

*/
?>

<section id="team-<?php the_ID(); ?>" class="c-single-team min-h-full w-full">

  <?php
  /**
   * Page Title
   */
  ?>
  <div class="c-single-team__header lg:px-50 js-header-blog pb-50 lg:pb-80">
    <h1 class="c-single-team__title font-title text-center text-taste-1 text-60 leading-69 mt-20 lg:mt-0">
      about our team
    </h1>
  </div>

  <?php
  /**
   * Team Member Content
   */
  ?>
  <div class="c-single-team__content flex px-30 pb-70 relative">
    <div class="c-single-team__avatar w-team-avatar h-full bg-taste-9">
      <?php the_post_thumbnail('medium', [
        'class' => 'c-single-team__image block w-full h-full o-center'
      ]); ?>
    </div>
    <div class="c-single-team__body py-150 pl-100 pr-80">
      <h1 class="font-title text-42 leading-57 text-taste-1 mt-20 lg:mt-0">
        <?php the_title(); ?>
      </h1>
      <h2 class="font-body text-16 leading-30.16 tracking-3.71 text-taste-2 no-underline uppercase">
        <?php the_field('position'); ?>
      </h2>
      <h3 class="font-body text-16 leading-24 text-taste-6 font-bold mt-60">
        <?php the_field('certificate'); ?>
      </h3>
      <div class="c-single-team__text-content font-body text-16 leading-24 text-taste-6">
        <?php the_field('content'); ?>
      </div>
    </div>
    <div class="c-single-team__separator absolute bottom-0 left-30px right-30px h-4 bg-taste-5"></div>
  </div>

  <?php
  /**
   * Other Team Members
   */

  set_query_var('title', 'Meet More of Our Team');
  get_template_part('template-parts/blocks/meet-the-team');
  ?>
</section>
