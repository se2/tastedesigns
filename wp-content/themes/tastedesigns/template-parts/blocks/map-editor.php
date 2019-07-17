<?php
/**
 * Map Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$title = get_sub_field('title');
$address = get_sub_field('address');
$phone = get_sub_field('phone');
$email = get_sub_field('email');
$map_image = get_sub_field('map_image');
$address_url = get_field('address', 'option');
?>

<section class="c-map-block w-full flex flex-wrap mt-50 xl:mt-80">
  <div class="c-map-block__content w-full lg:w-1/2">
    <div class="c-map-block__content-inner">
        <span><?php echo $title; ?></span>
        <h2><a href="<?php echo $address_url['url']; ?>" target="_blank"><?php echo $address; ?></a></h2>
        <h2><a href="tel:+<?php echo $phone; ?>"><?php echo $phone; ?></a></h2>
        <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
    </div>
  </div>
  <div class="c-map-block__map-image w-full lg:w-1/2">
    <?php echo $map_image; ?>
  </div>
</section>
