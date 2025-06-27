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
        el(
          'div',
          { className: 'reviews-admin' },
          el('div', { className: 'reviews-admin__group' }, [
            el(TextControl, {
              label: 'Subtitle',
              value: subtitle,
              onChange: (v) => setAttributes({ subtitle: v }),
              __next40pxDefaultSize: true,
              __nextHasNoMarginBottom: true,
              className:
                'reviews-admin__input reviews-admin__input_type_subtitle',
            }),
            el(TextControl, {
              label: 'Title',
              value: title,
              onChange: (v) => setAttributes({ title: v }),
              __next40pxDefaultSize: true,
              __nextHasNoMarginBottom: true,
              className: 'reviews-admin__input reviews-admin__input_type_title',
            }),
            el(TextControl, {
              label: 'Link Text',
              value: linkText,
              onChange: (v) => setAttributes({ linkText: v }),
              __next40pxDefaultSize: true,
              __nextHasNoMarginBottom: true,
              className:
                'reviews-admin__input reviews-admin__input_type_link-text',
            }),
            el(TextControl, {
              label: 'Link Href',
              value: linkHref,
              onChange: (v) => setAttributes({ linkHref: v }),
              __next40pxDefaultSize: true,
              __nextHasNoMarginBottom: true,
              className:
                'reviews-admin__input reviews-admin__input_type_link-href',
            }),
          ]),
        ),
      );
    },

    save() {
      return null;
    },
  });
})();
