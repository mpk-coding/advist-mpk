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

    //  all should be in a separate file for one resizeObserver
    //  makes sure the scroll offset is always correct, so that the element user's are scrolling into isn't covered by the sticky nav
    const adjustScrollOffset = () => {
      const html = document.querySelector("html");

      return html.style.setProperty(
        "scroll-padding-top",
        `${navbar().getBoundingClientRect().height}px`
      );
    };

    //  looks for changes in viewport based on #masthead's width
    const resizeObserver = new ResizeObserver((entries) => {
      for (let entry of entries) {
        setFullHeight();
        adjustScrollOffset();
      }
    });

    //  adjusts slider's height to fill the viewport on viewport's width changes
    return resizeObserver.observe(navbar());
  }
};
