<?php

// get sitewide CTA fields and output if necessary
function ttg_doSitewideCta()
{
	$globalCta_status = get_field('globalCta_status', 'options');

	if ( !empty( $globalCta_status ) )
	{
		$globalCta_title = get_field('globalCta_title', 'options');
		$globalCta_subtitle = get_field('globalCta_subtitle', 'options');
		$globalCta_buttonText = get_field('globalCta_buttonText', 'options');
		$globalCta_buttonUrl = get_field('globalCta_url', 'options');

		if (
			$globalCta_status === 'enabled' &&
			(
				!empty( $globalCta_title ) &&
				!empty( $globalCta_subtitle ) &&
				!empty( $globalCta_buttonText ) &&
				!empty( $globalCta_buttonUrl )
			)
		)
		{
			set_query_var('title', $globalCta_title);
			set_query_var('subtitle', $globalCta_subtitle);
			set_query_var('buttonText', $globalCta_buttonText);
			set_query_var('buttonUrl', $globalCta_buttonUrl);

			get_template_part('template-parts/shared/sitewide_cta');
		}
	}
}
add_action( 'ttg_sitewideCta', 'ttg_doSitewideCta', 10, 0 );
