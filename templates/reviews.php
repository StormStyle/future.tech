<div class="section__body">
         <?php
         $args = [
           'post_type' => 'review',
           'posts_per_page' => -1,
           'orderby' => 'date',
           'order' => 'DESC',
         ];

         $reviews = new WP_Query($args);

         if ($reviews->have_posts()): ?>
         <ul class="bordered-grid bordered-grid--3-col container">
            <?php
            while ($reviews->have_posts()):

              $reviews->the_post();
              $review_id = get_the_ID();
              $person_id = get_post_meta($review_id, '_review_person_id', true);
              $rating = intval(
                get_post_meta($review_id, '_review_rating', true),
              );
              if ($rating < 1 || $rating > 5) {
                $rating = 0;
              }
              if ($person_id && get_post_status($person_id)) {
                $person_avatar_id = get_post_thumbnail_id($person_id);
                $avatar_url = $person_avatar_id
                  ? wp_get_attachment_image_url($person_avatar_id, 'thumbnail')
                  : '';
                $person_name = get_the_title($person_id);
                $person_location = get_post_meta(
                  $person_id,
                  '_person_location',
                  true,
                );
              } else {
                $person_name = get_post_meta(
                  $review_id,
                  '_review_manual_name',
                  true,
                );
                $person_location = get_post_meta(
                  $review_id,
                  '_review_manual_location',
                  true,
                );
                $review_thumbnail_id = get_post_thumbnail_id($review_id);
                $avatar_url = $review_thumbnail_id
                  ? wp_get_attachment_image_url(
                    $review_thumbnail_id,
                    'thumbnail',
                  )
                  : '';
              }
              ?>
            <li class="bordered-grid__item">
               <div class="review-card">
                  <div class="review-card__author person-card">
                     <img src="<?php echo esc_url(
                       $avatar_url,
                     ); ?>" alt="<?php echo esc_attr(
  $person_name,
); ?>" width="60"
                        height="60">
                     <div class="person-card__body">
                        <p class="person-card__name"><?php echo esc_html(
                          $person_name,
                        ); ?></p>
                        <p class="person-card__post"><?php echo esc_html(
                          $person_location,
                        ); ?></p>
                     </div>
                  </div>
                  <div class="review-card__body tile">
                     <div class="review-card__rating-view rating-view" data-rating="<?php echo $rating; ?>">
                        <?php for ($i = 1; $i <= 5; $i++) {
                          $active_class = $i <= $rating ? ' is-active' : '';
                          echo '<div class="rating-view__star' .
                            $active_class .
                            '" data-index="' .
                            $i .
                            '"></div>';
                        } ?>
                     </div>
                     <blockquote class="review-card__description">
                        <p>
                           <?php the_content(); ?>
                        </p>
                     </blockquote>
                  </div>
               </div>
            </li>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
      </div>
      <?php endif;
         ?>
      </ul>
      </div>