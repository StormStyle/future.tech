(() => {
  const { registerBlockType } = wp.blocks;
  const { Fragment, createElement: el } = wp.element;
  const { TextControl, TextareaControl } = wp.components;

  registerBlockType('custom/news-block', {
    title: 'News Block',
    icon: 'media-document',
    category: 'common',
    attributes: {
      title: {
        type: 'string',
        default: "Today's Headlines: Stay",
      },
      subtitle: {
        type: 'string',
        default: 'Informed',
      },
      description: {
        type: 'string',
        default:
          'Explore the latest news from around the world. We bring you up-to-the-minute updates on the most significant events, trends, and stories. Discover the world through our news coverage.',
      },
    },

    edit({ attributes, setAttributes }) {
      const { title, subtitle, description } = attributes;

      return el(
        Fragment,
        {},
        el('div', { className: 'main-block' }, [
          el('h1', { className: 'block-name' }, 'News'),
          el('h2', { className: 'block-section__label' }, 'Main'),
          el(TextControl, {
            label: 'Title',
            value: title,
            onChange: (value) => setAttributes({ title: value }),
          }),
          el(TextControl, {
            label: 'Subtitle',
            value: subtitle,
            onChange: (value) => setAttributes({ subtitle: value }),
          }),
          el(TextareaControl, {
            label: 'Description',
            value: description,
            onChange: (value) => setAttributes({ description: value }),
          }),
          el('p', {}, 'Новости выводятся из шаблона news-hero.php'),
        ]),
      );
    },

    save() {
      return null; 
    },
  });
})();
