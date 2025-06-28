<?php

function register_video_post_type()
{
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
    'rewrite' => ['slug' => 'videos'],
  ]);
}
add_action('init', 'register_video_post_type');

function register_review_post_type()
{
  register_post_type('review', [
    'labels' => [
      'name' => 'Review',
      'singular_name' => 'Review',
      'add_new_item' => 'Add a Review',
      'edit_item' => 'Edit a Review',
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

function register_person_post_type()
{
  register_post_type('person', [
    'labels' => [
      'name' => 'Team',
      'singular_name' => 'Person',
    ],
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-groups',
    'supports' => ['title', 'thumbnail'],
  ]);
}
add_action('init', 'register_person_post_type');

function register_podcast_post_type()
{
  register_post_type('podcast', [
    'labels' => [
      'name' => 'Podcasts',
      'singular_name' => 'Podcast',
      'add_new' => 'Add Podcast',
      'add_new_item' => 'Add New Podcast',
      'edit_item' => 'Edit Podcast',
      'new_item' => 'New Podcast',
      'view_item' => 'View Podcast',
      'search_items' => 'Search Podcasts',
      'not_found' => 'No podcasts found',
      'not_found_in_trash' => 'No podcasts found in Trash',
      'menu_name' => 'Podcasts',
    ],
    'public' => true,
    'menu_icon' => 'dashicons-microphone',
    'has_archive' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'show_in_rest' => true,
    'taxonomies' => ['category'],
  ]);
}
add_action('init', 'register_podcast_post_type');

function register_resources_post_type()
{
  register_post_type('resources', [
    'labels' => [
      'name' => 'Resources',
      'singular_name' => 'Resource',
      'add_new_item' => 'Add New Resource',
      'edit_item' => 'Edit Resource',
      'new_item' => 'New Resource',
      'view_item' => 'View Resource',
      'search_items' => 'Search Resources',
    ],
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-portfolio',
    'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'resources'],
  ]);
}
add_action('init', 'register_resources_post_type');
