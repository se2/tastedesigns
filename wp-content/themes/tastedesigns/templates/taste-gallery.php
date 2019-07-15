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
					$theme_colors = new TasteColors(true);
					$colors = new TasteColors();
					?>

					<?php
					/**
					 * Page Title
					 */
					?>
					<div class="c-gallery__header px-0 xl:px-50 js-header-blog pb-50 xl:pb-80">
						<h1 class="c-gallery__title font-title text-center text-taste-1 text-42 leading-57 lg:text-64 lg:leading-89 mt-20 xl:mt-0 lowercase" <?php $theme_colors->getPrimaryColor(); ?>>
							<?php the_title(); ?>
						</h1>
						<?php get_template_part('template-parts/shared/page_excerpt'); ?>
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
							<div class="c-gallery-artist__image-wrapper xl:w-1/2 relative min-h-artist-avatar-mobile xl:min-h-artist-avatar">
								<?php the_post_thumbnail('medium', [
									'class' => 'c-gallery-artist__image w-full h-full o-cover o-top absolute top-0 left-0'
								]); ?>
							</div>
							<div class="c-gallery-artist__content pl-20 xl:pl-145 xl:w-1/2 relative bg-taste-5 pt-50 xl:pt-75 pb-50 xl:pb-65 pr-20 xl:pr-145 flex" <?php $colors->getTertiaryBackground(); ?>>
								<div class="c-gallery-artist__content-inner my-auto">
									<h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase">
										Featured Artist
									</h2>
									<h1 class="font-title text-40 leading-50/40 xl:text-42 xl:leading-57 text-taste-1" <?php $colors->getPrimaryColor(); ?>>
										<?php the_title(); ?>
									</h1>
									<div class="c-gallery-artist__body font-body text-14 leading-21 lg:text-16 lg:leading-24 text-taste-6">
										<?php the_content(); ?>
									</div>
									<a href="<?php the_permalink(); ?>" class="no-underline w-full lg:w-auto mt-50 block">
										<div class="c-gallery-artist__button border-2 border-taste-4 py-25 px-21 items-center inline-flex w-full lg:w-auto" <?php $colors->getSecondaryBorder(); ?>>
											<span class="font-subtitle text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2 uppercase" <?php $colors->getPrimaryColor(); ?>>
												View Artist
											</span>
											<?php get_arrow_svg('w-50 h-auto ml-auto lg:ml-30 align-middle fill-taste-1', $colors->getPrimaryFill(false)); ?>
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
					?>

					<?php if (have_rows('artists')) : ?>
						<div class="c-artists w-full my-60 lg:my-80">
							<h1 class="font-title text-42 leading-57 lg:text-64 lg:leading-89 text-taste-1 text-center capitalize" <?php $colors->getPrimaryColor(); ?>>
								Artists
							</h1>
							<div class="c-artists__content px-0 lg:px-10 flex flex-wrap mt-40 lg:mt-40">
								<?php while (have_rows('artists')) : the_row(); ?>
									<?php $artist = get_sub_field('artist'); ?>
									<div class="c-artists__item w-full lg:w-1/3 px-0 lg:px-6 lg:py-24">
										<a href="<?php echo get_permalink($artist); ?>" class="no-underline">
											<div class="c-artists__item-inner px-20 py-20 lg:px-15 lg:py-16 hover:bg-taste-5"
											<?php if ($colors->isOverriden()) : ?>
												onMouseOver="this.style.backgroundColor='<?php echo $colors->getRawTertiary(); ?>'"
												onMouseOut="this.style.backgroundColor='transparent'"
											<?php endif; ?>
											>
												<div class="c-artists__thumbnail w-full h-team-image-mobile lg:h-artist-image bg-taste-9">
													<?php echo get_the_post_thumbnail($artist, 'small', [
														'class' => 'c-artists__image w-full h-full o-cover o-top block'
													]); ?>
												</div>
												<h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase no-underline text-center mt-20" <?php $colors->getPrimaryColor(); ?>>
													<?php echo get_the_title($artist); ?>
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
