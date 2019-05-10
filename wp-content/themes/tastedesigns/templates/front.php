<?php
/**
 * Template Name: Front
 *
 * @category   Template
 * @package    Galileo
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

get_header();

while ( have_posts() ) :
	the_post();
?>

<?php get_template_part( 'template-parts/page', 'blocks' ); ?>

<?php endwhile; ?>

<?php
get_footer();