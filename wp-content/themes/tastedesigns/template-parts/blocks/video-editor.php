<?php
/**
 * Video Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$embed = get_sub_field('embed');
$image = get_sub_field('video_image');
$colors = get_theme_colors();
$override = !empty($colors);
?>

<section class="c-video-block w-full xl:mt-90 h-team-image-mobile lg:h-video-block relative js-video bg-taste-7">
  <?php echo $embed; ?>
  <?php if ($image) : ?>
    <div class="c-video-block__overlay absolute top-0 left-0 w-full h-full items-center justify-center js-video-play hidden xl:flex">
      <div class="c-video-block__middlelay absolute w-full h-full top-0 left-0 bg-taste-7"></div>
      <?php generate_image($image, 'c-video-block__overlay-image w-full h-full top-0 left-0 absolute o-cover opacity-50', 'massive'); ?>
      <div class="c-video-block__play w-276 h-276 rounded-full bg-taste-3 flex items-center justify-center relative cursor-pointer"
      <?php if ($override) : ?>
        style="background-color:<?php echo $colors['primary']; ?>;"
      <?php endif; ?>
      >
        <img src="<?php get_image_url('play.png'); ?>" alt="Play" class="c-video-block__play-icon w-126 h-143 ml-20">
      </div>
    </div>
  <?php endif; ?>
</section>
