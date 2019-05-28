<?php
/*

template partial for single post type

*/
?>

<section class="c-blog">

  <div class="c-blog__header px-50">
    <h1 class="c-blog__title font-title text-center text-taste-1 text-60 leading-69">
      Blog Title
    </h1>
    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="flex items-center uppercase no-underline text-taste-2 font-subtitle text-14 leading-17 tracking-3 mt-40 mb-30">
      <img src="<?php get_image_url('reverse-path.png'); ?>" alt="Return" class="w-40 h-auto mr-20">
      return to all blog posts
    </a>
  </div>

  <article id="post-<?php the_ID(); ?>" <?php post_class('min-h-full'); ?> >
    <div class="c-blog__image-wrapper w-full h-blog-image">
      <?php
        the_post_thumbnail('massive', [
          'class' => 'c-blog__image w-full h-full'
        ]);
      ?>
    </div>
    <div class="c-blog__content pt-60 pb-140 max-w-1000 mx-auto">
      <h2 class="font-subtitle text-16 leading-30 tracking-4.24 text-taste-2 uppercase text-center">
        <?php echo $author; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $primaryCat; ?>
      </h2>
      <h1 class="c-blog__title font-title text-center text-taste-1 text-60 leading-69">
        <?php the_title(); ?>
      </h1>
      <div class="c-blog__body entry-content mt-70 mb-50 clearfix">
        <?php the_content(); ?>
      </div>
      <div class="c-blog__comment">
        <?php comments_template(); ?>
      </div>
    </div>
  </article>

  <?php
  /**
   * related posts - roughed out
   */
  $args = array (
    'post_type'			=>	'post',
    'posts_per_page'	=>	3,
    'orderby'			=>	'date',
    'order'				=>	'ASC',
    'post__not_in'		=>	array( get_the_ID() ),
  );

  if (
    !empty( $cats ) &&
    !empty( $cats[0] )
  )
  {
    $args['cat'] = $cats[0]->term_id;
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) : ?>
    <div class="c-blog__related pt-80 pb-100 px-30 bg-taste-8 border-t-2 border-b-2 border-taste-4">
      <h2 class="font-title text-42 leading-57 text-taste-4 capitalize text-center px-20">
        You might also like:
      </h2>
      <div class="c-blog__related-content flex pt-65">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
          <div class="c-blog__related-item flex-1 bg-light px-20 py-30 mx-20 flex flex-col">
            <a href="<?php the_permalink(); ?>">
              <div class="c-blog__related-thumbnail w-full h-related-image bg-taste-8">
                <?php the_post_thumbnail('small', [
                  'class' => 'c-blog__related-image w-full h-full o-center'
                ]); ?>
              </div>
            </a>
            <h2 class="font-subtitle text-16 leading-30 tracking-4.24 text-taste-2 uppercase mt-25">
              <?php echo $primaryCat; ?>
            </h2>
            <a class="no-underline mb-auto" href="<?php the_permalink(); ?>">
              <h1 class="font-title text-taste-1 text-42 leading-57 capitalize">
                <?php the_title(); ?>
              </h1>
            </a>
            <div class="c-blog__related-link mt-25">
              <a class="border-b-4 border-taste-3 no-underline inline-block" href="<?php the_permalink(); ?>">
                <span class="text-16 leading-30 tracking-4.24 text-taste-1 uppercase">Read Post</span>
              </a>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php wp_reset_postdata();
  endif; ?>

  <?php
  /**
   * blog navigation - previous post || next post || view all
   */
  $nextPost = get_next_post();
  $prevPost = get_previous_post();
  ?>

  <div class="c-blog__navigation px-50 py-55 bg-light flex items-center">
    <?php if (!empty($prevPost)) : ?>
      <a class="no-underline block" href="<?php echo get_permalink($prevPost); ?>">
        <div class="border-2 border-taste-4 py-50 px-21 items-center inline-flex min-w-316">
          <img src="<?php get_image_url('reverse-path.png'); ?>" alt="Prev" class="w-40 h-auto mr-30 align-middle">
          <span class="text-14 leading-17 tracking-3 text-taste-2 uppercase ml-auto">
            Previous post
          </span>
        </div>
      </a>
    <?php endif; ?>

    <div class="mx-auto">
      <a class="border-b-4 border-taste-3 no-underline inline-block" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">
        <span class="text-16 leading-30 tracking-4.24 text-taste-1 uppercase">View all blog posts</span>
      </a>
    </div>

    <?php if (!empty($nextPost)) : ?>
      <a class="no-underline block" href="<?php echo get_permalink($nextPost); ?>">
        <div class="border-2 border-taste-4 py-50 px-21 items-center inline-flex min-w-316">
          <span class="text-14 leading-17 tracking-3 text-taste-2 uppercase mr-auto">
            Next post
          </span>
          <img src="<?php get_image_url('alternative-path.png'); ?>" alt="Next" class="w-40 h-auto ml-30 align-middle">
        </div>
      </a>
    <?php endif; ?>
  </div>

</section>
