<?php
/**
 * Page Blocks
 *
 * @category   Components
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

if ( have_rows( 'page_blocks' ) ) :
	$posts_per_page = get_option( 'posts_per_page' );
	$paged          = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	while ( have_rows( 'page_blocks' ) ) :
    the_row();
    $layout  = get_row_layout();
    $visible = get_sub_field( 'visible' );
    if ( $visible ) {
      get_template_part( 'template-parts/blocks/' . $layout, '' );
    }
	endwhile;
endif;
