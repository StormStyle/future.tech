<?php
function add_podcast_meta_box()
{
  add_meta_box(
    'podcast_details',
    'Podcast Details',
    'render_podcast_meta_box',
    'podcast',
    'normal',
    'default',
  );
}
add_action('add_meta_boxes', 'add_podcast_meta_box');

function render_podcast_meta_box($post)
{
  $video_url = get_post_meta($post->ID, '_podcast_video_url', true);
  $poster_url = get_post_meta($post->ID, '_podcast_poster_url', true);
  $author_name = get_post_meta($post->ID, '_podcast_author_name', true);
  $total_episodes = get_post_meta($post->ID, '_podcast_total_episodes', true);
  $average_length = get_post_meta($post->ID, '_podcast_average_length', true);
  $release_frequency = get_post_meta(
    $post->ID,
    '_podcast_release_frequency',
    true,
  );

  wp_nonce_field('save_podcast_meta', 'podcast_meta_nonce');
  ?>
  <p>
    <label for="podcast_video_url"><strong>Video (MP4 URL):</strong></label><br>
    <input type="text" name="podcast_video_url" id="podcast_video_url" value="<?php echo esc_url(
      $video_url,
    ); ?>" style="width:100%;" />
    <button class="button upload_video_button">Upload Video</button>
  </p>

  <p>
    <label for="podcast_poster_url"><strong>Poster Image URL:</strong></label><br>
    <input type="text" name="podcast_poster_url" id="podcast_poster_url" value="<?php echo esc_url(
      $poster_url,
    ); ?>" style="width:100%;" />
    <button class="button upload_poster_button">Upload Image</button>
  </p>

  <p>
    <label for="podcast_author_name"><strong>Author Name:</strong></label><br>
    <input type="text" name="podcast_author_name" id="podcast_author_name" value="<?php echo esc_attr(
      $author_name,
    ); ?>" style="width:100%;" />
  </p>

  <p>
    <label for="podcast_total_episodes"><strong>Total Episodes:</strong></label><br>
    <input type="number" name="podcast_total_episodes" id="podcast_total_episodes" value="<?php echo esc_attr(
      $total_episodes,
    ); ?>" style="width:100%;" />
  </p>

  <p>
    <label for="podcast_average_length"><strong>Average Episode Length (e.g. 45 min):</strong></label><br>
    <input type="text" name="podcast_average_length" id="podcast_average_length" value="<?php echo esc_attr(
      $average_length,
    ); ?>" style="width:100%;" />
  </p>

  <p>
    <label for="podcast_release_frequency"><strong>Release Frequency (e.g. weekly):</strong></label><br>
    <input type="text" name="podcast_release_frequency" id="podcast_release_frequency" value="<?php echo esc_attr(
      $release_frequency,
    ); ?>" style="width:100%;" />
  </p>

  <script>
    jQuery(document).ready(function($) {
      $('.upload_video_button').click(function(e) {
        e.preventDefault();
        var customUploader = wp.media({
          title: 'Select Video',
          button: { text: 'Use this video' },
          library: { type: 'video' },
          multiple: false
        }).on('select', function () {
          var attachment = customUploader.state().get('selection').first().toJSON();
          $('#podcast_video_url').val(attachment.url);
        }).open();
      });

      $('.upload_poster_button').click(function(e) {
        e.preventDefault();
        var customUploader = wp.media({
          title: 'Select Image',
          button: { text: 'Use this image' },
          library: { type: 'image' },
          multiple: false
        }).on('select', function () {
          var attachment = customUploader.state().get('selection').first().toJSON();
          $('#podcast_poster_url').val(attachment.url);
        }).open();
      });
    });
  </script>
  <?php
}

function save_podcast_meta_box($post_id)
{
  if (
    !isset($_POST['podcast_meta_nonce']) ||
    !wp_verify_nonce($_POST['podcast_meta_nonce'], 'save_podcast_meta')
  ) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  $fields = [
    '_podcast_video_url' => 'podcast_video_url',
    '_podcast_poster_url' => 'podcast_poster_url',
    '_podcast_author_name' => 'podcast_author_name',
    '_podcast_total_episodes' => 'podcast_total_episodes',
    '_podcast_average_length' => 'podcast_average_length',
    '_podcast_release_frequency' => 'podcast_release_frequency',
  ];

  foreach ($fields as $meta_key => $field_name) {
    if (isset($_POST[$field_name])) {
      update_post_meta(
        $post_id,
        $meta_key,
        sanitize_text_field($_POST[$field_name]),
      );
    }
  }
}
add_action('save_post', 'save_podcast_meta_box');
