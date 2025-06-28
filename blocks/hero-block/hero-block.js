(() => {
  const { registerBlockType } = wp.blocks;
  const { MediaUpload } = wp.blockEditor;
  const { Fragment, createElement: el } = wp.element;
  const { TextControl, TextareaControl, Button } = wp.components;

  registerBlockType('custom/hero-block', {
    title: 'Hero Block',
    icon: 'welcome-widgets-menus',
    category: 'common',
    attributes: {
      mainSubtitle: {
        type: 'string',
        default: 'Your Journey to Tomorrow Begins Here',
      },
      mainTitle: {
        type: 'string',
        default: 'Explore the Frontiers of Artificial Intelligence',
      },
      mainDescription: {
        type: 'string',
        default:
          'Welcome to the epicenter of AI innovation. FutureTech AI News is your passport to a world where machines think, learn, and reshape the future. Join us on this visionary expedition into the heart of AI.',
      },
      metrics: {
        type: 'array',
        default: [
          { title: 'Resources available', value: '300' },
          { title: 'Total Downloads', value: '12k' },
          { title: 'Active Users', value: '10k' },
        ],
      },
      teamImages: {
        type: 'array',
        default: [
          '/wp-content/themes/future-tech/img/team/1.png',
          '/wp-content/themes/future-tech/img/team/2.png',
          '/wp-content/themes/future-tech/img/team/3.png',
        ],
      },
      resourcesTitle: { type: 'string', default: 'Explore 1000+ resources' },
      resourcesSubtitle: {
        type: 'string',
        default:
          'Over 1,000 articles on emerging tech trends and breakthroughs.',
      },
      resourcesLink: { type: 'string', default: '#' },
      resourcesLinkText: { type: 'string', default: 'Explore Resources' },
      advantages: {
        type: 'array',
        default: [
          {
            img: '/wp-content/themes/future-tech/img/advantage/1.svg',
            title: 'Latest News Updates',
            subtitle: 'Stay Current',
            details: 'Over 1,000 articles published monthly',
            link: '#',
          },
          {
            img: '/wp-content/themes/future-tech/img/advantage/2.svg',
            title: 'Expert Contributors',
            subtitle: 'Trusted Insights',
            details: '50+ renowned AI experts on our team',
            link: '#',
          },
          {
            img: '/wp-content/themes/future-tech/img/advantage/3.svg',
            title: 'Global Readership',
            subtitle: 'Worldwide Impact',
            details: '2 million monthly readers',
            link: '#',
          },
        ],
      },
    },

    edit({ attributes, setAttributes }) {
      const {
        mainSubtitle,
        mainTitle,
        mainDescription,
        metrics,
        teamImages,
        resourcesTitle,
        resourcesSubtitle,
        resourcesLink,
        resourcesLinkText,
        advantages,
      } = attributes;

      const updateMetric = (index, key, value) => {
        const newMetrics = [...metrics];
        newMetrics[index] = { ...newMetrics[index], [key]: value };
        setAttributes({ metrics: newMetrics });
      };

      const updateTeamImage = (index, url) => {
        const newImages = [...teamImages];
        newImages[index] = url;
        setAttributes({ teamImages: newImages });
      };

      const updateAdvantage = (index, key, value) => {
        const newAdvantages = [...advantages];
        newAdvantages[index] = { ...newAdvantages[index], [key]: value };
        setAttributes({ advantages: newAdvantages });
      };

      return el(
        Fragment,
        {},
        el('div', { className: 'main-block' }, [
          el('h1', { className: 'block-name' }, 'Hero'),
          el('h2', { className: 'block-section__label' }, 'Main'),

          el(
            'div',
            {},
            el('div', {}, [
              el(TextControl, {
                label: 'Subtitle',
                value: mainSubtitle,
                onChange: (v) => setAttributes({ mainSubtitle: v }),
                placeholder: 'Enter subtitle...',
                __next40pxDefaultSize: true,
                __nextHasNoMarginBottom: true,
              }),
              el(TextControl, {
                label: 'Title',
                value: mainTitle,
                onChange: (v) => setAttributes({ mainTitle: v }),
                placeholder: 'Enter title...',
                __next40pxDefaultSize: true,
                __nextHasNoMarginBottom: true,
              }),
              el(TextareaControl, {
                label: 'Description',
                value: mainDescription,
                onChange: (v) => setAttributes({ mainDescription: v }),
                placeholder: 'Enter description...',
                __nextHasNoMarginBottom: true,
              }),
            ]),
          ),

          el('h2', { className: 'block-section__label' }, 'Metrix'),

          el(
            'div',
            {},
            metrics.map((metric, i) =>
              el('div', { key: i }, [
                el(TextControl, {
                  label: 'Metric Value',
                  value: metric.value,
                  onChange: (v) => updateMetric(i, 'value', v),
                  placeholder: 'Metric Value',
                  __next40pxDefaultSize: true,
                  __nextHasNoMarginBottom: true,
                }),
                el(TextControl, {
                  label: 'Metric Title',
                  value: metric.title,
                  onChange: (v) => updateMetric(i, 'title', v),
                  placeholder: 'Metric Title',
                  __next40pxDefaultSize: true,
                  __nextHasNoMarginBottom: true,
                }),
              ]),
            ),
          ),

          el('h2', { className: 'block-section__label' }, 'Resourses'),

          el('div', {}, [
            el(TextControl, {
              label: 'Resources Title',
              value: resourcesTitle,
              onChange: (v) => setAttributes({ resourcesTitle: v }),
              placeholder: 'Resources title...',
              __next40pxDefaultSize: true,
              __nextHasNoMarginBottom: true,
            }),
            el(TextareaControl, {
              label: 'Resources Subtitle',
              value: resourcesSubtitle,
              onChange: (v) => setAttributes({ resourcesSubtitle: v }),
              placeholder: 'Resources subtitle...',
              __next40pxDefaultSize: true,
              __nextHasNoMarginBottom: true,
            }),
            el(TextControl, {
              label: 'Resources Link',
              value: resourcesLink,
              onChange: (v) => setAttributes({ resourcesLink: v }),
              placeholder: 'Resources link...',
              __next40pxDefaultSize: true,
              __nextHasNoMarginBottom: true,
            }),
            el(TextControl, {
              label: 'Resources Link Text',
              value: resourcesLinkText,
              onChange: (v) => setAttributes({ resourcesLinkText: v }),
              placeholder: 'Resources link text...',
              __next40pxDefaultSize: true,
              __nextHasNoMarginBottom: true,
            }),
          ]),

          el(
            'div',
            { className: 'main-block__img' },
            teamImages.map((url, i) =>
              el(MediaUpload, {
                key: i,
                onSelect: (media) => updateTeamImage(i, media.url),
                allowedTypes: ['image'],
                render: ({ open }) =>
                  el('div', { className: 'main-block__img-item' }, [
                    el('img', {
                      src: url,
                      style: { width: '60px', height: '60px' },
                      alt: 'Image',
                    }),
                    el(Button, { onClick: open }, 'Change Image'),
                  ]),
              }),
            ),
          ),

          el('h2', { className: 'block-section__label' }, 'Advantages'),

          el(
            'div',
            {},
            advantages.map((adv, i) =>
              el('div', { key: i }, [
                el(MediaUpload, {
                  onSelect: (media) => updateAdvantage(i, 'img', media.url),
                  allowedTypes: ['image'],
                  render: ({ open }) =>
                    el('div', { className: 'main-block__img-item' }, [
                      el('img', {
                        src: adv.img,
                        style: { width: '40px', height: '40px' },
                        alt: 'Advantage image',
                      }),
                      el(Button, { onClick: open }, 'Change'),
                    ]),
                }),
                el(TextControl, {
                  label: 'Advantage Title',
                  value: adv.title,
                  onChange: (v) => updateAdvantage(i, 'title', v),
                  placeholder: 'Advantage title...',
                  __next40pxDefaultSize: true,
                  __nextHasNoMarginBottom: true,
                }),
                el(TextControl, {
                  label: 'Advantage Subtitle',
                  value: adv.subtitle,
                  onChange: (v) => updateAdvantage(i, 'subtitle', v),
                  placeholder: 'Advantage subtitle...',
                  __next40pxDefaultSize: true,
                  __nextHasNoMarginBottom: true,
                }),
                el(TextareaControl, {
                  label: 'Advantage Details',
                  value: adv.details,
                  onChange: (v) => updateAdvantage(i, 'details', v),
                  placeholder: 'Advantage details...',
                  __nextHasNoMarginBottom: true,
                }),
                el(TextControl, {
                  label: 'Advantage Link',
                  value: adv.link,
                  onChange: (v) => updateAdvantage(i, 'link', v),
                  placeholder: 'Advantage link...',
                  __next40pxDefaultSize: true,
                  __nextHasNoMarginBottom: true,
                }),
              ]),
            ),
          ),
        ]),
      );
    },

    save() {
      return null;
    },
  });
})();
