document.addEventListener("DOMContentLoaded", function () {
    let mensaje = sessionStorage.getItem("loginMessage");
    let resultadoLogin = document.getElementById("resultado-login");

    if (mensaje && resultadoLogin) {
        // Eliminar inmediatamente del sessionStorage
        sessionStorage.removeItem("loginMessage");
        sessionStorage.removeItem("loginStatus");

        // Mostrar mensaje
        resultadoLogin.textContent = mensaje;
        resultadoLogin.style.backgroundColor = "green";
        resultadoLogin.style.display = "block";
        resultadoLogin.style.padding = "1rem 2rem";
        resultadoLogin.style.color = "#FFFFFF";
        resultadoLogin.style.position = "absolute"; // Se agrega por claridad
        resultadoLogin.style.top = "10px";
        resultadoLogin.style.left = "50%";
        resultadoLogin.style.transform = "translateX(-50%)"; // Corrección: `translateX` en vez de `translate`

        // Desvanecer mensaje después de 3 segundos
        setTimeout(() => {
            resultadoLogin.style.transition = "opacity 1s ease-out";
            resultadoLogin.style.opacity = "0";

            // Esperar la transición y ocultarlo completamente
            setTimeout(() => {
                resultadoLogin.style.display = "none";
            }, 1000);
        }, 3000);
    }
});
