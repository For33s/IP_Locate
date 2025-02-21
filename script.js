// Función para mostrar la hora
function mostrarHora() {
  var fecha = new Date();
  var hora = fecha.getHours();
  var minutos = fecha.getMinutes();
  var segundos = fecha.getSeconds();
  document.getElementById('hora-actual').innerHTML = hora + ':' + minutos + ':' + segundos;
}
setInterval(mostrarHora, 1000);