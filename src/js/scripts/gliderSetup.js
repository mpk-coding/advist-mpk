const setupGlide = () => {
  new Glide(".glide--landing", {
    type: "carousel",
    autoplay: 5000,
    hoverpause: false,
    perView: 1,
    startAt: 0,
    focusAt: "center",
    gap: 0,
  }).mount();

  new Glide(".glide--offer", {
    type: "carousel",
    autoplay: 5000,
    hoverpause: false,
    perView: 5,
    startAt: 0,
    focusAt: "center",
    gap: 0,
    peek: 0,
    breakpoints: {
      1200: {
        perView: 3,
      },
      768: {
        perView: 1,
      },
    },
  }).mount();

  const fullHeight = () => {
    return document.querySelector(".glide--fullheight");
  };

  if (fullHeight) {
    const navbar = () => {
      return document.querySelector("#masthead");
    };

    const setFullHeight = () => {
      return (fullHeight().style.height = `calc(100vh - ${
        navbar().getBoundingClientRect().height
      }px)`);
    };

    //  looks for changes in viewport based on #masthead's width
    const resizeObserver = new ResizeObserver((entries) => {
      for (let entry of entries) {
        setFullHeight();
      }
    });

    //  adjusts slider's height to fill the viewport on viewport's width changes
    return resizeObserver.observe(navbar());
  }
};
