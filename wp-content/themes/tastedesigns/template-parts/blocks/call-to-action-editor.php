<?php
/**
 * Call To Action module
 *
 * @category   Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$cta = get_sub_field('cta');
$override = get_sub_field('override');
$colors = new TasteColors();
?>

<div class="c-service-package my-60 lg:my-80 max-w-920 mx-20 lg:mx-auto">
  <div class="flex flex-col lg:flex-row justify-center">
    <?php if ($cta) : ?>
      <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>" class="js-service-package no-underline w-full lg:w-auto lg:mx-20 block">
        <div class="border-2 border-taste-4 py-25 px-60 w-full lg:w-auto lg:items-center lg:inline-flex text-center" <?php $colors->getSecondaryBorder(); ?>>
          <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 uppercase text-center text-taste-2" <?php $colors->getPrimaryColor(); ?>>
            <?php echo $cta['title']; ?>
          </span>
        </div>
      </a>
    <?php endif; ?>
  </div>
</div>
