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
        el('div', { className: 'main-block' }, [
          el('h1', { className: 'block-name' }, 'Features'),
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

          features.map((feature, fIndex) =>
            el(Fragment, { key: `feature-${fIndex}` }, [
              el('h2', { className: 'block-section__label' }, 'Section'),
              el(TextControl, {
                label: 'Feature Title',
                value: feature.featureTitle,
                onChange: (v) => updateFeature(fIndex, 'featureTitle', v),
                __next40pxDefaultSize: true,
                __nextHasNoMarginBottom: true,
              }),
              el(TextareaControl, {
                label: 'Feature Description',
                value: feature.description,
                onChange: (v) => updateFeature(fIndex, 'description', v),
                __nextHasNoMarginBottom: true,
              }),

              (feature.cells || []).map((cell, cIndex) =>
                el(Fragment, { key: `feature-${fIndex}-cell-${cIndex}` }, [
                  el('h2', { className: 'block-section__label' }, 'Tiles'),
                  el(TextControl, {
                    label: 'Cell Title',
                    value: cell.title,
                    onChange: (v) => updateCell(fIndex, cIndex, 'title', v),
                    __next40pxDefaultSize: true,
                    __nextHasNoMarginBottom: true,
                  }),
                  el(TextareaControl, {
                    label: 'Cell Description',
                    value: cell.description,
                    onChange: (v) =>
                      updateCell(fIndex, cIndex, 'description', v),
                    __nextHasNoMarginBottom: true,
                  }),
                ]),
              ),
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
