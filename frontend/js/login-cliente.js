/*Gestiona el envío del formulario y maneja los mensajes según la respuesta del backend */
document.addEventListener("DOMContentLoaded", function() {
    let loginForm = document.getElementById("formulario-login-cliente");

    

    if (loginForm) {
        loginForm.addEventListener("submit", function(event) {
            event.preventDefault();
            console.log("Formulario enviado desde login-cliente.php");

            let formData = new FormData(this);

            fetch("./backend/authentications/login-back.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                let mensaje = document.getElementById("resultado-login");

                function mostrarMensaje() {
                    document.getElementById("password").value = "";
                    document.getElementById("email").value = "";
                    mensaje.style.bottom = "-10px";
                    mensaje.textContent = data.message; 
                    mensaje.style.backgroundColor = "transparent";
                    mensaje.style.display = "block";
                    mensaje.style.width = "100%";
                    mensaje.style.fontSize = "14px";
                    mensaje.style.color = "red";
                }
                
                if (data.status === "success") {
                    sessionStorage.setItem("loginMessage", data.message); // Guardar mensaje
                    sessionStorage.setItem("loginStatus", "success");
                    window.location.href = "index.php";
                                       
                } else {
                    mostrarMensaje();    
                }
            })
            .catch(error => console.error("Error en fetch:", error));
        });
    }
});


/*Gestiona los botones de ocultar el campo de contraseña/ */
document.getElementById("togglePassword").addEventListener("click", function() {
    let passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        this.textContent = "🔒"; // Cambia el ícono
    } else {
        passwordInput.type = "password";
        this.textContent = "👁️";
    }
});
