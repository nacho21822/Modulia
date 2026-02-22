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

/* PARTE 3: MODAL ABOUT US */
const aboutBtn    = document.getElementById('aboutBtn');
const aboutModal  = document.getElementById('aboutModal');
const aboutClose  = document.getElementById('aboutClose');

if (aboutBtn && aboutModal) {
    aboutBtn.addEventListener('click', () => {
        aboutModal.classList.add('open');
        aboutModal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    });

    const closeModal = () => {
        aboutModal.classList.remove('open');
        aboutModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    };

    aboutClose.addEventListener('click', closeModal);

    aboutModal.addEventListener('click', (e) => {
        if (e.target === aboutModal) closeModal();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && aboutModal.classList.contains('open')) closeModal();
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

    // solo cuando la sección es visible
    if (rect.bottom > 0 && rect.top < windowHeight) {
      // scroll relativo dentro de la sección
      const scrollInside = Math.min(Math.max(windowHeight - rect.top, 0), sectionHeight);

      // altura de cada tramo para cada item
      const tramo = sectionHeight / numItems;

      // índice según el tramo
      let index = Math.floor(scrollInside / tramo);

      // limitar índice al rango
      index = Math.min(Math.max(index, 0), numItems - 1);

      // activar items e imágenes
      items.forEach((item, i) => item.classList.toggle("active", i === index));
      imagesScroll.forEach((img, i) => img.classList.toggle("active", i === index));
    }
  });
}