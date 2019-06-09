 <?php
/**
 * Template Name: Gallery At Taste
 *
 * @category   Template
 * @package    Galileo
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

get_header();
if (have_posts()) : ?>
	<div id="primary" class="content-area min-h-full h-full">
		<main id="main" class="site-main min-h-full h-full">
			<?php while (have_posts()) : the_post(); ?>
				<section id="page-<?php the_ID(); ?>" class="c-gallery min-h-full w-full">

					<?php
					/**
					 * Page Title
					 */
					?>
					<div class="c-gallery__header px-20 xl:px-50 js-header-blog pb-50 xl:pb-80">
						<h1 class="c-gallery__title font-title text-center text-taste-1 text-60 leading-69 mt-20 xl:mt-0 lowercase">
							<?php the_title(); ?>
						</h1>
					</div>

					<?php
					/**
					 * Featured Artist
					 */
					$artist = get_field('featured_artist');
					if (!empty($artist)) :
						global $post;
						$post = $artist;
						setup_postdata($post);
					?>
						<div class="c-gallery-artist w-full flex flex-col xl:flex-row relative">
							<div class="c-gallery-artist__image-wrapper xl:w-1/2 relative h-project-block xl:h-auto">
								<?php the_post_thumbnail('medium', [
									'class' => 'c-gallery-artist__image w-full h-full o-cover absolute top-0 left-0'
								]); ?>
							</div>
							<div class="c-gallery-artist__content pl-20 xl:pl-145 xl:w-1/2 relative bg-taste-5 pt-50 xl:pt-75 pb-50 xl:pb-65 pr-20 xl:pr-145">
								<div class="c-gallery-artist__content-inner">
									<h2 class="font-subtitle text-14 leading-15.69/14 tracking-4.05 xl:text-16 xl:leading-15.69 xl:tracking-4.63 text-taste-2 uppercase">
										Featured Artist
									</h2>
									<h1 class="font-title text-40 leading-50/40 xl:text-42 xl:leading-50/42 text-taste-1">
										<?php the_title(); ?>
									</h1>
									<div class="c-gallery-artist__body font-body text-14 leading-21 xl:text-16 xl:leading-24 text-taste-6">
										<?php the_content(); ?>
									</div>
									<a href="<?php the_permalink(); ?>" class="no-underline w-full lg:w-auto mt-50 block">
										<div class="c-gallery-artist__button border-2 border-taste-4 py-25 px-21 items-center inline-flex w-full lg:w-auto">
											<span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase">View Artist</span>
											<img src="<?php get_image_url('alternative-path.png'); ?>" alt="Enter" class="w-50 h-auto ml-auto lg:ml-30 align-middle">
										</div>
									</a>
								</div>
							</div>
						</div>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>

					<?php
					/**
					 * Artists
					 */

					$args = array (
						'post_type' => 'artist',
						'posts_per_page' => -1,
						'orderby' => 'date',
						'order' => 'ASC',
					);
					$query = new WP_Query($args);
					?>

					<?php if ($query->have_posts()) : ?>
						<div class="c-artists w-full py-60 lg:py-100">
							<h1 class="font-title text-40 leading-50/40 lg:text-66 lg:leading-89 text-taste-1 text-center capitalize">
								Artists
							</h1>
							<div class="c-artists__content px-0 lg:px-10 flex flex-wrap mt-40 lg:mt-60">
								<?php while ($query->have_posts()) : $query->the_post(); ?>
									<div class="c-artists__item w-full lg:w-1/3 px-0 lg:px-6 lg:py-24">
										<a href="<?php the_permalink(); ?>" class="no-underline">
											<div class="c-artists__item-inner px-20 py-20 lg:px-15 lg:py-16 hover:bg-taste-5">
												<div class="c-artists__thumbnail w-full h-team-image-mobile lg:h-artist-image bg-taste-9">
													<?php the_post_thumbnail('small', [
														'class' => 'c-artists__image w-full h-full o-cover block'
													]); ?>
												</div>
												<h2 class="font-body text-16 leading-30.16 tracking-3.71 text-center text-taste-2 no-underline uppercase mt-20">
													<?php the_title(); ?>
												</h2>
											</div>
										</a>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>

				</section>
			<?php endwhile; ?>
		</main>
	</div>
<?php endif;
get_footer();
