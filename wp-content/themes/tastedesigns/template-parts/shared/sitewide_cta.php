<?php

/*

SITEWIDE CTA
logic found in /lib/sitewide_cta.php

*/
$tile = get_query_var('title');
$subtitle = get_query_var('subtitle');
$button_text = get_query_var('buttonText');
$button_url = get_query_var('buttonUrl');
?>

<div class="c-global-cta bg-taste-5 pt-60">
	<h2 class="c-global-cta__subtitle font-title text-30 leading-40 text-center text-taste-3">
		<?php echo $subtitle; ?>
	</h2>
	<div class="c-global-cta__inner bg-light">
		<h1 class="c-global-cta__title font-title text-42 leading-57 lg:text-58 lg:leading-78 text-center text-taste-1">
			<?php echo $title; ?>
		</h1>
		<a href="<?php echo $button_url; ?>" class="c-button__link no-underline">
			<div class="c-button border-2 border-taste-4 px-21 inline-flex items-center">
				<span class="c-button__text text-16 leading-19 lg:leading-21 lg:text-18 text-taste-3"><?php echo $button_text; ?></span>
				<img src="<?php get_image_url('alternative-path.png'); ?>" alt="Enter" class="c-button__icon h-auto ml-30 lg:ml-60">
			</div>
		</a>
	</div>
</div>
