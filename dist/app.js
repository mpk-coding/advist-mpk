class SideNav{constructor(t){this.toggle=t,this.target=document.querySelector(""+this.toggle.getAttribute("data-target")),this.toggle.addEventListener("click",t=>{this.target.classList.toggle("show")})}}const initSideNav=()=>{var t=document.querySelectorAll("[data-toggle='custom-side-nav'");return Array.from(t).map(t=>new SideNav(t))};window.addEventListener("load",t=>{initSideNav()});