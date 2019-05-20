<?php
/**
 * The template for displaying search form
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package ttg-wp-theme
 */
?>

<form role="search" method="get" class="search-form c-menu-search__form absolute w-full" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label class="w-full block">
    <span class="screen-reader-text">Search for:</span>
    <input type="search" class="c-menu-search__input search-field font-subtitle font-title text-50 leading-67 lg:text-75 lg:leading-101 text-center outline-0 w-full text-taste-6 bg-transparent js-search-input" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
  </label>
	<button type="submit" class="search-submit"><span class="screen-reader-text">Search</span></button>
</form>
