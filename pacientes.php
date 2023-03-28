<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once("scripts.php"); ?>

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

    <div class="container_general">
        <div class="espacio_arriba"></div>
        <div class="container_paciente">
            <ul>
                <li>12345678Z</li>
                <li>Laura Ramirez MHC</li>
            </ul>
            <ul>
                <li>12345678Z</li>
                <li>Laura Ramirez MHC</li>
            </ul>
            <ul>
                <li>12345678Z</li>
                <li>Laura Ramirez MHC</li>
            </ul>

            <ul>
                <li>12345678Z</li>
                <li>Laura Ramirez MHC</li>
            </ul>
            <ul>
                <li>12345678Z</li>
                <li>Laura Ramirez MHC</li>
            </ul>
            <ul>
                <li>12345678Z</li>
                <li>Laura Ramirez MHC</li>
            </ul>
        </div>
        
        <div style="display: flex">
            <li><h1><?php echo $_SESSION['nombre'] ,' - ', $_SESSION['tipo']?></h1> </li>
            <li><a class="salir" href="salir.php"><i class="fa-solid fa-power-off"></i></a></li>
        </div>
        
    </div>
</body>
</html>