<?php
// Conectar a la base de datos. Revisar vuestra configuración
include_once('connexiobbddsanitat.php');

// Consultar los pacientes  en la base de datos


$resultado = $conexion->query("SELECT *
FROM tdades
INNER JOIN tingres
ON tdades.nHc = tingres.nHc;
");
if (!$resultado) {
  die("Error al consultar los pacientes en la base de datos: " . $conexion->error);
}

// Crear un array para almacenar los pacientes
$pacientes = array();
while ($fila = $resultado->fetch_assoc()) {
  // Convertir todos los valores a string
  $fila = array_map('strval', $fila);
  $pacientes[] = $fila;
}

// Convertir el array a formato JSON y devolverlo
echo json_encode($pacientes);
?>
