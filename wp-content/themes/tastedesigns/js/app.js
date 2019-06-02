// import external dependencies
import jQuery from 'jquery';
import 'slick-carousel';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import blog from './routes/blog';
import category from './routes/blog';
import tag from './routes/blog';
import author from './routes/blog';
import singlePost from './routes/blog';
import singleProject from './routes/single-project';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Blogs page
  blog,
  // Category page
  category,
  // Tag page
  tag,
  // Author page
  author,
  // Single Post
  singlePost,
  // Single Project
  singleProject,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
