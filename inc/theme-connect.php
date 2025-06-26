<?php

function theme_enqueue_assets()
{
  wp_enqueue_style(
    'main-style',
    get_template_directory_uri() . '/styles/main.css',
  );
  
  wp_enqueue_script(
    'main-js',
    get_template_directory_uri() . '/src/main.js',
    [],
    null,
    true,
  );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');