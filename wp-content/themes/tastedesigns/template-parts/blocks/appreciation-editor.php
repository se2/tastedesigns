<?php
/**
 * Appreciation Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$testimonial = get_sub_field('testimonial');
if ($testimonial) :
?>

  <section class="c-appreciation w-full relative flex">
    <div class="c-appreciation__content py-70 px-0 lg:pl-50 lg:pr-50">
      <h2 class="font-title text-30 leading-40 text-center lg:text-left lg:text-42 lg:leading-57 text-taste-4">
        Appreciation
      </h2>
      <?php if (get_sub_field('location')) : ?>
        <h3 class="font-subtitle text-14 leading-21 tracking-3.71 lg:text-16 lg:leading-24 lg:tracking-4.24 text-taste-2 uppercase mt-30 lg:mt-45">
          <?php echo get_sub_field('location'); ?>
        </h3>
      <?php endif; ?>
      <h1 class="font-title text-58 leading-78 lg:text-66 lg:leading-89 text-taste-1 break-words">
        <?php echo get_sub_field('title'); ?>
      </h1>

      <?php
        if ($testimonial) :
          global $post;
          $post = $testimonial;
          setup_postdata($post);
      ?>
        <div class="c-appreciation__content-inner pt-60">
          <blockquote class="c-appreciation__quote font-body text-24 leading-28 text-taste-6 pl-75 relative">
            <?php the_content(); ?>
            <h4 class="font-body text-18 leading-28 tracking-4 text-taste-2 uppercase flex flex-row items-center">
              <span class="w-50 h-2 bg-taste-3 mr-16"></span>
              <?php the_title(); ?>
            </h4>
          </blockquote>
          <?php $link = get_sub_field('url'); ?>
          <?php if ($link) : ?>
            <a href="<?php echo $link['url']; ?>" targte="<?php echo $link['target']; ?>" class="no-underline w-full lg:w-auto ml-75 mt-60 block">
              <div class="c-featured-project__button border-2 border-taste-4 py-25 px-60 items-center inline-flex w-full lg:w-auto">
                <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase">Read Story</span>
              </div>
            </a>
          <?php endif; ?>
        </div>
      <?php
          wp_reset_postdata();
        endif;
      ?>
    </div>
    <?php
      if ($testimonial) :
        global $post;
        $post = $testimonial;
        setup_postdata($post);
    ?>
      <div class="c-appreciation__image-container ml-50 w-appreciation">
        <?php generate_image(get_post_thumbnail_id(get_the_ID()), 'c-appreciation__image h-full w-full', 'medium'); ?>
      </div>
    <?php
        wp_reset_postdata();
      endif;
    ?>
  </section>

<?php
endif;
