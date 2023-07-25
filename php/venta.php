<?php require_once('../Connections/LubricantesBD.php'); ?>
<?php
$maxRows_bdventa = 10;
$pageNum_bdventa = 0;
if (isset($_GET['pageNum_bdventa'])) {
  $pageNum_bdventa = $_GET['pageNum_bdventa'];
}
$startRow_bdventa = $pageNum_bdventa * $maxRows_bdventa;

mysql_select_db($database_LubricantesBD, $LubricantesBD);
$query_bdventa = "SELECT * FROM ventas";
$query_limit_bdventa = sprintf("%s LIMIT %d, %d", $query_bdventa, $startRow_bdventa, $maxRows_bdventa);
$bdventa = mysql_query($query_limit_bdventa, $LubricantesBD) or die(mysql_error());
$row_bdventa = mysql_fetch_assoc($bdventa);

if (isset($_GET['totalRows_bdventa'])) {
  $totalRows_bdventa = $_GET['totalRows_bdventa'];
} else {
  $all_bdventa = mysql_query($query_bdventa);
  $totalRows_bdventa = mysql_num_rows($all_bdventa);
}
$totalPages_bdventa = ceil($totalRows_bdventa/$maxRows_bdventa)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<table border="1">
  <tr>
    <td>id</td>
    <td>idcliente</td>
    <td>idproducto</td>
    <td>cantidad</td>
    <td>preciototal</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_bdventa['id']; ?></td>
      <td><?php echo $row_bdventa['idcliente']; ?></td>
      <td><?php echo $row_bdventa['idproducto']; ?></td>
      <td><?php echo $row_bdventa['cantidad']; ?></td>
      <td><?php echo $row_bdventa['preciototal']; ?></td>
    </tr>
    <?php } while ($row_bdventa = mysql_fetch_assoc($bdventa)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($bdventa);
?>
