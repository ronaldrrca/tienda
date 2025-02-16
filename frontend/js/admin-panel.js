cargarSeccion('gestion-usuarios.php'); // Cargar por defecto


function cargarSeccion(seccion) {
    fetch(seccion)
        .then(response => {
            if (!response.ok) {
                throw new Error("Error al cargar la sección");
            }
            return response.text();
        })
        .then(html => {
            document.getElementById('contenido-usuarios').innerHTML = html;
        })
        .catch(error => console.error("Error al cargar la sección: ", error));
}

function editarUsuario(id) {
    alert("Editar usuario con ID: " + id);
}

function eliminarUsuario(id) {
    if (confirm("¿Seguro que quieres eliminar este usuario?")) {
        alert("Usuario con ID " + id + " eliminado (aún no implementado)");
    }
}


function cargarSeccion(seccion) {
    fetch(seccion)
        .then(response => {
            if (!response.ok) {
                throw new Error("Error al cargar la sección");
            }
            return response.text();
        })
        .then(html => {
            document.getElementById('contenido-usuarios').innerHTML = html;
            console.log("Sección cargada correctamente.");

            // Llamar a la función para inicializar el formulario
            inicializarFormulario();
        })
        .catch(error => console.error("Error al cargar la sección: ", error));
}

function inicializarFormulario() {
    let form = document.getElementById("formAgregarUsuario");

    if (!form) {
        console.error("El formulario sigue sin encontrarse en el DOM.");
        return;
    }

    console.log("Formulario encontrado.");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        let password = document.getElementById("password").value;
        let confirmPassword = document.getElementById("confirm_password").value;
        let errorMessage = document.getElementById("error-message");

        console.log("Validando contraseñas...");
        if (password !== confirmPassword) {
            errorMessage.style.display = "inline";
            console.warn("Las contraseñas no coinciden.");
            return;
        } else {
            errorMessage.style.display = "none";
        }

        let formData = new FormData(form);
        console.log("Enviando datos al backend...");

        fetch("./backend/users/agregar-usuario.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log("Respuesta del servidor:", data);
            if (data.includes("Usuario registrado correctamente")) {
                alert("Usuario registrado correctamente.");
                form.reset();
                document.getElementById("contenedor-formulario-usuario").style.display = "none";
                cargarSeccion('gestion-usuarios.php');
            } else {
                alert("Error al registrar el usuario.");
            }
        })
        .catch(error => {
            console.error("Error en la solicitud:", error);
            alert("Error en la solicitud.");
        });
    });
}

// Mostrar u ocultar contraseña
document.addEventListener("DOMContentLoaded", function () {
    inicializarBotonesMostrarContrasena();
});

function inicializarBotonesMostrarContrasena() {
    const togglePassword = document.getElementById("togglePassword");
    const togglePasswordRepetir = document.getElementById("togglePasswordRepetir");

    if (togglePassword && togglePasswordRepetir) { // Verifica que existan antes de agregar eventos
        togglePassword.addEventListener("click", () => togglePasswordVisibility(document.getElementById("password"), togglePassword));
        togglePasswordRepetir.addEventListener("click", () => togglePasswordVisibility(document.getElementById("confirm_password"), togglePasswordRepetir));
    }
}

function togglePasswordVisibility(input, button) {
    if (input.type === "password") {
        input.type = "text";
        button.textContent = "🔒";
    } else {
        input.type = "password";
        button.textContent = "👁️";
    }
}

// Llamar la función después de cargar la sección dinámicamente
document.addEventListener("click", function () {
    setTimeout(() => inicializarBotonesMostrarContrasena(), 500); // Pequeña espera para asegurar que los elementos estén en el DOM
});

function mostrarFormularioUsuario() {
    const formulario = document.getElementById("formAgregarUsuario");
    document.getElementById("contenedor-formulario-usuario").style.display = "block";

    // Habilitar los campos cuando el formulario se muestra
    formulario.querySelectorAll("input, select").forEach(input => {
        input.removeAttribute("disabled");
        input.setAttribute("required", "true");
    });
}

function cancelarFormularioUsuario() {
    const formulario = document.getElementById("formAgregarUsuario");
    document.getElementById("contenedor-formulario-usuario").style.display = "none";

    // Deshabilitar los campos cuando se oculta el formulario
    formulario.querySelectorAll("input, select").forEach(input => {
        input.setAttribute("disabled", "true");
        input.removeAttribute("required");
    });

    // Opcional: Limpia los campos al ocultar el formulario
    formulario.reset();
}







