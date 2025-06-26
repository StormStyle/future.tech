<?php get_header(); ?>    

<main>
      <section class="hero-alt">
   <header class="hero-alt__header">
      <div class="hero-alt__header-inner container">
         <h1 class="hero-alt__title">
            Today's Headlines: Stay
            <span class="hero-alt__title-hidden-part">Informed</span>
         </h1>
         <p class="hero-alt__subtitle h1 hidden-mobile">Informed</p>
         <p class="hero-alt__description">
            Explore the latest news from around the world. We bring you
            up-to-the-minute updates on the most significant events, trends,
            and stories. Discover the world through our news coverage.
         </p>
      </div>
   </header>
   <div class="hero-alt__body">
   <ul class="list">
   <li class="list__item">
      <?php
         $args = [
           'post_type'      => 'post',
           'posts_per_page' => 1,
           'post_status'    => 'publish',
           'orderby'        => 'date',
           'order'          => 'DESC',
           'ignore_sticky_posts' => true
         ];
         
         $query = new WP_Query($args);
         
         if ($query->have_posts()):
           while ($query->have_posts()): $query->the_post();
         
             $img_url   = get_the_post_thumbnail_url(get_the_ID(), 'full');
             $title     = get_the_title();
             $link      = get_permalink();
             $excerpt   = get_the_excerpt();
             $category  = get_the_category();
             $category  = !empty($category) ? $category[0]->name : '';
             $date      = get_the_date();
             $author    = get_the_author();
         ?>
      <article class="news-card container">
         <img
            src="<?php echo esc_url($img_url); ?>"
            alt="<?php echo esc_attr($title); ?>"
            class="news-card__image"
            width="515"
            height="427"
            />
         <div class="news-card__body">
            <h2 class="news-card__title">
               <?php echo esc_html($title); ?>
            </h2>
            <div class="news-card__description">
               <p><?php echo esc_html($excerpt); ?></p>
            </div>
         </div>
         <div class="news-card__summary summary">
            <dl class="summary__list">
               <div class="summary__item">
                  <dt class="summary__key">Category</dt>
                  <dd class="summary__value"><?php echo esc_html($category); ?></dd>
               </div>
               <div class="summary__item">
                  <dt class="summary__key">Publication Date</dt>
                  <dd class="summary__value"><?php echo esc_html($date); ?></dd>
               </div>
               <div class="summary__item">
                  <dt class="summary__key">Author</dt>
                  <dd class="summary__value"><?php echo esc_html($author); ?></dd>
               </div>
            </dl>
         </div>
         <div class="news-card__controls">
            <div class="news-card__actions blog-actions">
               <ul class="blog-actions__list">
                  <li class="blog-actions__item">
                     <button class="blog-actions__button is-active" type="button" data-like>
                     <span class="blog-actions__icon-wrapper">
                     <?php echo file_get_contents(get_template_directory() . '/icons/heart.svg'); ?>
                     </span>
                     <span>14k</span>
                     </button>
                  </li>
                  <li class="blog-actions__item">
                     <button class="blog-actions__button" type="button">
                     <span class="blog-actions__icon-wrapper">
                     <?php echo file_get_contents(get_template_directory() . '/icons/tele.svg'); ?>
                     </span>
                     <span>204</span>
                     </button>
                  </li>
               </ul>
            </div>
            <a href="<?php echo esc_url($link); ?>" class="news-card__link button">Read More</a>
         </div>
      </article>
      <?php
         endwhile;
         wp_reset_postdata();
         endif;
         ?>
   </li>
   <li class="list__item">
      <div class="news container">
         <ul class="news__list">
            <?php
               $args = [
                 'post_type' => 'post',
                 'posts_per_page' => 4,
                 'post_status' => 'publish',
                 'orderby' => 'date',
                 'order' => 'DESC',
                 'ignore_sticky_posts' => true
               ];
               $query = new WP_Query($args);
               
               if ($query->have_posts()):
                 $posts = $query->posts; 
                 array_shift($posts);
               
                 foreach ($posts as $post):
                   setup_postdata($post); ?>
            <li class="news__item">
               <article class="news-card">
                  <?php if (has_post_thumbnail()): ?>
                  <div class="news-card__image">
                     <?php echo get_the_post_thumbnail(get_the_ID(), 'blog-post-thumb', [
                        'class' => 'news-card__image',
                        'alt' => get_the_title(),
                        ]); ?>
                  </div>
                  <?php endif; ?>
                  <div class="news-card__body">
                     <h2 class="news-card__title h6"><?php the_title(); ?></h2>
                     <div class="news-card__description">
                        <?php
                           $excerpt = get_the_excerpt();
                           $limit = 150;
                           if (strlen($excerpt) > $limit) {
                             $excerpt = substr($excerpt, 0, $limit) . '...';
                           }
                           echo '<p>' . esc_html($excerpt) . '</p>';
                           ?>
                     </div>
                  </div>
                  <div class="news-card__controls">
                     <div class="news-card__actions blog-actions">
                        <ul class="blog-actions__list">
                           <li class="blog-actions__item">
                              <button class="blog-actions__button" type="button" data-like>
                              <span class="blog-actions__icon-wrapper">
                              <?php echo file_get_contents(
                                 get_template_directory() . '/icons/heart.svg',
                                 ); ?>
                              </span>
                              <span>10k</span>
                              </button>
                           </li>
                           <li class="blog-actions__item">
                              <button class="blog-actions__button" type="button">
                              <span class="blog-actions__icon-wrapper">
                              <?php echo file_get_contents(
                                 get_template_directory() . '/icons/tele.svg',
                                 ); ?>
                              </span>
                              <span>124</span>
                              </button>
                           </li>
                        </ul>
                     </div>
                     <a href="<?php echo get_the_permalink(); ?>" class="news-card__link button">
                     <span class="icon icon--yellow-arrow">Read More</span>
                     </a>
                  </div>
               </article>
            </li>
            <?php
               endforeach;
               wp_reset_postdata();
               endif;
               ?>
         </ul>
      </div>
