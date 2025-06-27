<?php

function register_hero_block()
{
  wp_register_style(
    'hero-block-editor-style',
    get_template_directory_uri() . '/blocks/block-editor.css',
    ['wp-edit-blocks'],
    filemtime(get_template_directory() . '/blocks/block-editor.css'),
  );

  wp_register_script(
    'hero-block-editor-script',
    get_template_directory_uri() . '/blocks/hero-block/hero-block.js',
    [
      'wp-blocks',
      'wp-element',
      'wp-editor',
      'wp-components',
      'wp-i18n',
      'wp-block-editor',
    ],
    filemtime(get_template_directory() . '/blocks/hero-block/hero-block.js'),
  );

  register_block_type('custom/hero-block', [
    'editor_script' => 'hero-block-editor-script',
    'editor_style' => 'hero-block-editor-style', // Стили для редактора
    'render_callback' => 'render_hero_block',
    'attributes' => [
      'mainSubtitle' => [
        'type' => 'string',
        'default' => 'Your Journey to Tomorrow Begins Here',
      ],
      'mainTitle' => [
        'type' => 'string',
        'default' => 'Explore the Frontiers of Artificial Intelligence',
      ],
      'mainDescription' => [
        'type' => 'string',
        'default' =>
          'Welcome to the epicenter of AI innovation. FutureTech AI News is your passport to a world where machines think, learn, and reshape the future. Join us on this visionary expedition into the heart of AI.',
      ],
      'metrics' => [
        'type' => 'array',
        'default' => [
          ['title' => 'Resources available', 'value' => '300+'],
          ['title' => 'Total Downloads', 'value' => '12k+'],
          ['title' => 'Active Users', 'value' => '10k+'],
        ],
        'items' => ['type' => 'object'],
      ],
      'teamImages' => [
        'type' => 'array',
        'default' => [
          get_template_directory_uri() . '/img/team/1.png',
          get_template_directory_uri() . '/img/team/2.png',
          get_template_directory_uri() . '/img/team/3.png',
        ],
        'items' => ['type' => 'string'],
      ],
      'resourcesTitle' => [
        'type' => 'string',
        'default' => 'Explore 1000+ resources',
      ],
      'resourcesSubtitle' => [
        'type' => 'string',
        'default' =>
          'Over 1,000 articles on emerging tech trends and breakthroughs.',
      ],
      'resourcesLink' => [
        'type' => 'string',
        'default' => '#',
      ],
      'resourcesLinkText' => [
        'type' => 'string',
        'default' => 'Explore Resources',
      ],
      'advantages' => [
        'type' => 'array',
        'default' => [
          [
            'img' => get_template_directory_uri() . '/img/advantage/1.svg',
            'title' => 'Latest News Updates',
            'subtitle' => 'Stay Current',
            'details' => 'Over 1,000 articles published monthly',
            'link' => '#',
          ],
          [
            'img' => get_template_directory_uri() . '/img/advantage/2.svg',
            'title' => 'Expert Contributors',
            'subtitle' => 'Trusted Insights',
            'details' => '50+ renowned AI experts on our team',
            'link' => '#',
          ],
          [
            'img' => get_template_directory_uri() . '/img/advantage/3.svg',
            'title' => 'Global Readership',
            'subtitle' => 'Worldwide Impact',
            'details' => '2 million monthly readers',
            'link' => '#',
          ],
        ],
        'items' => ['type' => 'object'],
      ],
    ],
  ]);
}
add_action('init', 'register_hero_block');

function render_hero_block($attributes)
{
  $atts = wp_parse_args($attributes, [
    'mainSubtitle' => '',
    'mainTitle' => '',
    'mainDescription' => '',
    'metrics' => [],
    'teamImages' => [],
    'resourcesTitle' => '',
    'resourcesSubtitle' => '',
    'resourcesLink' => '',
    'resourcesLinkText' => '',
    'advantages' => [],
  ]);

  ob_start();
  ?>
    <section class="hero">
      <div class="hero__main container">
         <div class="hero__body">
            <p class="hero__subtitle"><?php echo esc_html(
              $atts['mainSubtitle'],
            ); ?></p>
            <h1 class="hero__title"><?php echo esc_html(
              $atts['mainTitle'],
            ); ?></h1>
            <div class="hero__description">
               <p><?php echo esc_html($atts['mainDescription']); ?></p>
            </div>
         </div>
         <div class="hero__metrix metrix full-vw-line full-vw-line--top full-vw-line--left">
            <dl class="metrix__list">
                <?php foreach ($atts['metrics'] as $metric): ?>
                    <div class="metrix__item">
                        <dt class="metrix__key"><?php echo esc_html(
                          $metric['title'],
                        ); ?> </dt>
                        <dd class="metrix__value h3"><?php echo esc_html(
                          $metric['value'],
                        ); ?><span class="metrix__sign">+</span></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
         </div>
         <div class="hero__resources-preview resources-preview">
            <div class="resources-preview__team team">
                <?php foreach ($atts['teamImages'] as $img): ?>
                    <img src="<?php echo esc_url(
                      $img,
                    ); ?>" alt="" class="team__person" width="60" height="60" />
                <?php endforeach; ?>
            </div>
            <div class="resources-preview__body">
               <p class="resources-preview__title h5"><?php echo esc_html(
                 $atts['resourcesTitle'],
               ); ?></p>
               <p class="resources-preview__subtitle"><?php echo esc_html(
                 $atts['resourcesSubtitle'],
               ); ?></p>
               <a href="<?php echo esc_url(
                 $atts['resourcesLink'],
               ); ?>" class="resources-preview__button button">
                  <span class="icon icon--yellow-arrow"><?php echo esc_html(
                    $atts['resourcesLinkText'],
                  ); ?></span>
               </a>
            </div>
         </div>
      </div>
      <div class="hero__advantages">
         <h2 class="visually-hidden"></h2>
         <ul class="hero__advantages-list container">
            <?php foreach ($atts['advantages'] as $adv): ?>
            <li class="hero__advantages-item">
               <div class="advantage-card">
                  <img src="<?php echo esc_url(
                    $adv['img'],
                  ); ?>" alt="" class="advantage-card__image" width="50" height="50" />
                  <a href="<?php echo esc_url(
                    $adv['link'],
                  ); ?>" class="advantage-card__link circle-icon">
                     <h3 class="advantage-card__title"><?php echo esc_html(
                       $adv['title'],
                     ); ?></h3>
                     <p class="advantage-card__subtitle"><?php echo esc_html(
                       $adv['subtitle'],
                     ); ?></p>
                  </a>
                  <p class="advantage-card__details"><?php echo esc_html(
                    $adv['details'],
                  ); ?></p>
               </div>
            </li>
            <?php endforeach; ?>
         </ul>
      </div>
    </section>
  <?php return ob_get_clean();
}
