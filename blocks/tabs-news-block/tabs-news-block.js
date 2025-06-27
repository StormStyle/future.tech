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
        el('div', { className: 'tabs-news-admin' }, [
          el(TextControl, {
            label: 'Subtitle',
            value: subtitle,
            className: 'tabs-news-admin__input',
            onChange: (value) => setAttributes({ subtitle: value }),
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),
          el(TextControl, {
            label: 'Title',
            value: title,
            className: 'tabs-news-admin__input',
            onChange: (value) => setAttributes({ title: value }),
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),
          el(TextControl, {
            label: 'Button Text',
            value: buttonText,
            className: 'tabs-news-admin__input',
            onChange: (value) => setAttributes({ buttonText: value }),
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),
          el(TextControl, {
            label: 'Button URL',
            value: buttonUrl,
            className: 'tabs-news-admin__input',
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
