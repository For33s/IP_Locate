<?php
include 'menu.php';

if (isset ($_POST['btnbusqueda'])) {
  $busqueda = $_POST['ipbusqueda'];
  // Cambia por un Key Válido
  $access_key = '85b5ed67-386c-4feb-b32e-3fe037dc6772';

  // Initialize CURL
  $ch = curl_init('https://apiip.net/api/check?ip=' . $busqueda . '&accessKey=' . $access_key . '');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  // Store the data
  $json_res = curl_exec($ch);
  curl_close($ch);

  // Initialize Variables
  $pais = '-';
  $region = '-';
  $ciudad = '-';
  // Decode JSON response
  $api_result = json_decode($json_res, true);

  if (isset ($api_result['regionName']) && isset( $api_result['countryName']) && isset($api_result['city'])) {
    $pais = $api_result['countryName'];
    $region = $api_result['regionName'];
    $ciudad = $api_result['city'];
  } else {
    $pais = '-';
    $region = '-';
    $ciudad = '-';
  }
}

?>

<div class='contenidoip'>
  <form id="myForm" action="findip.php" method="post">
    <label for="inbus">Localizar IP:</label>
    <input type="text" id="inbus" class="input-beautiful" name='ipbusqueda' placeholder='123.321.000.007'>
    <button class='btn' type='submit' name="btnbusqueda">Buscar</button>
  </form>
</div>
<div class='contenidomapa'>
  <div id="mapabusqueda"></div>
  <div id='contenido-busqueda'>
    <p>
      <?php
      if (isset ($pais) && isset ($region) && isset ($ciudad) && $pais != '' && $region != '' && $ciudad != '') {
        echo ' Pais: ' . $pais . ' - ' . ' Región: ' . $region . ' - ' . ' Ciudad: ' . $ciudad;
      } else {
        echo '---';
      }

      ?>
    </p>
  </div>
</div>

<?php 
include 'footer.php';
?>

<script>

  function initMap() {
    // Obtén la latitud y longitud desde PHP
    var latitude = <?php if(isset($api_result['latitude'])){ echo $api_result['latitude'];}else {} ?>;
    var longitude = <?php if(isset($api_result['longitude'])){echo $api_result['longitude'];}else {} ?>;

    // Crea un objeto de mapa con las opciones de visualización
    var map = L.map('mapabusqueda').setView([latitude, longitude], 13);

    // Agrega una capa de mapa base de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);

    // Crea un marcador en la ubicación especificada
    L.marker([latitude, longitude]).addTo(map);
  }

  // Llama a la función initMap cuando la página se haya cargado
  document.addEventListener('DOMContentLoaded', initMap);

  history.replaceState(null, null, location.pathname);
</script>