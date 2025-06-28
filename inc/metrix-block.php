<?php
function register_metrix_block()
{
  wp_register_script(
    'metrix-block-editor-script',
    get_template_directory_uri() . '/blocks/metrix-block/metrix-block.js',
    ['wp-blocks', 'wp-element', 'wp-components'],
    filemtime(
      get_template_directory() . '/blocks/metrix-block/metrix-block.js',
    ),
    true,
  );

  wp_register_style(
    'metrix-block-editor-style',
    get_template_directory_uri() . '/blocks/block-editor.css',
    ['wp-edit-blocks'],
    filemtime(get_template_directory() . '/blocks/block-editor.css'),
  );

  register_block_type('custom/metrix-block', [
    'editor_script' => 'metrix-block-editor-script',
    'editor_style' => 'metrix-block-editor-style',
    'render_callback' => 'render_metrix_block',
    'attributes' => [
      'title' => [
        'type' => 'string',
        'default' => 'Unlock the World of Artificial Intelligence',
      ],
      'subtitle' => ['type' => 'string', 'default' => 'through Podcasts'],
      'description' => [
        'type' => 'string',
        'default' =>
          "Dive deep into the AI universe with our collection of insightful podcasts. Explore the latest trends, breakthroughs, and discussions on artificial intelligence. Whether you're an enthusiast or a professional, our AI podcasts offer a gateway to knowledge and innovation.",
      ],
      'metrix' => [
        'type' => 'array',
        'default' => [
          ['title' => 'Resources available', 'value' => '300'],
          ['title' => 'Total Downloads', 'value' => '12k'],
          ['title' => 'Active Users', 'value' => '10k'],
          ['title' => 'Episodes Published', 'value' => '150'],
        ],
      ],
    ],
  ]);
}
add_action('init', 'register_metrix_block');

function render_metrix_block($attributes)
{
  $default_metrix = [
    ['title' => 'Resources available', 'value' => '300+'],
    ['title' => 'Total Downloads', 'value' => '12k+'],
    ['title' => 'Active Users', 'value' => '10k+'],
    ['title' => 'Episodes Published', 'value' => '150+'],
  ];

  $atts = wp_parse_args($attributes, [
    'title' => 'Unlock the World of Artificial Intelligence',
    'subtitle' => 'through Podcasts',
    'description' =>
      "Dive deep into the AI universe with our collection of insightful podcasts. Explore the latest trends, breakthroughs, and discussions on artificial intelligence. Whether you're an enthusiast or a professional, our AI podcasts offer a gateway to knowledge and innovation.",
    'metrix' => $default_metrix,
  ]);

  $metrix = !empty($atts['metrix']) ? $atts['metrix'] : $default_metrix;

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
    <div class="hero-alt__body">
      <div class="metrix metrix--4-col container">
        <dl class="metrix__list">
          <?php foreach ($metrix as $item): ?>
            <div class="metrix__item">
              <dt class="metrix__key"><?php echo esc_html(
                $item['title'],
              ); ?></dt>
              <dd class="metrix__value h2">
                <?php echo esc_html($item['value']); ?>
                <span class="metrix__sign">+</span>
              </dd>
            </div>
          <?php endforeach; ?>
        </dl>
      </div>
    </div>
  </section>
  <?php return ob_get_clean();
}
