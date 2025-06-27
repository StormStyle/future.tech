<?php
function register_tabs_news_block()
{
  wp_register_script(
    'tabs-news-block-editor-script',
    get_template_directory_uri() . '/blocks/tabs-news-block/tabs-news-block.js',
    [
      'wp-blocks',
      'wp-element',
      'wp-components',
      'wp-editor',
      'wp-block-editor',
    ],
    filemtime(
      get_template_directory() . '/blocks/tabs-news-block/tabs-news-block.js',
    ),
    true,
  );

  wp_register_style(
    'tabs-news-block-editor-style',
    get_template_directory_uri() . '/blocks/block-editor.css',
    ['wp-edit-blocks'],
    filemtime(get_template_directory() . '/blocks/block-editor.css'),
  );

  register_block_type('custom/tabs-news-block', [
    'editor_script' => 'tabs-news-block-editor-script',
    'editor_style' => 'tabs-news-block-editor-style',
    'render_callback' => 'render_tabs_news_block',
    'attributes' => [
      'subtitle' => [
        'type' => 'string',
        'default' => 'A Knowledge Treasure Trove',
      ],
      'title' => [
        'type' => 'string',
        'default' => "Explore FutureTech's In-Depth Blog Posts",
      ],
      'buttonText' => ['type' => 'string', 'default' => 'View All Blogs'],
      'buttonUrl' => ['type' => 'string', 'default' => '#'],
    ],
  ]);
}
add_action('init', 'register_tabs_news_block');

function render_tabs_news_block($attributes)
{
  $subtitle = $attributes['subtitle'] ?? '';
  $title = $attributes['title'] ?? '';
  $buttonText = $attributes['buttonText'] ?? '';
  $buttonUrl = $attributes['buttonUrl'] ?? '#';

  ob_start();
  ?>

  <header class="section__header">
    <div class="section__header-inner container">
      <div class="section__header-info">
        <p class="section__subtitle tag"><?php echo esc_html($subtitle); ?></p>
        <h2 class="section__title"><?php echo esc_html($title); ?></h2>
      </div>
      <div class="section__actions">
        <a href="<?php echo esc_url(
          $buttonUrl,
        ); ?>" class="section__link button">
          <span class="icon icon--yellow-arrow"><?php echo esc_html(
            $buttonText,
          ); ?></span>
        </a>
      </div>
    </div>
  </header>

  <?php get_template_part('templates/tab-reviews'); ?>

  <?php return ob_get_clean();
}
