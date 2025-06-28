<?php
function register_video_block()
{
  wp_register_script(
    'video-block-editor-script',
    get_template_directory_uri() . '/blocks/video-block/video-block.js',
    ['wp-blocks', 'wp-element', 'wp-components'],
    filemtime(get_template_directory() . '/blocks/video-block/video-block.js'),
    true,
  );

  wp_register_style(
    'video-block-editor-style',
    get_template_directory_uri() . '/blocks/block-editor.css',
    ['wp-edit-blocks'],
    filemtime(get_template_directory() . '/blocks/block-editor.css'),
  );

  register_block_type('custom/video-block', [
    'editor_script' => 'video-block-editor-script',
    'editor_style' => 'video-block-editor-style',
    'render_callback' => 'render_video_block',
    'attributes' => [
      'subtitle' => [
        'type' => 'string',
        'default' => 'Featured Videos',
      ],
      'title' => [
        'type' => 'string',
        'default' => 'Visual Insights for the Modern Viewer',
      ],
      'link' => [
        'type' => 'string',
        'default' => '/blog',
      ],
      'linkText' => [
        'type' => 'string',
        'default' => 'View All',
      ],
    ],
  ]);
}
add_action('init', 'register_video_block');

function render_video_block($attributes)
{
  $atts = wp_parse_args($attributes, [
    'subtitle' => 'Featured Videos',
    'title' => 'Visual Insights for the Modern Viewer',
    'link' => '',
    'linkText' => 'View All',
  ]);

  set_query_var('video_block_atts', $atts);

  ob_start();
  ?>
  <section class="section">
    <header class="section__header">
      <div class="section__header-inner container">
        <div class="section__header-info">
          <p class="section__subtitle tag"><?php echo esc_html(
            $atts['subtitle'],
          ); ?></p>
          <h2 class="section__title"><?php echo esc_html(
            $atts['title'],
          ); ?></h2>
        </div>
        <div class="section__actions">
          <a href="<?php echo esc_url(
            $atts['link'],
          ); ?>" class="section__link button">
            <span class="icon icon--yellow-arrow"><?php echo esc_html(
              $atts['linkText'],
            ); ?></span>
          </a>
        </div>
      </div>
    </header>

    <?php get_template_part('templates/video-section'); ?>

  </section>
  <?php return ob_get_clean();
}
