<!-- Desktop -->
<aside id="sidebar sidebar-blogs" class="widget-area c-sidebar-blogs c-sidebar-blogs__desktop js-sidebar-blog">
	<h2 class="c-sidebar-blogs__title hidden lg:block">
		Sort by Category:
	</h2>
	<?php echo do_shortcode('[facetwp facet="categories"]'); ?>
	<h2 class="c-sidebar-blogs__title hidden lg:block">
		Search the Blog:
	</h2>
	<?php echo do_shortcode('[facetwp facet="blogs_search"]'); ?>
	<div class="c-sidebar-blogs__cta hidden lg:block">
		<?php do_action('ttg_blogsCta'); ?>
	</div>
</aside>

<aside id="sidebar sidebar-blogs" class="px-20 widget-area c-sidebar-blogs c-sidebar-blogs__mobile" style="order: 2;">
	<?php do_action('ttg_blogsCta'); ?>
</aside>
