<!-- Desktop -->
<aside id="sidebar sidebar-blogs" class="px-20 widget-area c-sidebar-blogs c-sidebar-blogs__desktop">
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

<!-- Mobile -->
<aside id="sidebar sidebar-blogs" class="widget-area c-sidebar-blogs c-sidebar-blogs__mobile px-0 lg:px-20" style="order: 0;">
	<?php echo do_shortcode('[facetwp facet="categories"]'); ?>
	<?php echo do_shortcode('[facetwp facet="blogs_search"]'); ?>
</aside>

<aside id="sidebar sidebar-blogs" class="px-20 widget-area c-sidebar-blogs c-sidebar-blogs__mobile" style="order: 2;">
	<?php do_action('ttg_blogsCta'); ?>
</aside>
