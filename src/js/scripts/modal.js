const initModal = (id, toggleId) => {
  const toggles = document.querySelectorAll(`[data-popup='${toggleId}']`);

  jQuery(`#${id}`).modal({
    show: true,
  });

  Array.from(toggles).map((toggle) => {
    return toggle.addEventListener("click", (event) => {
      jQuery(`#${id}`).modal("show");
    });
  });
};
