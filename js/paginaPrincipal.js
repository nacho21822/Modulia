/* FEATURES IMAGE SWITCH */
const image = document.getElementById("featuresImage");
const tags = document.querySelectorAll(".features-tags span");

const images = {
  kitchen: "../img/cocina1.jpg",
  living: "../img/comedor1.jpg",
  bathroom: "../img/baño1.jpg",
};

tags.forEach((tag) => {
  tag.addEventListener("click", () => {
    image.style.opacity = 0;

    setTimeout(() => {
      image.src = images[tag.id];
      image.style.opacity = 1;
    }, 300);

    tags.forEach((t) => t.classList.remove("active"));
    tag.classList.add("active");
  });
});

const compare = document.getElementById("compare");
const topImage = document.getElementById("topImage");
const divider = document.getElementById("divider");

compare.addEventListener("mousemove", (e) => {
  const rect = compare.getBoundingClientRect();
  let x = e.clientX - rect.left;

  x = Math.max(0, Math.min(x, rect.width));

  const percent = (x / rect.width) * 100;

  /* 🔥 AQUÍ ESTÁ LA MAGIA */
  topImage.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
  divider.style.left = percent + "%";
});
