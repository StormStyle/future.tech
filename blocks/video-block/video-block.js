(() => {
  const { registerBlockType } = wp.blocks;
  const { Fragment, createElement: el } = wp.element;
  const { TextControl } = wp.components;

  registerBlockType('custom/video-block', {
    title: 'Video Block',
    icon: 'format-video',
    category: 'common',
    attributes: {
      subtitle: {
        type: 'string',
        default: 'Featured Videos',
      },
      title: {
        type: 'string',
        default: 'Visual Insights for the Modern Viewer',
      },
      link: {
        type: 'string',
        default: '',
      },
      linkText: {
        type: 'string',
        default: 'View All',
      },
    },

    edit({ attributes, setAttributes }) {
      const { subtitle, title, link, linkText } = attributes;

      return el(
        Fragment,
        {},
        el('div', { className: 'main-block' }, [
          el('h1', { className: 'block-name' }, 'Video'),
          el('h2', { className: 'block-section__label' }, 'Main'),
          el(TextControl, {
            label: 'Subtitle',
            value: subtitle,
            onChange: (value) => setAttributes({ subtitle: value }),
          }),
          el(TextControl, {
            label: 'Title',
            value: title,
            onChange: (value) => setAttributes({ title: value }),
          }),
          el(TextControl, {
            label: 'Link URL',
            value: link,
            onChange: (value) => setAttributes({ link: value }),
          }),
          el(TextControl, {
            label: 'Link Text',
            value: linkText,
            onChange: (value) => setAttributes({ linkText: value }),
          }),
          el('p', {}, 'All video of your site'),
        ]),
      );
    },

    save() {
      return null;
    },
  });
})();
