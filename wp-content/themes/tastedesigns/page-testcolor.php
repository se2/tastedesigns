<?php


get_header();

/*
debug stuff

$primaryColorField = get_field('theme_primaryColor', 'options');
$secondaryColorField = get_field('theme_secondaryColor', 'options');

var_dump(
	$primaryColorField
);
var_dump(
	$secondaryColorField
);
*/
?>
<div style="display: grid; grid-template-columns: repeat( 2, 1fr); grid-gap: 1rem; clear: both !important;">
	<div style="background-color: var(--themeColorPrimary); padding: 3rem 1rem;">
		This is a primary block
	</div>
	<div style="background-color: var(--themeColorSecondary); padding: 3rem 1rem;">
		This is a secondary block
	</div>
</div>


<div style="background-color: var(--themeColorSecondary); color: var(--themeColorPrimary); margin: 2rem 0; padding: 2rem 0;">
	<h2>
		Some generic headline
	</h2>
</div>
<?php


get_footer();

?>
