<?php

function theme_enqueue_assets() {
  // CSS
  wp_enqueue_style('main-style', get_template_directory_uri() . '/styles/main.css');

  // JS
  wp_enqueue_script(
    'main-js',
    get_template_directory_uri() . '/src/main.js',
    [],     
    null,  
    true   
  );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');

add_filter('script_loader_tag', function ($tag, $handle, $src) {
  if ($handle === 'main-js') {
    return '<script type="module" src="' . esc_url($src) . '" defer></script>';
  }
  return $tag;
}, 10, 3);


// добавил поодержку картинок для блога 

add_theme_support('post-thumbnails');

// добавил кастомный размер

add_image_size('post-preview-thumb', 512, 222, true);
add_image_size('main-avatar', 80, 80, true);
add_image_size('post-main-thumb', 917, 332, true);
add_image_size('post-head-thumb', 515, 427, true);
add_image_size('video-main-thumb', 917, 549, true);
add_image_size('video-head-thumb-base', 718, 412, true);
add_image_size('video-head-thumb-small', 470, 290, true);
add_image_size('file-main-thumb', 917, 469, true);
add_image_size('file-head-thumb', 470, 290, true);