const portadaImgs = document.querySelectorAll(".portada-img");
const intervalo = 5000; // Intervalo de tiempo en milisegundos (5 segundos)

let index = 0;

function cambiarImagen() {
  portadaImgs[index].classList.remove("current");
  index = (index + 1) % portadaImgs.length;
  portadaImgs[index].classList.add("current");
}

// Función para iniciar el intervalo de cambio de imágenes
function startInterval() {
  setInterval(cambiarImagen, intervalo);
}

// Iniciar el intervalo al cargar la página
window.addEventListener("load", startInterval);
