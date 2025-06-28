<?php

function register_resources_taxonomy()
{
  register_taxonomy(
    'resource_category',
    ['resources'],
    [
      'labels' => [
        'name' => 'Resource Categories',
        'singular_name' => 'Resource Category',
        'search_items' => 'Search Categories',
        'all_items' => 'All Categories',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
      ],
      'hierarchical' => true,
      'show_in_rest' => true,
      'public' => true,
      'rewrite' => ['slug' => 'resource-category'],
    ],
  );
}
add_action('init', 'register_resources_taxonomy');

function custom_author_meta_box_resources()
{
  add_meta_box(
    'custom_author_info_resources',
    'Resource Author',
    'custom_author_meta_box_callback_resources',
    'resources',
    'normal',
    'high',
  );
}
add_action('add_meta_boxes', 'custom_author_meta_box_resources');

function custom_author_meta_box_callback_resources($post)
{
  wp_nonce_field(
    'save_custom_author_data_resources',
    'custom_author_nonce_resources',
  );

  $name = get_post_meta($post->ID, '_custom_author_name_resources', true);
  $position = get_post_meta(
    $post->ID,
    '_custom_author_position_resources',
    true,
  );
  $avatar = get_post_meta($post->ID, '_custom_author_avatar_resources', true);
  ?>
    <p>
        <label for="custom_author_name_resources">Author Name:</label><br>
        <input type="text" name="custom_author_name_resources" id="custom_author_name_resources" value="<?php echo esc_attr(
          $name,
        ); ?>" style="width: 100%;">
    </p>
    <p>
        <label>Author Avatar:</label><br>
        <img id="custom_author_avatar_preview_resources" src="<?php echo esc_url(
          $avatar,
        ); ?>" style="max-width: 150px; display: block; margin-bottom: 10px;" />
        <input type="hidden" name="custom_author_avatar_resources" id="custom_author_avatar_resources" value="<?php echo esc_url(
          $avatar,
        ); ?>">
        <button type="button" class="button" id="custom_author_avatar_button_resources">Select Image</button>
    </p>

    <script>
    jQuery(document).ready(function($) {
        $('#custom_author_avatar_button_resources').on('click', function(e) {
            e.preventDefault();
            var frame = wp.media({
                title: 'Select Author Avatar',
                button: { text: 'Use this image' },
                multiple: false
            });
            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $('#custom_author_avatar_resources').val(attachment.url);
                $('#custom_author_avatar_preview_resources').attr('src', attachment.url);
            });
            frame.open();
        });
    });
    </script>
    <?php
}

function save_custom_author_meta_resources($post_id)
{
  if (
    !isset($_POST['custom_author_nonce_resources']) ||
    !wp_verify_nonce(
      $_POST['custom_author_nonce_resources'],
      'save_custom_author_data_resources',
    )
  ) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (isset($_POST['custom_author_name_resources'])) {
    update_post_meta(
      $post_id,
      '_custom_author_name_resources',
      sanitize_text_field($_POST['custom_author_name_resources']),
    );
  }
  if (isset($_POST['custom_author_avatar_resources'])) {
    update_post_meta(
      $post_id,
      '_custom_author_avatar_resources',
      esc_url_raw($_POST['custom_author_avatar_resources']),
    );
  }
}
add_action('save_post_resources', 'save_custom_author_meta_resources');
