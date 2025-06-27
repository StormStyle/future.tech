(() => {
  const { registerBlockType } = wp.blocks;
  const { createElement: el, Fragment } = wp.element;
  const { TextControl } = wp.components;

  registerBlockType('custom/tabs-news-block', {
    title: 'Tabs News Block',
    icon: 'screenoptions',
    category: 'common',
    attributes: {
      subtitle: { type: 'string', default: 'A Knowledge Treasure Trove' },
      title: {
        type: 'string',
        default: "Explore FutureTech's In-Depth Blog Posts",
      },
      buttonText: { type: 'string', default: 'View All Blogs' },
      buttonUrl: { type: 'string', default: '#' },
    },

    edit({ attributes, setAttributes }) {
      const { subtitle, title, buttonText, buttonUrl } = attributes;

      return el(
        Fragment,
        {},
        el('div', { className: 'main-block' }, [
          el('h1', { className: 'block-name' }, 'Tabs-News'),
          el('h2', { className: 'block-section__label' }, 'Main'),
          el(TextControl, {
            label: 'Subtitle',
            value: subtitle,
            onChange: (value) => setAttributes({ subtitle: value }),
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),
          el(TextControl, {
            label: 'Title',
            value: title,
            onChange: (value) => setAttributes({ title: value }),
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),
          el(TextControl, {
            label: 'Button Text',
            value: buttonText,
            onChange: (value) => setAttributes({ buttonText: value }),
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),
          el(TextControl, {
            label: 'Button URL',
            value: buttonUrl,
            onChange: (value) => setAttributes({ buttonUrl: value }),
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),
        ]),
      );
    },

    save() {
      return null;
    },
  });
})();
