document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formulario-registro-cliente");
    const togglePassword = document.getElementById("togglePassword");
    const togglePasswordRepetir = document.getElementById("togglePasswordRepetir");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Evita el envío inmediato
        let errores = [];
        
        const nombre = document.getElementById("nombre").value.trim();
        const email = document.getElementById("email").value.trim();
        const telefono = document.getElementById("teléfono").value.trim();
        const direccion = document.getElementById("dirección").value.trim();
        const password = document.getElementById("password").value.trim();
        const passwordRepetir = document.getElementById("password_repetir").value.trim();

        // Validaciones
        if (nombre === "") errores.push("El nombre es obligatorio.");
        if (email === "" || !/^\S+@\S+\.\S+$/.test(email)) errores.push("Ingrese un email válido.");
        if (telefono !== "" && !/^\d{10}$/.test(telefono)) errores.push("Ingrese un número de teléfono válido (10 dígitos).");
        if (direccion === "") errores.push("La dirección es obligatoria.");
        if (password.length < 6) errores.push("La contraseña debe tener al menos 6 caracteres.");
        if (password !== passwordRepetir) errores.push("Las contraseñas no coinciden.");

        // Mostrar errores o enviar formulario
        const mensajeError = document.getElementById("mensaje-error");
        mensajeError.innerHTML = "";
        if (errores.length > 0) {
            mensajeError.innerHTML = errores.join("<br>");
            mensajeError.style.display = "block";
        } else {
            mensajeError.style.display = "none";
            form.submit(); // Si todo está bien, enviar el formulario
        }
    });

    // Mostrar u ocultar contraseña
    function togglePasswordVisibility(input, button) {
        if (input.type === "password") {
            input.type = "text";
            button.textContent = "🔒";
        } else {
            input.type = "password";
            button.textContent = "👁️";
        }
    }

    togglePassword.addEventListener("click", () => togglePasswordVisibility(document.getElementById("password"), togglePassword));
    togglePasswordRepetir.addEventListener("click", () => togglePasswordVisibility(document.getElementById("confirm_password"), togglePasswordRepetir));
});
