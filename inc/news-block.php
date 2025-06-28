<?php
function register_news_block()
{
  wp_register_script(
    'news-block-editor-script',
    get_template_directory_uri() . '/blocks/news-block/news-block.js',
    ['wp-blocks', 'wp-element', 'wp-components'],
    filemtime(get_template_directory() . '/blocks/news-block/news-block.js'),
    true,
  );

  wp_register_style(
    'news-block-editor-style',
    get_template_directory_uri() . '/blocks/block-editor.css',
    ['wp-edit-blocks'],
    filemtime(get_template_directory() . '/blocks/block-editor.css'),
  );

  register_block_type('custom/news-block', [
    'editor_script' => 'news-block-editor-script',
    'editor_style' => 'news-block-editor-style',
    'render_callback' => 'render_news_block',
    'attributes' => [
      'title' => [
        'type' => 'string',
        'default' => "Today's Headlines: Stay",
      ],
      'subtitle' => [
        'type' => 'string',
        'default' => 'Informed',
      ],
      'description' => [
        'type' => 'string',
        'default' =>
          'Explore the latest news from around the world. We bring you up-to-the-minute updates on the most significant events, trends, and stories. Discover the world through our news coverage.',
      ],
    ],
  ]);
}
add_action('init', 'register_news_block');

function render_news_block($attributes)
{
  $atts = wp_parse_args($attributes, [
    'title' => "Today's Headlines: Stay",
    'subtitle' => 'Informed',
    'description' =>
      'Explore the latest news from around the world. We bring you up-to-the-minute updates on the most significant events, trends, and stories. Discover the world through our news coverage.',
  ]);

  set_query_var('news_block_atts', $atts);

  ob_start();
  ?>
  <section class="hero-alt">
    <header class="hero-alt__header">
      <div class="hero-alt__header-inner container">
        <h1 class="hero-alt__title">
          <?php echo esc_html($atts['title']); ?>
          <span class="hero-alt__title-hidden-part"><?php echo esc_html(
            $atts['subtitle'],
          ); ?></span>
        </h1>
        <p class="hero-alt__subtitle h1 hidden-mobile"><?php echo esc_html(
          $atts['subtitle'],
        ); ?></p>
        <p class="hero-alt__description"><?php echo esc_html(
          $atts['description'],
        ); ?></p>
      </div>
    </header>

    <?php get_template_part('templates/news-hero'); ?>

  </section>
  <?php return ob_get_clean();
}
