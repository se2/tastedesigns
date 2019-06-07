<?php
/*

Default template partial for Page

*/
?>

<?php $alter = is_page_template( 'templates/page-sidebar.php' ); ?>

<section id="page-<?php the_ID(); ?>" class="c-page min-h-full w-full">

  <div class="c-page__header lg:px-50 js-header-blog">
    <h1 class="c-page__title font-title text-center text-taste-1 text-60 leading-69 mt-20 lg:mt-0 <?php echo $alter ? 'pb-40 lg:pb-60' : 'pb-50 lg:pb-0'; ?>">
			<?php the_title(); ?>
    </h1>
  </div>

	<div class="flex flex-wrap relative w-full js-content-blog">

		<?php $post_class = ( $alter ? ' lg:w-9/12 lg:px-50' : '' ); ?>
		<div <?php post_class( 'min-h-full w-full' . $post_class ); ?> >
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="c-page__image-wrapper w-full h-blog-image <?php echo ($alter) ? 'lg:h-alt-blog-image' : ''; ?>">
					<?php the_post_thumbnail('massive', [
						'class' => 'c-page__image w-full h-full'
					]); ?>
				</div>
			<?php endif; ?>
			<?php if (!empty(get_the_content())) : ?>
				<div class="c-page__content <?php echo !$alter ? 'pt-50 lg:pt-60' : ''; ?> pb-70 lg:pb-70 <?php if ( !$alter ) : echo 'max-w-1000'; endif; ?> mx-auto border-b-2 border-taste-5 lg:border-b-0">
					<div class="c-page__inner mx-20 lg:mx-0">
						<div class="c-page__body entry-content mb-50 clearfix">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( $alter ) : ?>
			<?php get_sidebar( 'blogs' ); ?>
		<?php endif; ?>

	</div>

</section>
