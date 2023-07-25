
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />-->
  <link rel="stylesheet" href="../css/lubricante.css" />
</head>

<body>
  <header class="header">
    <div class="menu container">
      <a href="#" class="logo"></a>
      <input type="checkbox" id="menu" />
      <label for="menu"><img src="../imagenes/LubricanteReyesPortada.jpg" class="menu-icono" alt="logo" /></label>
      <nav class="navbar">
        <ul>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Lubricantes</a></li>
          <li><a href="#">Ofertas</a></li>
          <li><a href="#">Contactos</a></li>
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
      Ofrecemos lubricantes,filtros de aceite,aire y combustible,
      en las mejores marcas del mercado y a excelentes precios
      </p>
      <div class="botons">
        <a href="#" class="btn-1">Mas informacion</a>
        <a href="#" class="btn-1">Menu</a>
      </div>
      <div class="socials-1">
        <img src=" " alt="" />
        <img src="" alt="" />
        <img src="" alt="" />
      </div>
      <a href="#lista">
        <img class="arrow" src="../imagenes/AceiteGulf.jpg" alt="" />
      </a>
    </div>
  </header>

  <section class="lubricantes container">
    <div class="lubricantes-1">
      <h3>Valvoline</h3>
      <hr />
      <p>Lubricantes</p>
    </div>
    <div class="lubricantes-2">
      <h2>
        Aceite <br />
        de carro
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
      if (file_exists($rutaImagenes . $nombreProducto. '.jpg')) {
        echo "<img src='" . $rutaImagenes . $nombreProducto . ".jpg' alt='' />";
      }else {
  
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



    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>

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
        <p><a href="https://www.facebook.com/lubricantesreyescayambe/">
        https://www.facebook.com/<br>lubricantesreyescayambe/</a>
        </p>
        <div class="socials-2">
          <img src="../" alt="" />
          <img src="../" alt="" />
          <img src="../" alt="" />
          <img src="../" alt="" />
        </div>
      </div>

      <div class="link">
        <h3>Direccion</h3>
        Avenida Córdova Galarza y Natalia Jarrin , Cayambe, Ecuador
      </div>

      <div class="link">
        <h3>Numero Telefonico</h3>
        099 744 7053
      </div>

      <div class="link">
        <h3>Tiene sugerencias? Contactenos</h3>
        <form>
          <input type="text" placeholder="Nombre" class="inp" />
          <input type="email" placeholder="Email" class="inp" />
          <textarea class="inp"></textarea>
          <input class="btn-4" type="submit" value="Enviar" />
        </form>
      </div>
    </div>
  </footer>

  <!--<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>-->
  <script src="../js/lubricante.js"></script>
  <script src="../js/estadosesion.js"></script>
</body>

</html>