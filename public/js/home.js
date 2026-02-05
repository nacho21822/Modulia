/* PARTE 1: CAMBIO DE IMÁGENES */
const image = document.getElementById("featuresImage");
const tags = document.querySelectorAll(".features-tags span");

if (image && tags.length > 0) {
    tags.forEach((tag) => {
        tag.addEventListener("click", () => {
            image.style.opacity = 0;

            setTimeout(() => {
                const nuevaRuta = tag.getAttribute('data-img');
                if (nuevaRuta) image.src = nuevaRuta;
                image.style.opacity = 1;
            }, 300);

            tags.forEach((t) => t.classList.remove("active"));
            tag.classList.add("active");
        });
    });
}

/* PARTE 2: COMPARADOR (SLIDER) */
const compare = document.getElementById("compare");
const topImage = document.getElementById("topImage");
const divider = document.getElementById("divider");

if (compare && topImage && divider) {
    compare.addEventListener("mousemove", (e) => {
        const rect = compare.getBoundingClientRect();
        let x = e.clientX - rect.left;
        x = Math.max(0, Math.min(x, rect.width));

        const percent = (x / rect.width) * 100;

        topImage.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
        divider.style.left = percent + "%";
    });
}

/* PARTE 3: SCROLL STORY */
const section = document.querySelector(".scroll-story");
const items = document.querySelectorAll(".story-item");
const imagesScroll = document.querySelectorAll(".story-img");

if (section && items.length > 0 && imagesScroll.length > 0) {
    window.addEventListener("scroll", () => {
        const rect = section.getBoundingClientRect();
        const sectionHeight = section.offsetHeight;

        // Scroll relativo dentro de la sección
        const scrollInside = Math.min(Math.max(window.innerHeight - rect.top, 0), sectionHeight);

        // Ajuste para que la última frase tenga tiempo antes de desaparecer
        const paddingBottom = window.innerHeight;
        const effectiveHeight = sectionHeight - paddingBottom;

        let index = Math.floor((scrollInside / effectiveHeight) * items.length);
        index = Math.max(0, Math.min(index, items.length - 1));

        // Activamos solo el item correspondiente
        items.forEach((item, i) => item.classList.toggle("active", i === index));
        imagesScroll.forEach((img, i) => img.classList.toggle("active", i === index));
    });
}