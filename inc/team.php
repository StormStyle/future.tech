<?php 

function add_person_meta_box() {
  add_meta_box(
    'person_details',
    'Информация о сотруднике',
    'render_person_meta_box',
    'person',
    'normal',
    'default'
  );
}
add_action('add_meta_boxes', 'add_person_meta_box');

function render_person_meta_box($post) {
  $position = get_post_meta($post->ID, '_person_position', true);
  $location = get_post_meta($post->ID, '_person_location', true);
  ?>
  <p>
    <label for="person_position">Должность:</label><br>
    <input type="text" name="person_position" id="person_position" value="<?php echo esc_attr($position); ?>" style="width:100%;" />
  </p>
  <p>
    <label for="person_location">Город / Страна:</label><br>
    <input type="text" name="person_location" id="person_location" value="<?php echo esc_attr($location); ?>" style="width:100%;" />
  </p>
  <p>
    <strong>Аватар:</strong><br>
    Используйте изображение записи (Featured Image / миниатюра) для аватара.
  </p>
  <?php
}

function save_person_meta_box($post_id) {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  if (isset($_POST['person_position'])) {
    update_post_meta($post_id, '_person_position', sanitize_text_field($_POST['person_position']));
  }
  if (isset($_POST['person_location'])) {
    update_post_meta($post_id, '_person_location', sanitize_text_field($_POST['person_location']));
  }
}
add_action('save_post', 'save_person_meta_box');
