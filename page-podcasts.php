<?php get_header(); ?>  
<main>
   <section class="hero-alt">
      <header class="hero-alt__header">
         <div class="hero-alt__header-inner container">
            <h1 class="hero-alt__title">
               Unlock the World of Artificial Intelligence
               <span class="hero-alt__title-hidden-part">through Podcasts</span>
            </h1>
            <p class="hero-alt__subtitle h1 hidden-mobile">through Podcasts</p>
            <p class="hero-alt__description">
               Dive deep into the AI universe with our collection of insightful
               podcasts. Explore the latest trends, breakthroughs, and
               discussions on artificial intelligence. Whether you're an
               enthusiast or a professional, our AI podcasts offer a gateway to
               knowledge and innovation.
            </p>
         </div>
      </header>
      <div class="hero-alt__body">
         <ul class="list">
            <?php
               $podcasts = new WP_Query([
                 'post_type' => 'podcast',
                 'posts_per_page' => 2,
               ]);
               
               if ($podcasts->have_posts()):
                 while ($podcasts->have_posts()):
               
                   $podcasts->the_post();
                   $video_url = get_post_meta(
                     get_the_ID(),
                     '_podcast_video_url',
                     true,
                   );
                   $poster_url = get_post_meta(
                     get_the_ID(),
                     '_podcast_poster_url',
                     true,
                   );
                   $author = get_post_meta(
                     get_the_ID(),
                     '_podcast_author_name',
                     true,
                   );
                   $episodes = get_post_meta(
                     get_the_ID(),
                     '_podcast_total_episodes',
                     true,
                   );
                   $length = get_post_meta(
                     get_the_ID(),
                     '_podcast_average_length',
                     true,
                   );
                   $frequency = get_post_meta(
                     get_the_ID(),
                     '_podcast_release_frequency',
                     true,
                   );
                   ?>
            <li class="list__item">
               <div class="card container">
                  <div class="card__preview">
                     <div class="card__preview-main">
                        <img
                           src="<?php echo get_template_directory_uri(); ?>/img/card/4.svg"
                           alt=""
                           class="card__preview-icon"
                           width="80"
                           height="80"
                           />
                        <div class="card__preview-info">
                           <h2 class="card__preview-title h3">
                              <span class="podcast-category">
                              <?php
                                 $terms = get_the_terms(
                                   get_the_ID(),
                                   'podcast_category',
                                 );
                                 if ($terms && !is_wp_error($terms)) {
                                   $term_names = wp_list_pluck($terms, 'name');
                                   echo esc_html(implode(', ', $term_names));
                                 }
                                 ?>
                              </span>
                           </h2>
                           <div class="card__rating-view rating-view" data-rating>
                              <div class="rating-view__star" data-index="1"></div>
                              <div class="rating-view__star" data-index="2"></div>
                              <div class="rating-view__star" data-index="3"></div>
                              <div class="rating-view__star" data-index="4"></div>
                              <div class="rating-view__star" data-index="5"></div>
                           </div>
                        </div>
                     </div>
                     <div class="card__preview-extra">
                        <div class="card__cell tile">
                           <h3 class="card__cell-subtitle h4">Author</h3>
                           <p class="card__cell-description h6"><?php echo esc_html(
                              $author,
                              ); ?></p>
                           <a href="" class="card__cell-link button">
                           <span class="icon icon--yellow-arrow">Preview</span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="card__body">
                     <div class="card__grid card__grid--3-col">
                        <div class="card__cell card__cell--wide">
                           <div class="video-player" data-js-video-player>
                              <video
                                 poster="<?php echo esc_url($poster_url); ?>"
                                 src="<?php echo esc_url($video_url); ?>"
                                 class="video-player__video"
                                 width="712"
                                 height="412"
                                 data-js-video-player-video
                                 ></video>
                              <div
                                 class="video-player__panel video-player__panel--center is-active"
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
                              </div>
                           </div>
                        </div>
                        <div class="card__cell card__cell--wide">
                           <h3 class="card__cell-title h4"><?php echo get_the_title(); ?></h3>
                           <p class="card__cell-description"><?php the_content(); ?></p>
                        </div>
                        <div class="card__cell tile">
                           <p class="card__cell-title">Total Episodes</p>
                           <p class="card__cell-description h6"><?php echo esc_html(
                              $episodes,
                              ); ?></p>
                        </div>
                        <div class="card__cell tile">
                           <p class="card__cell-title">Average Length</p>
                           <p class="card__cell-description h6"><?php echo esc_html(
                              $length,
                              ); ?></p>
                        </div>
                        <div class="card__cell tile">
                           <p class="card__cell-title">Release Frequency</p>
                           <p class="card__cell-description h6"><?php echo esc_html(
                              $frequency,
                              ); ?></p>
                        </div>
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
   <section class="section">
      <header class="section__header">
         <div class="section__header-inner container">
            <div class="section__header-info">
               <p class="section__subtitle tag">Featured Videos</p>
               <h2 class="section__title">
                  Visual Insights for the Modern Viewer
               </h2>
            </div>
         </div>
      </header>
      <div class="section__body">
         <ul class="bordered-grid bordered-grid--3-col container">
            <?php
               $podcasts = new WP_Query([
                 'post_type' => 'podcast',
                 'posts_per_page' => 6,
                 'offset' => 2,
               ]);
               
               if ($podcasts->have_posts()):
                 while ($podcasts->have_posts()):
               
                   $podcasts->the_post();
               
                   $video_url = get_post_meta(
                     get_the_ID(),
                     '_podcast_video_url',
                     true,
                   );
                   $poster_url = get_post_meta(
                     get_the_ID(),
                     '_podcast_poster_url',
                     true,
                   );
                   $excerpt = get_the_excerpt();
                   $title = get_the_title();
                   ?>
            <li class="bordered-grid__item">
               <div class="video-card">
                  <div class="video-card__player video-player" data-js-video-player>
                     <video
                        poster="<?php echo esc_url(
                           $poster_url ?:
                           get_template_directory_uri() .
                             '/img/videos/default.jpg',
                           ); ?>"
                        src="<?php echo esc_url($video_url); ?>"
                        class="video-player__video video-player__video--small"
                        width="470"
                        height="390"
                        data-js-video-player-video
                        ></video>
                     <div class="video-player__panel is-active" data-js-video-player-panel>
                        <button class="video-player__play-button" type="button" data-js-video-player-play-button>
                           <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5625 29C0.5625 13.2944 13.2944 0.5625 29 0.5625C44.7056 0.5625 57.4375 13.2944 57.4375 29C57.4375 44.7056 44.7056 57.4375 29 57.4375C13.2944 57.4375 0.5625 44.7056 0.5625 29ZM41.4663 26.1318C43.7167 27.382 43.7167 30.6183 41.4663 31.8685L25.1248 40.9471C22.9377 42.1621 20.25 40.5807 20.25 38.0788V19.9215C20.25 17.4196 22.9377 15.8381 25.1248 17.0531L41.4663 26.1318Z" fill="white"/>
                           </svg>
                        </button>
                        <?php
                           $duration = get_post_meta(
                             get_the_ID(),
                             '_podcast_average_length',
                             true,
                           );
                           if ($duration): ?>
                        <div class="video-player__duration"><?php echo esc_html(
                           $duration,
                           ); ?></div>
                        <?php endif;
                           ?>
                     </div>
                  </div>
                  <div class="video-card__body">
                     <h3 class="video-card__title h5"><?php
                        $max_length = 36;
                        $trimmed_title =
                          mb_strlen($title) > $max_length
                            ? mb_substr($title, 0, $max_length - 3) . '...'
                            : $title;
                        echo esc_html($trimmed_title);
                        ?></h3>
                     <div class="video-card__description">
                        <?php
                           $raw_excerpt = get_the_excerpt();
                           $clean_excerpt = wp_strip_all_tags($raw_excerpt);
                           $max_length = 108;
                           
                           $trimmed_excerpt =
                             mb_strlen($clean_excerpt) > $max_length
                               ? mb_substr($clean_excerpt, 0, $max_length - 3) .
                                 '...'
                               : $clean_excerpt;
                           
                           echo esc_html($trimmed_excerpt);
                           ?>
                     </div>
                     <a href="<?php the_permalink(); ?>" class="video-card__link button">
                     <span class="icon icon--yellow-arrow">Listen Podcast</span>
                     </a>
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
   <?php get_template_part('templates/about'); ?>
</main>
<?php get_footer(); ?>
