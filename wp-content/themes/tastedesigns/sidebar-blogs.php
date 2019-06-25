<!-- Desktop -->
<aside id="sidebar sidebar-blogs" class="widget-area c-sidebar-blogs c-sidebar-blogs__desktop js-sidebar-blog pt-40 lg:pt-0">
	<!-- Temporarily hidden on Has Sidebar post template -->
	<?php if ( is_home() || is_search() || is_page_template( 'templates/taste-search.php' ) ) : ?>
		<?php if ( is_home() ) : ?>
			<h2 class="c-sidebar-blogs__title hidden lg:block">
				Sort by Category:
			</h2>
			<?php echo do_shortcode('[facetwp facet="categories"]'); ?>
		<?php endif; ?>
		<h2 class="c-sidebar-blogs__title hidden lg:block">
			Search the Blog:
		</h2>
		<?php echo do_shortcode('[facetwp facet="search"]'); ?>
	<?php endif; ?>
	<div class="c-sidebar-blogs__cta hidden lg:block">
		<?php do_action('ttg_blogsCta'); ?>
	</div>
	<div class="sidebar-widget hidden lg:block">
		<?php if ( is_single() && is_active_sidebar( 'sidebar-blogs' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-blogs' ); ?>
		<?php endif; ?>
	</div>
</aside>

<aside id="sidebar sidebar-blogs" class="px-20 widget-area c-sidebar-blogs c-sidebar-blogs__mobile" style="order: 2;">
	<?php do_action('ttg_blogsCta'); ?>
	<div class="sidebar-widget">
		<?php if ( is_single() && is_active_sidebar( 'sidebar-blogs' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-blogs' ); ?>
		<?php endif; ?>
	</div>
</aside>
