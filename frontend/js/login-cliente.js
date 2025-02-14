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
                console.log("Respuesta del servidor:", data);

                if (data.status === "success") {
                    sessionStorage.setItem("loginMessage", data.message); // Guardar mensaje
                    sessionStorage.setItem("loginStatus", "success");
                    window.location.href = "index.php";
                } else {
                    let mensaje = document.getElementById("resultado-login");
                    mensaje.textContent = data.message;
                    mensaje.style.backgroundColor = "red";
                    mensaje.style.display = "block";
                    mensaje.style.fontSize = "14px";
                }
            })
            .catch(error => console.error("Error en fetch:", error));
        });
    }
});
