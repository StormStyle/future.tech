<?php 
// Регистрируем мета-бокс
function custom_author_meta_box() {
    add_meta_box(
        'custom_author_info',
        'Автор поста',
        'custom_author_meta_box_callback',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'custom_author_meta_box');

// Вывод HTML в мета-боксе
function custom_author_meta_box_callback($post) {
    wp_nonce_field('save_custom_author_data', 'custom_author_nonce');

    $name = get_post_meta($post->ID, '_custom_author_name', true);
    $position = get_post_meta($post->ID, '_custom_author_position', true);
    $avatar = get_post_meta($post->ID, '_custom_author_avatar', true);

    ?>
    <p>
        <label for="custom_author_name">Имя автора:</label><br>
        <input type="text" name="custom_author_name" id="custom_author_name" value="<?php echo esc_attr($name); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="custom_author_position">Должность автора:</label><br>
        <input type="text" name="custom_author_position" id="custom_author_position" value="<?php echo esc_attr($position); ?>" style="width: 100%;">
    </p>
    <p>
        <label>Аватар автора:</label><br>
        <img id="custom_author_avatar_preview" src="<?php echo esc_url($avatar); ?>" style="max-width: 150px; display: block; margin-bottom: 10px;" />
        <input type="hidden" name="custom_author_avatar" id="custom_author_avatar" value="<?php echo esc_url($avatar); ?>">
        <button type="button" class="button" id="custom_author_avatar_button">Выбрать изображение</button>
    </p>

    <script>
    jQuery(document).ready(function($) {
        $('#custom_author_avatar_button').on('click', function(e) {
            e.preventDefault();
            var frame = wp.media({
                title: 'Выберите аватар автора',
                button: {
                    text: 'Использовать'
                },
                multiple: false
            });
            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $('#custom_author_avatar').val(attachment.url);
                $('#custom_author_avatar_preview').attr('src', attachment.url);
            });
            frame.open();
        });
    });
    </script>
    <?php
}

// Сохраняем данные
function save_custom_author_meta($post_id) {
    if (!isset($_POST['custom_author_nonce']) || !wp_verify_nonce($_POST['custom_author_nonce'], 'save_custom_author_data')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['custom_author_name']))
        update_post_meta($post_id, '_custom_author_name', sanitize_text_field($_POST['custom_author_name']));

    if (isset($_POST['custom_author_position']))
        update_post_meta($post_id, '_custom_author_position', sanitize_text_field($_POST['custom_author_position']));

    if (isset($_POST['custom_author_avatar']))
        update_post_meta($post_id, '_custom_author_avatar', esc_url_raw($_POST['custom_author_avatar']));
}
add_action('save_post', 'save_custom_author_meta');
