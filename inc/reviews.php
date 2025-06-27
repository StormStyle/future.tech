
<?php

add_action('add_meta_boxes', function () {
  add_meta_box('review_author', 'Автор отзыва', 'render_review_author_box', 'review', 'normal');
  add_meta_box('review_rating', 'Рейтинг (1–5 звезд)', 'render_review_rating_meta_box', 'review', 'side');
});

function render_review_author_box($post) {
  wp_nonce_field('save_review_author_meta', 'review_author_nonce');

  $selected_person = get_post_meta($post->ID, '_review_person_id', true);
  $manual = [
    'name'     => get_post_meta($post->ID, '_review_manual_name', true),
    'position' => get_post_meta($post->ID, '_review_manual_position', true),
    'location' => get_post_meta($post->ID, '_review_manual_location', true),
  ];

  $people = get_posts(['post_type' => 'person', 'numberposts' => -1]);
  ?>
  <p><strong>Выбрать сотрудника:</strong></p>
  <select name="review_person_id" style="width:100%;">
    <option value="">— Не выбрано —</option>
    <?php foreach ($people as $person): ?>
      <option value="<?= $person->ID; ?>" <?= selected($selected_person, $person->ID, false); ?>>
        <?= esc_html($person->post_title); ?>
      </option>
    <?php endforeach; ?>
  </select>
  <hr>
  <p><strong>ИЛИ заполните вручную:</strong></p>
  <?php foreach ($manual as $key => $value): ?>
    <p>
      <label for="review_manual_<?= $key; ?>"><?= ucfirst($key); ?>:</label><br>
      <input type="text" name="review_manual_<?= $key; ?>" value="<?= esc_attr($value); ?>" style="width:100%;" />
    </p>
  <?php endforeach;
}

add_action('save_post', function ($post_id) {
  if (
    defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ||
    !isset($_POST['review_author_nonce']) ||
    !wp_verify_nonce($_POST['review_author_nonce'], 'save_review_author_meta') ||
    !current_user_can('edit_post', $post_id)
  ) return;

  update_post_meta($post_id, '_review_person_id', intval($_POST['review_person_id'] ?? 0));
  update_post_meta($post_id, '_review_manual_name', sanitize_text_field($_POST['review_manual_name'] ?? ''));
  update_post_meta($post_id, '_review_manual_position', sanitize_text_field($_POST['review_manual_position'] ?? ''));
  update_post_meta($post_id, '_review_manual_location', sanitize_text_field($_POST['review_manual_location'] ?? ''));
});

function render_review_rating_meta_box($post) {
  wp_nonce_field('save_review_rating_meta', 'review_rating_nonce');
  $rating = (int) get_post_meta($post->ID, '_review_rating', true);

  function declOfNum($number, $titles) {
    $cases = [2, 0, 1, 1, 1, 2];
    return $titles[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
  }
  ?>
  <label for="review_rating_field">Оценка:</label>
  <select name="review_rating_field" id="review_rating_field" style="width:100%;">
    <option value="">— Выберите рейтинг —</option>
    <?php for ($i = 1; $i <= 5; $i++): ?>
      <option value="<?= $i; ?>" <?= selected($rating, $i, false); ?>>
        <?= $i . ' ' . declOfNum($i, ['звезда', 'звезды', 'звёзд']); ?>
      </option>
    <?php endfor; ?>
  </select>
<?php }

add_action('save_post', function ($post_id) {
  if (
    defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ||
    !isset($_POST['review_rating_nonce']) ||
    !wp_verify_nonce($_POST['review_rating_nonce'], 'save_review_rating_meta') ||
    !current_user_can('edit_post', $post_id)
  ) return;

  $rating = $_POST['review_rating_field'] ?? '';
  if (in_array($rating, ['1', '2', '3', '4', '5'])) {
    update_post_meta($post_id, '_review_rating', intval($rating));
  } else {
    delete_post_meta($post_id, '_review_rating');
  }
});
