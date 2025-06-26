<?php

function add_video_meta_box() {
  add_meta_box(
    'video_upload',
    'MP4 Video',
    'render_video_meta_box',
    'video',
    'normal',
    'default'
  );
}
add_action('add_meta_boxes', 'add_video_meta_box');

function render_video_meta_box($post) {
  $video_url = get_post_meta($post->ID, '_video_url', true);
  $video_duration = get_post_meta($post->ID, '_video_duration', true);
  wp_nonce_field('save_video_meta', 'video_meta_nonce');
  ?>
  <p>
    <label for="video_url"><strong>Video (MP4 URL):</strong></label><br>
    <input type="text" name="video_url" id="video_url" value="<?php echo esc_url($video_url); ?>" style="width:100%;" />
    <button class="button upload_video_button">Upload Video</button>
  </p>

  <p>
    <label for="video_duration"><strong>Video Duration (e.g. 2.30 min):</strong></label><br>
    <input type="text" name="video_duration" id="video_duration" value="<?php echo esc_attr($video_duration); ?>" style="width:100%;" />
  </p>

  <script>
    jQuery(document).ready(function($) {
      $('.upload_video_button').click(function(e) {
        e.preventDefault();
        var button = $(this);
        var customUploader = wp.media({
          title: 'Upload MP4',
          button: { text: 'Use this video' },
          library: { type: 'video' },
          multiple: false
        }).on('select', function () {
          var attachment = customUploader.state().get('selection').first().toJSON();
          $('#video_url').val(attachment.url);
        }).open();
      });
    });
  </script>
  <?php
}

function save_video_meta_box($post_id) {
  if (!isset($_POST['video_meta_nonce']) || !wp_verify_nonce($_POST['video_meta_nonce'], 'save_video_meta')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  if (isset($_POST['video_url'])) {
    update_post_meta($post_id, '_video_url', esc_url_raw($_POST['video_url']));
  }

  if (isset($_POST['video_duration'])) {
    update_post_meta($post_id, '_video_duration', sanitize_text_field($_POST['video_duration']));
  }
}
add_action('save_post', 'save_video_meta_box');
