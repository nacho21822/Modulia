const image = document.getElementById("featuresImage");
const tags = document.querySelectorAll(".features-tags span");

tags.forEach((tag) => {
    tag.addEventListener("click", () => {
        image.style.opacity = 0;

        setTimeout(() => {
            image.src = tag.getAttribute('data-img');
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

    topImage.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
    divider.style.left = percent + "%";
});

const section = document.querySelector(".scroll-story");
const items = document.querySelectorAll(".story-item");
const imagesScroll = document.querySelectorAll(".story-img");

window.addEventListener("scroll", () => {
    const rect = section.getBoundingClientRect();
    const sectionHeight = section.offsetHeight;
    const scrollInside = Math.abs(rect.top);

    const paddingBottom = window.innerHeight / 1;
    const effectiveHeight = sectionHeight - paddingBottom;

    let index = Math.floor((scrollInside / effectiveHeight) * items.length);
    index = Math.max(0, Math.min(index, items.length - 1));

    items.forEach((item, i) => {
        item.classList.toggle("active", i === index);
    });

    imagesScroll.forEach((img, i) => {
        img.classList.toggle("active", i === index);
    });
});