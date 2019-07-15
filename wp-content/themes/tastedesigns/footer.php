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
$theme_colors = new TasteColors(true);

// sitewide CTA
// TODO: tu - please move this action to wherever you need it!
if ( !is_front_page() ) {
	do_action('ttg_sitewideCta');
}

?>

	<footer id="colophon" class="site-footer c-footer py-50 px-20 lg:px-36 bg-taste-1" <?php $theme_colors->getPrimaryBackground(); ?>>
		<?php
			$menu = wp_nav_menu( array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'secondary-menu',
				'echo'					 => false,
			) );
			if ($theme_colors->isOverriden()) :
				$menu = custom_menu_styles($menu, $theme_colors->getSecondaryColor(false));
			endif;
			echo $menu;
		?>
		<div class="c-footer__separator h-2 w-full bg-taste-2 mt-50"></div>
		<div class="c-footer__contact pt-70 text-center">
			<?php $address = get_field('address', 'option'); ?>
			<a href="<?php echo $address['url']; ?>" target="_blank"><?php echo $address['title']; ?></a>
			<span class="hidden lg:inline-block text-taste-4 text-14 leading-17 tracking-3.71">|</span>
			<?php while (have_rows('phone_numbers', 'option')) : the_row(); ?>
				<a href="<?php echo 'tel:+'.get_sub_field('number'); ?>" class="c-phone-numbers__item block">
					<?php echo get_sub_field('number'); ?>
				</a>
			<?php endwhile; ?>
		</div>
		<div class="c-footer__bottom pt-70 pb-20 flex flex-col lg:flex-row items-center">
			<?php $career = get_field('career', 'option'); ?>
			<?php if ($career) : ?>
				<a href="<?php echo $career['url']; ?>" target="<?php echo $career['target']; ?>" class="c-footer__inquiry no-underline block text-right flex-1">
					<div class="c-footer__button border-2 border-taste-2 py-25 px-25 items-center inline-flex" <?php $theme_colors->getSecondaryBorder(); ?>>
						<span class="text-16 leading-19 tracking-4.24 text-taste-3 lg:text-taste-4 uppercase hidden lg:inline" <?php $theme_colors->getSecondaryColor(); ?>><?php echo $career['title']; ?></span>
						<span class="text-16 leading-19 tracking-4.24 text-taste-3 lg:text-taste-4 uppercase lg:hidden" <?php $theme_colors->getSecondaryColor(); ?>>Inquiries</span>
					</div>
				</a>
			<?php endif; ?>
			<div class="c-footer__copyright site-info font-body text-14 leading-17 text-taste-3 lg:text-taste-4 flex-1 pt-60 lg:pt-0 text-center lg:text-left" <?php $theme_colors->getSecondaryColor(); ?>>
				<p>
					©<?php echo date("Y"); ?> Taste, Artful Interiors & Design. All rights reserved.
				</p>
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Site Design by %s', 'ttg-wp' ), '<a href="https://technologytherapy.com" class="no-underline text-taste-3 lg:text-taste-4"'.$theme_colors->getSecondaryColor(false).'>TTG</a>' );
				?>
			</div><!-- .site-info -->
			<div class="c-footer__social inline-flex pt-50 lg:pt-0 flex-wrap">
				<?php while (have_rows('social_medias', 'option')) : the_row(); ?>
					<a href="<?php echo get_sub_field('link'); ?>" target="_blank" class="c-footer__social-item inline-block mx-12 xs:mx-24 lg:mx-12 xl:mx-24 text-0 rounded-full border-2 border-taste-2 w-47 h-47 flex justify-center items-center no-underline lg:hover:bg-taste-3 text-taste-2 lg:text-taste-3 lg:hover:text-taste-1 text-24"
					<?php $theme_colors->getSecondary(array(TasteColors::COLOR, TasteColors::BORDER)); ?>
					<?php if ($theme_colors->isOverriden()) : ?>
						onMouseOver="this.style.backgroundColor='<?php echo $theme_colors->getRawSecondary(); ?>';this.style.color='<?php echo $theme_colors->getRawPrimary(); ?>';"
						onMouseOut="this.style.backgroundColor='transparent';this.style.color='<?php echo $theme_colors->getRawSecondary(); ?>';"
					<?php endif; ?>
					>
						<i class="fab <?php echo get_sub_field('type'); ?>"></i>
					</a>
				<?php endwhile; ?>
			</div>
		</div>
		<?php
		while (have_rows('contact_form', 'option')) : the_row();
			$visible = get_sub_field('is_visible', 'option');
			$title = get_sub_field('title', 'option');
			$shortcode = get_sub_field('shortcode', 'option');

			if ($visible) : ?>
				<section class="c-contact-form fixed top-0 left-0 w-full h-full z-50 js-form">
					<div class="c-contact-form__background bg-light absolute top-0 left-0 w-full h-full"></div>
					<div class="c-contact-form__inner w-full h-full relative">
						<div class="c-menu__hamburger w-28 h-28 right-0 lg:w-33 lg:h-33 absolute is-active js-form-close cursor-pointer">
							<div class="c-menu__stick w-full h-3 lg:h-3.78 absolute bg-taste-2 rounded"></div>
							<div class="c-menu__stick w-full h-3 lg:h-3.78 absolute bg-taste-2 rounded"></div>
						</div>
						<div class="c-contact-form__content overflow-y-auto w-full h-full px-20 py-50 lg:px-50 lg:py-70">
							<div class="c-contact-form__header">
								<h1 class="font-title text-40 leading-50/40 xl:text-42 xl:leading-50/42 text-taste-1 text-center">
									<?php echo $title; ?>
								</h1>
							</div>
							<div class="c_contact-form__content max-w-1000 mx-auto mt-50">
								<?php echo do_shortcode($shortcode); ?>
							</div>
						</div>
					</div>
				</section>
				<?php
			endif;
		endwhile;
		?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
