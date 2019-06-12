// import external dependencies
import jQuery from 'jquery';
import 'slick-carousel';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import blog from './routes/blog';
import gallery from './routes/gallery';
import video from './routes/video';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Blogs page
  blog,
  // Category page
  category: blog,
  // Tag page
  tag: blog,
  // Author page
  author: blog,
  // Single Project
  singleProject: gallery,
  // Single Artist
  singleArtist: gallery,
  // Page
  page: {
    init() {
      blog.init();
      video.init();
    },
    finalize() {
      blog.finalize();
      video.finalize();
    }
  },
  // Single Post
  singlePost: {
    init() {
      blog.init();
      gallery.init();
    },
    finalize() {
      blog.finalize();
      gallery.finalize();
    }
  },
  // Search
  search: {
    init() {
      blog.init();
    },
    finalize() {
      blog.finalize();
    }
  }
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
