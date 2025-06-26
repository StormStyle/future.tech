<?php

require get_template_directory() . '/inc/theme-connect.php';
require get_template_directory() . '/inc/thumbnail.php';
require get_template_directory() . '/inc/menu.php';
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/author.php';
require get_template_directory() . '/inc/video.php';
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

add_theme_support('title-tag');
