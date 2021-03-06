//  should be more generic
//  a side panel class
//  side navigation per mobile would extend it
//  instantiated per toggle - maybe could call per actual sidepanel, and have an opening and closing toggler as dependancy
class SideNav {
  constructor(element) {
    //  the initial toggle button element
    this.toggle = element;
    //  list of all toggles targetting the same element
    this.togglesList = document.querySelectorAll(
      `[data-target='${this.toggle.getAttribute("data-target")}']`
    );
    //  target to be toggled
    this.target = document.querySelector(
      `${this.toggle.getAttribute("data-target")}`
    );
    //  menu items
    this.items = this.target.querySelectorAll(".menu-item");

    //  animated items
    this.animated = this.target.querySelectorAll("[data-target], .menu-item");
    //  event listener
    Array.from(this.togglesList).map((toggle) => {
      return toggle.addEventListener("click", (event) => {
        this.onClickHandler();
      });
    });

    //  closing the side nav when item is clicked
    Array.from(this.items).map((item) => {
      return item.addEventListener("click", (event) => {
        return this.onHideHandler();
      });
    });

    //  closing the side nav when item is activated via keyboard
    Array.from(this.items).map((item) => {
      return item.addEventListener("keydown", (event) => {
        return event.keyCode == 32 && event.target.click();
      });
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

  panelTransitionDuration() {
    //  gets transition duration for toggle element and converts to milliseconds
    return (
      parseFloat(
        window
          .getComputedStyle(this.target)
          .getPropertyValue("transition-duration")
      ) * 1000
    );
  }

  menuItemTransitionDuration() {
    //  gets transition duration for toggle element and converts to milliseconds
    return (
      parseFloat(
        window
          .getComputedStyle(this.items[0])
          .getPropertyValue("transition-duration")
      ) * 1000
    );
  }

  async animateItems(direction = "forwards") {
    //  toggle animation for each subsequent menu item in intervals
    return new Promise((resolve, reject) => {
      //  first in the queue, ideally should be tied to keyframes
      //  as it is now, it may not run perfectly, next step can run before the previous finishes
      //  possibly wait for transition-end event on the previous element and toggle after? for as long as we have items left

      //  schedule to resolve after below animation ends
      setTimeout(() => {
        resolve();
      }, this.menuItemTransitionDuration() * this.animated.length);

      //  animate each subsequent menu item
      if (direction == "forwards") {
        Array.from(this.animated).map((item, index) => {
          return setTimeout(() => {
            item.classList.toggle("show");
          }, this.menuItemTransitionDuration() * index);
        });
      }

      //  animation in reverse, for closing the menu
      if (direction == "backwards") {
        Array.from(this.animated)
          .slice()
          .reverse()
          .map((item, index) => {
            return setTimeout(() => {
              item.classList.toggle("show");
            }, this.menuItemTransitionDuration() * index);
          });
      }
    });
  }

  async show() {
    return new Promise((resolve, reject) => {
      //  fn to toggle the menu root show animation
      this.target.classList.toggle("show");
      setTimeout(() => {
        return resolve();
      }, this.panelTransitionDuration());
    });
  }

  async hide() {
    //  fn to toggle the menu root hide animation
    return new Promise((resolve, reject) => {
      this.target.classList.toggle("show");
      setTimeout(() => {
        return resolve();
      }, this.panelTransitionDuration());
    });
  }

  onShowHandler() {
    //  chaining promises to trigger one animation after the other
    //  should depend on keyframes instead of transition duration times

    //  first, animates the black background
    //  then animates menu items
    //  lastly updates aria-expanded
    this.show()
      .then(() => {
        return this.animateItems("forwards");
      })
      .then(() => {
        return this.updateAria();
      });
  }

  onHideHandler() {
    //  chaining promises to trigger one animation after the other
    //  should depend on keyframes instead of transition duration times

    //  first, animates the black background
    //  then animates menu items
    //  lastly updates aria-expanded
    this.animateItems("backwards")
      .then(() => {
        return this.hide();
      })
      .then(() => {
        return this.updateAria();
      });
  }

  onClickHandler() {
    //  one handler to rule them all, the other ones are measly trinkets
    event.target.getAttribute("data-function")
      ? this.onHideHandler()
      : this.onShowHandler();
  }
}
