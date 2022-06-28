const fn = () => {
  console.log("index.js");

  return someFn();
};

window.addEventListener("load", (event) => {
  fn();
});
