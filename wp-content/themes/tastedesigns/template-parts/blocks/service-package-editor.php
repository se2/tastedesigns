<?php
/**
 * Press module
 *
 * @category   Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$title = get_sub_field('title');
$small = get_sub_field('use_small_title');
$subtitle = get_sub_field('subtitle');
$content = get_sub_field('content');
$override = get_sub_field('override');
$colors = new TasteColors();
?>

<div class="c-service-package my-60 lg:my-80 max-w-920 mx-20 lg:mx-auto">
  <h1 class="font-title text-42 leading-57 mb-50 xl:mb-0 text-taste-1 text-center
  <?php if (!$small) : ?>
    lg:text-64 lg:leading-89
  <?php endif; ?>
  " <?php $colors->getPrimaryColor(); ?>>
    <?php echo $title; ?>
  </h1>
  <?php if ($subtitle) : ?>
    <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center mt-0 lg:mt-60 mx-20 lg:mx-30">
      <?php echo $subtitle; ?>
    </h2>
  <?php endif; ?>
  <?php if ($content) : ?>
    <div class="c-service-package__content font-body text-14 leading-21 lg:text-16 lg:leading-24 text-taste-6 mt-40 lg:mt-50 text-center">
      <?php echo $content; ?>
    </div>
  <?php endif; ?>
  <?php if ( have_rows( 'actions' ) ) : ?>
    <div class="flex flex-col lg:flex-row justify-center">
      <?php while ( have_rows( 'actions' ) ) : the_row(); ?>
				<?php
				$cta = get_sub_field( 'cta' );
				if ( $cta ) :
				?>
        <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>" class="js-service-package no-underline w-full lg:w-auto lg:mx-20 mt-40 lg:mt-60 block">
          <div class="border-2 border-taste-4 py-25 px-60 w-full lg:w-auto lg:items-center lg:inline-flex text-center" <?php $colors->getSecondaryBorder(); ?>>
            <span class="text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 uppercase text-center text-taste-2" <?php $colors->getPrimaryColor(); ?>>
              <?php echo $cta['title']; ?>
            </span>
          </div>
        </a>
			<?php
				endif;
			endwhile;
			?>
    </div>
  <?php endif; ?>
</div>
