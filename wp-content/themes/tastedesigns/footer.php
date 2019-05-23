<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ttg-wp-theme
 */

?>

	</div><!-- #content -->


<?php


// sitewide CTA
// TODO: tu - please move this action to wherever you need it!
do_action('ttg_sitewideCta');

?>

	<footer id="colophon" class="site-footer c-footer py-50 px-20 lg:px-36 bg-taste-1">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'secondary-menu',
			) );
		?>
		<div class="c-footer__separator h-2 w-full bg-taste-2 mt-50"></div>
		<div class="c-footer__bottom pt-70 pb-20 flex flex-col lg:flex-row items-center">
			<?php $career = get_field('career', 'option'); ?>
			<?php if ($career) : ?>
				<a href="<?php echo $career['url']; ?>" target="<?php echo $career['target']; ?>" class="c-footer__inquiry no-underline block text-right flex-1">
					<div class="c-footer__button border-2 border-taste-2 py-25 px-25 items-center inline-flex">
						<span class="text-16 leading-19 tracking-4.24 text-taste-3 lg:text-taste-4 uppercase hidden lg:inline"><?php echo $career['title']; ?></span>
						<span class="text-16 leading-19 tracking-4.24 text-taste-3 lg:text-taste-4 uppercase lg:hidden">Inquiries</span>
						<img src="<?php get_image_url('alternative-email-2.png'); ?>" alt="Enter" class="w-38 h-auto align-middle ml-40 hidden lg:block">
						<img src="<?php get_image_url('alternative-email-3.png'); ?>" alt="Enter" class="w-38 h-auto align-middle ml-40 lg:hidden">
					</div>
				</a>
			<?php endif; ?>
			<div class="c-footer__copyright site-info font-body text-14 leading-17 text-taste-3 lg:text-taste-4 flex-1 pt-60 lg:pt-0 text-center lg:text-left">
				<p>
					©<?php echo date("Y"); ?> Taste, Artful Interiors & Design. All rights reserved.
				</p>
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Site Design by %s', 'ttg-wp' ), '<a href="https://technologytherapy.com" class="no-underline text-taste-3 lg:text-taste-4">TTG</a>' );
				?>
			</div><!-- .site-info -->
			<div class="c-footer__social inline-flex pt-50 lg:pt-0 flex-wrap">
				<?php while (have_rows('social_medias', 'option')) : the_row(); ?>
					<a href="<?php echo get_sub_field('link'); ?>" target="_blank" class="c-footer__social-item inline-block mx-12 xs:mx-24 lg:mx-12 xl:mx-24 text-0 rounded-full border-2 border-taste-2 w-47 h-47 flex justify-center items-center no-underline lg:hover:bg-taste-3 text-taste-2 lg:text-taste-3 lg:hover:text-taste-1 text-24">
						<i class="fab <?php echo get_sub_field('type'); ?>"></i>
					</a>
				<?php endwhile; ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
