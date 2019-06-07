<?php
/**
 * Meet Our Team Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$title = get_sub_field('title');
set_query_var('title', $title);
get_template_part('template-parts/blocks/meet-the-team');
?>
