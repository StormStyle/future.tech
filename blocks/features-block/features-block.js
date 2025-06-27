(() => {
  const { registerBlockType } = wp.blocks;
  const { Fragment, createElement: el } = wp.element;
  const { TextControl, TextareaControl } = wp.components;

  registerBlockType('custom/features-block', {
    title: 'Features Block',
    icon: 'list-view',
    category: 'common',
    attributes: {
      subtitle: {
        type: 'string',
        default: 'Unlock the Power of',
      },
      title: {
        type: 'string',
        default: 'FutureTech Features',
      },
      features: {
        type: 'array',
        default: [
          {
            img: '/wp-content/themes/future-tech/img/card/1.svg',
            featureTitle: 'Future Technology Blog',
            description:
              'Stay informed with our blog section dedicated to future technology.',
            cells: [
              {
                title: 'Quantity',
                description:
                  'Over 1,000 articles on emerging tech trends and breakthroughs.',
              },
              {
                title: 'Variety',
                description:
                  'Articles cover fields like AI, robotics, biotechnology, and more.',
              },
              {
                title: 'Frequency',
                description:
                  'Fresh content added daily to keep you up to date.',
              },
              {
                title: 'Authoritative',
                description:
                  'Written by our team of tech experts and industry professionals.',
              },
            ],
          },
          {
            img: '/wp-content/themes/future-tech/img/card/2.svg',
            featureTitle: 'Research Insights Blogs',
            description:
              'Dive deep into future technology concepts with our research section.',
            cells: [
              {
                title: 'Depth',
                description:
                  '500+ research articles for in-depth understanding.',
              },
              {
                title: 'Graphics',
                description:
                  'Visual aids and infographics to enhance comprehension.',
              },
              {
                title: 'Trends',
                description:
                  'Explore emerging trends in future technology research.',
              },
              {
                title: 'Contributors',
                description:
                  'Contributions from tech researchers and academics.',
              },
            ],
          },
        ],
      },
    },

    edit({ attributes, setAttributes }) {
      const { subtitle, title, features } = attributes;

      const updateFeature = (index, key, value) => {
        const newFeatures = [...features];
        newFeatures[index] = { ...newFeatures[index], [key]: value };
        setAttributes({ features: newFeatures });
      };

      const updateCell = (featureIndex, cellIndex, key, value) => {
        const newFeatures = [...features];
        const newCells = [...(newFeatures[featureIndex].cells || [])];
        newCells[cellIndex] = { ...newCells[cellIndex], [key]: value };
        newFeatures[featureIndex].cells = newCells;
        setAttributes({ features: newFeatures });
      };

      return el(
        Fragment,
        {},
        el(
          'div',
          { className: 'features-block' },
          el('h2', { className: 'features-head' }, 'Head'),
          el(TextControl, {
            label: 'Subtitle',
            value: subtitle,
            onChange: (value) => setAttributes({ subtitle: value }),
            className:
              'features-block__input features-block__input_type_subtitle',
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),
          el(TextControl, {
            label: 'Title',
            value: title,
            onChange: (value) => setAttributes({ title: value }),
            className: 'features-block__input features-block__input_type_title',
            __next40pxDefaultSize: true,
            __nextHasNoMarginBottom: true,
          }),

          features.map((feature, fIndex) =>
            el(
              'div',
              {
                key: `feature-${fIndex}`,
                className: 'features-block__feature',
              },
              el('h2', { className: 'features-head' }, 'Main'),
              el(TextControl, {
                label: 'Feature Title',
                value: feature.featureTitle,
                onChange: (value) =>
                  updateFeature(fIndex, 'featureTitle', value),
                className:
                  'features-block__input features-block__input_type_feature-title',
                __next40pxDefaultSize: true,
                __nextHasNoMarginBottom: true,
              }),
              el(TextareaControl, {
                label: 'Feature Description',
                value: feature.description,
                onChange: (value) =>
                  updateFeature(fIndex, 'description', value),
                className:
                  'features-block__textarea features-block__textarea_type_feature-description',
                __nextHasNoMarginBottom: true,
              }),
              feature.cells &&
                feature.cells.map((cell, cIndex) =>
                  el(
                    'div',
                    {
                      key: `feature-${fIndex}-cell-${cIndex}`,
                      className: 'features-block__cell',
                    },
                    el('h2', { className: 'features-head' }, 'Tiles'),
                    el(TextControl, {
                      label: 'Cell Title',
                      value: cell.title,
                      onChange: (value) =>
                        updateCell(fIndex, cIndex, 'title', value),
                      className:
                        'features-block__input features-block__input_type_cell-title',
                      __next40pxDefaultSize: true,
                      __nextHasNoMarginBottom: true,
                    }),
                    el(TextareaControl, {
                      label: 'Cell Description',
                      value: cell.description,
                      onChange: (value) =>
                        updateCell(fIndex, cIndex, 'description', value),
                      className:
                        'features-block__textarea features-block__textarea_type_cell-description',
                      __nextHasNoMarginBottom: true,
                    }),
                  ),
                ),
            ),
          ),
        ),
      );
    },

    save() {
      return null;
    },
  });
})();
