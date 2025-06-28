<?php get_header(); ?>
<main>
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
      <ul class="bordered-grid bordered-grid--2-col container">
         <?php
         $videos = new WP_Query([
           'post_type' => 'video',
           'posts_per_page' => -1,
           'post_status' => 'publish',
         ]);

         if ($videos->have_posts()):
           while ($videos->have_posts()):

             $videos->the_post();
             $video_url = get_post_meta(get_the_ID(), '_video_url', true);
             $poster = get_the_post_thumbnail_url(get_the_ID(), 'large');
             $title = get_the_title();
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
                     <div class="video-player__duration"><?php echo esc_html(
                       get_post_meta(get_the_ID(), '_video_duration', true),
                     ); ?></div>
                  </div>
               </div>
               <div class="video-card__body">
                  <h3 class="video-card__title h5">
                     <?php echo esc_html($title); ?>
                  </h3>
                  <div class="video-card__descpription">
                     <?php echo wp_kses_post(
                       wp_trim_words($description, 25, '...'),
                     ); ?>
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

<?php get_template_part('templates/about'); ?>
</main>
<?php get_footer(); ?>
