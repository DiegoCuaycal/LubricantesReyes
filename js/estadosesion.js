function verificarSesion() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var respuesta = xhr.responseText;
            var contenidoDiv = document.getElementById("contenido");

            if (respuesta === "1") {

                var nombreUsuario = "<?php session_start(); echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>";
                contenidoDiv.innerHTML += "<button id='cerrarsesion'onclick='cerrarSesion()'>Cerrar Sesión</button>";
            } else if (respuesta === "0") {

                contenidoDiv.innerHTML += "<a href='../html/login.html'>Iniciar Sesión</a>";
            }
        }
    };
    xhr.open("GET", "../php/estadosesion.php", true);
    xhr.send();
}
function cerrarSesion() {
    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.href="../html/login.html";
        }
    };
   xhr.open("GET", "../php/cerrarsesion.php", true);
    xhr.send();
}

var botonCerrarSesion = document.getElementById("cerrarsesion");
if (botonCerrarSesion) {
    botonCerrarSesion.addEventListener("click", cerrarSesion());
    botonCerrarSesion.style.backgroundColor = "red";
    botonCerrarSesion.style.color = "white";
    botonCerrarSesion.style.border = "none";
    botonCerrarSesion.style.padding = "10px 20px";
    botonCerrarSesion.style.borderRadius = "5px";
    botonCerrarSesion.style.cursor = "pointer";
}
verificarSesion();