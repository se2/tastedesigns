<?php
/*

template partial for single post type\

*/
?>

<section>
  <h2>
    Blog Title
  </h2>
  <a href="<?php echo get_permalink( get_page_by_path('blog-archive') ); ?>">RETURN TO ALL BLOG POSTS</a>
</section>


<article id="post-<?php the_ID(); ?>" <?php post_class('min-h-full'); ?> >
  <?php

  ttg_wp_post_thumbnail();

  ?>
  <header class="entry-header">
    <div>
      <?php echo $author; ?> | <?php echo $primaryCat; ?>
    </div>
    <h1 class="entry-title">
      <?php
      the_title();
      ?>
    </h1>
  </header>
  <div class="entry-content">
    <?php
    the_content();

    wp_link_pages( array(
      'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ttg-wp' ),
      'after'  => '</div>',
    ) );
    ?>
  </div>
</article>

<?php

/*

related posts - roughed out

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


  $query = new WP_Query( $args );

  if ( $query->have_posts() )
  {
    ?>
    <div style="display:grid; grid-template-columns: repeat(3, 1fr); grid-gap: 2rem;">
      <?php

      while ( $query->have_posts() )
      {
        $query->the_post();

        ?>
        <div style="">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
          <div>
            <?php echo $primaryCat; ?>
          </div>
          <h2>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
          <a href="<?php the_permalink(); ?>">READ POST</a>
        </div>
        <?php

      }
      ?>
    </div>
    <?php


    wp_reset_postdata();
  }

/*

blog navigation - previous post || next post || view all

*/
  $nextPost = get_next_post();
  $prevPost = get_previous_post();

  ?>
  <div style="display: grid; grid-template-columns: repeat(3, 1fr); grid-gap: 1rem; margin: 3rem 0;">
    <?php

    if ( !empty($prevPost) )
    {
      ?>
      <a href="<?php echo get_permalink( $prevPost ); ?>">PREVIOUS POST</a>
      <?php
    }

    // going to have to figure out how to link to / create a Post archive, since index.php seems inaccessible
    ?>
    <a href="<?php echo get_permalink( $prevPost ); ?>">VIEW ALL BLOG POSTS</a>
    <?php

    if ( !empty($nextPost) )
    {
      ?>
      <a href="<?php echo get_permalink( $nextPost ); ?>">NEXT POST</a>
      <?php
    }

    ?>
  </div>
