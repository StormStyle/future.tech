<?php
function register_cta_block()
{
  wp_register_script(
    'cta-block-editor-script',
    get_template_directory_uri() . '/blocks/cta-block/cta-block.js',
    [
      'wp-blocks',
      'wp-element',
      'wp-components',
      'wp-editor',
      'wp-block-editor',
    ],
    filemtime(get_template_directory() . '/blocks/cta-block/cta-block.js'),
    true,
  );

  register_block_type('custom/cta-block', [
    'editor_script' => 'cta-block-editor-script',
    'render_callback' => 'render_cta_block',
    'attributes' => [
      'icon' => ['type' => 'string', 'default' => '/img/about/icon.svg'],
      'subtitle' => [
        'type' => 'string',
        'default' => 'Learn, Connect, and Innovate',
      ],
      'title' => [
        'type' => 'string',
        'default' => 'Be Part of the Future Tech Revolution',
      ],
      'description' => [
        'type' => 'string',
        'default' =>
          'Immerse yourself in the world of future technology. Explore our comprehensive resources, connect with fellow tech enthusiasts, and drive innovation in the industry. Join a dynamic community of forward-thinkers.',
      ],
      'items' => [
        'type' => 'array',
        'default' => [
          [
            'title' => 'Resource Access',
            'description' =>
              'Visitors can access a wide range of resources, including ebooks, whitepapers, reports.',
            'url' => '',
          ],
          [
            'title' => 'Community Forum',
            'description' =>
              'Join our active community forum to discuss industry trends, share insights, and collaborate with peers.',
            'url' => '',
          ],
          [
            'title' => 'Tech Events',
            'description' =>
              'Stay updated on upcoming tech events, webinars, and conferences to enhance your knowledge.',
            'url' => '',
          ],
        ],
      ],
    ],
  ]);
}
add_action('init', 'register_cta_block');

function render_cta_block($attributes)
{
  $atts = wp_parse_args($attributes, [
    'icon' => '/img/about/icon.svg',
    'subtitle' => '',
    'title' => '',
    'description' => '',
    'items' => [],
  ]);
  ob_start();
  ?>
  <section class="about">
    <div class="about__inner container">
      <header class="about__header">
        <img
          src="<?php echo esc_url(
            get_template_directory_uri() . $atts['icon'],
          ); ?>"
          alt=""
          class="about__icon"
          width="150"
          height="150"
        />
        <div class="about__info">
          <p class="about__subtitle tag"><?php echo esc_html(
            $atts['subtitle'],
          ); ?></p>
          <h2 class="about__title"><?php echo esc_html($atts['title']); ?></h2>
        </div>
        <div class="about__description">
          <p><?php echo esc_html($atts['description']); ?></p>
        </div>
      </header>
      <?php if (!empty($atts['items'])): ?>
      <ul class="about__list">
        <?php foreach ($atts['items'] as $item): ?>
        <li class="about__item">
          <a href="<?php echo esc_url(
            $item['url'],
          ); ?>" class="about-card tile">
            <h3 class="about-card__title circle-icon"><?php echo esc_html(
              $item['title'],
            ); ?></h3>
            <div class="about-card__description">
              <p><?php echo esc_html($item['description']); ?></p>
            </div>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>
  </section>
  <?php return ob_get_clean();
}
