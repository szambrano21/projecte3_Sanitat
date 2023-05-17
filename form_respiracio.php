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
            <div class="form_dades_container">
                <h1>Respiració</h1>
                <form class="commom_form" method="post" action='https://register-demo.freecodecamp.org%27%3E/'>
                    <fieldset>
                        <label for="first-name"><i class="fa-sharp fa-solid fa-lungs"></i> Resp / min: <input id="first-name" name="first-name" type="text" /></label>
                        <div class="input_conjunto"><i class="fa-solid fa-child"></i>
                            Coloració pell i mucoses: <br>
                            <label for="personal-account"><input id="personal-account" type="radio" name="color_pell" id="" class="inline" value="" /> Rosada</label>
                            <label for="business-account"><input id="business-account" type="radio" name="color_pell" id="" class="inline" value="" /> Pal.lidessa</label>
                            <label for="business-account"><input id="business-account" type="radio" name="color_pell" id="" class="inline" value="" /> Cianosi</label>
                        </div>
                    </fieldset>
                    <fieldset class="radio_input_section">
                        <div class="input_conjunto"><i class="fa-solid fa-head-side-cough"></i>
                            Tos: <br>
                            <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Si</label>
                            <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> No</label>
                        </div>
                        <div class="input_conjunto"><i class="fa-solid fa-box-tissue"></i>
                            Expectoració: <br>
                            <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Si</label>
                            <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> No</label>
                        </div>
                        <div class="input_conjunto"><i class="fa-solid fa-mask-ventilator"></i>
                            Oxigenoterapia: <br>
                            <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Si</label>
                            <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> No</label>
                        </div>
                    </fieldset>
                    <fieldset class="textarea_section">
                        <label for="Disfagia liquida"> Observacions: <textarea></textarea></label>
                    </fieldset>
                    <div class="hora_dia">
                        <input type="radio" name="hora" id="dia">
                        <label for="dia">dia</label>
                        <input type="radio" name="hora" id="tarda">
                        <label for="tarda">tarda</label>
                        <input type="radio" name="hora" id="nit">
                        <label for="nit">nit</label>
                    </div>
                    <input class="submitForm" type="submit" value="Submit" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>