<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once("scripts.php"); ?>
</head>

<body>
    <?php include_once("header.php");

    include_once("connexiobbddsanitat.php");

    /* CREAMOS UN ARRAY CON EL NOMBRE DE LAS TABLAS, PARA DESPUES CON UN FOREACH IR PASANDO DE TABLA A TABLA MIENTRAS CONTAMOS LA FILA DE CADA UNO DE ESTOS */

    $tablas = array('tusuaris', 'tdades', 'tingres');
    $conteos = array();

    foreach ($tablas as $tabla) {
        $sql_conteos = mysqli_query($conexion, "SELECT COUNT(*) as total FROM $tabla");
        $resultado = mysqli_fetch_assoc($sql_conteos);
        $conteos[$tabla] = $resultado['total'];
    }


    ?>


    <div class="container_general">

        <div class="second_container">
            <h1>BIENVENIDO</h1>
            <div class="navegacion">
                <a href="inicial.php">Home ></a>&nbsp<p>DASHBOARD</p>
            </div>
            <div class="containerPanelControl">
                <div>
                    <h1>PANEL DE CONTROL</h1>
                </div>
                <div class="panel">

                    <a href="listado_usuarios.php">
                        <i class="fa-solid fa-users"></i>
                        <p>
                            <b>USUARIOS</b><br>
                            <span><?php echo $conteos['tusuaris']; ?></span>
                        </p>
                    </a>
                    <a href="#.php">
                        <i class="fa-solid fa-dna"></i>
                        <p>
                            <b>PACIENTES (DATOS)</b><br>
                            <span><?php echo $conteos['tdades']; ?></span>
                        </p>
                    </a>
                    <a href="#.php">
                        <i class="fa-solid fa-dna"></i>
                        <p>
                            <b>INGRESADOS</b><br>
                            <span><?php echo $conteos['tingres']; ?></span>
                        </p>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <?php
    // if ($_SESSION['tipo'] == 'admin') {
    //     echo "
    //              <iframe class='bloque_estadisticas' src='https://lookerstudio.google.com/embed/reporting/7920d595-b9ec-4c59-8669-a7c7a25577a8/page/mauHD' frameborder='0' style='border:0' allowfullscreen></iframe>
    //              ";
    // }

    ?>


</body>

</html>