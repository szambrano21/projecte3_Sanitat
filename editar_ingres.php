<?php

include_once('connexiobbddsanitat.php');

if (!empty($_POST)) {
    $alert = "";
    if (
        empty($_POST["procedencia"]) || empty($_POST["assignacioLlit"]) || empty($_POST["assignacioSala"]) || empty($_POST["motiuIngres"]) || empty($_POST["dataIngres"])
        || empty($_POST["tractamentDomiciliari"]) || empty($_POST["allergies"]) || empty($_POST["habitsToxics"]) || empty($_POST["antecendentsPatologics"]) || empty($_POST["entornFamiliar"])
    ) {
        $alert = "<p class='msg_error'>Todos los campos son obligatorios</p>";
    } else {

        $procedencia = $_POST["procedencia"];
        $assignacioLlit = $_POST["assignacioLlit"];
        $assignacioSala = $_POST["assignacioSala"];
        $motiuIngres = $_POST["motiuIngres"];
        $dataIngres = $_POST["dataIngres"];
        $tractamentDomiciliari = $_POST["tractamentDomiciliari"];
        $allergies = $_POST["allergies"];
        $habitsToxics = $_POST["habitsToxics"];
        $antecendentsPatologics = $_POST["antecendentsPatologics"];
        $entornFamiliar = $_POST["entornFamiliar"];
        // $ID = $_POST["ID"];
        $nHc = $_POST["nHc"];
        $_SESSION['nHc'] = $nHc;
        // $query = mysqli_query($conexion,"SELECT * FROM tingres WHERE nHc = '$nHc'
        // ");

        // $resultado = mysqli_fetch_assoc($query);
        //             // if($resultado > 0){

        $query_update = mysqli_query($conexion, "UPDATE tingres
                 SET procedencia = '$procedencia', assignacioLlit = '$assignacioLlit', assignacioSala = '$assignacioSala', motiuIngres = '$motiuIngres', dataIngres = '$dataIngres', tractamentDomiciliari = '$tractamentDomiciliari', allergies = '$allergies', habitsToxics = '$habitsToxics', antecendentsPatologics = '$antecendentsPatologics', entornFamiliar = '$entornFamiliar' 
                 WHERE nHc = '$nHc'");

        // $query_insertar = mysqli_query($conexion, "INSERT INTO tingres (procedencia, assignacioLlit , assignacioSala, motiuIngres,
        // dataIngres, tractamentDomiciliari, allergies, habitsToxics, antecendentsPatologics, entornFamiliar,nHc )
        // VALUES('$procedencia','$assignacioLlit','$assignacioSala','$motiuIngres','$dataIngres', '$tractamentDomiciliari', '$allergies',
        // '$habitsToxics', '$antecendentsPatologics','$entornFamiliar', '$nHc')");


        if ($query_update) {
            $alert = "<p class='msg_correcto'>El paciente ha sido ingresado correctamente</p>";
        } else {
            $alert = "<p class='msg_error'>El paciente ya esta ingresado</p>";
        }
    }
}

/* aqui revisarrrrrrrrrrrrrrr */
$nHc = $_GET['nHc'];

// echo $nHc;

$sql = mysqli_query($conexion, "SELECT * FROM tingres WHERE nHc = '$nHc'");

$resultado_sql = mysqli_num_rows($sql);

if ($resultado_sql == 0) {
    header("location: inici.php");
} else {
    $option = '';
    while ($row = mysqli_fetch_assoc($sql)) {
        $procedencia = $row['procedencia'];
        $assignacioLlit = $row['assignacioLlit'];
        $assignacioSala = $row['assignacioSala'];
        $motiuIngres = $row['motiuIngres'];
        $dataIngres = $row['dataIngres'];
        $tractamentDomiciliari = $row['tractamentDomiciliari'];
        $allergies = $row['allergies'];
        $habitsToxics = $row['habitsToxics'];
        $antecendentsPatologics = $row['antecendentsPatologics'];
        $entornFamiliar = $row['entornFamiliar'];
        $nHc = $row['nHc'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once("scripts.php");

    ?>


</head>

<body>
    <?php
    include_once("header.php");
    // if (empty($_SESSION['nHc']))
    // {
    // echo "no hay";
    // } 

    // if($_SESSION['tipo'] != 'admin'){
    //     header("location: inicial.php");
    // }


    ?>
    <div class="container_general">
        <div class="second_container">

            <h1 class="titulos">EDITAR INGRESO</h1>


            <div class="navegacion">
                <a href="inicial.php">Home ></a>&nbsp<a href="ingresos.php">SALES ></a>&nbsp<a href="tablaPaciente.php?nHc=<?php echo $nHc; ?>">TAULA PACIENT ></a> &nbsp <p>EDITAR INGRESO</p>
            </div>




                <div class="form_dades_container">
                    <h1>Ingreso de paciente</h1>

                    <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
                    <form action="" id="validate" method="post">
                        <div>
                            <h2>Dades generals</h2>
                            <fieldset>
                                <label for="dataIngres">Data d'ingres:
                                    <input type="date" id="dataIngres" name="dataIngres" value="<?php echo $dataIngres; ?>">
                                </label>
                                <label for="procedencia">Procedencia:
                                    <input type="text" name="procedencia" id="procedencia" value="<?php echo $procedencia; ?>">
                                </label>
                                <fieldset>
                                    <label for="assignacioLlit">Asignació de Cama:
                                        <input type="text" name="assignacioLlit" id="assignacioLlit" value="<?php echo $assignacioLlit; ?>">
                                    </label>
                                    <label for="assignacioSala">Asignació de Sala:
                                        <select name="assignacioSala">
                                            <option value="">--</option>
                                            <option value="1" <?php if ($assignacioSala == '1') echo 'selected'; ?>>1</option>
                                            <option value="2" <?php if ($assignacioSala == '2') echo 'selected'; ?>>2</option>
                                            <option value="3" <?php if ($assignacioSala == '3') echo 'selected'; ?>>3</option>
                                            <option value="4" <?php if ($assignacioSala == '4') echo 'selected'; ?>>4</option>
                                            <option value="5" <?php if ($assignacioSala == '5') echo 'selected'; ?>>5</option>
                                        </select>
                                    </label>
                                </fieldset>
                                <fieldset>
                                    <label for="motiuIngres">Motiu de Ingreso:
                                        <input type="text" name="motiuIngres" id="motiuIngres" value="<?php echo $motiuIngres; ?>">
                                    </label>
                                    <label for="tractamentDomiciliari">Tratamiento Domiciliario:
                                        <input type="text" name="tractamentDomiciliari" id="tractamentDomiciliari" value="<?php echo $tractamentDomiciliari; ?>">
                                    </label>
                                </fieldset>
                                <fieldset>
                                    <label for="allergies">Alergias:
                                        <input type="text" name="allergies" id="allergies" value="<?php echo $allergies; ?>">
                                    </label>
                                    <label for="habitsToxics">Habits toxics:
                                        <input type="text" name="habitsToxics" id="habitsToxics" value="<?php echo $habitsToxics; ?>">
                                    </label>
                                </fieldset>
                                <fieldset>
                                    <label for="antecendentsPatologics">Antecedentes Patológicos:
                                        <input type="text" name="antecendentsPatologics" id="antecendentsPatologics" value="<?php echo $antecendentsPatologics; ?>">
                                    </label>
                                    <label for="entornFamiliar">Entorno Familiar:
                                        <input type="text" name="entornFamiliar" id="entornFamiliar" value="<?php echo $entornFamiliar; ?>">
                                    </label>
                                </fieldset>
                                <!-- <label for="ID">ID:</label>
                        <input type="text" name="ID" id="ID" ><br> -->
                                <fieldset>
                                    <label for="nHc">nHc:
                                        <?php
                                        // $query2 = mysqli_query($conexion, "SELECT tdades.nHc
                                        // FROM tdades
                                        // LEFT JOIN tingres ON tdades.nHc = tingres.nHc
                                        // WHERE tingres.nHc IS NULL;");

                                        // $resultado = mysqli_num_rows($query2);

                                        // if ($resultado > 0) {
                                        //     echo '<select name="nHc">';

                                        //     while ($row = mysqli_fetch_assoc($query2)){
                                        //         if ($row['nHc'] == $nHc) {
                                        //             echo '<option value="' . $row['nHc'] . '" selected>' . $row['nHc'] . '</option>';
                                        //         } else {
                                        //             echo '<option value="' . $row['nHc'] . '">' . $row['nHc'] . '</option>';
                                        //         }
                                        //     }

                                        //     echo '</select>';
                                        // } else {
                                        //     echo 'No se encontraron números de historial.';
                                        // }
                                        ?>
                                        <input type="text" name="nHc" id="nHc" value="<?php echo $nHc ?>">
                                    </label>
                                </fieldset>



                                <!-- <input type="hidden" id="ID" name="ID" value="1"> -->
                                <input type="submit" value="Submit" class="submitForm">
                        </div>
                    </form>
                </div>
        </div>
</body>

</html>