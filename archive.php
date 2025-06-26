<?php get_header(); ?>

    <main>
<section class="section">
   <header class="section__header">
      <div class="section__header-inner container">
         <div class="section__header-info">
            <p class="section__subtitle tag">What Our Readers Say</p>
            <h2 class="section__title"><?php
    if (is_category()) {
      echo single_cat_title();
    } elseif (is_tag()) {
      echo single_tag_title();
    } elseif (is_post_type_archive()) {
      echo post_type_archive_title();
    } elseif (is_tax()) {
      echo single_term_title();
    } else {
      echo 'Архив';
    }
  ?></h2>
         </div>
         <div class="section__actions">
            <a href="/" class="section__link button">
            <span class="icon icon--yellow-arrow"
               >Back to Home</span
               >
            </a>
         </div>
      </div>
   </header>
   </section>
    </main>

    
<?php get_footer(); ?>
