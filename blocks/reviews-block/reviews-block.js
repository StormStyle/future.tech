(() => {
  const { registerBlockType } = wp.blocks;
  const { createElement: el, Fragment } = wp.element;
  const { TextControl } = wp.components;

  registerBlockType('custom/reviews-block', {
    title: 'Reviews Block',
    icon: 'testimonial',
    category: 'common',
    attributes: {
      subtitle: {
        type: 'string',
        default: 'What Our Readers Say',
      },
      title: {
        type: 'string',
        default: 'Real Words from Real Readers',
      },
      linkText: {
        type: 'string',
        default: 'View All Testimonials',
      },
      linkHref: {
        type: 'string',
        default: '/reviews',
      },
    },

    edit({ attributes, setAttributes }) {
      const { subtitle, title, linkText, linkHref } = attributes;

      return el(
        Fragment,
        {},
        el('div', { className: 'main-block' }, [
          el('h1', { className: 'block-name' }, 'Review'),
          el('h2', { className: 'block-section__label' }, 'Main'),
          el(TextControl, {
            label: 'Subtitle',
            value: subtitle,
            onChange: (v) => setAttributes({ subtitle: v }),
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),
          el(TextControl, {
            label: 'Title',
            value: title,
            onChange: (v) => setAttributes({ title: v }),
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),
          el(TextControl, {
            label: 'Link Text',
            value: linkText,
            onChange: (v) => setAttributes({ linkText: v }),
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),
          el(TextControl, {
            label: 'Link Href',
            value: linkHref,
            onChange: (v) => setAttributes({ linkHref: v }),
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
