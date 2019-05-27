<?php
/*

template partial for content of post_type == post
This is often represented as 'blog'

*/

// for now, we're assuming we don't need to link to author templates. for now.
$author = get_the_author();

if (
	empty( $author ) ||
	$author == 'admin' ||
	$author == 'wpengine'
)
{
	$author = 'Taste Designs';
}

// primary category for this blog post
$cats = get_the_category();
$primaryCat = 'Blog';

if (
	!empty($cats) &&
	!empty($cats[0])
)
{
	$primaryCat = $cats[0]->name;
}

if ( is_singular() )
{
	set_query_var('primaryCat', $primaryCat);
	set_query_var('author', $author);
	get_template_part('template-parts/content-single-post');
}
else
{
	set_query_var('primaryCat', $primaryCat);
	set_query_var('author', $author);
	get_template_part('template-parts/content-archive-post');
}
?>
