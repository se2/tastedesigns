<?php
/**
 * Featured Project Editor ACF Module
 *
 * @category   ACF Modules
 * @author     Technology Therapy Group
 * @link       https://technologytherapy.com/
 */

$visible = get_sub_field('visible');
$project = get_sub_field('project');
?>

<section class="c-featured-project w-full relative py-80 px-50">
  <div class="c-featured-project__content">
    <h2 class="font-title text-42 leading-57 text-taste-4">
      Featured Project
    </h2>
    <h3 class="font-subtitle text-16 leading-24 tracking-4.24 text-taste-2 uppercase mt-45">
      Location Information
    </h3>
    <h1 class="font-title text-66 leading-89 text-taste-1">
      Project Title
    </h1>
    <div class="c-featured-project__body font-body text-16 leading-19 text-taste-6">
      <p>
        Project description.  Natum debet sit te, postea vidisse suscipit an quo. Decore facilis concludaturque ex usu, no ipsum partem corpora vix. Has nisl alterum habemus te. Ius et etiam consul ex usu, no ipsum perpetua.
      </p>
      <p>
        Has ne admodum menandri intellegebat. Ne est option erroribus. Eos melius accommodare eu. At aperiri facilis eam, eam at iuvaret percipit interesset. Mea ei explicari disputando interpretaris. Ne fugit inimicus mediocrem per, nec quas omnium an.
      </p>
    </div>
    <div class="c-featured-project__separator h-4 w-full bg-taste-5 mt-70"></div>
    <h3 class="font-subtitle text-16 leading-24 tracking-4.24 text-taste-2 uppercase mt-30">
      Project Partners
    </h3>
    <p class="font-body text-16 leading-19 text-taste-6">First Name One</p>
    <p class="font-body text-16 leading-19 text-taste-6">First Name Two</p>
    <a href="#" class="no-underline">
      <div class="c-featured-project__button border-2 border-taste-4 py-25 px-21 mt-50 items-center inline-flex">
        <span class="font-18 leading-21 tracking-3 text-taste-2 uppercase">Full Project Details</span>
        <img src="<?php get_image_url('alternative-path.png'); ?>" alt="Enter" class="w-50 h-auto ml-30 align-middle">
      </div>
    </a>
  </div>
</section>