</section>

      <?php get_template_part('tab-reviews'); ?>

      <section class="section">
        <header class="section__header">
          <div class="section__header-inner container">
            <div class="section__header-info">
              <p class="section__subtitle tag">Featured Videos</p>
              <h2 class="section__title">
                Visual Insights for the Modern Viewer
              </h2>
            </div>
            <div class="section__actions">
              <a href="" class="section__link button">
                <span class="icon icon--yellow-arrow">View All</span>
              </a>
            </div>
          </div>
        </header>
        <div class="section__body">
          <ul class="bordered-grid bordered-grid--2-col container">
  <?php
    $videos = new WP_Query([
      'post_type'      => 'video',
      'posts_per_page' => 4,
      'post_status'    => 'publish',
    ]);

    if ($videos->have_posts()) :
      while ($videos->have_posts()) : $videos->the_post();
        $video_url   = get_post_meta(get_the_ID(), '_video_url', true);
        $poster      = get_the_post_thumbnail_url(get_the_ID(), 'large');
        $title       = get_the_title();
        $description = get_the_content();
  ?>
    <li class="bordered-grid__item">
      <div class="video-card">
        <div class="video-card__player video-player" data-js-video-player>
          <video
            poster="<?php echo esc_url($poster); ?>"
            src="<?php echo esc_url($video_url); ?>"
            class="video-player__video"
            width="712"
            height="412"
            data-js-video-player-video
          ></video>
          <div
            class="video-player__panel is-active"
            data-js-video-player-panel
          >
            <button
              class="video-player__play-button"
              type="button"
              data-js-video-player-play-button
            >
              <svg
                width="58"
                height="58"
                viewBox="0 0 58 58"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M0.5625 29C0.5625 13.2944 13.2944 0.5625 29 0.5625C44.7056 0.5625 57.4375 13.2944 57.4375 29C57.4375 44.7056 44.7056 57.4375 29 57.4375C13.2944 57.4375 0.5625 44.7056 0.5625 29ZM41.4663 26.1318C43.7167 27.382 43.7167 30.6183 41.4663 31.8685L25.1248 40.9471C22.9377 42.1621 20.25 40.5807 20.25 38.0788V19.9215C20.25 17.4196 22.9377 15.8381 25.1248 17.0531L41.4663 26.1318Z"
                  fill="white"
                />
              </svg>
            </button>
            <div class="video-player__duration"><?php echo esc_html(get_post_meta(get_the_ID(), '_video_duration', true)); ?>
</div>
          </div>
        </div>
        <div class="video-card__body">
          <h3 class="video-card__title h5">
            <?php echo esc_html($title); ?>
          </h3>
          <div class="video-card__descpription">
            <?php echo wp_kses_post(wp_trim_words($description, 25, '...')); ?>
          </div>
        </div>
      </div>
    </li>
  <?php
      endwhile;
      wp_reset_postdata();
    endif;
  ?>
</ul>

        </div>
      </section>

      <section class="about">
        <div class="about__inner container">
          <header class="about__header">
            <img
              src="/img/about/icon.svg"
              alt=""
              class="about__icon"
              width="150"
              height="150"
            />
            <div class="about__info">
              <p class="about__subtitle tag">Learn, Connect, and Innovate</p>
              <h2 class="about__title">
                Be Part of the Future Tech Revolution
              </h2>
            </div>
            <div class="about__description">
              <p>
                Immerse yourself in the world of future technology. Explore our
                comprehensive resources, connect with fellow tech enthusiasts,
                and drive innovation in the industry. Join a dynamic community
                of forward-thinkers.
              </p>
            </div>
          </header>
          <ul class="about__list">
            <li class="about__item">
              <a href="" class="about-card tile">
                <h3 class="about-card__title circle-icon">Resource Access</h3>
                <div class="about-card__description">
                  <p>
                    Visitors can access a wide range of resources, including
                    ebooks, whitepapers, reports.
                  </p>
                </div>
              </a>
            </li>
            <li class="about__item">
              <a href="" class="about-card tile">
                <h3 class="about-card__title circle-icon">Community Forum</h3>
                <div class="about-card__description">
                  <p>
                    Join our active community forum to discuss industry trends,
                    share insights, and collaborate with peers.
                  </p>
                </div>
              </a>
            </li>
            <li class="about__item">
              <a href="" class="about-card tile">
                <h3 class="about-card__title circle-icon">Tech Events</h3>
                <div class="about-card__description">
                  <p>
                    Stay updated on upcoming tech events, webinars, and
                    conferences to enhance your knowledge.
                  </p>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </section>
    </main>

<?php get_footer(); ?>
