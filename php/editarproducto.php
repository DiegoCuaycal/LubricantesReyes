
<?php 
$con=mysqli_connect("localhost","root","","lubricante"); 
if(!$con) { die(" Connection Error "); } 


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Producto
                            <a href="admin.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM producto WHERE idproducto='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $producto = mysqli_fetch_array($query_run);
                                ?>
                                <form action="delete.php" method="POST">
                                    <input type="hidden" name="idproducto" value="<?= $producto['idproducto']; ?>">

                                    <div class="mb-3">
                                        <label>Nombre Producto</label>
                                        <input type="text" name="nombreproducto" value="<?=$producto['nombreproducto'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Precio</label>
                                        <input type="number" name="precio" value="<?=$producto['precio'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Stock</label>
                                        <input type="number" name="stock" value="<?=$producto['stock'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Descripcion</label>
                                        <input type="text" name="descripcion" value="<?=$producto['descripcion'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="actualizar_producto" class="btn btn-primary">
                                        Actualizar Producto
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>