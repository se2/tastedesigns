<?php
/**
 * Meet The Team module
 *
 * @category   Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$parent_id = get_the_ID();
$title = get_query_var('title');
$override = get_query_var('override');
$team = get_query_var('team');
$colors = get_query_var('colors');
$is_about = get_query_var('is_about');
if (!$is_about) :
  $args = array (
    'post_type' => 'team',
    'posts_per_page' => -1,
  );
  $query = new WP_Query($args);
?>

  <?php if ($query->have_posts()) : ?>
    <div class="c-team w-full py-60 lg:py-80">
      <h1 class="font-title text-42 leading-57 lg:text-58 lg:leading-78 text-taste-1 text-center lowercase"
      <?php if ($override) : ?>
        <?php $colors->getPrimary(); ?>
      <?php endif; ?>
      >
        <?php echo $title; ?>
      </h1>
      <div class="c-team__content px-0 lg:px-10 flex flex-wrap mt-40 lg:mt-40">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
          <div class="c-team__item w-full lg:w-1/3 px-0 lg:px-6 lg:py-24">
            <a href="<?php the_permalink(); ?>" class="no-underline">
              <div class="c-team__item-inner px-20 py-20 lg:px-15 lg:py-16 hover:bg-taste-5
              <?php if ($parent_id === get_the_ID()) : ?>
                is-active
              <?php endif; ?>
              "
              <?php if ($override) : ?>
                onMouseOver="this.style.backgroundColor='<?php echo $colors->getRawTertiary(); ?>'"
                onMouseOut="this.style.backgroundColor='transparent'"
              <?php endif; ?>
              >
                <div class="c-team__thumbnail w-full h-team-image-mobile lg:h-team-image bg-taste-9">
                  <?php the_post_thumbnail('small', [
                    'class' => 'c-team__image w-full h-full o-cover block'
                  ]); ?>
                </div>
                <h1 class="font-title text-42 leading-57 text-taste-1 text-center mt-20"
                <?php if ($override) : ?>
                  <?php $colors->getPrimary(); ?>
                <?php endif; ?>
                >
                  <?php the_title(); ?>
                </h1>
                <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center no-underline"
                <?php if ($override) : ?>
                  <?php $colors->getSecondary(); ?>
                <?php endif; ?>
                >
                  <?php the_field('position'); ?>
                </h2>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php endif; ?>

<?php else : ?>

  <?php if (!empty($team)) : ?>
    <div class="c-team w-full py-60 lg:py-80">
      <h1 class="font-title text-42 leading-57 text-taste-1 text-center lowercase"
      <?php if ($override) : ?>
        <?php $colors->getPrimary(); ?>
      <?php endif; ?>
      >
        <?php echo $title; ?>
      </h1>
      <div class="c-team__content px-0 lg:px-10 flex flex-wrap mt-40 lg:mt-40">
        <?php foreach ($team as $element) : ?>
          <?php $member = $element['team_member']; ?>
          <div class="c-team__item w-full lg:w-1/3 px-0 lg:px-6 lg:py-24">
            <a href="<?php echo get_permalink($member); ?>" class="no-underline">
              <div class="c-team__item-inner px-20 py-20 lg:px-15 lg:py-16 hover:bg-taste-5"
              <?php if ($override) : ?>
                onMouseOver="this.style.backgroundColor='<?php echo $colors->getRawTertiary(); ?>'"
                onMouseOut="this.style.backgroundColor='transparent'"
              <?php endif; ?>
              >
                <div class="c-team__thumbnail w-full h-team-image-mobile lg:h-team-image bg-taste-9">
                  <?php echo get_the_post_thumbnail($member, 'small', [
                    'class' => 'c-team__image w-full h-full o-cover block'
                  ]); ?>
                </div>
                <h1 class="font-title text-42 leading-57 text-taste-1 text-center mt-20"
                <?php if ($override) : ?>
                  <?php $colors->getPrimary(); ?>
                <?php endif; ?>
                >
                  <?php echo get_the_title($member); ?>
                </h1>
                <h2 class="font-subtitle text-14 leading-30 tracking-3.71 lg:text-16 lg:leading-30 lg:tracking-4.24 text-taste-2 uppercase text-center no-underline"
                <?php if ($override) : ?>
                  <?php $colors->getSecondary(); ?>
                <?php endif; ?>
                >
                  <?php the_field('position', $member); ?>
                </h2>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>

<?php endif; ?>
