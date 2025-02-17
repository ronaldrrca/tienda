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
            console.log("Sección cargada correctamente.");

            // Llamar a la función para inicializar el formulario
            inicializarFormulario();
        })
        .catch(error => console.error("Error al cargar la sección: ", error));
}










