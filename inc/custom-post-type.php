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

function register_review_post_type() {
  register_post_type('review', [
    'labels' => [
      'name' => 'Review',
      'singular_name' => 'review',
      'add_new_item' => 'Add a review',
      'edit_item' => 'Edit a review',
    ],
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-testimonial',
    'supports' => ['editor', 'thumbnail'],
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'reviews'],
  ]);
}
add_action('init', 'register_review_post_type');

function register_person_post_type() {
  register_post_type('person', array(
    'labels' => array(
      'name' => 'Team',
      'singular_name' => 'person',
    ),
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-groups',
    'supports' => array('title', 'thumbnail'),
  ));
}
add_action('init', 'register_person_post_type');
