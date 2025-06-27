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
          { title: 'Resources available', value: '300+' },
          { title: 'Total Downloads', value: '12k+' },
          { title: 'Active Users', value: '10k+' },
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
        el(
          'div',
          { className: 'hero' }, // главный блок
          el(
            'h2',
            { className: 'hero__heading hero__heading_type_main' },
            'Main',
          ),

          el(
            'div',
            { className: 'hero__main container' },
            el('div', { className: 'hero__body' }, [
              el(TextControl, {
                className: 'hero__input hero__input_type_subtitle',
                label: 'Subtitle',
                value: mainSubtitle,
                onChange: (value) => setAttributes({ mainSubtitle: value }),
                placeholder: 'Enter subtitle...',
              }),
              el(TextControl, {
                className: 'hero__input hero__input_type_title',
                label: 'Title',
                value: mainTitle,
                onChange: (value) => setAttributes({ mainTitle: value }),
                placeholder: 'Enter title...',
              }),
              el(TextareaControl, {
                className: 'hero__textarea hero__textarea_type_description',
                label: 'Description',
                value: mainDescription,
                onChange: (value) => setAttributes({ mainDescription: value }),
                placeholder: 'Enter description...',
              }),
            ]),
          ),

          el(
            'h2',
            { className: 'hero__heading hero__heading_type_metrics' },
            'Metrics',
          ),

          el(
            'div',
            { className: 'hero__metrics' },
            metrics.map((metric, index) =>
              el('div', { className: 'hero__metric', key: index }, [
                el(TextControl, {
                  className: 'hero__input hero__input_type_metric-value',
                  label: 'Metric Value',
                  value: metric.value,
                  onChange: (value) => updateMetric(index, 'value', value),
                  placeholder: 'Metric Value',
                }),
                el(TextControl, {
                  className: 'hero__input hero__input_type_metric-title',
                  label: 'Metric Title',
                  value: metric.title,
                  onChange: (value) => updateMetric(index, 'title', value),
                  placeholder: 'Metric Title',
                }),
              ]),
            ),
          ),

          el(
            'h2',
            { className: 'hero__heading hero__heading_type_resources' },
            'Resources',
          ),

          el('div', { className: 'hero__resources' }, [
            el(TextControl, {
              className: 'hero__input hero__input_type_resources-title',
              label: 'Resources Title',
              value: resourcesTitle,
              onChange: (value) => setAttributes({ resourcesTitle: value }),
              placeholder: 'Resources title...',
            }),
            el(TextareaControl, {
              className:
                'hero__textarea hero__textarea_type_resources-subtitle',
              label: 'Resources Subtitle',
              value: resourcesSubtitle,
              onChange: (value) => setAttributes({ resourcesSubtitle: value }),
              placeholder: 'Resources subtitle...',
            }),
            el(TextControl, {
              className: 'hero__input hero__input_type_resources-link',
              label: 'Resources Link',
              value: resourcesLink,
              onChange: (value) => setAttributes({ resourcesLink: value }),
              placeholder: 'Resources link...',
            }),
            el(TextControl, {
              className: 'hero__input hero__input_type_resources-link-text',
              label: 'Resources Link Text',
              value: resourcesLinkText,
              onChange: (value) => setAttributes({ resourcesLinkText: value }),
              placeholder: 'Resources link text...',
            }),
          ]),

          el(
            'div',
            { className: 'hero__team' },
            teamImages.map((url, index) =>
              el(MediaUpload, {
                key: index,
                onSelect: (media) => updateTeamImage(index, media.url),
                allowedTypes: ['image'],
                render: ({ open }) =>
                  el('div', { className: 'hero__team-image' }, [
                    el('img', {
                      src: url,
                      style: { width: '60px', height: '60px' },
                      alt: 'Team member image',
                    }),
                    el(Button, { onClick: open }, 'Change Image'),
                  ]),
              }),
            ),
          ),

          el(
            'h2',
            { className: 'hero__heading hero__heading_type_advantages' },
            'Advantages',
          ),

          el(
            'div',
            { className: 'hero__advantages' },
            advantages.map((adv, index) =>
              el('div', { className: 'hero__advantage', key: index }, [
                el(MediaUpload, {
                  onSelect: (media) => updateAdvantage(index, 'img', media.url),
                  allowedTypes: ['image'],
                  render: ({ open }) =>
                    el('div', { className: 'hero__advantage-image-wrapper' }, [
                      el('img', {
                        src: adv.img,
                        style: { width: '40px', height: '40px' },
                        alt: 'Advantage image',
                        className: 'hero__advantage-image',
                      }),
                      el(Button, { onClick: open }, 'Change Advantage Image'),
                    ]),
                }),
                el(TextControl, {
                  className: 'hero__input hero__input_type_advantage-title',
                  label: 'Advantage Title',
                  value: adv.title,
                  onChange: (value) => updateAdvantage(index, 'title', value),
                  placeholder: 'Advantage title...',
                }),
                el(TextControl, {
                  className: 'hero__input hero__input_type_advantage-subtitle',
                  label: 'Advantage Subtitle',
                  value: adv.subtitle,
                  onChange: (value) =>
                    updateAdvantage(index, 'subtitle', value),
                  placeholder: 'Advantage subtitle...',
                }),
                el(TextareaControl, {
                  className:
                    'hero__textarea hero__textarea_type_advantage-details',
                  label: 'Advantage Details',
                  value: adv.details,
                  onChange: (value) => updateAdvantage(index, 'details', value),
                  placeholder: 'Advantage details...',
                }),
                el(TextControl, {
                  className: 'hero__input hero__input_type_advantage-link',
                  label: 'Advantage Link',
                  value: adv.link,
                  onChange: (value) => updateAdvantage(index, 'link', value),
                  placeholder: 'Advantage link...',
                }),
              ]),
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
