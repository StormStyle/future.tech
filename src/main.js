import Header from './Header.js';
import TabsCollection from './Tabs.js';
import VideoPlayerCollection from './VideoPlayer.js';
import ExpandableContentCollection from './Expandable-content.js';

new Header();
new TabsCollection();
new VideoPlayerCollection()
new ExpandableContentCollection()

document.querySelectorAll('[data-like]').forEach((button) => {
  button.addEventListener('click', () => {
    button.classList.toggle('is-active');
  });
});

document.querySelectorAll('[data-rating]').forEach((ratingEl) => {
  const stars = ratingEl.querySelectorAll('.rating-view__star');

  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      const currentRating = index + 1;

      stars.forEach((s, i) => {
        s.classList.toggle('is-active', i < currentRating);
      });
    });
  });
});
