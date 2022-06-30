const initModal = (id, toggleId) => {
  const toggles = document.querySelectorAll(`[data-popup='${toggleId}']`);

  jQuery(`#${id}`).modal({
    show: false,
  });

  Array.from(toggles).map((toggle) => {
    return toggle.addEventListener("click", (event) => {
      jQuery(`#${id}`).modal("show");
    });
  });
};
