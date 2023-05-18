<?php
include_once('connexiobbddsanitat.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once("scripts.php"); ?>
    <title>Taula pacient</title>
    <?php
    include_once('connexiobbddsanitat.php');

    ?>

</head>

<body>
    <?php include_once("header.php");

    /* Pillar los valores */
    $nHc = $_GET['nHc'];

    $sql = mysqli_query($conexion, "SELECT *
    FROM tingres
    INNER JOIN tdades ON tingres.nHc = tdades.nHc
    WHERE tingres.nHc = '$nHc'
    ");

    $resultado_sql = mysqli_num_rows($sql);

    if ($resultado_sql == 0) {
        header("location: inicial.php");
    } else {
        $option = '';
        while ($row = mysqli_fetch_assoc($sql)) {
            $ID = $row['ID'];
            $nom = $row['nom'];
            $cognom = $row['cognom'];
        }
    }

    ?>
    <div class="container_general">
        <div class="second_container">

            <h1 class="titulos">TAULA PACIENT</h1>
            <div class="navegacion">
                <a href="inicial.php">Home ></a>&nbsp<a href="ingresos.php">SALES ></a>&nbsp<p>TAULA PACIENT</p>
            </div>
            <div id="info_paciente">
                <h4><?php echo $nom . ' ' . $cognom  ?></h4>
                <p><b>Num. HC: </b><?php echo $nHc ?></p>
            </div>
            <div class="container_paciente">

                <a class="btn" id="info_usuari" href="infoDades.php?nHc=<?php echo $nHc . "&ID=" . $ID; ?>"> <span>
                        <i class="fa-solid fa-user"></i>
                        <h2>Informació</h2>
                    </span>
                </a>

                <!-- <button onclick="window.location.href='infoDades.php?nHc=<?php echo $nHc . "&ID=" . $ID; ?>'">
                    <span>
                        <i class="fa-solid fa-user"></i>
                        <h2>Informació</h2>
                    </span>
                </button> -->


                <a class="btn" id="dades" href="info_paciente.php?nHc=<?php echo $nHc . "&ID=" . $ID; ?>"> <span>
                        <i class="fa-solid fa-file-medical"></i>
                        <h2>Dades</h2>
                    </span>
                </a>

                <a class="btn" id="constants" href="form_constants.php?nHc=<?php echo $nHc . "&ID=" . $ID; ?>"> <span>
                        <i class="fa-solid fa-heart-pulse"></i>
                        <h2>Constants</h2>
                    </span>
                </a>

                <a class="btn" id="respiratori" href="form_respiracio.php?nHc=<?php echo $nHc . "&ID=" . $ID; ?>"> <span>
                        <i class="fa-solid fa-lungs"></i>
                        <h2>Respiratòries</h2>
                    </span>
                </a>

                <a class="btn" id="menjars" href="infoMenjars.php?nHc=<?php echo $nHc . "&ID=" . $ID; ?>"> <span>
                        <i class="fa-solid fa-utensils"></i>
                        <h2>Menjars</h2>
                    </span>
                </a>

                <a class="btn prototipo" class="prototipo" href="pacientes.php?nHc=<?php echo $nHc; ?>"> <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </a>

                <a class="btn prototipo" class="prototipo" href="pacientes.php?nHc=<?php echo $nHc; ?>"> <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </a>

                <a class="btn prototipo" class="prototipo" href="pacientes.php?nHc=<?php echo $nHc; ?>"> <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </a>

                <a class="btn prototipo" class="prototipo" href="pacientes.php?nHc=<?php echo $nHc; ?>"> <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </a>

                <a class="btn prototipo" class="prototipo" href="pacientes.php?nHc=<?php echo $nHc; ?>"> <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </a>

                <a class="btn prototipo" class="prototipo" href="pacientes.php?nHc=<?php echo $nHc; ?>"> <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </a>

                <a class="btn prototipo" class="prototipo" href="pacientes.php?nHc=<?php echo $nHc; ?>"> <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </a>

                <a class="btn prototipo" class="prototipo" href="pacientes.php?nHc=<?php echo $nHc; ?>"> <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </a>

                <a class="btn prototipo" class="prototipo" href="pacientes.php?nHc=<?php echo $nHc; ?>"> <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </a>

                <a class="btn prototipo" class="prototipo" href="pacientes.php?nHc=<?php echo $nHc; ?>"> <span>
                        <i class="fa-solid fa-file"></i>
                        <h2>Prototipo</h2>
                    </span>
                </a>
            </div>
        </div>
        <div class="espacio_arriba"></div>
    </div>
</body>

</html>