/* PARTE 1: CAMBIO DE IMÁGENES */
const image = document.getElementById("featuresImage");
const tags = document.querySelectorAll(".features-tags span");

// PROTECCIÓN: Solo entramos si existe la imagen principal
if (image) {
    tags.forEach((tag) => {
        tag.addEventListener("click", () => {
            image.style.opacity = 0;

            setTimeout(() => {
                // Aquí leemos la ruta que pusimos en el HTML
                // Usamos el operador '?.' por seguridad (Optional Chaining)
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

// PROTECCIÓN: Solo añadimos el evento si el contenedor 'compare' existe
if (compare) {
    compare.addEventListener("mousemove", (e) => {
        const rect = compare.getBoundingClientRect();
        let x = e.clientX - rect.left;

        x = Math.max(0, Math.min(x, rect.width));

        const percent = (x / rect.width) * 100;

        /* AQUÍ ESTÁ LA MAGIA */
        topImage.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
        divider.style.left = percent + "%";
    });
}

/* PARTE 3: SCROLL STORY */
const section = document.querySelector(".scroll-story");
const items = document.querySelectorAll(".story-item");
const imagesScroll = document.querySelectorAll(".story-img");

// PROTECCIÓN: Solo escuchamos el scroll si la sección existe
if (section) {
    window.addEventListener("scroll", () => {
        const rect = section.getBoundingClientRect();
        const sectionHeight = section.offsetHeight;
        const scrollInside = Math.abs(rect.top);
        
        // Evitamos división por cero si no hay items
        if (items.length === 0) return;

        const step = sectionHeight / items.length;

        let index = Math.floor(scrollInside / step);

        index = Math.max(0, Math.min(index, items.length - 1));

        items.forEach((item, i) => {
            item.classList.toggle("active", i === index);
        });

        imagesScroll.forEach((img, i) => {
            img.classList.toggle("active", i === index);
        });
    });
}