/* =========================================
   1. LÓGICA DEL SLIDER (ANIMACIÓN PANEL)
   ========================================= */
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

/* =========================================
   2. VALIDACIÓN DEL FORMULARIO DE REGISTRO
   ========================================= */

const registerForm = document.getElementById('registerForm');
const nameInput = document.getElementById('regName');
const emailInput = document.getElementById('regEmail');
const passInput = document.getElementById('regPassword');
const confirmInput = document.getElementById('regConfirm');

const reqLen = document.getElementById('req-len');
const reqUpper = document.getElementById('req-upper');
const reqNum = document.getElementById('req-num');

if (registerForm) {
    // --- A) VALIDACIÓN EN TIEMPO REAL ---
    if (passInput) {
        passInput.addEventListener('input', () => {
            const val = passInput.value;
            val.length >= 8 ? reqLen.classList.add('valid') : reqLen.classList.remove('valid');
            /[A-Z]/.test(val) ? reqUpper.classList.add('valid') : reqUpper.classList.remove('valid');
            /[0-9]/.test(val) ? reqNum.classList.add('valid') : reqNum.classList.remove('valid');
        });
    }

    // --- B) VALIDACIÓN AL PULSAR "REGISTRARSE" ---
    registerForm.addEventListener('submit', (e) => {
        let hayErrores = false;

        const toggleError = (input, mostrar) => {
            const group = input.parentElement;
            if (mostrar) {
                group.classList.add('error');
            } else {
                group.classList.remove('error');
            }
        };

        // 1. Validar Nombre
        if (nameInput.value.trim() === "") {
            toggleError(nameInput, true);
            hayErrores = true;
        } else {
            toggleError(nameInput, false);
        }

        // 2. Validar Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value.trim())) {
            toggleError(emailInput, true);
            hayErrores = true;
        } else {
            toggleError(emailInput, false);
        }

        // 3. Validar Contraseña
        const val = passInput.value;
        const passOk = val.length >= 8 && /[A-Z]/.test(val) && /[0-9]/.test(val);
        if (!passOk) {
            toggleError(passInput, true);
            hayErrores = true;
        } else {
            toggleError(passInput, false);
        }

        // 4. Validar Confirmación
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

/* =========================================
   3. LÓGICA DEL MODAL DE ÉXITO (REGISTRO)
   ========================================= */
const modal = document.getElementById('successModal');
const closeBtn = document.getElementById('closeModalBtn');

if (modal && closeBtn) {
    closeBtn.addEventListener('click', () => {
        modal.style.opacity = '0';
        modal.style.transition = 'opacity 0.3s ease';
        const redirectUrl = closeBtn.getAttribute('data-redirect');

        setTimeout(() => {
            if (redirectUrl) {
                window.location.href = redirectUrl;
            } else {
                modal.style.display = 'none';
            }
        }, 300);
    });
}

/* =========================================
   4. VALIDACIÓN DEL LOGIN (NUEVO)
   ========================================= */
// Seleccionamos los elementos del Login por los IDs que pusimos en el HTML
const loginForm = document.getElementById('loginForm');
const loginEmail = document.getElementById('loginEmail');
const loginPass = document.getElementById('loginPassword');

if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
        let hayErroresLogin = false;

        // Función para activar el rojo (reutilizada conceptualmente)
        const toggleLoginError = (input, mostrar) => {
            const group = input.parentElement; 
            if (mostrar) {
                group.classList.add('error');
            } else {
                group.classList.remove('error');
            }
        };

        // 1. Validar Email Vacío
        if (loginEmail.value.trim() === "") {
            toggleLoginError(loginEmail, true);
            hayErroresLogin = true;
        } else {
            toggleLoginError(loginEmail, false);
        }

        // 2. Validar Password Vacío
        if (loginPass.value.trim() === "") {
            toggleLoginError(loginPass, true);
            hayErroresLogin = true;
        } else {
            toggleLoginError(loginPass, false);
        }

        // Si falta algún dato, NO enviamos el formulario
        if (hayErroresLogin) {
            e.preventDefault();
        }
    });

    // Extra: Quitar el rojo en cuanto el usuario escriba algo
    if (loginEmail && loginPass) {
        [loginEmail, loginPass].forEach(input => {
            input.addEventListener('input', () => {
                input.parentElement.classList.remove('error');
            });
        });
    }
}