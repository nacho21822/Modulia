/* =========================================
   1. LÓGICA DEL SLIDER (ANIMACIÓN PANEL)
   ========================================= */
const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

// Verificamos que existan los elementos del slider antes de añadir eventos
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

// Selección de elementos
const registerForm = document.getElementById('registerForm');
const nameInput = document.getElementById('regName');
const emailInput = document.getElementById('regEmail');
const passInput = document.getElementById('regPassword');
const confirmInput = document.getElementById('regConfirm');

// Elementos de la lista de requisitos (para ponerlos en verde)
const reqLen = document.getElementById('req-len');
const reqUpper = document.getElementById('req-upper');
const reqNum = document.getElementById('req-num');

// Solo ejecutamos la validación si el formulario existe
if (registerForm) {

    // --- A) VALIDACIÓN EN TIEMPO REAL (Lista de requisitos) ---
    if (passInput) {
        passInput.addEventListener('input', () => {
            const val = passInput.value;
            
            // Si cumple la regla, añadimos la clase 'valid' (definida en tu CSS)
            val.length >= 8 ? reqLen.classList.add('valid') : reqLen.classList.remove('valid');
            /[A-Z]/.test(val) ? reqUpper.classList.add('valid') : reqUpper.classList.remove('valid');
            /[0-9]/.test(val) ? reqNum.classList.add('valid') : reqNum.classList.remove('valid');
        });
    }

    // --- B) VALIDACIÓN AL PULSAR "REGISTRARSE" ---
    registerForm.addEventListener('submit', (e) => {
        let hayErrores = false;

        // Función auxiliar para activar la clase .error del CSS
        const toggleError = (input, mostrar) => {
            const group = input.parentElement; // Busca el div .input-group padre
            if (mostrar) {
                group.classList.add('error'); // Esto activa el borde rojo y el texto
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

        // 3. Validar Contraseña (Seguridad)
        const val = passInput.value;
        const passOk = val.length >= 8 && /[A-Z]/.test(val) && /[0-9]/.test(val);
        
        if (!passOk) {
            toggleError(passInput, true);
            hayErrores = true;
        } else {
            toggleError(passInput, false);
        }

        // 4. Validar Confirmación (Coincidencia)
        if (confirmInput.value !== val || confirmInput.value === "") {
            toggleError(confirmInput, true);
            hayErrores = true;
        } else {
            toggleError(confirmInput, false);
        }

        // Si hay errores, cancelamos el envío al servidor
        if (hayErrores) {
            e.preventDefault();
        }
    });
}

/* =========================================
   3. LÓGICA DEL MODAL DE ÉXITO Y REDIRECCIÓN
   ========================================= */
const modal = document.getElementById('successModal');
const closeBtn = document.getElementById('closeModalBtn');

if (modal && closeBtn) {
    closeBtn.addEventListener('click', () => {
        // 1. Efecto visual de cierre (opcional, queda bonito)
        modal.style.opacity = '0';
        modal.style.transition = 'opacity 0.3s ease';

        // 2. Leer la ruta a la que debemos ir (del HTML)
        const redirectUrl = closeBtn.getAttribute('data-redirect');

        // 3. Redirigir al usuario tras una pequeña pausa
        setTimeout(() => {
            if (redirectUrl) {
                window.location.href = redirectUrl;
            } else {
                modal.style.display = 'none';
            }
        }, 300);
    });
}