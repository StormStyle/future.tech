<?php

function render_podcast_fields($post)
{
  $video_id = get_post_meta($post->ID, '_podcast_video_id', true);
  $poster_id = get_post_meta($post->ID, '_podcast_poster_id', true);

  $video_url = $video_id ? wp_get_attachment_url($video_id) : '';
  $poster_url = $poster_id ? wp_get_attachment_url($poster_id) : '';
  $author = get_post_meta($post->ID, '_podcast_author', true);
  $subtitle = get_post_meta($post->ID, '_podcast_subtitle', true);
  $episodes = get_post_meta($post->ID, '_podcast_episodes', true);
  $length = get_post_meta($post->ID, '_podcast_length', true);
  $frequency = get_post_meta($post->ID, '_podcast_frequency', true);

  wp_nonce_field('save_podcast_meta', 'podcast_meta_nonce');
  ?>

    <style>
        .media-upload-preview { margin: 10px 0; max-width: 100%; }
    </style>

    <p>
        <label for="podcast_subtitle">Subtitle:</label><br>
        <input type="text" name="podcast_subtitle" value="<?php echo esc_attr(
          $subtitle,
        ); ?>" style="width:100%;">
    </p>

    <div>
        <label>Upload Video:</label><br>
        <button type="button" class="button upload-media" data-target="#podcast_video_id" data-type="video">Upload / Replace Video</button>
        <input type="hidden" id="podcast_video_id" name="podcast_video_id" value="<?php echo esc_attr(
          $video_id,
        ); ?>">
        <?php if ($video_url): ?>
            <video class="media-upload-preview" src="<?php echo esc_url(
              $video_url,
            ); ?>" controls width="300"></video>
        <?php endif; ?>
    </div>

    <div>
        <label>Upload Poster:</label><br>
        <button type="button" class="button upload-media" data-target="#podcast_poster_id" data-type="image">Upload / Replace Poster</button>
        <input type="hidden" id="podcast_poster_id" name="podcast_poster_id" value="<?php echo esc_attr(
          $poster_id,
        ); ?>">
        <?php if ($poster_url): ?>
            <img src="<?php echo esc_url(
              $poster_url,
            ); ?>" class="media-upload-preview" width="300" />
        <?php endif; ?>
    </div>

    <p>
        <label for="podcast_author">Author Name:</label><br>
        <input type="text" name="podcast_author" value="<?php echo esc_attr(
          $author,
        ); ?>" style="width:100%;">
    </p>

    <hr>

    <p>
        <label for="podcast_episodes">Total Episodes:</label><br>
        <input type="number" name="podcast_episodes" value="<?php echo esc_attr(
          $episodes,
        ); ?>">
    </p>

    <p>
        <label for="podcast_length">Average Episode Length (minutes):</label><br>
        <input type="text" name="podcast_length" value="<?php echo esc_attr(
          $length,
        ); ?>">
    </p>

    <p>
        <label for="podcast_frequency">Release Frequency:</label><br>
        <input type="text" name="podcast_frequency" value="<?php echo esc_attr(
          $frequency,
        ); ?>">
    </p>

    <script>
        jQuery(document).ready(function($){
            $('.upload-media').click(function(e){
                e.preventDefault();
                const button = $(this);
                const targetInput = $(button.data('target'));
                const mediaType = button.data('type');

                const frame = wp.media({
                    title: 'Select ' + mediaType,
                    library: { type: mediaType },
                    button: { text: 'Use this ' + mediaType },
                    multiple: false
                });

                frame.on('select', function(){
                    const attachment = frame.state().get('selection').first().toJSON();
                    targetInput.val(attachment.id);
                    location.reload();
                });

                frame.open();
            });
        });
    </script>
    <?php
}

function register_podcast_taxonomy()
{
  register_taxonomy('podcast_category', 'podcast', [
    'labels' => [
      'name' => 'Podcast Categories',
      'singular_name' => 'Podcast Category',
      'search_items' => 'Search Podcast Categories',
      'all_items' => 'All Podcast Categories',
      'edit_item' => 'Edit Podcast Category',
      'update_item' => 'Update Podcast Category',
      'add_new_item' => 'Add New Podcast Category',
      'new_item_name' => 'New Podcast Category Name',
      'menu_name' => 'Podcast Categories',
    ],
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'rewrite' => ['slug' => 'podcast-category'],
    'show_in_rest' => true,
  ]);
}
add_action('init', 'register_podcast_taxonomy');
