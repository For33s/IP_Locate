<?php
function getUserIpAddress()
{
  if (!empty ($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = (string) $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty ($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = (string) $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = (string) $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}


$ipAddress = getUserIpAddress();

$access_key = '85b5ed67-386c-4feb-b32e-3fe037dc6772';

// Inicializar CURL
$ch = curl_init('https://apiip.net/api/check?ip=' . $ipAddress . '&accessKey=' . $access_key . '');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Data almacenada
$json_res = curl_exec($ch);
curl_close($ch);

// Decodifica JSON
$api_result = json_decode($json_res, true);

?>

<?php
include 'menu.php';
?>

<main>
  <div class="div1">
    <h1 class='title'>Mi información:</h1>
    <form action="">
      <label for="inip">- My IP:</label>
      <input type="text" class="input-beautiful" readonly value="193.434.43.34" id='inip'><br />
      <label for="incountry">- My country:</label>
      <input type="text" class="input-beautiful" readonly value="Perú" id='incountry'><br />
      <label for="inregion">- My region:</label>
      <input type="text" class="input-beautiful" readonly value="Arequipa" id='inregion'><br />
      <label for="incity">- My city:</label>
      <input type="text" class="input-beautiful" readonly value='Arequipa' id='incity'><br />
      <label for="inlatitude">- My latitude: </label>
      <input type="text" class="input-beautiful" readonly value='16487887' id='inlatitude'><br />
      <label for="inlongitude">- My longitude:</label>
      <input type="text" class="input-beautiful" readonly value="-722654654" id='inlongitude'><br />
    </form>
  </div>


  <div class="div2">
    <h1 class="hora">La hora actual: <span id="hora-actual"></span></h1>
    <div id="map" width="200"></div>
    <div id='parrafo1'><span>La ubicación se tomá en referencia de su información</span></div>
  </div>
</main>

<div class="div3">
  <h1 class='title2'>Buscar IP por Nombre de dominio</h1>
  <form action="index.php" method="POST" id="formulario-dominio">
    <label for="indominio" id='labeldominio'>Nombre de dominio:</label>
    <input type="text" name="ip" class="input-beautiful" id="indominio" placeholder="ejemplo.edu.pe">
    <button type='submit' name='btnenviar' class='btn'>Buscar</button>
  </form>
  <p>
    <?php
    $domain = '';
    $ip = '';

    if (isset ($_POST["btnenviar"])) {
      if (!empty ($_POST['ip'])) {
        $domain = $_POST['ip']; 
    
        $ip = gethostbyname($domain);

        echo '
          <p id="parraforespuesta">La dirección IP asociada al nombre de dominio: ' . $domain . ' es ' . $ip . '</p>';
      } else {
        echo 'Debes ingresar un nombre de dominio';
      }

    }
    ?>
  </p>
</div>

<?php 
include 'footer.php';
?>




<script src="script.js"></script>
<script>
  function initMap() {
    var latitude = -16.4012539;
    var longitude = -71.5278956;

    var map = L.map('map').setView([latitude, longitude], 13);

    // Agrega una capa de mapa base de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);

    L.marker([latitude, longitude]).addTo(map);
  }

  // Llama a la función initMap cuando la página se haya cargado
  document.addEventListener('DOMContentLoaded', initMap);
  history.replaceState(null, null, location.pathname);

</script>
</body>

</html>