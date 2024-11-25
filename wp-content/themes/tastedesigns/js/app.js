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
import search from './routes/search';
import thePackages from './routes/package';

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
			home.init();
      blog.init();
      video.init();
      thePackages.init();
    },
    finalize() {
			home.finalize();
      blog.finalize();
      video.finalize();
      thePackages.finalize();
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
  pageTemplateTasteSearch: {
    init() {
      blog.init();
      search.init();
    },
    finalize() {
      blog.finalize();
      search.finalize();
    }
  }
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
