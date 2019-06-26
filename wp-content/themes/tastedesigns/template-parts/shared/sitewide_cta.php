<?php

/*

SITEWIDE CTA
logic found in /lib/sitewide_cta.php

*/
$tile = get_query_var('title');
$subtitle = get_query_var('subtitle');
$button_text = get_query_var('buttonText');
$button_url = get_query_var('buttonUrl');
$theme_colors = new TasteColors(true);
?>

<div class="c-global-cta bg-taste-5 pt-60" <?php $theme_colors->getTertiaryBackground(); ?>>
	<h2 class="c-global-cta__subtitle font-title text-30 leading-40 text-center text-taste-3" <?php $theme_colors->getSecondaryColor(); ?>>
		<?php echo $subtitle; ?>
	</h2>
	<div class="c-global-cta__inner bg-light">
		<h1 class="c-global-cta__title font-title text-42 leading-57 lg:text-66 lg:leading-89 text-center text-taste-1" <?php $theme_colors->getPrimaryColor(); ?>>
			<?php echo $title; ?>
		</h1>
		<a href="<?php echo $button_url; ?>" class="c-button__link no-underline">
			<div class="c-button border-2 border-taste-4 px-21 inline-flex items-center w-full lg:w-auto" <?php $theme_colors->getSecondaryBorder(); ?>>
				<span class="c-button__text font-subtitle text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-3 uppercase" <?php $theme_colors->getPrimaryColor(); ?>><?php echo $button_text; ?></span>
				<?php get_arrow_svg('c-button__icon h-auto ml-auto lg:ml-30 fill-taste-1', $theme_colors->getPrimaryFill(false)); ?>
			</div>
		</a>
	</div>
</div>
