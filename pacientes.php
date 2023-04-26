<?php include_once("scripts.php"); ?>
<?php
include_once('connexiobbddsanitat.php');
?>

</head>
<body>

    <?php include_once("header.php"); ?>

    <!-- container_general - no tocar -->

    <?php

    /* PAGINADOR */
    $sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tdades");

    $resultado_registro = mysqli_fetch_assoc($sql_registro);
    $total_registro = $resultado_registro['total_registro'];

    $por_pagina = 6;

    if(empty($_GET['pagina'])){
      $pagina = 1;
    }else{
      $pagina = $_GET['pagina'];
    }

    $desde = ($pagina -1) * $por_pagina;

    if ($total_registro <= $por_pagina) {
        // Si no hay suficientes registros para requerir paginación, muestra todos los registros
        $sql = mysqli_query($conexion, "SELECT * FROM tdades ORDER BY nom ASC");
    } else {
        $total_paginas = ceil($total_registro / $por_pagina);
        // Establece la cantidad de páginas en 5, aunque estén vacías
        $total_paginas = 5;
        
        $sql = mysqli_query($conexion, "SELECT * FROM tdades ORDER BY nom ASC LIMIT $desde,$por_pagina");
    }

    /*$sql = mysqli_query($conexion, "SELECT nom, nHc FROM tdades 
    ");*/

    $resultado= mysqli_num_rows($sql);

    if($resultado > 0){

        ?>
        <div class="container_general">
        <div class="espacio_arriba"></div>
            <div class="anadir_busca">
                <a href="">AÑADIR NUEVO</a>

                <form action="proba_buscador_paciente.php" class="form_container"  method="get" name="formu">
                    <div class="field" id="searchform">
                        <input class="inputs" id="busqueda" name="busqueda" type="text" placeholder="Coloca DNI o nombre" />
                        <button type="submit" value="buscar"><img class="iconSearch" src="https://img.icons8.com/material-outlined/256/search.png"></button>
                    </div>
                </form>
            </div>
        <br>

            <?php if ($total_registro > $por_pagina) { ?>
                <div class="pagination">
                    <?php
                    $salas = array("Sala 1", "Sala 2", "Sala 3", "Sala 4", "Sala 5");
                    
                    // Muestra un botón para cada sala
                    foreach ($salas as $sala) {
                        if ($sala == "sala" . $pagina) {
                            echo "<li><a class='pagina-actual'>$sala</a></li>";
                        } else {
                            echo "<li><a href='?pagina=".substr($sala, -1)."'";
                            if(substr($sala, -1) == $pagina) {
                                echo " class='pagina_actual'";
                            }
                            echo ">$sala</a></li>";
                        }
                    }
                    
                    ?>
                </div>

            <?php } ?>

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
        }
        echo "</div></div>";
    }
    else{
        echo "<h3 style='text-align:-webkit-center'>No encontrado</h3>";
    }


        mysqli_close($conexion); //cierra la BBDD
    ?>

</div>

</body>
</html>
