<?php
/*

template partial for single post type

*/
?>

<?php $alter = is_page_template( 'templates/single-sidebar.php' ); ?>

<section class="c-blog">

  <div class="c-blog__header lg:px-50 js-header-blog">
    <h1 class="c-blog__title font-title text-center text-taste-1 text-60 leading-69 mt-20 lg:mt-0 <?php echo $alter ? 'pb-40 lg:pb-60' : ''; ?>">
      Blog Title
    </h1>
    <?php if (!$alter) : ?>
      <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="flex items-center uppercase no-underline text-taste-2 font-subtitle text-12 leading-17.12 tracking-2.57 lg:text-14 lg:leading-17 lg:tracking-3 py-25 px-50 lg:px-0 lg:pt-40 lg:pb-30 border-2 border-taste-5 lg:border-0 flex items-center mt-40 lg:mt-0">
        <img src="<?php get_image_url('reverse-path.png'); ?>" alt="Return" class="w-40 h-auto mr-20">
        <span class="ml-auto lg:ml-0">Return to all blog posts</span>
      </a>
    <?php endif; ?>
  </div>

  <?php if (get_post_type() == 'post') : ?>
    <div class="blog-content flex flex-wrap relative w-full js-content-blog">
  <?php endif; ?>

  <?php $post_class = ($alter ? ' lg:w-9/12 lg:px-50' : ''); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class('c-single-post min-h-full w-full' . $post_class); ?> >
    <?php if (has_post_thumbnail()) : ?>
      <div class="c-blog__image-wrapper w-full h-blog-image <?php echo ($alter) ? 'lg:h-alt-blog-image' : ''; ?>">
        <?php the_post_thumbnail('massive', [
          'class' => 'c-blog__image w-full h-full'
        ]); ?>
      </div>
    <?php endif; ?>
    <div class="c-blog__content pt-50 lg:pt-60 pb-70 lg:pb-140 <?php if (!$alter) : echo 'max-w-1000'; endif; ?> mx-auto border-b-2 border-taste-5 lg:border-b-0">
      <div class="c-blog__inner mx-20 lg:mx-0">
        <h2 class="font-subtitle text-12 leading-30.12 tracking-3.18 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center <?php if ($alter) : ?>lg:text-left<?php endif; ?>">
          <?php echo $author; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $primaryCat; ?>
        </h2>
        <h1 class="c-blog__title font-title text-taste-1 text-48 leading-52.48 lg:text-60 lg:leading-69 text-center <?php if ($alter) : ?>lg:text-left<?php endif; ?>">
          <?php the_title(); ?>
        </h1>
        <div class="c-blog__body entry-content mt-50 lg:mt-70 mb-50 clearfix">
          <?php the_content(); ?>
        </div>
      </div>
      <div class="c-blog__comment">
        <?php comments_template(); ?>
      </div>
    </div>
  </article>

  <?php if (get_post_type() == 'post') : ?>
      <?php if ($alter) : ?>
        <?php get_sidebar('blogs'); ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>

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
    <div class="c-blog__related pt-80 pb-100 px-30 bg-taste-8 border-t-2 border-b-2 border-taste-4 hidden lg:block">
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

  <div class="c-blog__navigation px-20 lg:px-50 py-55 bg-light flex items-center flex-wrap">
    <div class="mx-auto md:hidden pb-50">
      <a class="border-b-4 border-taste-3 no-underline inline-block" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">
        <span class="text-16 leading-30 tracking-3.56 lg:tracking-4.24 text-taste-1 uppercase">View all blog posts</span>
      </a>
    </div>

    <div class="min-w-full xs:min-w-158 lg:min-w-316 mr-auto">
      <?php if (!empty($prevPost)) : ?>
        <a class="no-underline block mr-auto w-full xs:w-auto" href="<?php echo get_permalink($prevPost); ?>">
          <div class="border-2 border-taste-4 py-30 px-15 lg:py-50 lg:px-21 items-center inline-flex flex-col lg:flex-row w-full">
            <img src="<?php get_image_url('reverse-path.png'); ?>" alt="Prev" class="w-40 h-auto lg:mr-30 align-middle">
            <span class="text-12 leading-17.12 tracking-2.57 lg:text-14 lg:leading-17 lg:tracking-3 text-taste-2 uppercase mt-15 lg:mt-0 lg:ml-auto">
              Previous post
            </span>
          </div>
        </a>
      <?php endif; ?>
    </div>

    <div class="mx-auto hidden md:block">
      <a class="border-b-4 border-taste-3 no-underline inline-block" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">
        <span class="text-16 leading-30 tracking-4.24 text-taste-1 uppercase">View all blog posts</span>
      </a>
    </div>

    <div class="min-w-full xs:min-w-158 lg:min-w-316 ml-auto">
      <?php if (!empty($nextPost)) : ?>
        <a class="no-underline block w-full xs:w-auto mt-50 xs:mt-0" href="<?php echo get_permalink($nextPost); ?>">
          <div class="border-2 border-taste-4 py-30 px-15 lg:py-50 lg:px-21 items-center inline-flex flex-col lg:flex-row w-full">
            <span class="text-12 leading-17.12 tracking-2.57 lg:text-14 lg:leading-17 lg:tracking-3 text-taste-2 uppercase mt-15 lg:mt-0 lg:mr-auto order-2 lg-order-1">
              Next post
            </span>
            <img src="<?php get_image_url('alternative-path.png'); ?>" alt="Next" class="w-40 h-auto lg:ml-30 align-middle order-1 lg-order-2">
          </div>
        </a>
      <?php endif; ?>
    </div>
  </div>

</section>
