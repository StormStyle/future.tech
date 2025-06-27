<?php
function register_reviews_block()
{
  wp_register_script(
    'reviews-block-editor-script',
    get_template_directory_uri() . '/blocks/reviews-block/reviews-block.js',
    [
      'wp-blocks',
      'wp-element',
      'wp-components',
      'wp-editor',
      'wp-block-editor',
    ],
    filemtime(
      get_template_directory() . '/blocks/reviews-block/reviews-block.js',
    ),
    true,
  );

  wp_register_style(
    'reviews-block-editor-style',
    get_template_directory_uri() . '/blocks/block-editor.css',
    ['wp-edit-blocks'],
    filemtime(get_template_directory() . '/blocks/block-editor.css'),
  );

  register_block_type('custom/reviews-block', [
    'editor_script' => 'reviews-block-editor-script',
    'editor_style' => 'reviews-block-editor-style',
    'render_callback' => 'render_reviews_block',
    'attributes' => [
      'subtitle' => [
        'type' => 'string',
        'default' => 'What Our Readers Say',
      ],
      'title' => [
        'type' => 'string',
        'default' => 'Real Words from Real Readers',
      ],
      'linkText' => [
        'type' => 'string',
        'default' => 'View All Testimonials',
      ],
      'linkHref' => [
        'type' => 'string',
        'default' => '/reviews',
      ],
    ],
  ]);
}
add_action('init', 'register_reviews_block');

function render_reviews_block($attributes)
{
  $atts = wp_parse_args($attributes, [
    'subtitle' => '',
    'title' => '',
    'linkText' => '',
    'linkHref' => '',
  ]);

  ob_start();
  ?>
  <header class="section__header">
    <div class="section__header-inner container">
      <div class="section__header-info">
        <p class="section__subtitle tag"><?php echo esc_html(
          $atts['subtitle'],
        ); ?></p>
        <h2 class="section__title"><?php echo esc_html($atts['title']); ?></h2>
      </div>
      <div class="section__actions">
        <a href="<?php echo esc_url(
          $atts['linkHref'],
        ); ?>" class="section__link button">
          <span class="icon icon--yellow-arrow"><?php echo esc_html(
            $atts['linkText'],
          ); ?></span>
        </a>
      </div>
    </div>
  </header>
  <?php get_template_part('templates/reviews'); ?>
  <?php return ob_get_clean();
}
