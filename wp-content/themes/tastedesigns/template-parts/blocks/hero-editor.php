<?php
/**
 * Hero Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$bg = 'background-image:url(' . get_sub_field( 'background' ) . ');';
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
?>

<section class="c-section__hero w-full h-screen bg-cover bg-bottom relative" style="<?php echo $bg; ?>">
  <div class="c-section__inner absolute w-full pt-34 pb-55 pl-27 pr-27">
    <div class="c-section__underlay absolute w-full h-full opacity-50 bg-taste-1"></div>
    <div class="c-section__text-content w-576 float-right">
      <h1 class="c-section__title font-title text-50 leading-67 lg:text-75 lg:leading-101 text-light relative">
        <?php echo $title; ?>
      </h1>
      <a href="<?php echo $subtitle['url'] ?>" class="c-section__subtitle text-17 font-subtitle leading-20 tracking-4.13 text-light uppercase relative inline-block mt-8 pb-2 no-underline border-b-4 border-taste-4">
        <?php echo $subtitle['title']; ?>
      </a>
    </div>
  </div>
  <img src="<?php echo get_stylesheet_directory_uri() . '/img/down-arrow.png'; ?>" alt="Scroll Down" class="c-section__arrow absolute w-40 h-40">
</section>
