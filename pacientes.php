<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once("scripts.php"); ?>
<?php
include_once('connexiobbddsanitat.php');

?>
<style>
    body{
        display: flex;
    }

    @media screen and (max-width: 700px) {
        body{
        display: initial;
    }

}

</style>
</head>
<body>

    <?php include_once("header.php"); ?>

    <!-- container_general - no tocar -->

    <?php

    /* PAGINADOR */
    /*

    $sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tdades
    WHERE nom");

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
    */

    $sql = mysqli_query($conexion, "SELECT nom, nHc FROM tdades 
    ");

    $resultado= mysqli_num_rows($sql);
    echo $resultado;
    if($resultado > 0){

        ?>
        <div class="container_general">
        <div class="espacio_arriba"></div>
            <form action="buscar_farmacos.php" class="form_container"  method="get" name="formu">

                <div class="field" id="searchform">
                <input class="inputs" id="busqueda" name="busqueda" type="text" placeholder="Coloca un fármaco" value="<?php echo $busqueda; ?>"/>
                <button type="submit" value="buscar"><img class="iconSearch" src="https://img.icons8.com/material-outlined/256/search.png"></button>
                </div>
            </form>
            <br>
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

    ?>

    <div class="pagination"></div>
    <?php
    /*if ($pagina > 1) {
        echo "<li><a href='?pagina=".($pagina-1)."&busqueda=".$busqueda."'>Anterior</a></li>";
    }

    for ($i = 1; $i <= $total_paginas; $i++) {
        if ($i == $pagina) {
        echo "<li><a class='pagina-actual'>$i</a></li>";
        } else {
        echo "<li><a href='?pagina=$i.&busqueda=".$busqueda."'>$i</a></li>";
        }
    }

    if ($pagina < $total_paginas) {
        echo "<li><a href='?pagina=".($pagina+1)."&busqueda=".$busqueda."'>Siguiente</a></li>";
    }*/
    ?>

</div>

</body>
</html>