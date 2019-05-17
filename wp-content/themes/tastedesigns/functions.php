<?php
/**
 * Functions.php
 *
 * Do not write PHP code in here! Instead, add a new file in the `/lib` folder, OR add your code
 * to a _relevant_ existing file.
 *
 * For example, if you're adding a new Custom Post Type for "Case Studies", make a
 * `/lib/register-case-studies-cpt.php` file and write your code there. Then include
 * it in _this_ file with:
 *
 * <?php require get_template_directory() . '/lib/register-case-studies-cpt.php`; ?>
 *
 * This structure keeps the code clean, organized, and easy to work with.
 */

require get_template_directory() . '/lib/setup.php';
require get_template_directory() . '/lib/register-widget-areas.php';
require get_template_directory() . '/lib/enqueue-styles-scripts.php';
require get_template_directory() . '/lib/template-tags.php';
require get_template_directory() . '/lib/template-functions.php';

require get_template_directory() . '/lib/helpers.php';
require get_template_directory() . '/lib/acf-options-page.php';

// global CTA logic
require_once get_template_directory() . '/lib/sitewide_cta.php';

// Custom Post Types
require get_template_directory() . '/lib/project-cpt.php';
require get_template_directory() . '/lib/testimonial-cpt.php';
require get_template_directory() . '/lib/tasteExpert-cpt.php';
