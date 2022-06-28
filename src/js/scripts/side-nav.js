//  should be more generic
//  a side panel class
//  side navigation per mobile would extend it
class SideNav {
  constructor(element) {
    this.toggle = element;
    //  list of all toggles targetting the same element
    this.togglesList = document.querySelectorAll(
      `[data-target='${this.toggle.getAttribute("data-target")}']`
    );
    //  target to be toggled
    this.target = document.querySelector(
      `${this.toggle.getAttribute("data-target")}`
    );
    //  event listener
    this.toggle.addEventListener("click", (event) => {
      this.onClickHandler();
    });
  }

  updateAria() {
    //  update aria-expanded attribute on all relevant toggles
    Array.from(this.togglesList).map((toggle) => {
      return toggle.getAttribute("aria-expanded") === "true"
        ? toggle.setAttribute("aria-expanded", "false")
        : toggle.setAttribute("aria-expanded", "true");
    });
  }

  onClickHandler() {
    this.target.classList.toggle("show");
    this.updateAria();
  }
}

const initSideNav = () => {
  const toggles = document.querySelectorAll("[data-toggle='custom-side-nav'");

  //  gets all toggles and instantiates a new Object for every one;
  //  could set up a parameter to accept an array of elements instead of hard coding it above
  return Array.from(toggles).map((element) => {
    return new SideNav(element);
  });
};
