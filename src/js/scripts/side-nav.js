class SideNav {
  constructor(element) {
    this.toggle = element;
    this.target = document.querySelector(
      `${this.toggle.getAttribute("data-target")}`
    );

    this.toggle.addEventListener("click", (event) => {
      this.target.classList.toggle("show");
    });
  }
}

const initSideNav = () => {
  const toggles = document.querySelectorAll("[data-toggle='custom-side-nav'");

  return Array.from(toggles).map((element) => {
    return new SideNav(element);
  });
};
