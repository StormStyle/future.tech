(() => {
  const { registerBlockType } = wp.blocks;
  const { Fragment, createElement: el } = wp.element;
  const { TextControl, TextareaControl } = wp.components;

  registerBlockType('custom/cta-block', {
    title: 'CTA Block',
    icon: 'megaphone',
    category: 'common',
    attributes: {
      subtitle: {
        type: 'string',
        default: 'Learn, Connect, and Innovate',
      },
      title: {
        type: 'string',
        default: 'Be Part of the Future Tech Revolution',
      },
      description: {
        type: 'string',
        default:
          'Immerse yourself in the world of future technology. Explore our comprehensive resources, connect with fellow tech enthusiasts, and drive innovation in the industry. Join a dynamic community of forward-thinkers.',
      },
      items: {
        type: 'array',
        default: [
          {
            title: 'Resource Access',
            description:
              'Visitors can access a wide range of resources, including ebooks, whitepapers, reports.',
            url: '',
          },
          {
            title: 'Community Forum',
            description:
              'Join our active community forum to discuss industry trends, share insights, and collaborate with peers.',
            url: '',
          },
          {
            title: 'Tech Events',
            description:
              'Stay updated on upcoming tech events, webinars, and conferences to enhance your knowledge.',
            url: '',
          },
        ],
      },
    },

    edit({ attributes, setAttributes }) {
      const { subtitle, title, description, items } = attributes;

      const updateItem = (index, field, value) => {
        const newItems = items.map((item, i) =>
          i === index ? { ...item, [field]: value } : item,
        );
        setAttributes({ items: newItems });
      };

      return el(
        Fragment,
        {},
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
        el(TextareaControl, {
          label: 'Description',
          value: description,
          onChange: (value) => setAttributes({ description: value }),
          __nextHasNoMarginBottom: true,
        }),
        el(
          'div',
          { className: 'cta-block__items' },
          items.map((item, index) =>
            el(
              'div',
              { className: 'cta-block__item', key: index },
              el(TextControl, {
                label: `Item Title ${index + 1}`,
                value: item.title,
                onChange: (value) => updateItem(index, 'title', value),
                __next40pxDefaultSize: true,
                __nextHasNoMarginBottom: true,
              }),
              el(TextareaControl, {
                label: `Item Description ${index + 1}`,
                value: item.description,
                onChange: (value) => updateItem(index, 'description', value),
                __nextHasNoMarginBottom: true,
              }),
              el(TextControl, {
                label: `Item URL ${index + 1}`,
                value: item.url,
                onChange: (value) => updateItem(index, 'url', value),
                __next40pxDefaultSize: true,
                __nextHasNoMarginBottom: true,
              }),
            ),
          ),
        ),
      );
    },

    save() {
      return null; // динамический рендер через PHP
    },
  });
})();
