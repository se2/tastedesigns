<aside id="sidebar sidebar-blogs" class="widget-area c-sidebar-blogs">
	<h2 class="c-sidebar-blogs__title">
		Sort by Category:
	</h2>
	<?php echo do_shortcode('[facetwp facet="categories"]'); ?>
	<h2 class="c-sidebar-blogs__title">
		Search the Blog:
	</h2>
	<?php echo do_shortcode('[facetwp facet="blogs_search"]'); ?>
	<?php do_action('ttg_blogsCta'); ?>
</aside>
