import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

function initAnimations() {
  if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
    console.warn('GSAP или ScrollTrigger не подключены');
    return;
  }

  const sections = document.querySelectorAll('[data-scroll-animate]');
  console.log('📦 Найдено секций:', sections.length);

  sections.forEach((section, index) => {
    console.log(`--- Обработка секции ${index + 1} ---`);

    const head = section.querySelector('[data-head-animation]');
    const previews = section.querySelectorAll('[data-animation-features-prev]');
    const cards = section.querySelectorAll('[data-animation-features-card]');
    const newsTabs = section.querySelectorAll('[data-animation-news-tabs]');
    const newsContent = section.querySelectorAll(
      '[data-animation-news-content]',
    );
    const newsCards = section.querySelectorAll('[data-animation-content]');

    if (head) {
      console.log('🎯 Анимация head');
      gsap.fromTo(
        head,
        { y: 80, opacity: 0, scale: 2.5 },
        {
          y: 0,
          opacity: 1,
          scale: 1,
          ease: 'power2.out',
          duration: 1,
          scrollTrigger: {
            trigger: section,
            start: 'top 85%',
            end: 'center center',
            scrub: true,
            toggleActions: 'play reverse play reverse',
          },
        },
      );
    }

    previews.forEach((el, i) => {
      console.log(`🧩 Preview ${i}`);
      gsap.fromTo(
        el,
        { xPercent: -100, opacity: 0.3 },
        {
          xPercent: 0,
          opacity: 1,
          ease: 'power2.out',
          duration: 0.8,
          scrollTrigger: {
            trigger: el,
            start: 'top 100%',
            end: 'center 50%',
            scrub: true,
            toggleActions: 'play reverse play reverse',
          },
        },
      );
    });

    cards.forEach((el, i) => {
      console.log(`📇 Card ${i}`);
      gsap.fromTo(
        el,
        { xPercent: 100, opacity: 0.3 },
        {
          xPercent: 0,
          opacity: 1,
          ease: 'power2.out',
          duration: 0.8,
          scrollTrigger: {
            trigger: el,
            start: 'top 100%',
            end: 'center 50%',
            scrub: true,
            toggleActions: 'play reverse play reverse',
          },
        },
      );
    });

    newsTabs.forEach((tabsBlock, i) => {
      const tabsButtons = tabsBlock.querySelectorAll('.tabs__button');
      if (!tabsButtons.length) return;
      console.log(`🗂️ News Tabs #${i} — кнопок: ${tabsButtons.length}`);

      tabsButtons.forEach((btn, i) => {
        gsap.fromTo(
          btn,
          { y: -100, opacity: 0 },
          {
            y: 0,
            opacity: 1,
            duration: 0.6,
            ease: 'power2.out',
            delay: i * 0.2,
            scrollTrigger: {
              trigger: tabsBlock,
              start: 'top 80%',
              end: 'top 20%',
              toggleActions: 'play reverse play reverse',
            },
          },
        );
      });
    });

    newsContent.forEach((el, i) => {
      console.log(`📰 News Content ${i}`);
      gsap.fromTo(
        el,
        { xPercent: 100, opacity: 0.3 },
        {
          xPercent: 0,
          opacity: 1,
          ease: 'power2.out',
          duration: 0.6,
          scrollTrigger: {
            trigger: el,
            start: 'top 100%',
            end: 'center 50%',
            scrub: true,
            toggleActions: 'play reverse play reverse',
          },
        },
      );
    });

    if (newsCards.length > 0) {
      console.log(`🧾 Анимация newsCards, элементов: ${newsCards.length}`);
      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: newsCards[0].parentNode || newsCards[0],
          start: 'top 85%',
          end: 'bottom 20%',
          toggleActions: 'play reverse play reverse',
        },
      });

      tl.from(newsCards, {
        xPercent: 100,
        opacity: 0.5,
        ease: 'power2.out',
        duration: 0.6,
        stagger: 0.2,
      });
    } else {
      console.log(`🚫 NewsCards не найдены в секции ${index + 1}`);
    }
  });

  console.log('✅ Все секции обработаны');
}

export default initAnimations;
