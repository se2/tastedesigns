<?php
/**
 * Hero Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$bg = 'background-image:url(' . get_sub_field( 'background' ) . ');';
$bg_mobile = 'background-image:url(' . get_sub_field( 'background_image_mobile' ) . ');';
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
?>
1111
<?php

$section_team = get_field('meetTheTeam');

var_dump( $section_team );
exit;

?>
<section>
  <h1>
  </h1>
  <div>
    <?php

    ?>
  </div>
</section>




<section class="c-cover w-full h-screen bg-cover bg-bottom relative" style="<?php echo $bg; ?>">
  <div class="c-cover__background absolute w-full h-full lg:hidden bg-cover" style="<?php echo $bg_mobile; ?>"></div>
  <div class="c-cover__inner absolute w-full px-20 py-20 lg:pt-34 lg:pb-55 lg:px-27">
    <div class="c-cover__underlay absolute w-full h-full opacity-50 bgc-primary"></div>
    <div class="c-cover__text-content w-full lg:w-576 text-center lg:text-left lg:float-right">
      <h1 class="c-cover__title font-title text-50 leading-67 lg:text-75 lg:leading-101 text-light relative text-center lg:text-left">
        <?php echo $title; ?>
      </h1>
      <a href="<?php echo $subtitle['url']; ?>" class="c-cover__subtitle text-17 font-subtitle leading-20 tracking-4.5 lg:tracking-4.13 text-light uppercase relative inline-block mt-10 lg:mt-32 pb-5 no-underline border-b-4">
        <?php echo $subtitle['title']; ?>
      </a>
      <img src="<?php get_image_url('down-arrow.png'); ?>" alt="Scroll Down" class="c-cover__arrow block w-40 h-40 lg:hidden mx-auto mt-30 relative js-scroll">
    </div>
  </div>
  <img src="<?php get_image_url('down-arrow.png'); ?>" alt="Scroll Down" class="c-cover__arrow absolute w-40 h-40 hidden lg:block js-scroll">
  <div class="c-cover__bottom absolute w-full h-44 lg:h-16 bg-taste-2"></div>
</section>