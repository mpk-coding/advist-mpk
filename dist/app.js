class SideNav{constructor(t){this.toggle=t,this.togglesList=document.querySelectorAll(`[data-target='${this.toggle.getAttribute("data-target")}']`),this.target=document.querySelector(""+this.toggle.getAttribute("data-target")),this.toggle.addEventListener("click",t=>{this.onClickHandler()})}updateAria(){Array.from(this.togglesList).map(t=>"true"===t.getAttribute("aria-expanded")?t.setAttribute("aria-expanded","false"):t.setAttribute("aria-expanded","true"))}onClickHandler(){this.target.classList.toggle("show"),this.updateAria()}}const initSideNav=()=>{var t=document.querySelectorAll("[data-toggle='custom-side-nav'");return Array.from(t).map(t=>new SideNav(t))};window.addEventListener("load",t=>{initSideNav()});