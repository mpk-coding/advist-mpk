window.addEventListener("load", (event) => {
  sideNav = new SideNav(document.querySelector("#mobile-toggle"));
  setupGlide();
  initModal("contact-form-modal", "modal-form-toggle");
});
