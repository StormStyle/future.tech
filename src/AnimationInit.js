import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

function initAnimations() {
  const sections = document.querySelectorAll('[data-scroll-animate]');

  sections.forEach((section) => {
    const head = section.querySelector('[data-head-animation]');
    const previews = section.querySelectorAll('[data-animation-features-prev]');
    const cards = section.querySelectorAll('[data-animation-features-card]');
    const newsTabs = section.querySelectorAll('[data-animation-news-tabs]');
    const newsContent = section.querySelectorAll(
      '[data-animation-news-content]',
    );
    const newsCards = section.querySelectorAll('[data-animation-content]');

    if (head) {
      gsap.from(head, {
        y: 80,
        opacity: 0,
        scale: 2.5,
        ease: 'power2.out',
        immediateRender: false,
        scrollTrigger: {
          trigger: section,
          start: 'top 85%',
          end: 'center center',
          scrub: true,
        },
      });
    }

    previews.forEach((el) => {
      gsap.from(el, {
        xPercent: -100,
        opacity: 0.5,
        ease: 'power2.out',
        immediateRender: false,
        scrollTrigger: {
          trigger: el,
          start: 'top 100%',
          end: 'center 50%',
          scrub: true,
        },
      });
    });

    cards.forEach((el) => {
      gsap.from(el, {
        xPercent: 100,
        opacity: 0.5,
        ease: 'power2.out',
        immediateRender: false,
        scrollTrigger: {
          trigger: el,
          start: 'top 100%',
          end: 'center 50%',
          scrub: true,
        },
      });
    });

    newsTabs.forEach((tabsBlock) => {
      const tabsButtons = tabsBlock.querySelectorAll('.tabs__button');
      if (!tabsButtons.length) return;

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
              end: 'top -20%',
              toggleActions: 'play reverse play reverse',
            },
          },
        );
      });
    });

    newsContent.forEach((el) => {
      gsap.from(el, {
        xPercent: 100,
        opacity: 0.5,
        ease: 'power2.out',
        immediateRender: false,
        scrollTrigger: {
          trigger: el,
          start: 'top 100%',
          end: 'center 50%',
          scrub: true,
        },
      });
    });

    if (newsCards.length > 0) {
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
    }

    const hero = section;
    if (hero) {
      const subtitle = hero.querySelector('[data-hero-subtitle]');
      const title = hero.querySelector('[data-hero-title]');
      const description = hero.querySelector('[data-hero-description]');
      const metrics = hero.querySelector('[data-hero-metrics]');
      const resources = hero.querySelector('[data-hero-resources]');
      const advantages = hero.querySelectorAll('[data-hero-adv]');

      // Собираем все элементы для начальной установки и фильтруем null
      const elements = [
        subtitle,
        title,
        description,
        metrics,
        resources,
        ...advantages,
      ].filter(Boolean);

      console.log('GSAP animation targets:', elements);

      // Начальные стили для всех валидных элементов
      if (elements.length > 0) {
        gsap.set(elements, {
          opacity: 0,
          y: 80,
          scaleX: 0.8,
          rotation: -15,
          transformOrigin: 'center center',
        });
      }

      const tl = gsap.timeline();

      // Для каждого элемента делаем анимацию только если он есть
      if (subtitle) {
        tl.to(subtitle, {
          y: 0,
          opacity: 1,
          scaleX: 1,
          rotation: 0,
          duration: 0.8,
          ease: 'elastic.out(1, 0.6)',
        });
      }

      if (title) {
        tl.to(
          title,
          {
            y: 0,
            opacity: 1,
            scaleX: 1,
            rotation: 0,
            duration: 0.9,
            ease: 'back.out(1.7)',
          },
          '-=0.6',
        );
      }

      if (description) {
        tl.to(
          description,
          {
            y: 0,
            opacity: 1,
            scaleX: 1,
            rotation: 0,
            duration: 0.7,
            ease: 'power3.out',
          },
          '-=0.7',
        );
      }

      if (metrics) {
        tl.to(
          metrics,
          {
            y: 0,
            opacity: 1,
            scaleX: 1,
            rotation: 0,
            duration: 1,
            ease: 'elastic.out(1, 0.5)',
          },
          '-=0.6',
        );
      }

      if (resources) {
        tl.to(
          resources,
          {
            x: 0,
            y: 0,
            scaleX: 1,
            opacity: 1,
            rotation: 0,
            duration: 1,
            ease: 'back.out(1.5)',
          },
          '-=0.9',
        );
      }

      if (advantages.length > 0) {
        tl.to(
          advantages,
          {
            y: 0,
            opacity: 1,
            scaleX: 1,
            rotation: 0,
            duration: 0.8,
            ease: 'elastic.out(1, 0.7)',
            stagger: 0.2,
          },
          '-=0.6',
        );
      }
    }

    /* end hero */
  });

  const footer = document.querySelector('[data-animation-footer]');
  if (footer) {
    const columns = footer.querySelectorAll('.footer__menu-column');

    if (columns.length > 0) {
      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: footer,
          start: 'top 85%',
          end: 'top 40%',
          toggleActions: 'play reverse play reverse',
          // markers: true,
        },
      });

      tl.from(columns, {
        y: 100,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out',
        stagger: 0.15,
      });
    }
  }
}

export default initAnimations;
