function abrirModalNuevo() {
    let iframe = document.getElementById("iframeNuevo");
    iframe.src = "crear.php"; // Cargar solo cuando el usuario abre el modal
    document.getElementById("modalNuevo").style.display = "block";
}

function cerrarModalNuevo() {
    document.getElementById("modalNuevo").style.display = "none";
    document.getElementById("iframeNuevo").src = ""; // Limpiar para evitar recargas innecesarias
}

// Cerrar el modal si se hace clic fuera de él
window.onclick = function(event) {
    let modal = document.getElementById("modalNuevo");
    if (event.target === modal) {
        cerrarModalNuevo();
    }
};

function abrirModalEditar(id) {
    let iframe = document.getElementById("iframeEditar");
    iframe.src = "editar.php?id=" + id; // Cargar solo cuando el usuario haga clic en "Editar"
    document.getElementById("modalEditar").style.display = "block";
}

function cerrarModalEditar() {
    document.getElementById("modalEditar").style.display = "none";
    document.getElementById("iframeEditar").src = ""; // Limpiar el iframe al cerrar
}

// Cerrar modal si se hace clic fuera de él
window.onclick = function(event) {
    let modal = document.getElementById("modalEditar");
    if (event.target === modal) {
        cerrarModalEditar();
    }
};
