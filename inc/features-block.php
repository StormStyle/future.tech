<?php
function register_features_block()
{
  wp_register_script(
    'features-block-editor-script',
    get_template_directory_uri() . '/blocks/features-block/features-block.js',
    [
      'wp-blocks',
      'wp-element',
      'wp-components',
      'wp-editor',
      'wp-block-editor',
    ],
    filemtime(
      get_template_directory() . '/blocks/features-block/features-block.js',
    ),
  );

  wp_register_style(
    'features-block-editor-style',
    get_template_directory_uri() .
      '/blocks/block-editor.css',
    ['wp-edit-blocks'],
    filemtime(
      get_template_directory() .
        '/blocks/block-editor.css',
    ),
  );

  register_block_type('custom/features-block', [
    'editor_script' => 'features-block-editor-script',
    'editor_style' => 'features-block-editor-style',
    'render_callback' => 'render_features_block',
    'attributes' => [
      'subtitle' => [
        'type' => 'string',
        'default' => 'Unlock the Power of',
      ],
      'title' => [
        'type' => 'string',
        'default' => 'FutureTech Features',
      ],
      'features' => [
        'type' => 'array',
        'default' => [
          [
            'id' => 1,
            'img' => get_template_directory_uri() . '/img/card/1.svg',
            'featureTitle' => 'Future Technology Blog',
            'description' =>
              'Stay informed with our blog section dedicated to future technology.',
            'cells' => [
              [
                'title' => 'Quantity',
                'description' =>
                  'Over 1,000 articles on emerging tech trends and breakthroughs.',
              ],
              [
                'title' => 'Variety',
                'description' =>
                  'Articles cover fields like AI, robotics, biotechnology, and more.',
              ],
              [
                'title' => 'Frequency',
                'description' =>
                  'Fresh content added daily to keep you up to date.',
              ],
              [
                'title' => 'Authoritative',
                'description' =>
                  'Written by our team of tech experts and industry professionals.',
              ],
            ],
          ],
          [
            'id' => 2,
            'img' => get_template_directory_uri() . '/img/card/2.svg',
            'featureTitle' => 'Research Insights Blogs',
            'description' =>
              'Dive deep into future technology concepts with our research section.',
            'cells' => [
              [
                'title' => 'Depth',
                'description' =>
                  '500+ research articles for in-depth understanding.',
              ],
              [
                'title' => 'Graphics',
                'description' =>
                  'Visual aids and infographics to enhance comprehension.',
              ],
              [
                'title' => 'Trends',
                'description' =>
                  'Explore emerging trends in future technology research.',
              ],
              [
                'title' => 'Contributors',
                'description' =>
                  'Contributions from tech researchers and academics.',
              ],
            ],
          ],
        ],
      ],
    ],
  ]);
}
add_action('init', 'register_features_block');

function render_features_block($attributes)
{
  $atts = wp_parse_args($attributes, [
    'subtitle' => '',
    'title' => '',
    'features' => [],
  ]);

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
      </div>
    </header>
    <div class="section__body">
      <ul class="list">
        <?php foreach ($atts['features'] as $feature): ?>
          <li class="list__item">
            <div class="card container">
              <div class="card__preview">
                <div class="card__preview-main">
                  <img src="<?php echo esc_url(
                    $feature['img'],
                  ); ?>" alt="" class="card__preview-icon" width="80" height="80" />
                  <div class="card__preview-info">
                    <h3 class="card__preview-title"><?php echo esc_html(
                      $feature['featureTitle'],
                    ); ?></h3>
                    <div class="card__preview-description"><?php echo esc_html(
                      $feature['description'],
                    ); ?></div>
                  </div>
                </div>
              </div>
              <div class="card__body">
                <div class="card__grid card__grid--2-col">
                  <?php if (
                    !empty($feature['cells']) &&
                    is_array($feature['cells'])
                  ): ?>
                    <?php foreach ($feature['cells'] as $cell): ?>
                      <div class="card__cell tile">
                        <h4 class="card__cell-title h5"><?php echo esc_html(
                          $cell['title'],
                        ); ?></h4>
                        <p class="card__cell-description"><?php echo esc_html(
                          $cell['description'],
                        ); ?></p>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>
  <?php return ob_get_clean();
}
