(() => {
  const { registerBlockType } = wp.blocks;
  const { Fragment, createElement: el } = wp.element;
  const { TextControl } = wp.components;

  registerBlockType('custom/metrix-block', {
    title: 'Metrix Block',
    icon: 'chart-bar',
    category: 'common',
    attributes: {
      title: {
        type: 'string',
        default: 'Unlock the World of Artificial Intelligence',
      },
      subtitle: { type: 'string', default: 'through Podcasts' },
      description: {
        type: 'string',
        default:
          "Dive deep into the AI universe with our collection of insightful podcasts. Explore the latest trends, breakthroughs, and discussions on artificial intelligence. Whether you're an enthusiast or a professional, our AI podcasts offer a gateway to knowledge and innovation.",
      },
      metrix: {
        type: 'array',
        default: [
          { title: 'Resources available', value: '300' },
          { title: 'Total Downloads', value: '12k' },
          { title: 'Active Users', value: '10k' },
          { title: 'Episodes Published', value: '150' },
        ],
      },
    },

    edit({ attributes, setAttributes }) {
      const { title, subtitle, description, metrix } = attributes;

      const updateMetrix = (index, field, value) => {
        const newMetrix = metrix.map((item, i) =>
          i === index ? { ...item, [field]: value } : item,
        );
        setAttributes({ metrix: newMetrix });
      };

      return el(
        Fragment,
        {},
        el('div', { className: 'main-block' }, [
          el('h1', {}, 'Metrix Block'),
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
          el(TextControl, {
            label: 'Description',
            value: description,
            onChange: (value) => setAttributes({ description: value }),
          }),
          metrix.map((item, index) =>
            el('div', { key: index, style: { marginTop: '1em' } }, [
              el(TextControl, {
                label: `Metrix Title ${index + 1}`,
                value: item.title,
                onChange: (value) => updateMetrix(index, 'title', value),
              }),
              el(TextControl, {
                label: `Metrix Value ${index + 1}`,
                value: item.value,
                onChange: (value) => updateMetrix(index, 'value', value),
              }),
            ]),
          ),
        ]),
      );
    },

    save() {
      return null;
    },
  });
})();
