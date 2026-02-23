/* --- PART 1: Image switching --- */
const image = document.getElementById("featuresImage");
const tags = document.querySelectorAll(".features-tags span");

// PROTECTION: Only proceed if main image exists
if (image) {
    tags.forEach((tag) => {
        tag.addEventListener("click", () => {
            image.style.opacity = 0;

            setTimeout(() => {
                const nuevaRuta = tag.getAttribute("data-img");
                if (nuevaRuta) image.src = nuevaRuta;

                image.style.opacity = 1;
            }, 300);

            tags.forEach((t) => t.classList.remove("active"));
            tag.classList.add("active");
        });
    });
}

/* --- PART 2: Comparison slider --- */
const compare = document.getElementById("compare");
const topImage = document.getElementById("topImage");
const divider = document.getElementById("divider");

// PROTECTION: Only attach event if compare container exists
if (compare) {
    compare.addEventListener("mousemove", (e) => {
        const rect = compare.getBoundingClientRect();
        let x = e.clientX - rect.left;

        x = Math.max(0, Math.min(x, rect.width));

        const percent = (x / rect.width) * 100;

        topImage.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
        divider.style.left = percent + "%";
    });
}

/* --- PART 3: About us modal --- */
const aboutBtn = document.getElementById("aboutBtn");
const aboutModal = document.getElementById("aboutModal");
const aboutClose = document.getElementById("aboutClose");

if (aboutBtn && aboutModal) {
    aboutBtn.addEventListener("click", () => {
        aboutModal.classList.add("open");
        aboutModal.setAttribute("aria-hidden", "false");
        document.body.style.overflow = "hidden";
    });

    const closeModal = () => {
        aboutModal.classList.remove("open");
        aboutModal.setAttribute("aria-hidden", "true");
        document.body.style.overflow = "";
    };

    aboutClose.addEventListener("click", closeModal);

    aboutModal.addEventListener("click", (e) => {
        if (e.target === aboutModal) closeModal();
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && aboutModal.classList.contains("open"))
            closeModal();
    });
}

const section = document.querySelector(".scroll-story");
const items = document.querySelectorAll(".story-item");
const imagesScroll = document.querySelectorAll(".story-img");

if (section) {
    const numItems = items.length;

    window.addEventListener("scroll", () => {
        const rect = section.getBoundingClientRect();
        const sectionHeight = section.offsetHeight;
        const windowHeight = window.innerHeight;

        // only when the section is visible
        if (rect.bottom > 0 && rect.top < windowHeight) {
            // scroll relative within the section
            const scrollInside = Math.min(
                Math.max(windowHeight - rect.top, 0),
                sectionHeight,
            );

            // height of each segment per item
            const tramo = sectionHeight / numItems;

            // index based on segment height
            let index = Math.floor(scrollInside / tramo);

            // limit index to valid range
            index = Math.min(Math.max(index, 0), numItems - 1);

            // activate items and images
            items.forEach((item, i) =>
                item.classList.toggle("active", i === index),
            );
            imagesScroll.forEach((img, i) =>
                img.classList.toggle("active", i === index),
            );
        }
    });
}
