
<?php include_once("scripts.php"); ?>
<?php
include_once('connexiobbddsanitat.php');

?>

</head>
<body>
<?php include_once("header.php"); ?>
<?php

 $busqueda = strtolower($_REQUEST['busqueda']);

 if(empty($busqueda)){
  header("location: pacientes.php");
 }


?>
<!-- BARRA DE NAVEGACION -->

<div class="container_general">
            <div class="espacio_arriba"></div>
            <div class="container_arriba">
                <div class="container_buscar">
                <!--<h1>LISTADO DE USUARIOS</h1>-->
                    <a href="crear_usuario.php" class="btn_nuevo"><i class="fa-solid fa-user-plus"></i>&nbsp Añadir nuevo</a>
                </div>
            
                <form action="proba_buscador_paciente.php" class="form_container"  method="get" name="formu">
                    <div class="field" id="searchform">
                        <input class="inputs" id="busqueda" name="busqueda" type="text" placeholder="Coloca un nombre.." />
                        <button type="submit" value="buscar"><img class="iconSearch" src="https://img.icons8.com/material-outlined/256/search.png"></button>
                    </div>
                </form>
            </div>
            <br>




<?php

  /* PAGINADOR */

  $sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tdades 
  WHERE nom LIKE '%$busqueda%'");

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

  $sql = mysqli_query($conexion, "SELECT * FROM tdades 
  WHERE nom LIKE '%$busqueda%'
  ORDER BY nom ASC LIMIT $desde,$por_pagina 
  ");
  
  $resultado= mysqli_num_rows($sql);

  if($resultado > 0){

    ?>

    <?php
    echo '    
    <div class="container_paciente">';
    while ($row = mysqli_fetch_assoc($sql)) {

      $nom = $row['nom'];
      $nHc = $row['nHc'];
  

?>
    
        <ul>
            <li><?php echo"$nHc" ?></li>
            <li><?php echo"$nom" ?></li>
        </ul>

              <?php

                if(!empty($_SESSION['tipo'])){
                    $admin = ($_SESSION['tipo'] == 'admin') ? true : false;
                    if($admin === true){
                      
                    }
                  }
                
                ?>


          

      
      <?php
      }
      echo "</div></div>";
    }
    else 
{
  echo "<h3 style='text-align:-webkit-center'>No encontrado</h3>";
}
    ?>
    </div>


    
    <div class="pagination">
  <?php
  if ($pagina > 1) {
    echo "<li><a href='?pagina=".($pagina-1)."&busqueda=".$busqueda."'>Anterior</a></li>";
  }

  for ($i = 1; $i <= $total_paginas; $i++) {
    if ($i == $pagina) {
      echo "<li><a class='pagina-actual'>$i</a></li>";
    } else {
      echo "<li><a href='?pagina=".$i."&busqueda=".$busqueda."'>$i</a></li>";
    }
  }

  if ($pagina < $total_paginas) {
    echo "<li><a href='?pagina=".($pagina+1)."&busqueda=".$busqueda."'>Siguiente</a></li>";
  }
  ?>
</div>

<?php


  



mysqli_close($conexion); //cierra la BBDD

?>


<br>

