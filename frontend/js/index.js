document.addEventListener("DOMContentLoaded", function() {
    let mensaje = sessionStorage.getItem("loginMessage");
    let status = sessionStorage.getItem("loginStatus");

    if (mensaje) {
        let resultadoLogin = document.getElementById("resultado-login");
            function mostrarMensaje() {
                resultadoLogin.textContent = mensaje;
                resultadoLogin.style.backgroundColor = "green";
                resultadoLogin.style.display = "block";
                resultadoLogin.style.padding = "1rem 2rem";
                resultadoLogin.style.color = "#FFFFFF";
                resultadoLogin.style.top = "10px";
                resultadoLogin.style.left = "50%";
                resultadoLogin.style.translate = "-50%";
            }

        if (resultadoLogin) {
             mostrarMensaje();
            // Eliminar el mensaje después de unos segundos
            setTimeout(() => {
                resultadoLogin.style.transition = "opacity 1s ease-out"; // Transición suave
                resultadoLogin.style.opacity = "0"; // Desvanecer
            
                setTimeout(() => {
                    resultadoLogin.style.display = "none"; // Ocultarlo después del fade-out
                    sessionStorage.removeItem("loginMessage");
                    sessionStorage.removeItem("loginStatus");
                }, 1000); // Espera que termine la animación antes de ocultarlo completamente
            }, 3000); // Espera 3 segundos antes de iniciar el fade-out
            
        }
    }
});
