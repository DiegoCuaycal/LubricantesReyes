<?php require_once('../Connections/LubricantesBD.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO producto (nombreproducto) VALUES (%s)",
                       GetSQLValueString($_POST['nombreproducto'], "text"));

  mysql_select_db($database_Base, $Base);
  $Result1 = mysql_query($insertSQL, $Base) or die(mysql_error());

  $insertGoTo = "lubricante.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO producto (nombreproducto) VALUES (%s)",
                       GetSQLValueString($_POST['nombreproducto'], "text"));

  mysql_select_db($database_LubricantesBD, $LubricantesBD);
  $Result1 = mysql_query($insertSQL, $LubricantesBD) or die(mysql_error());

  $insertGoTo = "lubricante.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_LubricantesBD, $LubricantesBD);
$query_BDConsulta = "SELECT * FROM producto";
$BDConsulta = mysql_query($query_BDConsulta, $LubricantesBD) or die(mysql_error());
$row_BDConsulta = mysql_fetch_assoc($BDConsulta);
$totalRows_BDConsulta = mysql_num_rows($BDConsulta);
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
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
            <img src="../imagenes/car.svg" id="img-carrito" alt="" />
            <div id="carrito">
              <table id="lista-carrito">
                <thead>
                  <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
              <a href="#" id="vaciar-carrito" class="btn-2">Vaciar Carrito</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="header-content container">
      <h1>Lubricante Reyes</h1>
      <p>
        En Lubricantes Reyes disponemos de la tienda online con el catálogo de
        aceites para motor y lubricantes más extenso que encontrará en
        internet, además de recambios, accesorios, aditivos e infinidad de
        productos para su automóvil, moto o vehículo agrícola, a precios muy
        económicos.
      </p>
      <div class="botons">
        <a href="#" class="btn-1">Mas informacion</a>
        <a href="#" class="btn-1">Menu</a>
      </div>
      <div class="socials-1">
        <img src="../imagenes/s1.svg" alt="" />
        <img src="../imagenes/s2.svg" alt="" />
        <img src="../imagenes/s3.svg" alt="" />
      </div>
      <a href="#lista">
        <img class="arrow" src="../imagenes/arrow.svg" alt="" />
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
        Aciete <br />
        de carro
      </h2>
    </div>
  </section>

  <section class="elementos container" id="lista">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="elemento">
            <h3>AcieteCastrol</h3>
            <p class="precio">$30</p>
            <img src="../imagenes/AceiteCastrol.png" alt="" />
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
              maiores ipsa quam nam aspernatur facilis! Eveniet at in aperiam
              corrupti culpa nesciunt, ratione voluptate dolorum blanditiis ut
              amet, architecto laboriosam.
            </p>
            <p><a href="#" class="agregar-carrito btn-2" data-id="1">Agregar al carrito</a>            </p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;  </p>
            <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
              <div align="center"></div>
               <table width="102%" align="center">
                <tr valign="baseline">
                  <td nowrap align="right">Producto:</td>
                  <td><select name="nombreproducto">
                      <?php
do {  
?>
                      <option value="<?php echo $row_BDConsulta['nombreproducto']?>"<?php if (!(strcmp($row_BDConsulta['nombreproducto'], $row_BDConsulta['nombreproducto']))) {echo "selected=\"selected\"";} ?>><?php echo $row_BDConsulta['nombreproducto']?></option>
                      <?php
} while ($row_BDConsulta = mysql_fetch_assoc($BDConsulta));
  $rows = mysql_num_rows($BDConsulta);
  if($rows > 0) {
      mysql_data_seek($BDConsulta, 0);
	  $row_BDConsulta = mysql_fetch_assoc($BDConsulta);
  }
