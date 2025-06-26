<?php get_header(); ?>    
<main>
   <section class="blog-details">
      <?php
         $latest_post = new WP_Query([
           'posts_per_page' => 1,
           'post_status' => 'publish',
         ]);
         if ($latest_post->have_posts()):
           $latest_post->the_post();
           $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
           ?>
      <header
         class="blog-details__banner"
         style="--bgImg: url('<?php echo esc_url($image_url); ?>')"
         >
         <div class="blog-details__banner-inner container">
            <h1 class="blog-details__title"><?php the_title(); ?></h1>
         </div>
      </header>
      <div class="blog-details__body">
         <div class="blog-details__body-inner container">
            <div class="blog-details__content">
               <div
                  class="blog-details__intro full-vw-line full-vw-line--bottom full-vw-line--left"
                  >
                  <h2 class="h6">Introduction</h2>
                  <p>
                     <?php echo get_the_excerpt(); ?>
                  </p>
               </div>
               <div
                  class="blog-details__main expandable-content"
                  data-js-expandable-content
                  >
                  <?php the_content(); ?>
                  <button
                     class="blog-details__read-full-button button expandable-content__button"
                     data-js-expandable-content-button
                     >
                  <span class="icon icon--yellow-eye">Read Full Blog</span>
                  </button>
               </div>
            </div>
            <div class="blog-details__info">
               <div
                  class="blog-details__actions blog-actions full-vw-line full-vw-line--bottom full-vw-line--right"
                  >
                  <ul class="blog-actions__list">
                     <li class="blog-actions__item">
                        <button
                           class="blog-actions__button is-active"
                           type="button"
                           data-like
                           >
                        <span class="blog-actions__icon-wrapper"
                           ><?php echo file_get_contents(
                           get_template_directory() . '/icons/heart.svg',
                           ); ?>
                        </span>
                        <span> 24.5k </span>
                        </button>
                     </li>
                     <li class="blog-actions__item">
                        <button class="blog-actions__button" type="button">
                        <span class="blog-actions__icon-wrapper"
                           ><?php echo file_get_contents(
                           get_template_directory() . '/icons/view.svg',
                           ); ?>
                        </span>
                        <span> 50 </span>
                        </button>
                     </li>
                     <li class="blog-actions__item">
                        <button class="blog-actions__button" type="button">
                        <span class="blog-actions__icon-wrapper"
                           ><?php echo file_get_contents(
                           get_template_directory() . '/icons/tele.svg',
                           ); ?>
                        </span>
                        <span> 20 </span>
                        </button>
                     </li>
                  </ul>
               </div>
               <div class="blog-details__summary summary summary--2-col">
                  <dl class="summary__list">
                     <div class="summary__item">
                        <dl class="summary__key">Category</dl>
                        <dd class="summary__value"><?php the_category(''); ?></dd>
                     </div>
                     <div class="summary__item">
                        <dl class="summary__key">Publication Date</dl>
                        <dd class="summary__value"><?php the_date(); ?></dd>
                     </div>
                     <div class="summary__item">
                        <dl class="summary__key">Author</dl>
                        <dd class="summary__value"><?php the_author(); ?></dd>
                     </div>
                     <div class="summary__item">
                        <dl class="summary__key">Reading Time</dl>
                        <dd class="summary__value">Environment</dd>
                     </div>
                     <div class="summary__item summary__item--wide">
                        <dl class="summary__key">Table of Contents</dl>
                        <dd class="summary__value">
                           <div class="table-of-contents">
                              <ul class="table-of-contents__list">
                                 <?php
                                    $categories = get_categories([
                                      'hide_empty' => 0,
                                    ]);
                                    if (!empty($categories)) {
                                      foreach ($categories as $category) {
                                        echo '<li class="table-of-contents__item">' .
                                          esc_html($category->name) .
                                          '</li>';
                                      }
                                    } else {
                                      echo '<li class="table-of-contents__item">Категорий нет</li>';
                                    }
                                    ?>
                              </ul>
                           </div>
                        </dd>
                     </div>
                  </dl>
               </div>
            </div>
         </div>
      </div>
      <?php wp_reset_postdata();
         endif;
         ?>
      <div class="blog-details__news news container">
         <header class="news__header">
            <h2 class="news__title h4">Similar News</h2>
            <a href="" class="news__link button">
            <span class="icon icon--yellow-arrow">View All News</span>
            </a>
         </header>
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
   <?php get_template_part('templates/about'); ?>
</main>
<?php get_footer(); ?>