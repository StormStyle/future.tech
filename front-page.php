<?php get_header(); ?>
<main>
    <?php while (have_posts()):
      the_post();
      the_content();
    endwhile; ?>
   <!-- <section class="hero">
      <div class="hero__main container">
         <div class="hero__body">
            <p class="hero__subtitle">Your Journey to Tomorrow Begins Here</p>
            <h1 class="hero__title">
               Explore the Frontiers of Artificial Intelligence
            </h1>
            <div class="hero__description">
               <p>
                  Welcome to the epicenter of AI innovation. FutureTech AI News is
                  your passport to a world where machines think, learn, and
                  reshape the future. Join us on this visionary expedition into
                  the heart of AI.
               </p>
            </div>
         </div>
         <div
            class="hero__metrix metrix full-vw-line full-vw-line--top full-vw-line--left"
            >
            <dl class="metrix__list">
               <div class="metrix__item">
                  <dt class="metrix__key">Resources available</dt>
                  <dd class="metrix__value h3">
                     300 <span class="metrix__sign">+</span>
                  </dd>
               </div>
               <div class="metrix__item">
                  <dt class="metrix__key">Total Downloads</dt>
                  <dd class="metrix__value h3">
                     12k <span class="metrix__sign">+</span>
                  </dd>
               </div>
               <div class="metrix__item">
                  <dt class="metrix__key">Active Users</dt>
                  <dd class="metrix__value h3">
                     10k <span class="metrix__sign">+</span>
                  </dd>
               </div>
            </dl>
         </div>
         <div class="hero__resources-preview resources-preview">
            <div class="resources-preview__team team">
               <img
                  src="<?php echo get_template_directory_uri() .
                    '/img/team/1.png'; ?>"
                  alt=""
                  class="team__person"
                  width="60"
                  height="60"
                  />
               <img
                  src="<?php echo get_template_directory_uri() .
                    '/img/team/2.png'; ?>"
                  alt=""
                  class="team__person"
                  width="60"
                  height="60"
                  />
               <img
                  src="<?php echo get_template_directory_uri() .
                    '/img/team/3.png'; ?>"
                  alt=""
                  class="team__person"
                  width="60"
                  height="60"
                  />
            </div>
            <div class="resources-preview__body">
               <p class="resources-preview__title h5">Explore 1000+ resources</p>
               <p class="resources-preview__subtitle">
                  Over 1,000 articles on emerging tech trends and breakthroughs.
               </p>
               <a href="" class="resources-preview__button button">
               <span class="icon icon--yellow-arrow">Explore Resources</span>
               </a>
            </div>
         </div>
      </div>
      <div class="hero__advantages">
         <h2 class="visually-hidden"></h2>
         <ul class="hero__advantages-list container">
            <li class="hero__advantages-item">
               <div class="advantage-card">
                  <img
                     src="<?php echo get_template_directory_uri() .
                       '/img/advantage/1.svg'; ?>"
                     alt=""
                     class="advantage-card__image"
                     width="50"
                     height="50"
                     />
                  <a href="" class="advantage-card__link circle-icon">
                     <h3 class="advantage-card__title">Latest News Updates</h3>
                     <p class="advantage-card__subtitle">Stay Current</p>
                  </a>
                  <p class="advantage-card__details">
                     Over 1,000 articles published monthly
                  </p>
               </div>
            </li>
            <li class="hero__advantages-item">
               <div class="advantage-card">
                  <img
                     src="<?php echo get_template_directory_uri() .
                       '/img/advantage/2.svg'; ?>"
                     alt=""
                     class="advantage-card__image"
                     width="50"
                     height="50"
                     />
                  <a href="" class="advantage-card__link circle-icon">
                     <h3 class="advantage-card__title">Expert Contributors</h3>
                     <p class="advantage-card__subtitle">Trusted Insights</p>
                  </a>
                  <p class="advantage-card__details">
                     50+ renowned AI experts on our team
                  </p>
               </div>
            </li>
            <li class="hero__advantages-item">
               <div class="advantage-card">
                  <img
                     src="<?php echo get_template_directory_uri() .
                       '/img/advantage/3.svg'; ?>"
                     alt=""
                     class="advantage-card__image"
                     width="50"
                     height="50"
                     />
                  <a href="" class="advantage-card__link circle-icon">
                     <h3 class="advantage-card__title">Global Readership</h3>
                     <p class="advantage-card__subtitle">Worldwide Impact</p>
                  </a>
                  <p class="advantage-card__details">2 million monthly readers</p>
               </div>
            </li>
         </ul>
      </div>
   </section> -->
   <!-- <section class="section">
      <header class="section__header">
         <div class="section___header-inner container">
            <div class="section__header-info">
               <p class="section__subtitle tag">Unlock the Power of</p>
               <h2 class="section__title">FutureTech Features</h2>
            </div>
         </div>
      </header>
      <div class="section__body">
         <ul class="list">
            <li class="list__item">
               <div class="card container">
                  <div class="card__preview">
                     <div class="card__preview-main">
                        <img
                           src="<?php echo get_template_directory_uri() .
                             '/img/card/1.svg'; ?>"
                           alt=""
                           class="card__preview-icon"
                           width="80"
                           height="80"
                           />
                        <div class="card__preview-info">
                           <h3 class="card__preview-title">
                              Future Technology Blog
                           </h3>
                           <div class="card__preview-description">
                              Stay informed with our blog section dedicated to future
                              technology.
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card__body">
                     <div class="card__grid card__grid--2-col">
                        <div class="card__cell tile">
                           <h4 class="card__cell-title h5">Quantity</h4>
                           <p class="card__cell-description">
                              Over 1,000 articles on emerging tech trends and
                              breakthroughs.
                           </p>
                        </div>
                        <div class="card__cell tile">
                           <h4 class="card__cell-title h5">Variety</h4>
                           <p class="card__cell-description">
                              Over 1,000 articles on emerging tech trends and
                              breakthroughs.Articles cover fields like AI, robotics,
                              biotechnology, and more.
                           </p>
                        </div>
                        <div class="card__cell tile">
                           <h4 class="card__cell-title h5">Frequency</h4>
                           <p class="card__cell-description">
                              Fresh content added daily to keep you up to date.
                           </p>
                        </div>
                        <div class="card__cell tile">
                           <h4 class="card__cell-title h5">Authoritative</h4>
                           <p class="card__cell-description">
                              Written by our team of tech experts and industry
                              professionals.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
            <li class="list__item">
               <div class="card container">
                  <div class="card__preview">
                     <div class="card__preview-main">
                        <img
                           src="<?php echo get_template_directory_uri() .
                             '/img/card/2.svg'; ?>"
                           alt=""
                           class="card__preview-icon"
                           width="80"
                           height="80"
                           />
                        <div class="card__preview-info">
                           <h3 class="card__preview-title">
                              Research Insights Blogs
                           </h3>
                           <div class="card__preview-description">
                              Dive deep into future technology concepts with our
                              research section.
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card__body">
                     <div class="card__grid card__grid--2-col">
                        <div class="card__cell tile">
                           <h4 class="card__cell-title h5">Depth</h4>
                           <p class="card__cell-description">
                              500+ research articles for in-depth understanding.
                           </p>
                        </div>
                        <div class="card__cell tile">
                           <h4 class="card__cell-title h5">Graphics</h4>
                           <p class="card__cell-description">
                              Visual aids and infographics to enhance comprehension.
                           </p>
                        </div>
                        <div class="card__cell tile">
                           <h4 class="card__cell-title h5">Trends</h4>
                           <p class="card__cell-description">
                              Explore emerging trends in future technology research.
                           </p>
                        </div>
                        <div class="card__cell tile">
                           <h4 class="card__cell-title h5">Contributors</h4>
                           <p class="card__cell-description">
                              Contributions from tech researchers and academics.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </section> -->
   <!-- <?php get_template_part('templates/tab-reviews'); ?> -->
   <!-- <section class="section">
      <header class="section__header">
         <div class="section__header-inner container">
            <div class="section__header-info">
               <p class="section__subtitle tag">
                  Your Gateway to In-Depth Information
               </p>
               <h2 class="section__title">
                  Unlock Valuable Knowledge with FutureTech's Resources
               </h2>
            </div>
            <div class="section__actions">
               <a href="" class="section__link button">
               <span class="icon icon--yellow-arrow">View All Resources</span>
               </a>
            </div>
         </div>
      </header>
      <div class="section__body">
         <ul class="list">
            <li class="list__item">
               <div class="card container">
                  <div class="card__preview">
                     <div class="card__preview-main">
                        <img
                           src="./img/card/3.svg"
                           alt=""
                           class="card__preview-icon"
                           width="80"
                           height="80"
                           />
                        <div class="card__preview-info">
                           <h3 class="card__preview-title">Ebooks</h3>
                           <div class="card__preview-description">
                              Explore our collection of ebooks covering a wide
                              spectrum of future technology topics.
                           </div>
                           <a
                              href=""
                              class="card__preview-link button button--dark-gray"
                              >
                           <span class="icon icon--yellow-arrow"
                              >Download Ebooks Now</span
                              >
                           </a>
                        </div>
                     </div>
                     <div class="card__preview-extra">
                        <div class="download-info tile">
                           <div class="download-info__body">
                              <p class="download-info__title">Downloaded By</p>
                              <p class="download-info__subtitle h5">10k + Users</p>
                           </div>
                           <div class="download-info__team team">
                              <img
                                 src="./img/team/1.png"
                                 alt=""
                                 class="team__person"
                                 width="50"
                                 height="50"
                                 />
                              <img
                                 src="./img/team/2.png"
                                 alt=""
                                 class="team__person"
                                 width="50"
                                 height="50"
                                 />
                              <img
                                 src="./img/team/3.png"
                                 alt=""
                                 class="team__person"
                                 width="50"
                                 height="50"
                                 />
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card__body">
                     <div class="card__grid card__grid--2-col-alt">
                        <div class="card__cell">
                           <h3 class="card__cell-title h5">Variety of Topics</h3>
                        </div>
                        <div class="card__cell">
                           <p class="card__cell-subtitle">
                              Topics include AI in education (25%), renewable energy
                              (20%), healthcare (15%), space exploration (25%), and
                              biotechnology (15%).
                           </p>
                        </div>
                        <div class="card__cell card__cell--wide">
                           <img
                              src="/img/res/img1.jpg"
                              alt=""
                              class="card__cell-image"
                              width="917"
                              height="332"
                              />
                        </div>
                        <div class="card__cell tile">
                           <h4 class="card__cell-subtitle">Total Ebooks</h4>
                           <p class="card__cell-description h6">Over 100 ebooks</p>
                        </div>
                        <div class="card__cell tile">
                           <h4 class="card__cell-subtitle">Download Formats</h4>
                           <p class="card__cell-description h6">
                              PDF format for access.
                           </p>
                           <a href="" class="card__cell-link button">
                           <span class="icon icon--yellow-eye">Preview</span>
                           </a>
                        </div>
                        <div class="card__cell card__cell--wide tile">
                           <h4 class="card__cell-subtitle">
                              Average Author Expertise
                           </h4>
                           <p class="card__cell-description h6">
                              Ebooks are authored by renowned experts with an average
                              of 15 years of experience
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
            <li class="list__item">
               <div class="card container">
                  <div class="card__preview">
                     <div class="card__preview-main">
                        <img
                           src="./img/card/4.svg"
                           alt=""
                           class="card__preview-icon"
                           width="80"
                           height="80"
                           />
                        <div class="card__preview-info">
                           <h3 class="card__preview-title">Whitepapers</h3>
                           <div class="card__preview-description">
                              Dive into comprehensive reports and analyses with our
                              collection of whitepapers.
                           </div>
                           <a
                              href=""
                              class="card__preview-link button button--dark-gray"
                              >
                           <span class="icon icon--yellow-arrow"
                              >Download Whitepapers Now</span
                              >
                           </a>
                        </div>
                     </div>
                     <div class="card__preview-extra">
                        <div class="download-info tile">
                           <div class="download-info__body">
                              <p class="download-info__title">Downloaded By</p>
                              <p class="download-info__subtitle h5">10k + Users</p>
                           </div>
                           <div class="download-info__team team">
                              <img
                                 src="./img/team/1.png"
                                 alt=""
                                 class="team__person"
                                 width="50"
                                 height="50"
                                 />
                              <img
                                 src="./img/team/2.png"
                                 alt=""
                                 class="team__person"
                                 width="50"
                                 height="50"
                                 />
                              <img
                                 src="./img/team/3.png"
                                 alt=""
                                 class="team__person"
                                 width="50"
                                 height="50"
                                 />
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card__body">
                     <div class="card__grid card__grid--2-col-alt">
                        <div class="card__cell">
                           <h3 class="card__cell-title h5">Topics Coverage</h3>
                        </div>
                        <div class="card__cell">
                           <p class="card__cell-subtitle">
                              Whitepapers cover quantum computing (20%), AI ethics
                              (15%), space mining prospects (20%), AI in healthcare
                              (15%), and renewable energy strategies (30%).
                           </p>
                        </div>
                        <div class="card__cell card__cell--wide">
                           <img
                              src="/img/res/img2.jpg"
                              alt=""
                              class="card__cell-image"
                              width="917"
                              height="332"
                              />
                        </div>
                        <div class="card__cell tile">
                           <h4 class="card__cell-subtitle">Total Whitepapers</h4>
                           <p class="card__cell-description h6">
                              Over 50 whitepapers
                           </p>
                        </div>
                        <div class="card__cell tile">
                           <h4 class="card__cell-subtitle">Download Formats</h4>
                           <p class="card__cell-description h6">
                              PDF format for access.
                           </p>
                           <a href="" class="card__cell-link button">
                           <span class="icon icon--yellow-eye">Preview</span>
                           </a>
                        </div>
                        <div class="card__cell card__cell--wide tile">
                           <h4 class="card__cell-subtitle">
                              Average Author Expertise
                           </h4>
                           <p class="card__cell-description h6">
                              Whitepapers are authored by subject matter experts with
                              an average of 20 years of experience.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </section> -->
   <!-- <section class="section">
      <header class="section__header">
         <div class="section__header-inner container">
            <div class="section__header-info">
               <p class="section__subtitle tag">What Our Readers Say</p>
               <h2 class="section__title">Real Words from Real Readers</h2>
            </div>
            <div class="section__actions">
               <a href="/reviews" class="section__link button">
               <span class="icon icon--yellow-arrow"
                  >View All Testimonials</span
                  >
               </a>
            </div>
         </div>
      </header>
      <?php get_template_part('templates/reviews'); ?> 
   </section> -->
   <?php get_template_part('templates/about'); ?> 
</main>
<?php get_footer(); ?>
