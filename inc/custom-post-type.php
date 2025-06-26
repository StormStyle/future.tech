<?php 

function register_video_post_type() {
  register_post_type('video', [
    'labels' => [
      'name' => 'Videos',
      'singular_name' => 'Video',
    ],
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-format-video',
    'supports' => ['title', 'editor', 'thumbnail'],
    'show_in_rest' => true,
  ]);
}
add_action('init', 'register_video_post_type');

