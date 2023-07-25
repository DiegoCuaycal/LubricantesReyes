<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_LubricantesBD = "Localhost";
$database_LubricantesBD = "carritobd";
$username_LubricantesBD = "root";
$password_LubricantesBD = "12345678";
$LubricantesBD = mysql_pconnect($hostname_LubricantesBD, $username_LubricantesBD, $password_LubricantesBD) or trigger_error(mysql_error(),E_USER_ERROR); 
?>