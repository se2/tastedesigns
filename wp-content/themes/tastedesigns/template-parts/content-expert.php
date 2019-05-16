<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">
		<?php

		if ( is_singular() )
		{
			the_title( '<h1 class="entry-title">', '</h1>' );
		}
		else
		{
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( get_post_type() === 'post' )
		{
			?>
			<div class="entry-meta">
				<?php
				ttg_wp_posted_on();
				ttg_wp_posted_by();
				?>
			</div>
			<?php
		}
		?>
	</header>

	<?php ttg_wp_post_thumbnail(); ?>

	<div class="entry-content">
		<?php

		the_content( 
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ttg-wp' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) 
		);

		// custom field - expert gallery
		// TODO: make this actually work with tu's theme
		$expertGallery = get_field('expert_portfolio');

		if ( !empty( $expertGallery ) )
		{
			?>
			<h1>
				Zack's Hideous Gallery
			</h1>
			<div>
				<?php

				foreach ( $expertGallery as $thisGallery )
				{
					if ( !empty( $thisGallery['expert_portfolioItem']['sizes']['medium'] ) )
					{
						?>
						<img src="<?php echo $thisGallery['expert_portfolioItem']['sizes']['medium']; ?>" alt="<?php the_title() ?> - portfolio item" />
						<?php
					}
				}

				?>
			</div>
			<?php
		}

		wp_link_pages( 
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ttg-wp' ),
				'after'  => '</div>',
			)
		);

		?>
	</div>

	<footer class="entry-footer">
		<?php 
		ttg_wp_entry_footer(); 
		?>
	</footer>
</article>
