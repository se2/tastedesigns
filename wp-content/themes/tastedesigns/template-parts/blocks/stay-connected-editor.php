<?php
/**
 * Stay Connected Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$colors = get_theme_colors();
$override = !empty($colors);
?>

<section class="c-stay-connected w-full relative py-70 px-0 lg:px-30 bg-taste-5"
<?php if ($override) : ?>
  style="background-color:<?php echo $colors['tertiary']; ?>;"
<?php endif; ?>
>
  <h2 class="font-title text-30 leading-40 text-center lg:text-left lg:text-42 lg:leading-57 text-taste-3 px-20">
    Stay Connected
  </h2>
  <div class="c-stay-connected__inner flex flex-col lg:flex-row">
    <?php
      $blog_type = get_sub_field('blog_post_type');
      if ($blog_type == 'latest') :
        $blogs = wp_get_recent_posts(array('numberposts' => '1'));
        if (count($blogs)) :
          $blog = $blogs[0];
        endif;
      else :
        $blog = get_sub_field('blog_post');
      endif;
      if ($blog) :
        global $post;
        $post = $blog;
        setup_postdata($post);
    ?>
      <div class="c-stay-connected__blog px-20 py-40 lg:px-65 lg:py-60 bg-light lg:w-half clearfix mx-20 mt-60 flex flex-col">
        <h3 class="font-subtitle text-12 leading-18 tracking-3.63 lg:text-14 lg:leading-21 lg:tracking-4.24 text-taste-2 uppercase break-words">
          In Good Taste
        </h3>
        <h1 class="font-title text-42 leading-57 lg:text-58 lg:leading-78 tc-primary"
        <?php if ($override) : ?>
          style="color:<?php echo $colors['primary']; ?>;"
        <?php endif; ?>
        >
          Blog
        </h1>
        <div class="c-stay-connected__image-wrapper mt-20 mb-30 lg:my-30 h-featured-blog-mobile lg:h-featured-blog">
          <?php generate_image(get_post_thumbnail_id(get_the_ID()), 'c-stay-connected__blog-photo w-full h-full', 'medium'); ?>
        </div>
        <h4 class="font-body text-24 leading-28 lg:text-30 lg:leading-36 text-taste-2"
        <?php if ($override) : ?>
          style="color:<?php echo $colors['secondary']; ?>;"
        <?php endif; ?>
        >
          <?php the_title(); ?>
        </h4>
        <div class="c-stay-connected__body font-body text-14 leading-17 lg:text-16 lg:leading-19 text-taste-6">
          <?php the_excerpt(); ?>
        </div>
        <a href="<?php echo get_permalink($post); ?>" class="no-underline block mt-20 lg:mt-40 mb-auto">
          <div class="c-stay-connected__button border-2 border-taste-4 py-25 px-21 items-center inline-flex"
          <?php if ($override) : ?>
            style="border-color:<?php echo $colors['tertiary']; ?>;"
          <?php endif; ?>
          >
            <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase"
            <?php if ($override) : ?>
              style="color:<?php echo $colors['secondary']; ?>;"
            <?php endif; ?>
            >
              Read More
            </span>
            <img src="<?php get_image_url('alternative-path.png'); ?>" alt="Enter" class="w-50 h-auto ml-30 align-middle">
          </div>
        </a>
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="c-stay-connected__link border-b-4 border-taste-3 no-underline mx-auto lg:mr-0 lg:ml-auto pb-5 float-right mt-30 lg:mt-40">
          <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase"
          <?php if ($override) : ?>
            style="color:<?php echo $colors['secondary']; ?>;"
          <?php endif; ?>
          >
            View All Posts
          </span>
        </a>
      </div>
    <?php
        wp_reset_postdata();
      endif;
    ?>
    <div class="c-stay-connected__instagram px-20 py-40 lg:px-65 lg:py-60 bg-light lg:w-half clearfix mx-20 mt-60 flex flex-col">
      <h3 class="font-subtitle text-12 leading-18 tracking-3.63 lg:text-14 lg:leading-21 lg:tracking-4.24 text-taste-2 uppercase break-words">
        <?php echo get_sub_field('instagram_handle'); ?>
      </h3>
      <h1 class="font-title text-42 leading-57 lg:text-58 lg:leading-78 tc-primary"
      <?php if ($override) : ?>
        style="color:<?php echo $colors['primary']; ?>;"
      <?php endif; ?>
      >
        Instagram
      </h1>
      <div class="c-stay-connected__image-wrapper mt-30 lg:w-featured-instagram h-featured-instagram-mobile lg:h-featured-instagram mb-auto">
        <?php generate_image(get_sub_field('instagram_cover'), 'c-stay-connected__instagram-cover w-full h-full', 'medium'); ?>
      </div>
      <a href="<?php echo get_sub_field('instagram_account'); ?>" class="c-stay-connected__link border-b-4 border-taste-3 no-underline mx-auto lg:mr-0 lg:ml-auto pb-5 float-right mt-30 lg:mt-40">
        <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase"
        <?php if ($override) : ?>
          style="color:<?php echo $colors['secondary']; ?>;"
        <?php endif; ?>
        >
          Follow Us
        </span>
      </a>
    </div>
  </div>
</section>
