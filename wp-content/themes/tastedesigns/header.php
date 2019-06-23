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
<html <?php language_attributes(); ?> class="w-full overflow-x-hidden">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('w-full min-h-screen overflow-x-hidden relative'); ?>>
<div id="page" class="site w-full">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ttg-wp' ); ?></a>

	<?php $career = get_field('career', 'option'); ?>

	<header id="masthead" class="site-header">
		<?php $position = is_front_page() ? 'absolute' : 'relative'; ?>
		<div class="site-branding w-full z-50 lg:py-40 lg:px-50 <?php echo $position; ?>">
			<?php
			// the_custom_logo();
			if ( is_front_page() ) :
				?>

				<div class="c-menu w-full lg:w-auto float-none lg:float-right flex items-center bg-light lg:bg-transparent py-10 px-20 lg:p-0">
					<?php if ($career) : ?>
						<a href="<?php echo $career['url'] ?>" target="<?php echo $career['target']; ?>" class="c-menu__item font-body text-14 leading-17 tracking-5.73 text-light uppercase no-underline hidden lg:inline">
							<?php echo $career['title']; ?>
						</a>
					<?php endif; ?>
					<div class="c-menu__separator w-2 h-36 bg-light align-middle ml-28 mr-28 hidden lg:inline-block"></div>
					<a href="#" class="c-menu__item font-body text-0 lg:text-14 leading-17 tracking-5.73 text-light uppercase no-underline flex-1 lg:flex-initial js-search-trigger">
						Search
						<img src="<?php get_image_url('search.png'); ?>" alt="Search" class="c-menu__mail-icon w-37 h-auto align-middle ml-22 hidden lg:inline">
						<img src="<?php get_image_url('mobile-search.png'); ?>" alt="Search" class="c-menu__mail-icon w-30 h-auto align-middle lg:hidden">
					</a>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="c-menu__item ml-auto mr-auto lg:hidden">
						<img src="<?php get_image_url('chair.png'); ?>" alt="Home" class="c-menu__mail-icon w-40 h-auto align-middle">
					</a>
					<a href="#" class="c-menu__item font-body text-11 leading-13 tracking-2.54 lg:text-14 lg:leading-17 lg:tracking-5.73 text-taste-6 lg:text-light uppercase no-underline lg:ml-85 js-menu-trigger flex-1 lg:flex-intial text-right">
						Menu
						<div class="c-menu__hamburger w-40 lg:w-46 h-20 lg:h-17 relative inline-block align-middle ml-10 lg:ml-22">
							<div class="c-menu__stick w-full h-4 lg:h-3.78 absolute bg-taste-6 lg:bg-light rounded"></div>
							<div class="c-menu__stick w-full h-4 lg:h-3.78 absolute bg-taste-6 lg:bg-light rounded"></div>
						</div>
					</a>
				</div>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php generate_image(get_field('logo', 'option'), 'c-logo w-151 pt-25 xs:pt-40 pl-20 lg:p-0 lg:w-132 h-auto'); ?></a>

				<?php
			else :
				?>

				<div class="c-menu w-full lg:w-auto float-none lg:float-right flex items-center bg-light lg:bg-transparent py-10 px-20 lg:p-0">
					<?php if ($career) : ?>
						<a href="<?php echo $career['url']; ?>" target="<?php echo $career['target']; ?>" class="c-menu__item font-body text-14 leading-17 tracking-5.73 text-taste-2 uppercase no-underline hidden lg:inline">
							<?php echo $career['title']; ?>
							<img src="<?php get_image_url('alternative-email.png'); ?>" alt="Email" class="c-menu__mail-icon w-31 h-auto align-middle ml-22">
						</a>
					<?php endif; ?>
					<div class="c-menu__separator w-2 h-36 bg-taste-3 align-middle ml-28 mr-28 hidden lg:inline-block"></div>
					<a href="#" class="c-menu__item font-body text-0 lg:text-14 leading-17 tracking-5.73 text-taste-2 uppercase no-underline flex-1 lg:flex-initial js-search-trigger">
						Search
						<img src="<?php get_image_url('alternative-search.png'); ?>" alt="Search" class="c-menu__mail-icon w-37 h-auto align-middle ml-22 hidden lg:inline">
						<img src="<?php get_image_url('mobile-search.png'); ?>" alt="Search" class="c-menu__mail-icon w-30 h-auto align-middle lg:hidden">
					</a>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="c-menu__item ml-auto mr-auto lg:hidden">
						<img src="<?php get_image_url('chair.png'); ?>" alt="Home" class="c-menu__mail-icon w-40 h-auto align-middle">
					</a>
					<a href="#" class="c-menu__item font-body text-11 leading-13 tracking-2.54 lg:text-14 lg:leading-17 lg:tracking-5.73 text-taste-6 lg:text-taste-2 uppercase no-underline lg:ml-85 js-menu-trigger flex-1 lg:flex-intial text-right">
						Menu
						<div class="c-menu__hamburger w-40 lg:w-46 h-20 lg:h-17 relative inline-block align-middle ml-10 lg:ml-22">
							<div class="c-menu__stick w-full h-4 lg:h-3.78 absolute bg-taste-6 lg:bg-taste-1 rounded"></div>
							<div class="c-menu__stick w-full h-4 lg:h-3.78 absolute bg-taste-6 lg:bg-taste-1 rounded"></div>
						</div>
					</a>
				</div>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php generate_image(get_field('alternative_logo', 'option'), 'c-logo w-132 h-auto hidden lg:inline-block'); ?></a>

				<?php
			endif;

			$ttg_wp_description = get_bloginfo( 'description', 'display' );
			if ( $ttg_wp_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $ttg_wp_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<div class="c-main-menu__decoy absolute w-full h-full z-50 hidden js-menu-decoy"></div>

		<nav id="site-navigation" class="c-main-menu__wrapper main-navigation absolute z-50 border-l-20 border-transparent min-h-full js-menu">
			<div class="c-main-menu__inner py-10 px-20 lg:py-40 lg:px-50 relative">
				<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php // esc_html_e( 'Primary Menu', 'ttg-wp' ); ?></button> -->

				<div class="c-menu flex items-center">
					<?php if ($career) : ?>
						<a href="<?php echo $career['url']; ?>" target="<?php echo $career['target']; ?>" class="c-menu__item font-body text-11 leading-13 tracking-2.54 lg:text-16 lg:leading-19 lg:tracking-5.73 text-taste-3 uppercase no-underline">
							<?php echo $career['title']; ?>
						</a>
					<?php endif; ?>
					<div class="c-menu__separator w-2 h-36 bg-taste-5 opacity-80 inline-block align-middle mx-28 hidden lg:inline"></div>
					<a href="#" class="c-menu__item font-body text-16 leading-19 tracking-5.73 text-taste-3 uppercase no-underline hidden lg:inline-flex items-center js-search-trigger">
						Search
						<img src="<?php get_image_url('alternative-search-2.png'); ?>" alt="Search" class="c-menu__mail-icon w-37 h-auto align-middle ml-22">
					</a>
					<div class="c-menu__separator w-2 h-41 lg:h-36 bg-taste-5 opacity-80 inline-block align-middle mx-auto xs:mx-20 lg:mx-28"></div>
					<a href="#" class="c-menu__item font-body text-11 leading-13 tracking-2.54 lg:text-16 lg:leading-19 lg:tracking-5.73 text-taste-3 uppercase no-underline js-menu-trigger text-right inline-flex items-center">
						<span class="hidden lg:inline">Menu</span>
						<span class="lg:hidden">Close Menu</span>
						<div class="c-menu__hamburger w-28 h-28 lg:w-33 lg:h-33 relative inline-block align-middle ml-5 lg:ml-22 is-active">
							<div class="c-menu__stick w-full h-3 lg:h-3.78 absolute bg-taste-2 rounded"></div>
							<div class="c-menu__stick w-full h-3 lg:h-3.78 absolute bg-taste-2 rounded"></div>
						</div>
					</a>
				</div>

				<?php $total = count(get_field('phone_numbers', 'option')); ?>
				<?php if ($total && $total == 1) : ?>
					<div class="c-phone-numbers py-19 lg:py-30 border-b-2 border-t-2 border-taste-5 mt-10 lg:mt-40">
						<?php while (have_rows('phone_numbers', 'option')) : the_row(); ?>
							<a href="<?php echo 'tel:'.get_sub_field('number'); ?>" class="c-phone-numbers__item block no-underline font-subtitle text-taste-1 text-13 leading-15 tracking-4.65 lg:text-16 lg:leading-24 lg:tracking-5.73 uppercase text-center">
								<span class="text-taste-3"><?php echo get_sub_field('name').': '; ?></span><?php echo get_sub_field('number'); ?>
							</a>
						<?php endwhile; ?>
					</div>
				<?php elseif ($total) : ?>
					<div class="c-phone-numbers py-15 lg:py-30 border-b-2 border-t-2 border-taste-5 mt-10 lg:mt-40 flex items-center">
						<?php while (have_rows('phone_numbers', 'option')) : the_row(); ?>
							<a href="<?php echo 'tel:'.get_sub_field('number'); ?>" class="c-phone-numbers__item no-underline font-subtitle text-taste-1 text-13 leading-15 tracking-4.65 lg:text-16 lg:leading-24 lg:tracking-5.73 uppercase text-center flex-1">
								<span class="text-taste-3"><?php echo get_sub_field('name').': '; ?></span><?php echo get_sub_field('number'); ?>
							</a>
							<div class="c-menu__separator w-2 h-41 lg:h-36 bg-taste-5 opacity-80 inline-block align-middle"></div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>

				<div class="c-social-medias py-19 lg:py-30 border-b-2 border-t-2 border-taste-5 mt-30 flex items-center justify-center">
					<?php while (have_rows('social_medias', 'option')) : the_row(); ?>
						<a href="<?php echo get_sub_field('link'); ?>" target="_blank" class="c-social-medias__item inline-block mx-11 lg:ml-0 lg:mr-22 text-0 rounded-full border-2 border-taste-3 w-34 h-34 flex justify-center items-center no-underline lg:hover:bg-taste-3 text-taste-3 lg:hover:text-light text-17">
							<i class="fab <?php echo get_sub_field('type'); ?>"></i>
						</a>
					<?php endwhile; ?>
					<a href="<?php echo get_site_url(); ?>/gallery-at-taste/" class="font-body text-14 leading-17 tracking-3.71 text-taste-1 uppercase no-underline align-middle ml-auto hidden lg:inline">
						Gallery At Taste
						<img src="<?php get_image_url('path.png'); ?>" alt="Enter" class="w-47 h-auto ml-22 align-middle">
					</a>
				</div>

				<a href="<?php echo get_site_url(); ?>/gallery-at-taste/" class="font-body text-11 leading-13 tracking-2.54 lg:text-14 lg:leading-17 lg:tracking-3.71 text-taste-1 uppercase no-underline align-middle mt-22 lg:hidden block text-center">
					Gallery At Taste
					<img src="<?php get_image_url('path.png'); ?>" alt="Enter" class="w-31 h-auto ml-20 align-middle">
				</a>
			</div>
		</nav><!-- #site-navigation -->

		<div class="c-menu-search fixed w-full h-full z-50 js-search-form top-0 left-0">
			<div class="c-menu-search__background absolute bg-light w-full h-full"></div>
			<div class="c-menu-search__inner relative w-full h-full">
				<div class="c-menu__hamburger w-28 h-28 right-0 lg:w-33 lg:h-33 absolute is-active js-search-close">
					<div class="c-menu__stick w-full h-3 lg:h-3.78 absolute bg-taste-2 rounded"></div>
					<div class="c-menu__stick w-full h-3 lg:h-3.78 absolute bg-taste-2 rounded"></div>
				</div>
				<?php get_search_form(); ?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content w-full">
