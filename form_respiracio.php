<?php


include_once('connexiobbddsanitat.php');
 //recogemos id
$ID = $_GET['ID'];
if (!empty($_POST)) {
    $alert = "";
    if (
        empty($_POST["respMin"]) || empty($_POST["tos"]) || empty($_POST["expectoracio"]) || empty($_POST["colorPell"]) || empty($_POST["observacions"])
        ||  empty($_POST["oxigenTerapia"]) ||  empty($_POST["ID_ingreso"]) 
    ) {

        $alert = "<p class='msg_error'>Todos los campos son obligatorios</p>";
        print_r($_POST);
    } else {

        $respMin = $_POST["respMin"];
        $tos = $_POST["tos"];
        $expectoracio = $_POST["expectoracio"];
        $colorPell = $_POST["colorPell"];
        $observacions = $_POST["observacions"];
        $oxigenTerapia = $_POST["oxigenTerapia"];

        $ID_ingreso = $_POST["ID_ingreso"];
        // $ID_const  = $_POST["ID_const"];

        // print_r($_POST);
        


        
        // $query = mysqli_query($conexion, "SELECT * FROM tconstants WHERE ID_ingreso = '$ID_ingreso'");
        // $resultado = mysqli_fetch_assoc($query);

        // if ($resultado > 0) {
        //     $alert = "<p class='msg_error'>El usuario ya existe</p>";
        // } else {
            $query_insertar = mysqli_query($conexion, "INSERT INTO trespiratories (respMin, tos, expectoracio, colorPell, observacions, oxigenTerapia, ID_ingreso)
            VALUES ('$respMin', '$tos', '$expectoracio', '$colorPell', '$observacions', '$oxigenTerapia', '$ID_ingreso')");

            if ($query_insertar) {
                $alert = "<p class='msg_correcto'> Dades insertades correctament</p>";
            } else {
                $alert = "<p class='msg_error'>Error al insertar les dades</p>";
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
<html lang="en">

<head>
    <?php include_once("scripts.php"); ?>
</head>

<body>
    <?php
    include_once("header.php");

    ?>
<div class="container_general">
    <div class="second_container">

<h1 class="titulos">FORMULARI RESPIRACIÓ</h1>


        <div class="form_dades_container">
        <h1>Respiració</h1>
        <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
        <form action="" id="validate" method="post" class="commom_form">
            <fieldset>
                <label for="respMin"><i class="fa-sharp fa-solid fa-lungs"></i> Resp / min: <input id="respMin" name="respMin" type="text" /></label>
                <div class="input_conjunto"><i class="fa-solid fa-child"></i>
                    Coloració pell i mucoses: <br>
                    <label for="colorPell"><input id="personal-account" type="radio" name="colorPell" id="colorPell" class="inline" value="rosada" /> Rosada</label>
                    <label for="colorPell"><input id="business-account" type="radio" name="colorPell" id="colorPell" class="inline" value="palidesa" /> Pal.lidessa</label>
                    <label for="colorPell"><input id="business-account" type="radio" name="colorPell" id="colorPell" class="inline" value="cianosi" /> Cianosi</label>
                </div>
            </fieldset>
            <fieldset class="radio_input_section">
                <div class="input_conjunto"><i class="fa-solid fa-head-side-cough"></i>
                    Tos: <br>
                    <label for="tos"><input id="personal-account" type="radio" name="tos" value="no" class="inline" /> Si</label>
                    <label for="tos"><input id="business-account" type="radio" name="tos" value="si" class="inline" /> No</label>
                </div>
                <div class="input_conjunto"><i class="fa-solid fa-box-tissue"></i>
                    Expectoració: <br>
                    <label for="expectoracio"><input id="personal-account" type="radio" name="expectoracio" value="no" class="inline" /> Si</label>
                    <label for="expectoracio"><input id="business-account" type="radio" name="expectoracio" value="si" class="inline" /> No</label>
                </div>
                <div class="input_conjunto"><i class="fa-solid fa-mask-ventilator"></i>
                    Oxigenoterapia: <br>
                    <label for="oxigenTerapia"><input id="personal-account" type="radio" name="oxigenTerapia" value="si" class="inline" /> Si</label>
                    <label for="oxigenTerapia"><input id="business-account" type="radio" name="oxigenTerapia" value="no" class="inline" /> No</label>
                </div>
            </fieldset>
            <fieldset class="textarea_section">
                <label for="observacions"> Observacions: <textarea name="observacions"></textarea></label>
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
            <input class="submitForm" type="submit" value="Submit" />
        </form>
    </div>
    </div>

</body>

</html>