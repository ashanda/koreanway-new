// You can use JavaScript to add animation to the card
const card2 = document.querySelector(".card2");
card2.addEventListener("mouseenter", () => {
  card2.style.transform = "scale(1.1)";
});
card2.addEventListener("mouseleave", () => {
  card2.style.transform = "scale(1)";
});
