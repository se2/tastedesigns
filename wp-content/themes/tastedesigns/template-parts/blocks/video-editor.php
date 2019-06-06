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
?>

<section class="c-video-block w-full xl:mt-90 h-video-block relative">
  <?php echo $embed; ?>
  <div class="c-video-block__overlay absolute top-0 left-0 w-full h-full hidden">
    <?php generate_image($image['ID'], 'c-video-block__overlay-image w-full h-full top-0 left-0 absolute o-cover', 'massive'); ?>
    <div class="c-video-block__play absolute top-50 left-50 w-276 h-276 rounded-full bg-">
      <img src="<?php get_image_url('play.png'); ?>" alt="Play" class="c-video-block__play-icon">
    </div>
  </div>
</section>
