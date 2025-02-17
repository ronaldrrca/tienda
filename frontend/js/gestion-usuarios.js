function eliminarUsuario(id, nombre_usuario) {
    // Pedimos confirmación al usuario antes de proceder
    const confirmar = confirm(`¿Estás seguro de que quieres eliminar el usuario: ${nombre_usuario}?`);

    if (confirmar) {
        // Si el usuario confirma, realizamos la solicitud fetch
        fetch('./backend/users/eliminar-usuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'  // Especificamos que vamos a enviar JSON
            },
            body: JSON.stringify({ id: id })  // Convertimos el objeto a JSON
        })
        .then(response => response.json())  // Parseamos la respuesta como JSON
        .then(data => {
            console.log(data);  // Mostramos la respuesta en consola (ej. éxito o error)
    
            // Aquí agregamos el alert dependiendo del resultado
            if (data.success) {
                cargarSeccion('gestion-usuarios.php');
                alert(`Usuario ${nombre_usuario} eliminado correctamente`);
            } else {
                alert("Error al eliminar el usuario");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Hubo un error al procesar la solicitud");  // Si ocurre un error en la solicitud
        });
    } else {
        // Si el usuario cancela, mostramos un alert diciendo que la acción fue cancelada
        alert("La acción de eliminación ha sido cancelada.");
    }
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
    
        let usuarioInput = document.getElementById("usuario");
        let password = document.getElementById("password").value;
        let confirmPassword = document.getElementById("confirm_password").value;
        let errorMessage = document.getElementById("error-message");
    
        let minLength = 6;
        let maxLength = 8;
        let usuario = usuarioInput.value.trim(); // Elimina espacios extra
    
        console.log("Validando usuario...");
    
        // 🔹 Validar longitud del usuario
        if (usuario.length < minLength || usuario.length > maxLength) {
            errorMessage.style.display = "inline";
            errorMessage.innerHTML = `El usuario debe tener entre ${minLength} y ${maxLength} caracteres.`;
            usuarioInput.focus();
            return;
        }
    
        console.log("Validando contraseñas...");
    
        // 🔹 Validar coincidencia de contraseñas
        if (password !== confirmPassword) {
            errorMessage.style.display = "inline";
            errorMessage.innerHTML = "Las contraseñas no coinciden.";
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
