<?php
$host = "localhost";
$database = "bbdd_sanitat";
$user = "proyecto3";
$password = "proyecto3";
$conexion = mysqli_connect($host, $user, $password,$database);
define('NUM_ITEMS_BY_PAGE', 6);
if (!$conexion) die("No ha podido realizarse la conexión".mysqli_connect_error());
else 
?>


<!-- <?php
// $host = "projectedawilg3.cat";
// $database = "zb5b2zsl_bbdd_sanitat";
// $user = "zb5b2zsl_proyecto3";
// $password = "proyecto3sanitat";
// $conexion = mysqli_connect($host, $user, $password,$database);
// define('NUM_ITEMS_BY_PAGE', 6);
// if (!$conexion) die("No ha podido realizarse la conexión".mysqli_connect_error());
// else 
?> -->