<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="icon" href="/img/favicon.png" type="image/x-icon" />
    <?php wp_head(); ?>
  </head>
  <body>
    <header class="header" data-js-header>
      <div class="header__promo">
        <div class="header__promo-inner container">
          <a href="./blog.html" class="header__promo-link">
            <span class="icon icon--yellow-arrow"
              >Subscribe to our Newsletter For New & latest Blogs and
              Resources</span
            >
          </a>
        </div>
      </div>
      <div class="header__body">
        <div class="header__body-inner container">
          <a href="/" class="header__logo logo" title="Home" aria-label="Home">
            <img
              src="<?php echo get_template_directory_uri() . '/img/logo.png'; ?>"
              alt=""
              class="logo__image"
              width="179"
              height="50"
            />
          </a>
          <div class="header__overlay" data-js-header-overlay>
            <nav class="header__menu">
              <ul class="header__menu-list">
                <li class="header__menu-item">
                  <a href="./index.html" class="header__menu-link is-active"
                    >Home</a
                  >
                </li>
                <li class="header__menu-item">
                  <a href="./news.html" class="header__menu-link">News</a>
                </li>
                <li class="header__menu-item">
                  <a href="./podcasts.html" class="header__menu-link"
                    >Podcasts</a
                  >
                </li>
                <li class="header__menu-item">
                  <a href="./resources.html" class="header__menu-link"
                    >Resources</a
                  >
                </li>
              </ul>
            </nav>
            <a href="" class="header__contact-us-link button button--accent"
              >Contact Us</a
            >
          </div>
          <button
            data-js-header-burger-button
            class="header__burger-button burger-button visible-mobile"
            type="button"
            aria-label="Open menu"
            title="Open menu"
          >
            <span class="burger-button__line"></span>
            <span class="burger-button__line"></span>
            <span class="burger-button__line"></span>
          </button>
        </div>
      </div>
    </header>