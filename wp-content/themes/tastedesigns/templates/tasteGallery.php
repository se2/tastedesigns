 <?php
/*
Template Name: Gallery At Taste
Post-type: Page


TODO:
- remove all inline styles - this is just a placeholder until Tu touches this template

*/

get_header();

if ( have_posts() )
{
	?>
	<div id="primary" class="content-area min-h-full h-full">
		<main id="main" class="site-main min-h-full h-full">
			<?php

			while ( have_posts() )
			{
				the_post();

				?>
				<header>
					<h1>
						<?php the_title(); ?>
					</h1>
				</header>
				<section>
					<?php
					the_content();
					?>
				</section>
				<?php
			}
			?>
		</main>
	</div>
	<?php
}

// choose the Featured Artist / Expert that has been selected
$featuredArtist = get_field('gallery_featuredArtist');

if ( !empty( $featuredArtist ) )
{
	// Expert post-title / name
	if ( !empty( $featuredArtist->post_title ) )
	{
		?>
		<div>
			<?php 
			echo $featuredArtist->post_title;
			?>
		</div>
		<?php
	}

	// Expert featured image / headshot / profile picture
	if ( has_post_thumbnail( $featuredArtist ) )
	{
		?>
		<div>
			<?php echo get_the_post_thumbnail( $featuredArtist ); ?>
		</div>
		<?php
	}

	// Expert post-content / bio / description 
	if ( !empty( $featuredArtist->post_content ) )
	{
		?>
		<div>
			<?php echo $featuredArtist->post_content; ?>
		</div>
		<?php
	}
}

// access all remaining Experts
$args = array(
	'posts_per_page'	=>	1000,
	'post_type'			=>	'expert',
	'orderby'			=>	'title',
	'order'				=>	'ASC',
);
$query = new WP_Query( $args );

if ( $query->have_posts() )
{
	?>
	<div style="display: grid; grid-template-columns: repeat(3, 1fr); grid-gap: 1rem;">
		<?php

		while ( $query->have_posts() )
		{
			$query->the_post();

			// de-dupe the Featured Artist from the tiling of other artists
			if ( get_the_ID() !== $featuredArtist->ID )
			{
				$jobTitle = get_field('expert_jobTitle', get_the_ID() );
				?>
				<div>
					<a href="<?php echo get_permalink(); ?>" style="display: block;">
						<?php

						if ( has_post_thumbnail( get_post() ) )
						{
							?>
							<div>
								<?php
								echo get_the_post_thumbnail( get_post(), 'thumbnail' );
								?>
							</div>
							<?php
						}

						?>
						<h2>
							<?php the_title(); ?>
						</h2>
					</a>
				</div>
				<?php
			}

		}

		?>
	</div>
	<?php
	

	wp_reset_postdata();
}

?>


<?php
get_footer();
