<!-- <section class="hero-alt"> -->
   <!-- <header class="hero-alt__header">
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
   </header> -->
   <div class="hero-alt__body">
   <ul class="list">
   <li class="list__item">
      <?php
      $args = [
        'post_type' => 'post',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'ignore_sticky_posts' => true,
      ];

      $query = new WP_Query($args);

      if ($query->have_posts()):
        while ($query->have_posts()):

          $query->the_post();

          $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
          $title = get_the_title();
          $link = get_permalink();
          $excerpt = get_the_excerpt();
          $category = get_the_category();
          $category = !empty($category) ? $category[0]->name : '';
          $date = get_the_date();
          $author = get_the_author();
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
                  <dd class="summary__value"><?php echo esc_html(
                    $category,
                  ); ?></dd>
               </div>
               <div class="summary__item">
                  <dt class="summary__key">Publication Date</dt>
                  <dd class="summary__value"><?php echo esc_html($date); ?></dd>
               </div>
               <div class="summary__item">
                  <dt class="summary__key">Author</dt>
                  <dd class="summary__value"><?php echo esc_html(
                    $author,
                  ); ?></dd>
               </div>
            </dl>
         </div>
         <div class="news-card__controls">
            <div class="news-card__actions blog-actions">
               <ul class="blog-actions__list">
                  <li class="blog-actions__item">
                     <button class="blog-actions__button is-active" type="button" data-like>
                     <span class="blog-actions__icon-wrapper">
                     <?php echo file_get_contents(
                       get_template_directory() . '/icons/heart.svg',
                     ); ?>
                     </span>
                     <span>14k</span>
                     </button>
                  </li>
                  <li class="blog-actions__item">
                     <button class="blog-actions__button" type="button">
                     <span class="blog-actions__icon-wrapper">
                     <?php echo file_get_contents(
                       get_template_directory() . '/icons/tele.svg',
                     ); ?>
                     </span>
                     <span>204</span>
                     </button>
                  </li>
               </ul>
            </div>
            <a href="<?php echo esc_url(
              $link,
            ); ?>" class="news-card__link button">Read More</a>
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
              'ignore_sticky_posts' => true,
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
                     <?php echo get_the_post_thumbnail(
                       get_the_ID(),
                       'blog-post-thumb',
                       [
                         'class' => 'news-card__image',
                         'alt' => get_the_title(),
                       ],
                     ); ?>
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
<!-- </section> -->