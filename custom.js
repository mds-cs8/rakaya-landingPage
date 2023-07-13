// this function to loaded intro when visit website ---
let intro = document.getElementById("intro");

window.addEventListener("DOMContentLoaded", () => {
  setTimeout(() => {
    intro.style.top = "-100vh";
  }, 2000);
});
// -----------------------------------------------------
function countUp(numberElement) {
  let current = 0;
  const total = parseInt(numberElement.textContent);
  const increment = Math.ceil(total / 50);

  function step() {
    current += increment;
    if (current > total) current = total;
    numberElement.textContent = current.toLocaleString();
    current !== total && requestAnimationFrame(step);
  }
  setTimeout(() => {
    step();
  }, 2000);
}

document.querySelectorAll(".counter").forEach((elem) => countUp(elem));
