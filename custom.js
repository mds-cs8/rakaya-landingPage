// this function to loaded intro when visit website ---
let intro = document.getElementById("intro");

window.addEventListener("DOMContentLoaded", () => {
  setTimeout(() => {
    intro.style.top = "-100vh";
  }, 2000);
});
// -----------------------------------------------------
const show = document.getElementsByClassName("counter"),
  number = Number(show.innerHTML) + 1;

let counter = 0,
  delay = 1,
  x = number / 2,
  y = 0;

counter_js();

function counter_js() {
  y++;
  delay = x - y;
  show.innerHTML = counter.toString();
  counter++;
  if (counter < number) {
    setTimeout(function () {
      counter_js();
    }, 2000);
  }
}
