<?php
include "menu.php";
?>

<div id="contenedor-whatsip">
  <div class="acordeon">
    <input type="checkbox" id="acordeon1">
    <label class="etiqueta" for="acordeon1">1. ¿Qué es una dirección IP?</label>
    <div class="contenido">
      <p>Una dirección IP (Protocolo de Internet) es una etiqueta numérica que identifica de manera lógica y jerárquica
        a un dispositivo conectado a una red, ya sea en Internet o en una red local. Esta dirección se utiliza para
        identificar y comunicarse con otros dispositivos en la red.

        Existen dos tipos principales de direcciones IP: públicas y privadas. Una dirección IP pública es asignada por
        el proveedor de servicios de Internet y se utiliza para identificar un dispositivo en Internet. Esta dirección
        es única y permite que otros dispositivos se comuniquen con él en la red global. Por otro lado, una dirección IP
        privada se utiliza en redes locales, como en una casa o una empresa, y no es accesible desde Internet. Estas
        direcciones se utilizan para la comunicación interna dentro de la red local.</p>
    </div>
  </div>

  <div class="acordeon">
    <input type="checkbox" id="acordeon2">
    <label class="etiqueta" for="acordeon2">2. ¿Cuál es la diferencia entre una dirección IP privada y una dirección IP
      pública?</label>
    <div class="contenido">
      <p>Una dirección IP privada se utiliza en redes locales, como en una casa o una empresa, y no es accesible desde
        Internet. Por otro lado, una dirección IP pública es asignada por el proveedor de servicios de Internet y se
        utiliza para identificar un dispositivo en Internet.</p>
    </div>
  </div>

  <div class="acordeon">
    <input type="checkbox" id="acordeon3">
    <label class="etiqueta" for="acordeon3">3. ¿Cómo puedo saber cuál es mi dirección IP privada?</label>
    <div class="contenido">
      <p>En Windows, puedes abrir el símbolo del sistema (CMD) y escribir el comando "ipconfig". Esto mostrará la
        información de la configuración de red, incluyendo la dirección IP privada asignada a tu dispositivo.

        En sistema Linux y unix puedes usar el comando ifconfig para poder ver la información de red que necesitas.
      </p>
    </div>
  </div>

  <div class="acordeon">
    <input type="checkbox" id="acordeon4">
    <label class="etiqueta" for="acordeon4">4. ¿Cómo puedo ver mi dirección IP pública?</label>
    <div class="contenido">
      <p>Puedes utilizar nuestro servicio de Green River el cúal te mostrará tu
        dirección IP pública actual.</p>
    </div>
  </div>

  <div class="acordeon">
    <input type="checkbox" id="acordeon5">
    <label class="etiqueta" for="acordeon5">5. ¿Es posible localizar geográficamente una dirección IP?</label>
    <div class="contenido">
      <p>Sí, es posible obtener información general sobre la ubicación geográfica de una dirección IP pública. Sin
        embargo, ten en cuenta que esta información puede no ser precisa y solo proporciona una estimación aproximada de
        la ubicación. Además, la localización de una dirección IP privada no es posible ya que solo es relevante dentro
        de una red local.</p>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>