<?php

include_once('connexiobbddsanitat.php');
 //recogemos id
$ID = $_GET['ID'];
if (!empty($_POST)) {
    $alert = "";
    if (
        empty($_POST["temperatura"]) || empty($_POST["presioArterial"]) || empty($_POST["pols"]) || empty($_POST["glucemia"]) || empty($_POST["saturacioO2"])
        || empty($_POST["EVN"]) || empty($_POST["reavaluacioDolor"]) || empty($_POST["hemoglobina"]) || empty($_POST["disfagiaLiquida"]) || empty($_POST["disfagiaSolids"]) || empty($_POST["ID_ingreso"])
    ) {

        $alert = "<p class='msg_error'>Todos los campos son obligatorios</p>";
    } else {

        $temperatura = $_POST["temperatura"];
        $presioArterial = $_POST["presioArterial"];
        $pols = $_POST["pols"];
        $glucemia = $_POST["glucemia"];
        $saturacioO2 = $_POST["saturacioO2"];
        $EVN = $_POST["EVN"];
        $reavaluacioDolor = $_POST["reavaluacioDolor"];
        $hemoglobina = $_POST["hemoglobina"];
        $disfagiaLiquida = $_POST["disfagiaLiquida"];
        $disfagiaSolids = $_POST["disfagiaSolids"];
        $ID_ingreso = $_POST["ID_ingreso"];
        // $ID_const  = $_POST["ID_const"];

       


        
        // $query = mysqli_query($conexion, "SELECT * FROM tconstants WHERE ID_ingreso = '$ID_ingreso'");
        // $resultado = mysqli_fetch_assoc($query);

        // if ($resultado > 0) {
        //     $alert = "<p class='msg_error'>El usuario ya existe</p>";
        // } else {
            $query_insertar = mysqli_query($conexion, "INSERT INTO tconstants (temperatura, presioArterial, pols, glucemia, saturacioO2, EVN,reavaluacioDolor,hemoglobina,disfagiaLiquida,disfagiaSolids,ID_ingreso)
            VALUES('$temperatura','$presioArterial','$pols','$glucemia','$saturacioO2','$EVN','$reavaluacioDolor','$hemoglobina','$disfagiaLiquida','$disfagiaSolids','$ID_ingreso')");

            if ($query_insertar) {
                $alert = "<p class='msg_correcto'>El usuario ha sido creado correctamente</p>";
            } else {
                $alert = "<p class='msg_error'>Error al crear el usuario</p>";
            }
        // }

        // $query_insertar = mysqli_query($conexion, "INSERT INTO tconstants (temperatura, presioArterial, pols, glucemia, saturacioO2, EVN,reavaluacioDolor,hemoglobina,disfagiaLiquida,disfagiaSolids,ID_ingreso)
        // VALUES('$temperatura','$presioArterial','$pols',' $glucemia ',' $saturacioO2 ','$EVN','$reavaluacioDolor','$hemoglobina','$disfagiaLiquida','$disfagiaSolids','$idIngreso')");

        // if($query_insertar){
        //     $alert="<p class='msg_correcto'>El codigo de ingreso ha sido creado correctamente</p>";
        // }else{
        //     $alert="<p class='msg_error'>Error al crear el usuario</p>";
        // }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<?php
include_once("header.php");
?>

<head>
    <?php include_once("scripts.php"); ?>
</head>

<body>
<div class="container_general">

<div class="second_container">

<h1 class="titulos">FORMULARI CONSTANTS</h1>


    <div class="form_dades_container">
        <h1>CONSTANTS</h1>
        <hr>
        <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
        <form action="" id="validate" method="post" class="commom_form">
            <fieldset>
                <label for="temperatura"><i class="fa-solid fa-weight-scale"></i> Temperatura (ºC): <input id="temperatura" name="temperatura" type="number" /></label>
                <label for="pols"><i class="fa-solid fa-stethoscope"></i> Pulsacions (ppm): <input id="pols" name="pols" type="number" /></label>
            </fieldset>
            <fieldset>
                <label for="presioArterial"><i class="fa-sharp fa-solid fa-heart-pulse"></i> Pressió arterial (mm Hg):<input id="presioArterial" name="presioArterial" type="text" /></label>
                <label for="glucemia"><i class="fa-solid fa-eye-dropper"></i> Glucemia (mg/dL): <input id="glucemia" name="glucemia" type="number" /></label>
            </fieldset>
            <fieldset>
                <label for="saturacioO2"><i class="fa-sharp fa-solid fa-gauge-high"></i> Saturació 02 (%):<input id="saturacioO2" name="saturacioO2" type="number" /></label>
            </fieldset>
            <fieldset class="radio_input_section">
                <div class="input_conjunto">
                    EVN: <br>
                    <label for="EVN"><input id="evn-1" type="radio" name="EVN" class="inline" value="1" /> Si</label>
                    <label for="EVN"><input id="evn-0" type="radio" name="EVN" class="inline" value="0" /> No</label>
                </div>
                <div class="input_conjunto">
                    Reavaluacio dolor: <br>
                    <label for="reavaluacioDolor"><input id="reavaluacio-dolor-total" type="radio" name="reavaluacioDolor" class="inline" value="total" /> Total</label>
                    <label for="reavaluacioDolor"><input id="reavaluacio-dolor-parcial" type="radio" name="reavaluacioDolor" class="inline" value="parcial" /> Parcial</label>
                    <label for="reavaluacioDolor"><input id="reavaluacio-dolor-independent" type="radio" name="reavaluacioDolor" class="inline" value="independent" /> Independent</label>
                </div>
                <div class="input_conjunto">
                    Hemoglobina: <br>
                    <label for="hemoglobina"><input id="hemoglobina-1" type="radio" name="hemoglobina" class="inline" value="1" /> Si</label>
                    <label for="hemoglobina"><input id="hemoglobina-0" type="radio" name="hemoglobina" class="inline" value="0" /> No</label>
                </div>
            </fieldset>
            <fieldset>
                <label for="disfagiaLiquida"> Disfagia líquida: <textarea name="disfagiaLiquida" id="disfagiaLiquida"></textarea></label>
                <label for="disfagiaSolids"> Disfagia sòlida: <textarea name="disfagiaSolids" id="disfagiaSolids"></textarea></label>
            </fieldset>

            <div class="hora_dia">
                <input type="radio" name="hora" id="dia">
                <label for="dia">dia</label>
                <input type="radio" name="hora" id="tarda">
                <label for="tarda">tarda</label>
                <input type="radio" name="hora" id="nit">
                <label for="nit">nit</label>
            </div>

            <input type="hidden" id="ID_ingreso" name="ID_ingreso" value="<?php echo $ID; ?>"/>
            <input type="submit" value="Submit" class="submitForm">
        </form>
    </div>
</div>
</div>
</body>

</html>