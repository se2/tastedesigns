<?php
/**
 * Meet Our Team Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$colors = new TasteColors();
$override = $colors->isOverriden();
$team = get_sub_field('team');
set_query_var('title', $title);
set_query_var('subtitle', $subtitle);
set_query_var('override', $override);
set_query_var('team', $team);
set_query_var('colors', $colors);
set_query_var('is_about', true);
get_template_part('template-parts/blocks/meet-the-team');
?>
