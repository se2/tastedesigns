<?php

get_header();

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php

		if ( have_posts() )
		{
			?>

			<header class="page-header">
				<h1 class="page-title">
					In Good Taste
				</h1>
			</header>

			<?php
			
			while ( have_posts() )
			{
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );
			}

			the_posts_pagination(
				array(
					'prev_text'		=> 'PREVIOUS',
					'next_text'		=> 'NEXT',
				)
			);
		}
		else
		{
			get_template_part( 'template-parts/content', 'none' );			
		}

		?>
	</main>
</div>
<?php

get_sidebar('blogArchive');

get_footer();
