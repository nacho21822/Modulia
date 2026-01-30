document.addEventListener("DOMContentLoaded", () => {
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
});
