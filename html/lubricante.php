<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <link rel="stylesheet" href="../css/lubricante.css" />
</head>

<body>
  <header class="header">
    <div class="menu container">
      <a href="#" class="logo"></a>
      <input type="checkbox" id="menu" />
      <label for="menu"><img src="../imagenes/menu.png" class="menu-icono" alt="logo" /></label>
      <nav class="navbar">
        <ul>
          <li id="titulo">Lubricantes Reyes</li>
          <li id="contenido"></li>
        </ul>
      </nav>
      <div>
        <ul>
          <li class="submenu">
          </li>
        </ul>
      </div>
    </div>
    <div class="header-content container">
      <h1>Lubricante Reyes</h1>
      <p>
        Ofrecemos lubricantes, filtros de aceite, aire y combustible,
        en las mejores marcas del mercado y a excelentes precios
      </p>
    </div>
  </header>


  <section class="lubricantes container">
    <div class="lubricantes-1">

      <hr />

    </div>
    <div class="lubricantes-2">
      <h2>
        Productos
      </h2>
    </div>
  </section>

  <section class="elementos container" id="lista">
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "lubricante");
    if (mysqli_connect_errno()) {
      echo "Error al conectar a la base de datos: " . mysqli_connect_error();
    }
    $consulta = "SELECT idproducto, nombreproducto, precio, descripcion FROM producto";
    $resultado = mysqli_query($conexion, $consulta);
    session_start();

    while ($fila = mysqli_fetch_assoc($resultado)) {
      echo "<div class='swiper-slide'>";
      echo "<div class='elemento'>";
      echo "<h3>" . $fila['nombreproducto'] . "</h3>";
      echo "<p class='precio'>" . $fila['precio'] . "</p>";

      $nombreProducto = $fila['nombreproducto'];

      $rutaImagenes = '../imagenes/';
      if (file_exists($rutaImagenes . $nombreProducto . '.jpg')) {
        echo "<img src='" . $rutaImagenes . $nombreProducto . ".jpg' alt='' />";
      } else {

        echo "<img src='" . $rutaImagenes . "AceiteTotal.jpg' alt='Imagen no disponible' />";
      }
      echo "<p>" . $fila['descripcion'] . "</p>";
      if (isset($_SESSION["cedula"])) {
        echo "<form action=\"registrar_venta.php?idproducto=" . $fila['idproducto'] . "&precio=" . $fila['precio'] . "&cedula=" . $_SESSION["cedula"] . "\" method=\"post\">";
        echo "<input type=\"number\" name=\"cantidad_" . $fila['idproducto'] . "\" min=\"1\" max=\"100\"value=1>";
        echo "<input type=\"submit\" value=\"Registrar Venta\">";
        echo "</form>";
      }
      echo "</div>";
      echo "</div>";

    }

    ?>

  </section>

  <section class="lubricantes container">
    <div class="lubricantes-1">
      <hr />
      <p>Contacto</p>
    </div>
  </section>

  <footer class="footer container">
    <div class="links">
      <div class="link">
        <h3>Redes</h3>
        <p>
          <a href="https://www.facebook.com/lubricantesreyescayambe/" target="_blank">
            <img src="../imagenes/facebook.png" alt="Logo de Facebook" width="20" height="20"
              style="vertical-align: middle;" />
            lubricantesreyescayambe
          </a>
          <a href="https://api.whatsapp.com/send?phone=593997447053" target="_blank">
            <img src="../imagenes/whatsapp.png" alt="Logo de WhatsApp" width="20" height="20"
              style="vertical-align: middle;" />
          </a>
          +593 99 744 7053 <!-- Aquí coloca el número de WhatsApp -->
        </p>
      </div>

      <div class="link">
        <h3>Direccion</h3>
        Avenida Córdova Galarza y Natalia Jarrin, Cayambe, Ecuador
      </div>

      <div class="link">
        <h3>Numero Telefonico</h3>
        <a target="_blank">
          <img src="../imagenes/telefono.png" alt="Logo de Telefono" width="20" height="20"
            style="vertical-align: middle;" />
        </a>
        099 744 7053
      </div>
    </div>

    <div class="additional-info">
      <h3>Contacto</h3>
      <p>Correo electrónico: lubricantesreyescayambe@gmail.com</p>
      <p>Dirección de la oficina principal: Calle Principal, Cayambe, Ecuador</p>
    </div>
  </footer>

  <script src="../js/lubricante.js"></script>
  <script src="../js/estadosesion.js"></script>
</body>

</html>