?>
                  </select></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">&nbsp;</td>
                  <td><input name="submit" type="submit" value="Añadir al carrito"></td>
                </tr>
              </table>
               <p>
                 <input type="hidden" name="MM_insert" value="form1">
               </p>
               <p>&nbsp;   </p>
            </form>
            <p></p>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="elemento">
            <h3>AcieteCastrol</h3>
            <p class="precio">$30</p>
            <img src="../imagenes/AceiteCastrol80.jpg" alt="" />
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
              maiores ipsa quam nam aspernatur facilis! Eveniet at in aperiam
              corrupti culpa nesciunt, ratione voluptate dolorum blanditiis ut
              amet, architecto laboriosam.
            </p>
            <a href="#" class="agregar-carrito btn-2" data-id="2">Agregar al carrito</a>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="elemento">
            <h3>AcieteCastrol</h3>
            <p class="precio">$30</p>
            <img src="../imagenes/AceiteGulf140.jpg" alt="" />
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
              maiores ipsa quam nam aspernatur facilis! Eveniet at in aperiam
              corrupti culpa nesciunt, ratione voluptate dolorum blanditiis ut
              amet, architecto laboriosam.
            </p>
            <a href="#" class="agregar-carrito btn-2" data-id="3">Agregar al carrito</a>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="elemento">
            <h3>AcieteCastrol</h3>
            <p class="precio">$30</p>
            <img src="../imagenes/AceiteMobilMx.jpg" alt="" />
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
              maiores ipsa quam nam aspernatur facilis! Eveniet at in aperiam
              corrupti culpa nesciunt, ratione voluptate dolorum blanditiis ut
              amet, architecto laboriosam.
            </p>
            <a href="#" class="agregar-carrito btn-2" data-id="4">Agregar al carrito</a>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="elemento">
            <h3>AcieteCastrol</h3>
            <p class="precio">$30</p>
            <img src="../imagenes/LubricanteUbx.jpg" alt="" />
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
              maiores ipsa quam nam aspernatur facilis! Eveniet at in aperiam
              corrupti culpa nesciunt, ratione voluptate dolorum blanditiis ut
              amet, architecto laboriosam.
            </p>
            <a href="#" class="agregar-carrito btn-2" data-id="5">Agregar al carrito</a>
          </div>
        </div>
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <section class="lubricantes container">
    <div class="lubricantes-2">
      <h2>
        Aciete <br />
        de carro
      </h2>
    </div>
    <div class="lubricantes-1">
      <h3>Valvoline</h3>
      <hr />
      <p>Lubricantes</p>
    </div>
  </section>

  <section class="elementos container" id="lista-2">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="elemento">
            <h3 class="c1">AceiteCastrol</h3>
            <p class="precio">$30</p>
            <img src="../imagenes/AceiteGulf140.jpg" alt="" />
            <p class="c2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
              maiores ipsa quam nam aspernatur facilis! Eveniet at in aperiam
              corrupti culpa nesciunt, ratione voluptate dolorum blanditiis ut
              amet, architecto laboriosam.
            </p>
            <a href="#" class="agregar-carrito btn-3" data-id="6">Agregar al carrito</a>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="elemento">
            <h3 class="c1">AcieteCastrol</h3>
            <p class="precio">$30</p>
            <img src="../imagenes/AceiteMobilMx.jpg" alt="" />
            <p class="c2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
              maiores ipsa quam nam aspernatur facilis! Eveniet at in aperiam
              corrupti culpa nesciunt, ratione voluptate dolorum blanditiis ut
              amet, architecto laboriosam.
            </p>
            <a href="#" class="agregar-carrito btn-3" data-id="7">Agregar al carrito</a>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="elemento">
            <h3 class="c1">AcieteCastrol</h3>
            <p class="precio">$30</p>
            <img src="../imagenes/FiltroFraning.jpg" alt="" />
            <p class="c2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
              maiores ipsa quam nam aspernatur facilis! Eveniet at in aperiam
              corrupti culpa nesciunt, ratione voluptate dolorum blanditiis ut
              amet, architecto laboriosam.
            </p>
            <a href="#" class="agregar-carrito btn-3" data-id="8">Agregar al carrito</a>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="elemento">
            <h3 class="c1">AcieteCastrol</h3>
            <p class="precio">$30</p>
            <img src="../imagenes/LubricanteUbx.jpg" alt="" />
            <p class="c2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
              maiores ipsa quam nam aspernatur facilis! Eveniet at in aperiam
              corrupti culpa nesciunt, ratione voluptate dolorum blanditiis ut
              amet, architecto laboriosam.
            </p>
            <a href="#" class="agregar-carrito btn-3" data-id="9">Agregar al carrito</a>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="elemento">
            <h3 class="c1">AcieteCastrol</h3>
            <p class="precio">$30</p>
            <img src="../imagenes/LubricanteValvoline.jpg" alt="" />
            <p class="c2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
              maiores ipsa quam nam aspernatur facilis! Eveniet at in aperiam
              corrupti culpa nesciunt, ratione voluptate dolorum blanditiis ut
              amet, architecto laboriosam.
            </p>
            <p><a href="#" class="agregar-carrito btn-3" data-id="10">Agregar al carrito</a>            </p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          
          </div>
        </div>
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <section class="lubricantes container">
    <div class="lubricantes-1">
      <hr />
      <p>&nbsp;</p>
      
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>Contacto</p>
    </div>
  </section>

  <footer class="footer container">
    <div class="links">
      <div class="link">
        <h3>Redes</h3>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. At nostrum
          quasi veniam? Accusantium rem quod neque, minus quis dolorem
          perspiciatis sunt? Placeat a aliquam iusto quia perferendis
          reprehenderit excepturi tempora.
        </p>
        <div class="socials-2">
          <img src="../" alt="" />
          <img src="../" alt="" />
          <img src="../" alt="" />
          <img src="../" alt="" />
        </div>
      </div>

      <div class="link">
        <h3>Lorem</h3>
        <ul>
          <li><a href="#">Lorem</a></li>
          <li><a href="#">Lorem 1</a></li>
          <li><a href="#">Lorem 2</a></li>
          <li><a href="#">Lorem 3</a></li>
          <li><a href="#">Lorem 4</a></li>
        </ul>
      </div>

      <div class="link">
        <h3>Lorem</h3>
        <ul>
          <li><a href="#">Lorem</a></li>
          <li><a href="#">Lorem 1</a></li>
          <li><a href="#">Lorem 2</a></li>
          <li><a href="#">Lorem 3</a></li>
          <li><a href="#">Lorem 4</a></li>
        </ul>
      </div>

      <div class="link">
        <h3>Lorem</h3>
        <form>
          <input type="text" placeholder="Nombre" class="inp" />
          <input type="email" placeholder="Email" class="inp" />
          <textarea class="inp"></textarea>
          <input class="btn-4" type="submit" value="Enviar" />
        </form>
      </div>
    </div>
  </footer>

  <p>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="../js/lubricante.js"></script>
    <script src="../js/estadosesion.js"></script>
</p>
  <p>&nbsp;</p>
  
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;  </p>
</body>

</html>
<?php
mysql_free_result($BDConsulta);
?>
