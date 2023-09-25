export const getDeviceName = () => {
  const width = window.screen.width;

  switch (true) {
    case width < 744:
      return 'mobile';

    case width >= 744 && width < 1280:
      return 'tablet';

    case width >= 1280 && width < 1920:
      return 'desktop';

    default:
      return 'fullhd'
  }
};
