/**Funcniones para abrir y cerrar el menú móvil**/
function abrirMenu() {
    document.getElementById("menu").style.display = "flex";
}

function cerrarMenu() {
    document.getElementById("menu").style.display = "none";
}

const year = new Date().getFullYear(); 
document.getElementById("footer-year").innerHTML = year;
    

