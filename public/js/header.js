document.addEventListener("DOMContentLoaded", () => {
    // Scroll-aware header
    const header = document.querySelector('.header');
    if (header) {
        const onScroll = () => {
            header.classList.toggle('header--scrolled', window.scrollY > 80);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll(); // aplicar estado inicial por si la página ya está scrolleada
    }

    const toggle = document.getElementById("userMenuToggle");
    const dropdown = document.getElementById("userDropdown");

    if (toggle) {
        toggle.addEventListener("click", (e) => {
            e.stopPropagation();
            dropdown.style.display =
                dropdown.style.display === "block" ? "none" : "block";
        });

        document.addEventListener("click", () => {
            dropdown.style.display = "none";
        });
    }

    // Hamburger menu
    const hamburger = document.getElementById("hamburgerBtn");
    const navButtons = document.getElementById("navButtons");
    const navClose = document.getElementById("navClose");

    function closeMenu() {
        hamburger.classList.remove("active");
        navButtons.classList.remove("open");
    }

    if (hamburger && navButtons) {
        hamburger.addEventListener("click", (e) => {
            e.stopPropagation();
            hamburger.classList.toggle("active");
            navButtons.classList.toggle("open");
        });

        if (navClose) {
            navClose.addEventListener("click", closeMenu);
        }

        // Cerrar con tecla Escape
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") closeMenu();
        });
    }
});
