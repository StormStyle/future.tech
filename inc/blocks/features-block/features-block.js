(() => {
  const { registerBlockType } = wp.blocks;
  const { TextControl, PanelBody, PanelRow, Button } = wp.components;
  const { InspectorControls, MediaUpload } = wp.blockEditor;
  const { Fragment, createElement: el } = wp.element;

  registerBlockType('custom/features-block', {
    title: 'Features Block',
    icon: 'list-view',
    category: 'common',

    attributes: {
      sectionSubtitle: { type: 'string', default: 'Unlock the Power of' },
      sectionTitle: { type: 'string', default: 'FutureTech Features' },

      cards: {
        type: 'array',
        default: [
          {
            icon: '/wp-content/themes/future-tech/img/card/1.svg',
            previewTitle: 'Future Technology Blog',
            previewDescription:
              'Stay informed with our blog section dedicated to future technology.',
            tiles: [
              {
                title: 'Quantity',
                description:
                  'Over 1,000 articles on emerging tech trends and breakthroughs.',
              },
              {
                title: 'Variety',
                description:
                  'Over 1,000 articles on emerging tech trends and breakthroughs.Articles cover fields like AI, robotics, biotechnology, and more.',
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
            icon: '/wp-content/themes/future-tech/img/card/2.svg',
            previewTitle: 'Research Insights Blogs',
            previewDescription:
              'Dive deep into future technology concepts with our research section.',
            tiles: [
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
      const { sectionSubtitle, sectionTitle, cards } = attributes;

      const updateCard = (index, key, value) => {
        const newCards = [...cards];
        newCards[index] = { ...newCards[index], [key]: value };
        setAttributes({ cards: newCards });
      };

      const updateTile = (cardIndex, tileIndex, key, value) => {
        const newCards = [...cards];
        const newTiles = [...newCards[cardIndex].tiles];
        newTiles[tileIndex] = { ...newTiles[tileIndex], [key]: value };
        newCards[cardIndex] = { ...newCards[cardIndex], tiles: newTiles };
        setAttributes({ cards: newCards });
      };

      return el(
        Fragment,
        {},
        el(
          InspectorControls,
          {},
          el(
            PanelBody,
            { title: 'Section Header', initialOpen: true },
            el(
              PanelRow,
              {},
              el(TextControl, {
                label: 'Subtitle',
                value: sectionSubtitle,
                onChange: (v) => setAttributes({ sectionSubtitle: v }),
              }),
            ),
            el(
              PanelRow,
              {},
              el(TextControl, {
                label: 'Title',
                value: sectionTitle,
                onChange: (v) => setAttributes({ sectionTitle: v }),
              }),
            ),
          ),
          el(
            PanelBody,
            { title: 'Cards', initialOpen: false },
            cards.map((card, cardIndex) =>
              el(
                Fragment,
                { key: cardIndex },
                el(
                  PanelRow,
                  {},
                  el(MediaUpload, {
                    onSelect: (media) =>
                      updateCard(cardIndex, 'icon', media.url),
                    allowedTypes: ['image'],
                    render: ({ open }) =>
                      el(
                        Button,
                        { onClick: open },
                        `Select Icon for Card ${cardIndex + 1}`,
                      ),
                  }),
                ),
                el(
                  PanelRow,
                  {},
                  el(TextControl, {
                    label: 'Preview Title',
                    value: card.previewTitle,
                    onChange: (v) => updateCard(cardIndex, 'previewTitle', v),
                  }),
                ),
                el(
                  PanelRow,
                  {},
                  el(TextControl, {
                    label: 'Preview Description',
                    value: card.previewDescription,
                    onChange: (v) =>
                      updateCard(cardIndex, 'previewDescription', v),
                  }),
                ),
                el(
                  'div',
                  { style: { marginLeft: 20 } },
                  card.tiles.map((tile, tileIndex) =>
                    el(
                      Fragment,
                      { key: tileIndex },
                      el(
                        PanelRow,
                        {},
                        el(TextControl, {
                          label: `Tile ${tileIndex + 1} Title`,
                          value: tile.title,
                          onChange: (v) =>
                            updateTile(cardIndex, tileIndex, 'title', v),
                        }),
                      ),
                      el(
                        PanelRow,
                        {},
                        el(TextControl, {
                          label: `Tile ${tileIndex + 1} Description`,
                          value: tile.description,
                          onChange: (v) =>
                            updateTile(cardIndex, tileIndex, 'description', v),
                        }),
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
        el(
          'section',
          { className: 'section' },
          el(
            'header',
            { className: 'section__header' },
            el(
              'div',
              { className: 'section___header-inner container' },
              el(
                'div',
                { className: 'section__header-info' },
                el(
                  'p',
                  { className: 'section__subtitle tag' },
                  sectionSubtitle,
                ),
                el('h2', { className: 'section__title' }, sectionTitle),
              ),
            ),
          ),
          el(
            'div',
            { className: 'section__body' },
            el(
              'ul',
              { className: 'list' },
              cards.map((card, cardIndex) =>
                el(
                  'li',
                  { key: cardIndex, className: 'list__item' },
                  el(
                    'div',
                    { className: 'card container' },
                    el(
                      'div',
                      { className: 'card__preview' },
                      el(
                        'div',
                        { className: 'card__preview-main' },
                        el('img', {
                          src: card.icon,
                          alt: '',
                          className: 'card__preview-icon',
                          width: 80,
                          height: 80,
                        }),
                        el(
                          'div',
                          { className: 'card__preview-info' },
                          el(
                            'h3',
                            { className: 'card__preview-title' },
                            card.previewTitle,
                          ),
                          el(
                            'div',
                            { className: 'card__preview-description' },
                            card.previewDescription,
                          ),
                        ),
                      ),
                    ),
                    el(
                      'div',
                      { className: 'card__body' },
                      el(
                        'div',
                        { className: 'card__grid card__grid--2-col' },
                        card.tiles.map((tile, tileIndex) =>
                          el(
                            'div',
                            { key: tileIndex, className: 'card__cell tile' },
                            el(
                              'h4',
                              { className: 'card__cell-title h5' },
                              tile.title,
                            ),
                            el(
                              'p',
                              { className: 'card__cell-description' },
                              tile.description,
                            ),
                          ),
                        ),
                      ),
                    ),
                  ),
                ),
              ),
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
