gsap.registerPlugin(ScrollTrigger);

const Animation = () => {
  const header = document.querySelector('[data-animation-header]');
  const hero = document.querySelector('[data-animation-hero]');
  const heroMain = document.querySelector('[data-animation-hero-main]');
  const heroMetrix = document.querySelector('[data-animation-hero-metrix]');
  const heroResources = document.querySelector(
    '[data-animation-hero-resources]',
  );
  const heroAdvantage = document.querySelector(
    '[data-animation-hero-advantages]',
  );
  const features = document.querySelector('[data-animation-features]');
  const featuresPrev = document.querySelector('[data-animation-features-prev]');
  const featuresCard = document.querySelector('[data-animation-features-card]');
  const blocksSection = document.querySelectorAll('[data-animation-appear-block]');

  if (blocksSection) {
    gsap.fromTo(
      blocksSection,
      { scale: 1.5, opacity: 0 },
      { scale: 1, opacity: 1, duration: 1, delay: 0.5, ease: 'power2.out' },
    );
  }

  if (header) {
    gsap.fromTo(
      header,
      { y: -250, opacity: 0 },
      { y: 0, opacity: 1, duration: 1, delay: 0.5, ease: 'power2.out' },
    );
  }

  if (header) {
    gsap.fromTo(
      'header img',
      { x: -250, opacity: 0, scale: 2.5 },
      { x: 0, opacity: 1, scale: 1, duration: 1, delay: 1, ease: 'power2.out' },
      1,
    );
  }

  if (hero) {
    gsap.fromTo(
      hero,
      { x: -50, opacity: 0 },
      { x: 0, opacity: 1, duration: 1, ease: 'power2.out' },
      1,
    );
  }

  if (heroMain) {
    gsap.fromTo(
      heroMain,
      { scale: 2, opacity: 0 },
      { scale: 1, opacity: 1, duration: 1, ease: 'power2.out' },
      2,
    );
  }

  if (heroMetrix) {
    gsap.fromTo(
      heroMetrix,
      { scale: 2, opacity: 0 },
      { scale: 1, opacity: 1, duration: 1, ease: 'power2.out' },
      1,
    );
  }

  if (heroResources) {
    gsap.fromTo(
      heroResources,
      { scale: 2, opacity: 0 },
      { scale: 1, opacity: 1, duration: 1, ease: 'power2.out' },
      1,
    );
  }

  if (featuresPrev) {
    gsap.fromTo(
      featuresPrev,
      { scale: 2, opacity: 0 },
      { scale: 1, opacity: 1, duration: 1, ease: 'power2.out' },
      1,
    );
  }
  if (featuresCard) {
    gsap.fromTo(
      featuresCard,
      { scale: 2, opacity: 0 },
      { scale: 1, opacity: 1, duration: 1, ease: 'power2.out' },
      1,
    );
  }
  document.addEventListener('DOMContentLoaded', () => {
    Animation();
  });
};

export default Animation;
