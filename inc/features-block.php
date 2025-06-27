<?php
function register_features_block()
{
  wp_register_script(
    'features-block-editor-script',
    get_template_directory_uri() .
      '/inc/blocks/features-block/features-block.js',
    ['wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n'],
    filemtime(
      get_template_directory() . '/inc/blocks/features-block/features-block.js',
    ),
  );

  register_block_type('custom/features-block', [
    'editor_script' => 'features-block-editor-script',
    'render_callback' => 'render_features_block',
    'attributes' => [
      'sectionSubtitle' => [
        'type' => 'string',
        'default' => 'Unlock the Power of',
      ],
      'sectionTitle' => [
        'type' => 'string',
        'default' => 'FutureTech Features',
      ],
      'cards' => [
        'type' => 'array',
        'default' => [
          [
            'icon' => get_template_directory_uri() . '/img/card/1.svg',
            'previewTitle' => 'Future Technology Blog',
            'previewDescription' =>
              'Stay informed with our blog section dedicated to future technology.',
            'tiles' => [
              [
                'title' => 'Quantity',
                'description' =>
                  'Over 1,000 articles on emerging tech trends and breakthroughs.',
              ],
              [
                'title' => 'Variety',
                'description' =>
                  'Over 1,000 articles on emerging tech trends and breakthroughs.Articles cover fields like AI, robotics, biotechnology, and more.',
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
            'icon' => get_template_directory_uri() . '/img/card/2.svg',
            'previewTitle' => 'Research Insights Blogs',
            'previewDescription' =>
              'Dive deep into future technology concepts with our research section.',
            'tiles' => [
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
        'items' => [
          'type' => 'object',
        ],
      ],
    ],
  ]);
}
add_action('init', 'register_features_block');

function render_features_block($attributes)
{
  $atts = wp_parse_args($attributes, [
    'sectionSubtitle' => 'Unlock the Power of',
    'sectionTitle' => 'FutureTech Features',
    'cards' => [],
  ]);

  ob_start();
  ?>
  <section class="section">
    <header class="section__header">
      <div class="section___header-inner container">
        <div class="section__header-info">
          <p class="section__subtitle tag"><?php echo esc_html(
            $atts['sectionSubtitle'],
          ); ?></p>
          <h2 class="section__title"><?php echo esc_html(
            $atts['sectionTitle'],
          ); ?></h2>
        </div>
      </div>
    </header>
    <div class="section__body">
      <ul class="list">
        <?php foreach ($atts['cards'] as $card): ?>
          <li class="list__item">
            <div class="card container">
              <div class="card__preview">
                <div class="card__preview-main">
                  <img src="<?php echo esc_url(
                    $card['icon'],
                  ); ?>" alt="" class="card__preview-icon" width="80" height="80" />
                  <div class="card__preview-info">
                    <h3 class="card__preview-title"><?php echo esc_html(
                      $card['previewTitle'],
                    ); ?></h3>
                    <div class="card__preview-description"><?php echo esc_html(
                      $card['previewDescription'],
                    ); ?></div>
                  </div>
                </div>
              </div>
              <div class="card__body">
                <div class="card__grid card__grid--2-col">
                  <?php foreach ($card['tiles'] as $tile): ?>
                    <div class="card__cell tile">
                      <h4 class="card__cell-title h5"><?php echo esc_html(
                        $tile['title'],
                      ); ?></h4>
                      <p class="card__cell-description"><?php echo esc_html(
                        $tile['description'],
                      ); ?></p>
                    </div>
                  <?php endforeach; ?>
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
