<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ttg-wp-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="w-full h-full">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('w-full h-full overflow-hidden'); ?>>
<div id="page" class="site w-full h-full">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ttg-wp' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding absolute w-full z-50 pt-40 pb-40 pl-50 pr-50">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo generate_image(get_field('logo', 'option'), 'c-logo w-132 h-auto'); ?></a>

				<?php
			else :
				?>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo generate_image(get_field('logo', 'option'), 'c-logo w-132 h-auto'); ?></a>

				<div class="c-menu float-right">
					<a href="#" class="c-menu__item font-body text-14 leading-17 tracking-5.73 text-light uppercase no-underline">
						Work With Us
						<img src="<?php echo get_stylesheet_directory_uri() . '/img/email.png'; ?>" alt="Email" class="c-menu__mail-icon w-31 h-auto align-middle ml-22">
					</a>
					<div class="c-menu__separator w-2 h-36 bg-light inline-block align-middle ml-28 mr-28"></div>
					<a href="#" class="c-menu__item font-body text-14 leading-17 tracking-5.73 text-light uppercase no-underline">
						Search
						<img src="<?php echo get_stylesheet_directory_uri() . '/img/search.png'; ?>" alt="Search" class="c-menu__mail-icon w-37 h-auto align-middle ml-22">
					</a>
					<a href="#" class="c-menu__item font-body text-14 leading-17 tracking-5.73 text-light uppercase no-underline ml-85 js-menu-trigger">
						Menu
						<div class="c-menu__hamburger w-46 h-17 relative inline-block align-middle ml-22">
							<div class="c-menu__stick w-full h-3.78 absolute bg-light rounded"></div>
							<div class="c-menu__stick w-full h-3.78 absolute bg-light rounded"></div>
						</div>
					</a>
				</div>

				<?php
			endif;

			$ttg_wp_description = get_bloginfo( 'description', 'display' );
			if ( $ttg_wp_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $ttg_wp_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="c-main-menu__wrapper js-menu main-navigation absolute z-50 bg-light h-full right-0 pt-40 pb-40 pl-50 pr-50">

			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php // esc_html_e( 'Primary Menu', 'ttg-wp' ); ?></button> -->

			<div class="c-menu">
				<a href="#" class="c-menu__item font-body text-14 leading-17 tracking-3.71 text-taste-1 uppercase no-underline">Work With Taste</a>
				<div class="c-menu__separator w-2 h-36 bg-taste-5 opacity-80 inline-block align-middle ml-28 mr-28"></div>
				<a href="#" class="c-menu__item font-body text-16 leading-19 tracking-5.73 text-taste-3 uppercase no-underline">
					Search
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/search-dark.png'; ?>" alt="Search" class="c-menu__mail-icon w-37 h-auto align-middle ml-22">
				</a>
				<div class="c-menu__separator w-2 h-36 bg-taste-5 opacity-80 inline-block align-middle ml-28 mr-28"></div>
				<a href="#" class="c-menu__item font-body text-16 leading-19 tracking-5.73 text-taste-3 uppercase no-underline js-menu-trigger">
					Menu
					<div class="c-menu__hamburger w-33 h-33 relative inline-block align-middle ml-22 is-active">
						<div class="c-menu__stick w-full h-3.78 absolute bg-taste-2 rounded"></div>
						<div class="c-menu__stick w-full h-3.78 absolute bg-taste-2 rounded"></div>
					</div>
				</a>
			</div>

			<?php $total = count(get_field('phone_numbers', 'option')); ?>
			<?php if($total && $total == 1) : ?>
				<div class="c-phone-numbers pt-30 pb-30 border-b-2 border-t-2 border-taste-5 mt-40">
					<?php while(have_rows('phone_numbers', 'option')) : the_row(); ?>
						<a href="<?php echo 'tel:'.get_sub_field('number'); ?>" class="c-phone-numbers__item block no-underline font-subtitle text-taste-1 text-16 leading-24 tracking-5.73 uppercase text-center">
							<span class="text-taste-3"><?php echo get_sub_field('name').': '; ?></span><?php echo get_sub_field('number'); ?>
						</a>
					<?php endwhile; ?>
				</div>
			<?php elseif($total) : ?>
				<div class="c-phone-numbers pt-30 pb-30 border-b-2 border-t-2 border-taste-5 mt-40 flex items-center">
					<?php while(have_rows('phone_numbers', 'option')) : the_row(); ?>
						<a href="<?php echo 'tel:'.get_sub_field('number'); ?>" class="c-phone-numbers__item no-underline font-subtitle text-taste-1 text-16 leading-24 tracking-5.73 uppercase text-center flex-1">
							<span class="text-taste-3"><?php echo get_sub_field('name').': '; ?></span><?php echo get_sub_field('number'); ?>
						</a>
						<div class="c-menu__separator w-2 h-36 bg-taste-5 opacity-80 inline-block align-middle"></div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content w-full h-full">
