/* --- PART 1: Comparison slider --- */
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

    const updateStory = () => {
        // Absolute distance from document top to section top
        const sectionTop =
            section.getBoundingClientRect().top + window.pageYOffset;

        // How far we've scrolled PAST the section top (0 = sticky just locked)
        const scrolledIn = window.pageYOffset - sectionTop;

        // Total virtual scroll space inside the section
        // The sticky panel sits at top: 80px (header height), so the effective
        // viewport used by the panel is innerHeight - 80px
        const HEADER = 80;
        const scrollable = section.offsetHeight - (window.innerHeight - HEADER);

        // Do nothing if the sticky block hasn't locked yet or has already passed
        if (scrolledIn < 0 || scrolledIn > scrollable) return;

        const progress = scrolledIn / scrollable;
        let index = Math.floor(progress * numItems);
        index = Math.min(Math.max(index, 0), numItems - 1);

        items.forEach((item, i) => item.classList.toggle("active", i === index));
        imagesScroll.forEach((img, i) =>
            img.classList.toggle("active", i === index),
        );
    };

    window.addEventListener("scroll", updateStory, { passive: true });
}
