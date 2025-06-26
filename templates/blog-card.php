<li class="list__item">
  <article class="blog-card container">
    <div class="blog-card__author person-card">
      <?php
$author_name = get_post_meta(get_the_ID(), '_custom_author_name', true);
$author_position = get_post_meta(get_the_ID(), '_custom_author_position', true);
$author_avatar = get_post_meta(get_the_ID(), '_custom_author_avatar', true);
?>
      <img
        src="<?php echo esc_url($author_avatar); ?>"
        alt="<?php the_author(); ?>"
        class="person-card__image"
        width="80"
        height="80"
      />
      <div class="person-card__body">
        <p class="person-card__name"><?php echo esc_html($author_name); ?></p>
<p class="person-card__post"><?php echo esc_html($author_position); ?></p>

      </div>
    </div>

    <div class="blog-card__body">
      <time datetime="<?php echo get_the_date('c'); ?>" class="blog-card__date h6">
        <?php echo get_the_date('F j, Y'); ?>
      </time>

      <div class="blog-card__info">
        <h4 class="blog-card__title"><?php the_title(); ?></h4>
        <div class="blog-card__description">
          <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
        </div>
      </div>

      <div class="blog-card__actions blog-actions">
        <ul class="blog-actions__list">
          <li class="blog-actions__item">
            <button class="blog-actions__button is-active" type="button" data-like>
              <span class="blog-actions__icon-wrapper">
                <?php echo file_get_contents(
                           get_template_directory() . '/icons/heart.svg',
                           ); ?>
              </span>
              <span>
                <span> 24.5k </span>
              </span>
            </button>
          </li>
          <li class="blog-actions__item">
            <button class="blog-actions__button" type="button">
              <span class="blog-actions__icon-wrapper">
                <?php echo file_get_contents(
                           get_template_directory() . '/icons/view.svg',
                           ); ?>
              </span>
              <span> 50 </span>
            </button>
          </li>
          <li class="blog-actions__item">
            <button class="blog-actions__button" type="button">
              <span class="blog-actions__icon-wrapper">
                <?php echo file_get_contents(
                           get_template_directory() . '/icons/tele.svg',
                           ); ?>
              </span>
              <span>20</span>
            </button>
          </li>
        </ul>
      </div>
    </div>

    <a href="<?php the_permalink(); ?>" class="blog-card__link button">
      <span class="icon icon--yellow-arrow">View Blog</span>
    </a>
  </article>
</li>
