/* --- PART 1: Slider logic (panel animation) --- */
const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

if (signUpButton && signInButton && container) {
    signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
    });
}

/* --- PART 2: Registration form validation --- */

const registerForm = document.getElementById("registerForm");
const nameInput = document.getElementById("regName");
const emailInput = document.getElementById("regEmail");
const passInput = document.getElementById("regPassword");
const confirmInput = document.getElementById("regConfirm");

const reqLen = document.getElementById("req-len");
const reqUpper = document.getElementById("req-upper");
const reqNum = document.getElementById("req-num");

if (registerForm) {
    // --- A) Real-time validation ---
    if (passInput) {
        passInput.addEventListener("input", () => {
            const val = passInput.value;
            val.length >= 8
                ? reqLen.classList.add("valid")
                : reqLen.classList.remove("valid");
            /[A-Z]/.test(val)
                ? reqUpper.classList.add("valid")
                : reqUpper.classList.remove("valid");
            /[0-9]/.test(val)
                ? reqNum.classList.add("valid")
                : reqNum.classList.remove("valid");
        });
    }

    // --- B) Validation on submit ---
    registerForm.addEventListener("submit", (e) => {
        let hayErrores = false;

        const toggleError = (input, mostrar) => {
            const group = input.parentElement;
            if (mostrar) {
                group.classList.add("error");
            } else {
                group.classList.remove("error");
            }
        };

        // 1. Validate name
        if (nameInput.value.trim() === "") {
            toggleError(nameInput, true);
            hayErrores = true;
        } else {
            toggleError(nameInput, false);
        }

        // 2. Validate email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value.trim())) {
            toggleError(emailInput, true);
            hayErrores = true;
        } else {
            toggleError(emailInput, false);
        }

        // 3. Validate password
        const val = passInput.value;
        const passOk =
            val.length >= 8 && /[A-Z]/.test(val) && /[0-9]/.test(val);
        if (!passOk) {
            toggleError(passInput, true);
            hayErrores = true;
        } else {
            toggleError(passInput, false);
        }

        // 4. Validate confirmation
        if (confirmInput.value !== val || confirmInput.value === "") {
            toggleError(confirmInput, true);
            hayErrores = true;
        } else {
            toggleError(confirmInput, false);
        }

        if (hayErrores) {
            e.preventDefault();
        }
    });
}

/* --- PART 3: Success modal logic (registration) --- */
const modal = document.getElementById("successModal");
const closeBtn = document.getElementById("closeModalBtn");

if (modal && closeBtn) {
    closeBtn.addEventListener("click", () => {
        modal.style.opacity = "0";
        modal.style.transition = "opacity 0.3s ease";
        const redirectUrl = closeBtn.getAttribute("data-redirect");

        setTimeout(() => {
            if (redirectUrl) {
                window.location.href = redirectUrl;
            } else {
                modal.style.display = "none";
            }
        }, 300);
    });
}

/* --- PART 4: Login validation --- */
// Select login elements by IDs from HTML
const loginForm = document.getElementById("loginForm");
const loginEmail = document.getElementById("loginEmail");
const loginPass = document.getElementById("loginPassword");

if (loginForm) {
    loginForm.addEventListener("submit", (e) => {
        let hayErroresLogin = false;

        // Function to toggle error styling
        const toggleLoginError = (input, mostrar) => {
            const group = input.parentElement;
            if (mostrar) {
                group.classList.add("error");
            } else {
                group.classList.remove("error");
            }
        };

        // 1. Validate empty email
        if (loginEmail.value.trim() === "") {
            toggleLoginError(loginEmail, true);
            hayErroresLogin = true;
        } else {
            toggleLoginError(loginEmail, false);
        }

        // 2. Validate empty password
        if (loginPass.value.trim() === "") {
            toggleLoginError(loginPass, true);
            hayErroresLogin = true;
        } else {
            toggleLoginError(loginPass, false);
        }

        // If missing data, prevent form submission
        if (hayErroresLogin) {
            e.preventDefault();
        }
    });

    // Extra: Remove error styling as user types
    if (loginEmail && loginPass) {
        [loginEmail, loginPass].forEach((input) => {
            input.addEventListener("input", () => {
                input.parentElement.classList.remove("error");
            });
        });
    }
}

/* --- PART 5: Mobile tabs (Sign In / Sign Up) --- */
const mobileSignIn = document.getElementById("mobileSignIn");
const mobileSignUp = document.getElementById("mobileSignUp");

if (mobileSignIn && mobileSignUp && container) {
    mobileSignIn.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
        mobileSignIn.classList.add("active");
        mobileSignUp.classList.remove("active");
    });

    mobileSignUp.addEventListener("click", () => {
        container.classList.add("right-panel-active");
        mobileSignUp.classList.add("active");
        mobileSignIn.classList.remove("active");
    });
}
