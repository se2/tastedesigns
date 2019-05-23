<?php

/*

SITEWIDE CTA
logic found in /lib/sitewide_cta.php

*/
$tile = get_query_var('title');
$subtitle = get_query_var('subtitle');
$button_text = get_query_var('buttonText');
$button_url = get_query_var('buttonUrl');

if (
	!empty( $title ) &&
	!empty( $subtitle ) &&
	!empty( $button_text ) &&
	!empty( $button_url )
)
{
	?>
	<div class="c-global-cta">
		<h2 class="c-global-cta__subtitle">
			<?php echo $subtitle; ?>
		</h2>
		<div class="c-global-cta__inner">
			<h1 class="c-global-cta__title">
				<?php echo $title; ?>
			</h1>
			<a href="<?php echo $button_url; ?>" class="c-button__link">
				<div class="c-button">
					<span class="c-button__text"><?php echo $button_text; ?></span>
					<img src="<?php get_image_url('alternative-path.png'); ?>" alt="Enter" class="c-button__icon">
				</div>
			</a>
		</div>
	</div>
	<?php
}
