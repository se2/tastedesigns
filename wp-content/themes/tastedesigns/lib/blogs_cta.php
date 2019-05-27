<?php

// get Blogs CTA fields and output if necessary
function ttg_doBlogsCta()
{
	$blogCta_status = get_field('blogCta_status', 'options');

	if ( !empty( $blogCta_status ) )
	{
		$blogCta_link = get_field('blogCta_link', 'options');
		$blogCta_background = get_field('blogCta_background', 'options');

		if (
			$blogCta_status === 'enabled' &&
			(
				!empty( $blogCta_link ) &&
				!empty( $blogCta_background )
			)
		)
		{
			set_query_var('link', $blogCta_link);
			set_query_var('background', $blogCta_background);

			get_template_part('template-parts/shared/blogs_cta');
		}
	}
}
add_action( 'ttg_blogsCta', 'ttg_doBlogsCta', 10, 0 );
