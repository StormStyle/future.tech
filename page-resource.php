<?php get_header(); ?>  
<main>
   <?php while (have_posts()):
     the_post();
     the_content();
   endwhile; ?>
   <section id="resouces-section" class="section tabs" data-js-tabs>
      <header class="section__header">
         <div class="section__header-inner container">
            <div class="section__header-info">
               <p class="section__subtitle tag">A Knowledge Treasure Trove</p>
               <h2 class="section__title">
                  Explore FutureTech's In-Depth Blog Posts
               </h2>
            </div>
            <div class="section__actions">
               <div class="tabs__buttons tabs__buttons--compact" role="tablist">
                  <?php
                  $categories = get_terms([
                    'taxonomy' => 'resource_category',
                    'hide_empty' => true,
                  ]);
                  $tab_index = 1;
                  foreach ($categories as $cat):

                    $active_class = $tab_index === 1 ? ' is-active' : '';
                    $aria_selected = $tab_index === 1 ? 'true' : 'false';
                    $tabindex = $tab_index === 1 ? '' : 'tabindex="-1"';
                    ?>
                  <button
                     class="tabs__button<?php echo $active_class; ?>"
                     type="button"
                     id="tab-<?php echo $tab_index; ?>"
                     role="tab"
                     aria-controls="tabpanel-<?php echo $tab_index; ?>"
                     data-js-tabs-button
                     aria-selected="<?php echo $aria_selected; ?>"
                     <?php echo $tabindex; ?>
                     >
                  <?php echo esc_html($cat->name); ?>
                  </button>
                  <?php $tab_index++;
                  endforeach;
                  ?>
               </div>
            </div>
         </div>
      </header>
      <div class="section__body">
      <div class="tabs__body">
         <?php
         $categories = get_terms([
           'taxonomy' => 'resource_category',
           'hide_empty' => true,
         ]);
         $panel_index = 1;

         foreach ($categories as $cat):

           $active_class = $panel_index === 1 ? ' is-active' : '';
           $aria_labelledby = 'tab-' . $panel_index;
           $tabpanel_id = 'tabpanel-' . $panel_index;

           $posts = get_posts([
             'post_type' => 'resources',
             'numberposts' => 5,
             'tax_query' => [
               [
                 'taxonomy' => 'resource_category',
                 'field' => 'term_id',
                 'terms' => $cat->term_id,
               ],
             ],
           ]);
           ?>
         <div
            class="tabs__content<?php echo $active_class; ?>"
            id="<?php echo esc_attr($tabpanel_id); ?>"
            aria-labelledby="<?php echo esc_attr($aria_labelledby); ?>"
            tabindex="0"
            data-js-tabs-content
            >
            <ul class="list">
               <?php
               for ($i = 0; $i < 2 && $i < count($posts); $i++):

                 $post = $posts[$i];
                 setup_postdata($post);

                 $author = get_post_meta($post->ID, 'resource_author', true);

                 $excerpt = get_the_excerpt($post);
                 $thumbnail = get_the_post_thumbnail(
                   $post->ID,
                   'post-main-thumb',
                 );
                 $title = get_the_title($post);
                 $content = apply_filters('the_content', $post->post_content);
                 $date = get_the_date('', $post);
                 $author = get_post_meta($post->ID, 'author', true);

                 $post_cats = get_the_terms($post->ID, 'resource_category');
                 $cat_names = [];
                 if ($post_cats && !is_wp_error($post_cats)) {
                   foreach ($post_cats as $pc) {
                     $cat_names[] = $pc->name;
                   }
                 }
                 $cat_names_str = implode(', ', $cat_names);
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
                              <h3 class="card__preview-title h3"><?php echo esc_html(
                                $title,
                              ); ?></h3>
                              <div class="card__preview-description">
                                 <p><?php echo esc_html($excerpt); ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card__body">
                        <div class="card__grid card__grid--3-col-alt">
                           <div class="card__cell card__cell--wide">
                              <?php echo $thumbnail; ?>
                           </div>
                           <div class="card__cell card__cell--wide">
                              <h4 class="card__cell-title">
                                 <?php echo esc_html($title); ?>
                              </h4>
                              <p class="card__cell-description">
                                 <?php echo wp_strip_all_tags(
                                   wp_trim_words($content, 30),
                                 ); ?>
                              </p>
                              <a href="#" class="card__cell-link button button--dark-gray">
                              <span class="icon icon--yellow-arrow">Download PDF</span>
                              </a>
                           </div>
                           <div class="card__cell tile">
                              <p class="card__cell-title">Publication Date</p>
                              <p class="card__cell-description h6"><?php echo esc_html(
                                $date,
                              ); ?></p>
                           </div>
                           <div class="card__cell tile">
                              <p class="card__cell-title">Category</p>
                              <p class="card__cell-description h6"><?php echo esc_html(
                                $cat_names_str,
                              ); ?></p>
                           </div>
                           <div class="card__cell tile card__cell--wide-on-mobile-s">
                              <p class="card__cell-title">Author</p>
                              <p class="card__cell-description h6"> <?php echo esc_html(
                                get_post_meta(
                                  $post->ID,
                                  '_custom_author_name_resources',
                                  true,
                                ) ?:
                                'Unknown',
                              ); ?></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <?php
               endfor;
               wp_reset_postdata();
               ?>
            </ul>
            <ul class="bordered-grid bordered-grid--3-col container">
               <?php
               for ($i = 2; $i < 5 && $i < count($posts); $i++):

                 $post = $posts[$i];
                 setup_postdata($post);

                 $thumbnail = get_the_post_thumbnail(
                   $post->ID,
                   'file-head-thumb',
                 );
                 $title = get_the_title($post);
                 $content = apply_filters('the_content', $post->post_content);
                 ?>
               <li class="bordered-grid__item">
                  <div class="report-card">
                     <?php echo $thumbnail; ?>
                     <div class="report-card__body">
                        <h3 class="report-card__title h6"><?php echo esc_html(
                          $title,
                        ); ?></h3>
                        <div class="report-card__description">
                           <p><?php echo wp_strip_all_tags(
                             wp_trim_words($content, 25),
                           ); ?></p>
                        </div>
                     </div>
                     <div class="report-card__actions">
                        <a href="#" class="report-card__details-link button">View Details</a>
                        <a href="#" class="report-card__download-link button button--dark-gray">Download PDF</a>
                     </div>
                  </div>
               </li>
               <?php
               endfor;
               wp_reset_postdata();
               ?>
            </ul>
         </div>
         <?php $panel_index++;
         endforeach;
         ?>
      </div>
   </section>
   <?php get_template_part('templates/about'); ?>
</main>
<?php get_footer(); ?>
