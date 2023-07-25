<?php

if (isset($_GET['idproducto']) && isset($_GET['precio'])&& isset($_POST['cantidad_' . $_GET['idproducto']])&& isset($_GET['cedula'])) {

    $conexion = mysqli_connect("localhost", "root", "", "lubricante");

    if (mysqli_connect_errno()) {
        echo "Error al conectar a la base de datos: " . mysqli_connect_error();
    }

    $cedula=$_GET['cedula'];
    $idproducto = $_GET['idproducto'];
    $precio = $_GET['precio']*$_POST['cantidad_' . $idproducto];
    $cantidad = $_POST['cantidad_' . $idproducto];

    
    $consulta ="INSERT INTO `ventas`( `idcliente`, `idproducto`, `cantidad`, `preciototal`) VALUES ('$cedula','$idproducto','$cantidad','$precio')";
    $consulta1 = "INSERT INTO ventas (idproducto, precio) VALUES ('$idproducto', '$precio')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "Venta registrada correctamente.";
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['cedula'] = $cedula; 
        header('Location: ../html/lubricante.php');
    } else {
        echo "Error al registrar la venta: " . mysqli_error($conexion);
    }
    mysqli_close($conexion);
} else {
    echo "No se recibieron los datos necesarios para registrar la venta.";
}
?>