
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

document.getElementById("togglePasswordRepetir").addEventListener("click", function() {
    let passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        this.textContent = "🔒"; // Cambia el ícono
    } else {
        passwordInput.type = "password";
        this.textContent = "👁️";
    }
});
