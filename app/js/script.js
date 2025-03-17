function abrirModal(id) {
    document.getElementById("iframeEditar").src = "editar.php?id=" + id;
    document.getElementById("modalEditar").style.display = "flex";
}

function cerrarModal() {
    document.getElementById("modalEditar").style.display = "none";
}

// Abrir modal para crear usuario
function abrirModalNuevo() {
    document.getElementById("iframeNuevo").src = "crear_usuario.php";
    document.getElementById("modalNuevo").style.display = "flex";
}

// Cerrar modal de crear usuario
function cerrarModalNuevo() {
    document.getElementById("modalNuevo").style.display = "none";
}