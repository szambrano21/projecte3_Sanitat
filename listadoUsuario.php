<?php
include_once('connexiobbddsanitat.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once("scripts.php"); ?>
<?php
include_once('connexiobbddsanitat.php');

?>

</head>
<body>
<?php   
    include_once("header.php");

    if($_SESSION['tipo'] != 'admin'){
      header("location: inicial.php");
    }
     ?>

    <!-- container_general - no tocar -->
    <div class="container_general">
    <div class="espacio_arriba"></div>

    <!-- BARRA DE NAVEGACION -->



    <!-- ESPACIO -->


    
<?php

/* PAGINADOR */

$sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tusuaris");

$resultado_registro = mysqli_fetch_assoc($sql_registro);
$total_registro = $resultado_registro['total_registro'];

$por_pagina = 5;

if(empty($_GET['pagina'])){
  $pagina = 1;
}else{
  $pagina = $_GET['pagina'];
}

$desde = ($pagina -1) * $por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);

$sql = mysqli_query($conexion, "SELECT * FROM tusuaris ORDER BY nomUsuari ASC LIMIT $desde,$por_pagina
");

$resultado = mysqli_num_rows($sql);

if($resultado > 0){

  echo "

  <table>
    <tr>
        <th>NOMBRE</th>
        <th>APELLIDOS</th>
        <th>SALA ASIGNADA</th>
        <th>DNI</th>
        <th>ACCIONES</th>
    </tr>
  ";
  
  while ($row = mysqli_fetch_assoc($sql)) {

    $nomUsuari = $row["nomUsuari"];
    $cognomUsuari = $row["cognomUsuari"];
    $dni = $row["DNI"];
    $telefono = $row["telefono"];


    
    echo"

    <tr>
        <td>$nomUsuari</td>
        <td>$cognomUsuari</td>
        <td>$dni</td>
        <td>$telefono</td>
        <td>
          <a class='link_editar' href='editar_usuario.php?DNI=$dni'>EDITAR</a>";

          if($dni != $_SESSION['DNI']){
            echo"
            <a class='link_eliminar' href='eliminar_usuario.php?DNI=$dni'>ELIMINAR</a>  
          ";
        }
        echo "
        </td>
        </tr>
        ";


    }
  }
  else 
{
echo "<h3 style='text-align:-webkit-center'>No encontrado</h3>";
}
?>
</table>
</div>

  
<div class="paginationUser">
<?php
if ($pagina > 1) {
  echo "<li><a href='?pagina=".($pagina-1)."'>Anterior</a></li>";
}

for ($i = 1; $i <= $total_paginas; $i++) {
  if ($i == $pagina) {
    echo "<li><a class='pagina-actual'>$i</a></li>";
  } else {
    echo "<li><a href='?pagina=$i'>$i</a></li>";
  }
}

if ($pagina < $total_paginas) {
  echo "<li><a href='?pagina=".($pagina+1)."'>Siguiente</a></li>";
}
?>
</div>

<?php

mysqli_close($conexion); //cierra la BBDD

?>



    </div>

</body>
</html>