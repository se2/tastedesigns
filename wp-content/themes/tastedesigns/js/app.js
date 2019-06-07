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
import page from './routes/blog';
import singleProject from './routes/single-project';
import singleArtist from './routes/single-project';
import pageTemplateDefault from './routes/page';

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
	// Page
  page,
  pageTemplateDefault,
  // Single Project
  singleProject,
  // Single Artist
  singleArtist,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
