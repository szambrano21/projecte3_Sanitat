
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

            <div class="container_general">
            <div class="second_container">

                <div class="espacio_arriba"></div>
                <div class="anadir_busca">
                    <a href="ingres.php">AÑADIR NUEVO</a>

                    <form action="proba_buscador_paciente.php" class="form_container" method="get" name="formu">
                        <div class="field" id="searchform">
                            <input class="inputs" id="busqueda" name="busqueda" type="text" placeholder="Coloca DNI o nombre" />
                            <button type="submit" value="buscar"><img class="iconSearch" src="https://img.icons8.com/material-outlined/256/search.png"></button>
                        </div>
                    </form>
                </div>
                <br>
                <div class="pagination">
                    <button class='pagina_actual' value="1">Sala 1</button>
                    <button class='pagina' value="2">Sala 2</button>
                    <button class='pagina' value="3">Sala 3</button>
                    <button class='pagina' value="4">Sala 4</button>
                    <button class='pagina' value="5">Sala 5</button>
                </div>

<?php
            /* PAGINADOR */
    $sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tdades");

    $resultado_registro = mysqli_fetch_assoc($sql_registro);
    $total_registro = $resultado_registro['total_registro'];

    $por_pagina = 15;

    if (empty($_GET['pagina'])) {
        $pagina = 1;
    } else {
        $pagina = $_GET['pagina'];
    }

    $desde = ($pagina - 1) * $por_pagina;

    if ($total_registro <= $por_pagina) {
        // Si no hay suficientes registros para requerir paginación, muestra todos los registros
        // $sql = mysqli_query($conexion, "SELECT * FROM tdades ORDER BY nom ASC");
        $sql = mysqli_query($conexion,"SELECT *
        FROM tingres
        INNER JOIN tdades ON tingres.nHc = tdades.nHc
        WHERE tingres.nHc =  tdades.nHc AND tdades.DNI 
        LIKE '%$busqueda%' OR tdades.nom LIKE '%$busqueda%' 
        ORDER BY tdades.DNI, tdades.nom
        ASC LIMIT $desde,$por_pagina"
        );
        
    } else {
        $total_paginas = ceil($total_registro / $por_pagina);
        // Establece la cantidad de páginas en 5, aunque estén vacías
        $total_paginas = 5;
        // FROM tingres
        // INNER JOIN tdades ON tingres.nHc = tdades.nHc
        // WHERE tingres.nHc = '$nHc'

        $sql = mysqli_query($conexion,"SELECT *
        FROM tingres
        INNER JOIN tdades ON tingres.nHc = tdades.nHc
        WHERE tingres.nHc = tdades.nHc AND tdades.DNI 
        LIKE '%$busqueda%' OR tdades.nom LIKE '%$busqueda%' 
        ORDER BY tdades.DNI, tdades.nom
        ASC LIMIT $desde,$por_pagina"
        );

        // $sql = mysqli_query($conexion, "SELECT tdades.* , tingres.*
        // FROM tdades
        // JOIN tingres
        // ON tdades.nHc = tingres.nHc 
        // WHERE tdades.DNI LIKE '%A' OR tdades.nom LIKE '%A'
        // ORDER BY tdades.DNI, tdades.nom ASC
        // LIMIT $desde, $por_pagina
        // ");

        

        // $sql = mysqli_query($conexion, "SELECT * FROM tdades ORDER BY nom ASC LIMIT $desde,$por_pagina");
    }

    /*$sql = mysqli_query($conexion, "SELECT nom, nHc FROM tdades 
    ");*/

    $resultado = mysqli_num_rows($sql);

    if ($resultado > 0) {

    ?>
        <div class="container_paciente" id="container_paciente">
        <?php

    while ($row = mysqli_fetch_assoc($sql)) {
      $nom = $row['nom'];
      $nHc = $row['nHc'];
      $DNI = $row['DNI'];
      $cognom = $row['cognom'];
      $assignacioLlit  = $row['assignacioLlit'];
    }
    ?>
               
                <a href="tablaPaciente.php?nHc=<?php echo $nHc?>"><p> <?php echo $nom .$cognom ?></p>
                <p> <?php echo $nHc ?></p>
                <p><?php echo $assignacioLlit?></p>

                </a>
                </div>
            
            <?php
            echo "</div></div></div>";
        } else {
            echo "<h3 style='text-align:-webkit-center'>No encontrado</h3>";
        }


        mysqli_close($conexion); //cierra la BBDD
            ?>

            </div>

</body>

</html>

<!--   $sql = mysqli_query($conexion, "SELECT * FROM tdades
  WHERE DNI 
  LIKE '%$busqueda%' OR nom LIKE '%$busqueda%' 
  ORDER BY DNI, nom
  ASC LIMIT $desde,$por_pagina
  "); -->