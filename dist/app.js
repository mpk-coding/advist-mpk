const setupGlide=()=>{new Glide(".glide--landing",{type:"carousel",autoplay:5e3,hoverpause:!1,perView:1,startAt:0,focusAt:"center",gap:0}).mount(),new Glide(".glide--offer",{type:"carousel",autoplay:5e3,hoverpause:!1,perView:5,startAt:0,focusAt:"center",gap:0,peek:0,breakpoints:{1200:{perView:3},768:{perView:1}}}).mount();const i=()=>document.querySelector(".glide--fullheight");i;{const r=()=>document.querySelector("#masthead"),t=new ResizeObserver(t=>{for(var e of t)i().style.height=`calc(100vh - ${r().getBoundingClientRect().height}px)`});return t.observe(r())}};class SideNav{constructor(t){this.toggle=t,this.togglesList=document.querySelectorAll(`[data-target='${this.toggle.getAttribute("data-target")}']`),this.target=document.querySelector(""+this.toggle.getAttribute("data-target")),this.items=this.target.querySelectorAll("[data-target], .menu-item"),this.toggle.addEventListener("click",t=>{this.onClickHandler()})}updateAria(){Array.from(this.togglesList).map(t=>"true"===t.getAttribute("aria-expanded")?t.setAttribute("aria-expanded","false"):t.setAttribute("aria-expanded","true"))}panelTransitionDuration(){return 1e3*parseFloat(window.getComputedStyle(this.target).getPropertyValue("transition-duration"))}menuItemTransitionDuration(){return 1e3*parseFloat(window.getComputedStyle(this.items[0]).getPropertyValue("transition-duration"))}async animateItems(i="forwards"){return new Promise((t,e)=>{setTimeout(()=>{t()},this.menuItemTransitionDuration()*this.items.length),"forwards"==i&&Array.from(this.items).map((t,e)=>setTimeout(()=>{t.classList.toggle("show")},this.menuItemTransitionDuration()*e)),"backwards"==i&&Array.from(this.items).slice().reverse().map((t,e)=>setTimeout(()=>{t.classList.toggle("show")},this.menuItemTransitionDuration()*e))})}async show(){return new Promise((t,e)=>{this.target.classList.toggle("show"),setTimeout(()=>t(),this.panelTransitionDuration())})}async hide(){return new Promise((t,e)=>{this.target.classList.toggle("show"),setTimeout(()=>t(),this.panelTransitionDuration())})}onShowHandler(){this.show().then(()=>this.animateItems("forwards")).then(()=>this.updateAria())}onHideHandler(){this.animateItems("backwards").then(()=>this.hide()).then(()=>this.updateAria())}onClickHandler(){event.target.getAttribute("data-function")?this.onHideHandler():this.onShowHandler()}}const initSideNav=()=>{var t=document.querySelectorAll("[data-toggle='custom-side-nav'");return Array.from(t).map(t=>new SideNav(t))};window.addEventListener("load",t=>{initSideNav(),setupGlide()});