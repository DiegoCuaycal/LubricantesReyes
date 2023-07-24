<?php 
$con=mysqli_connect("localhost","root","","lubricante"); 
if(!$con) { die(" Connection Error "); }

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from producto where idproducto=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Borrado de la base de dato";
        header("Location: admin.php");
        exit();
    }
    else{
        die(mysqli_error($con));
    }
}
if(isset($_GET['deleteusuarioid'])){
    $cedula=$_GET['deleteusuarioid'];

    
    $sql="delete from persona where cedula=$cedula";
    $sql="delete from usuario where cedula=$cedula";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Borrado de la base de dato";
        header("Location: admin.php");
        exit();
    }
    else{
        die(mysqli_error($con));
    }
}
if(isset($_GET['deleteventaid'])){
    $id=$_GET['deleteventaid'];

    $sql="delete from ventas where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Borrado de la base de dato";
        header("Location: admin.php");
        exit();
    }
    else{
        die(mysqli_error($con));
    }
}
if(isset($_POST['crear_producto']))
{
    $nombreproducto = mysqli_real_escape_string($con, $_POST['nombreproducto']);
    $precio = mysqli_real_escape_string($con, $_POST['precio']);
    $stock = mysqli_real_escape_string($con, $_POST['stock']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);

    $query = "INSERT INTO producto (nombreproducto,precio,stock,descripcion) VALUES ('$nombreproducto','$precio','$stock','$descripcion')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        echo "Producto Created Successfully";
        header("Location: admin.php");
        exit();
    }
    else
    {
        echo "fallo en creacion";
    }
}

if(isset($_POST['actualizar_producto']))
{
    $id = mysqli_real_escape_string($con, $_POST['idproducto']);

    $nombreproducto = mysqli_real_escape_string($con, $_POST['nombreproducto']);
    $precio = mysqli_real_escape_string($con, $_POST['precio']);
    $stock = mysqli_real_escape_string($con, $_POST['stock']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);

    $query = "UPDATE producto SET nombreproducto='$nombreproducto', precio='$precio', stock='$stock', descripcion='$descripcion' WHERE idproducto='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo "Actualizacion completa";
        header("Location: admin.php");
        exit();
    }
    else
    {
        echo "Actualizacion incompleta";
    }
}

?>