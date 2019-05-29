// import external dependencies
import jQuery from 'jquery';
import 'slick-carousel';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import blog from './routes/blog';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Blogs page
  blog,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
