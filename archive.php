<?php get_header(); ?>

    <main>
<section class="section">
   <header class="section__header">
      <div class="section__header-inner container">
         <div class="section__header-info">
            <p class="section__subtitle tag">All information about here</p>
            <h2 class="section__title"><?php if (is_category()) {
              echo single_cat_title();
            } elseif (is_tag()) {
              echo single_tag_title();
            } elseif (is_post_type_archive()) {
              echo post_type_archive_title();
            } elseif (is_tax()) {
              echo single_term_title();
            } else {
              echo 'Archive';
            } ?></h2>
         </div>
         <div class="section__actions">
           <a href="<?php echo esc_url(
             wp_get_referer() ? wp_get_referer() : home_url('/'),
           ); ?>" class="section__link button">
  <span class="icon icon--yellow-arrow">Back to Previous</span>
</a>

         </div>
      </div>
   </header>
   <div class="hero-alt__body">
   <ul class="list">
   <li class="list__item">
      <div class="news container">
         <ul class="news__list">
  <?php
  $args = [
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'ignore_sticky_posts' => true,
  ];

  if (is_category()) {
    $category = get_queried_object();
    if ($category && !is_wp_error($category)) {
      $args['cat'] = $category->term_id;
    }
  }

  if (is_author()) {
    $author = get_queried_object();
    if ($author && !is_wp_error($author)) {
      $args['author'] = $author->ID;
    }
  }

  $query = new WP_Query($args);

  if ($query->have_posts()):
    while ($query->have_posts()):
      $query->the_post(); ?>
      <li class="news__item">
        <article class="news-card">
          <?php if (has_post_thumbnail()): ?>
          <div class="news-card__image">
            <?php the_post_thumbnail('blog-post-thumb', [
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
            <a href="<?php the_permalink(); ?>" class="news-card__link button">
              <span class="icon icon--yellow-arrow">Read More</span>
            </a>
          </div>
        </article>
      </li>
  <?php
    endwhile;
    wp_reset_postdata();
  endif;
  ?>
</ul>

      </div>
   </section>
    </main>

    
<?php get_footer(); ?>
