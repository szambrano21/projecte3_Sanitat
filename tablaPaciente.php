<?php
include_once('connexiobbddsanitat.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once("scripts.php"); ?>
    <title>Tabla paciente</title>
    <?php
    include_once('connexiobbddsanitat.php');

    ?>

</head>

<body>
    <?php include_once("header.php") ?>
    <div class="container_general">
        <div class="second_container">

            <br><br>
            <div id="info_paciente">
                <h4>Rosa Moreno Blanco</h4>
                <p><b>Num. HC: </b>I936498704213</p>
            </div>
            <div class="container_paciente">
                <button class="btn" id="info_usuari" onclick="window.location.href='infoDades.php'">
                    <span>
                        <i class="fa-solid fa-user"></i>
                        <h2>Informació</h2>
                    </span>
                </button>
                <button class="btn" id="dades" onclick="window.location.href='pacientes.php'">
                    <span>
                        <i class="fa-solid fa-file-medical"></i>
                        <h2>dades</h2>
                    </span>
                </button>
                <button class="btn" id="constants">
                    <span>
                        <i class="fa-solid fa-heart-pulse"></i>
                        <h2>Constants</h2>
                    </span>
                </button>
                <button class="btn" id="respiratori">
                    <span>
                        <i class="fa-solid fa-lungs"></i>
                        <h2>Respiratòries</h2>
                    </span>
                </button>
                <button class="btn" id="menjars">
                    <span>
                        <i class="fa-solid fa-utensils"></i>
                        <h2>Menjars</h2>
                    </span>
                </button>
                <button class="btn" id="prototipo">
                    <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </button>
                <button class="btn" id="prototipo">
                    <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>prototipo</h2>
                    </span>
                </button>
                <button class="btn" id="prototipo">
                    <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>prototipo</h2>
                    </span>
                </button>
                <button class="btn" id="prototipo">
                    <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </button>
                <button class="btn" id="prototipo">
                    <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </button>
                <button class="btn" id="prototipo">
                    <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </button>
                <button class="btn" id="prototipo">
                    <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </button>
            </div>
        </div>
        <div class="espacio_arriba"></div>
    </div>
</body>

</html>