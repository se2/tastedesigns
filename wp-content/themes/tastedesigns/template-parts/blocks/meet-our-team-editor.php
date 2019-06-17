<?php
/**
 * Meet Our Team Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$title = get_sub_field('title');
$colors = new TasteColors();
$override = $colors->isOverriden();
set_query_var('title', $title);
set_query_var('override', $override);
set_query_var('colors', $colors);
get_template_part('template-parts/blocks/meet-the-team');
?>
