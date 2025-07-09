<?php

require get_template_directory() . '/inc/theme-connect.php';
require get_template_directory() . '/inc/thumbnail.php';
require get_template_directory() . '/inc/menu.php';
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/author.php';
require get_template_directory() . '/inc/video.php';
require get_template_directory() . '/inc/hero-block.php';
require get_template_directory() . '/inc/features-block.php';
require get_template_directory() . '/inc/tabs-news-block.php';
require get_template_directory() . '/inc/review-block.php';
require get_template_directory() . '/inc/cta-block.php';
require get_template_directory() . '/inc/podcasts.php';
require get_template_directory() . '/inc/resources.php';
require get_template_directory() . '/inc/metrix-block.php';
require get_template_directory() . '/inc/video-block.php';
require get_template_directory() . '/inc/news-block.php';

add_theme_support('title-tag');

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_script(
    'main-js',
    get_template_directory_uri() . '/dist/assets/main.js',
    [],
    null,
    true,
  );
});

add_filter(
  'script_loader_tag',
  function ($tag, $handle, $src) {
    if ($handle === 'main-js') {
      return '<script type="module" src="' .
        esc_url($src) .
        '" defer></script>';
    }
    return $tag;
  },
  10,
  3,
);
