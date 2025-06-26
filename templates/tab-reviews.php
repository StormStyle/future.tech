<header class="section__header">
   <div class="section__header-inner container">
      <div class="section__header-info">
         <p class="section__subtitle tag">A Knowledge Treasure Trove</p>
         <h2 class="section__title">
            Explore FutureTech's In-Depth Blog Posts
         </h2>
      </div>
      <div class="section__actions">
         <a href="" class="section__link button">
         <span class="icon icon--yellow-arrow">View All Blogs</span>
         </a>
      </div>
   </div>
</header>
<section class="section">
   <div class="section__body tabs" data-js-tabs>
      <?php
         $uncategorized_id = 1;
         $categories = get_categories([
         'orderby' => 'name',
         'order' => 'ASC',
         'hide_empty' => 0,
         'exclude' => $uncategorized_id,
         ]);
         ?>
      <header class="tabs__header">
         <div class="tabs__buttons container" role="tablist">
            <button
               class="tabs__button is-active"
               type="button"
               id="tab-all"
               role="tab"
               aria-controls="tabpanel-all"
               data-js-tabs-button
               aria-selected="true"
               >
            All
            </button>
            <?php if (!empty($categories)): ?>
            <?php
               $tab_index = 2;
               foreach ($categories as $category):
               ?>
            <button
               class="tabs__button"
               type="button"
               id="tab-<?php echo $tab_index; ?>"
               role="tab"
               aria-controls="tabpanel-<?php echo $tab_index; ?>"
               data-js-tabs-button
               aria-selected="false"
               tabindex="-1"
               >
            <?php echo esc_html($category->name); ?>
            </button>
            <?php
               $tab_index++;
               endforeach;
               ?>
            <?php else: ?>
            <p>Категории не найдены</p>
            <?php endif; ?>
         </div>
      </header>
      <div class="tabs__body">
         <?php
            ?>
         <div
            class="tabs__content is-active"
            id="tabpanel-1"
            aria-labelledby="tab-all"
            tabindex="0"
            data-js-tabs-content
            >
            <ul class="list">
               <?php
                  $all_posts = new WP_Query([
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                  ]);
                  if ($all_posts->have_posts()):
                    while ($all_posts->have_posts()): $all_posts->the_post();
                      get_template_part('templates/blog-card');
                    endwhile;
                    wp_reset_postdata();
                  endif;
                  ?>
            </ul>
         </div>
         <?php
            $tab_index = 2;
            foreach ($categories as $category):
            ?>
         <div
            class="tabs__content"
            id="tabpanel-<?php echo $tab_index; ?>"
            aria-labelledby="tab-<?php echo $tab_index; ?>"
            tabindex="0"
            data-js-tabs-content
            >
            <ul class="list">
               <?php
                  $cat_posts = new WP_Query([
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'cat' => $category->term_id,
                  ]);
                  if ($cat_posts->have_posts()):
                    while ($cat_posts->have_posts()): $cat_posts->the_post();
                      get_template_part('templates/blog-card');
                    endwhile;
                    wp_reset_postdata();
                  else:
                    echo '<li>Посты не найдены</li>';
                  endif;
                  ?>
            </ul>
         </div>
         <?php
            $tab_index++;
            endforeach;
            ?>
      </div>
   </div>
   </div>
</section>