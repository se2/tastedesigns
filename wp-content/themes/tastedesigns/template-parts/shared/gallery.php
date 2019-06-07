<?php $gallery = get_field('gallery'); ?>
<?php if ($gallery) : ?>
  <?php $desktop_gallery = evening_the_odds($gallery); ?>
  <?php $mobile_gallery = evening_the_odds($gallery, false); ?>

  <div class="<?php if (is_singular( 'artist' )): ?>
    c-single-artist__gallery
  <?php else: ?>
    c-single-project__gallery pt-60
  <?php endif; ?>">

    <h1 class="font-title text-30 leading-40 text-taste-3 text-center px-20 lg:px-0">
      <?php if (is_singular( 'artist' )): ?>
        <?php the_title(); ?> Gallery
      <?php else: ?>
        Full Project Gallery
      <?php endif; ?>
    </h1>

    <?php if (is_singular( 'project' )): ?>
      <h4 class="entry-content text-center font-body text-16 leading-22 lg:leading-24 text-taste-1 mt-30">
        Photographer:
      </h4>
      <h4 class="entry-content text-center font-body text-16 leading-22 lg:leading-24 text-taste-6">
        <?php the_field('photographer'); ?>
      </h4>
    <?php endif; ?>

    <div class="<?php if (is_singular( 'artist' )): ?>
      c-single-artist__gallery-wrapper
    <?php else: ?>
    c-single-project__gallery-wrapper pt-40
    <?php endif; ?>">
      <div class="c-single-project__gallery-inner mx-n2 lg:mx-n5 flex flex-wrap">

        <?php
        /**
         * Desktop gallery
         */
        ?>
        <?php $index = 0; ?>
        <?php foreach ($desktop_gallery as $image) : ?>
          <div class="c-single-project__gallery-image-wrapper p-2 lg:p-5 h-gallery-image-mobile lg:h-gallery-image
          <?php if ($image['width'] > $image['height']) : ?>
            w-full lg:w-1/2
          <?php else : ?>
            w-1/2 lg:w-1/4
          <?php endif; ?>
          hidden lg:block">
            <div class="c-single-project__gallery-image-inner w-full h-full js-gallery-image cursor-pointer" data-index="<?php echo $index; ?>">
              <?php generate_image($image['ID'], 'c-single-project__gallery-image w-full h-full o-cover', 'medium'); ?>
            </div>
          </div>
          <?php $index++; ?>
        <?php endforeach; ?>

        <?php
        /**
         * Mobile gallery
         */
        ?>
        <?php $index = 0; ?>
        <?php foreach ($mobile_gallery as $image) : ?>
          <div class="c-single-project__gallery-image-wrapper p-2 lg:p-5 h-gallery-image-mobile lg:h-gallery-image
          <?php if ($image['width'] > $image['height']) : ?>
            w-full lg:w-1/2
          <?php else : ?>
            w-1/2 lg:w-1/4
          <?php endif; ?>
          lg:hidden">
            <div class="c-single-project__gallery-image-inner w-full h-full js-gallery-image-mobile cursor-pointer" data-index="<?php echo $index; ?>">
              <?php generate_image($image['ID'], 'c-single-project__gallery-image w-full h-full o-cover', 'medium'); ?>
            </div>
          </div>
          <?php $index++; ?>
        <?php endforeach; ?>

      </div>
    </div>

    <?php
    /**
     * Desktop gallery popup
     */
    ?>
    <div class="c-single-project__gallery-popup js-gallery-popup fixed w-full h-full top-0 left-0 py-50 lg:px-70 lg:pt-30 lg:pb-20 z-50 hidden lg:block">
      <div class="c-single-project__gallery-popup-underlay absolute w-full h-full top-0 left-0 bg-taste-7 opacity-60 js-gallery-overlay cursor-pointer"></div>
      <div class="c-single-project__gallery-popup-slider js-gallery-slider w-full h-full lg:h-m90 relative">
        <?php foreach ($desktop_gallery as $image) : ?>
          <?php generate_image($image['ID'], 'c-single-project__gallery-popup-image w-full h-full o-contain px-20 lg:px-0', 'massive'); ?>
        <?php endforeach; ?>
      </div>
      <div class="c-single-project__gallery-popup-thumbnails-container px-50 mt-15">
        <div class="c-single-project__gallery-popup-thumbnails js-gallery-thumbnails w-full h-90 relative">
          <?php foreach ($desktop_gallery as $image) : ?>
            <?php generate_image($image['ID'], 'c-single-project__gallery-popup-image js-gallery-item w-auto h-full mx-5 cursor-pointer', 'tiny'); ?>
          <?php endforeach; ?>
        </div>
      </div>
      <h3 class="font-body text-14 leading-21 tracking-3.5 text-light js-gallery-index text-center uppercase mt-15 relative">
        Image 01/<?php echo count($desktop_gallery); ?>
      </h3>
      <div class="c-single-project__gallery-close w-28 h-28 lg:w-33 lg:h-33 absolute is-active js-gallery-close cursor-pointer">
        <div class="c-single-project__gallery-stick w-full h-3 lg:h-3.78 absolute bg-light rounded"></div>
        <div class="c-single-project__gallery-stick w-full h-3 lg:h-3.78 absolute bg-light rounded"></div>
      </div>
    </div>

    <?php
    /**
     * Mobile gallery popup
     */
    ?>
    <div class="c-single-project__gallery-popup js-gallery-popup-mobile fixed w-full h-full top-0 left-0 py-50 lg:px-70 lg:pt-30 lg:pb-20 z-50 lg:hidden">
      <div class="c-single-project__gallery-popup-underlay absolute w-full h-full top-0 left-0 bg-taste-7 opacity-60 js-gallery-overlay-mobile cursor-pointer"></div>
      <div class="c-single-project__gallery-popup-slider js-gallery-slider-mobile w-full h-full lg:h-m90 relative">
        <?php foreach ($mobile_gallery as $image) : ?>
          <?php generate_image($image['ID'], 'c-single-project__gallery-popup-image w-full h-full o-contain px-20 lg:px-0', 'massive'); ?>
        <?php endforeach; ?>
      </div>
      <h3 class="font-body text-14 leading-21 tracking-3.5 text-light js-gallery-index-mobile text-center uppercase mt-15 relative">
        Image 01/<?php echo count($mobile_gallery); ?>
      </h3>
      <div class="c-single-project__gallery-close w-28 h-28 lg:w-33 lg:h-33 absolute is-active js-gallery-close-mobile cursor-pointer">
        <div class="c-single-project__gallery-stick w-full h-3 lg:h-3.78 absolute bg-light rounded"></div>
        <div class="c-single-project__gallery-stick w-full h-3 lg:h-3.78 absolute bg-light rounded"></div>
      </div>
    </div>
  </div>
<?php endif; ?>