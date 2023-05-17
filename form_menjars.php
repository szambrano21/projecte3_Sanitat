<?php

include_once('connexiobbddsanitat.php');
 //recogemos id
$ID = $_GET['ID'];
$nHc = $_GET['nHc'];

if (!empty($_POST)) {
    $alert = "";
    if (
        empty($_POST["alimentsNoGrassos"]) || empty($_POST["necessitatsAjudes"]) || empty($_POST["inapetenciaAnorexia"]) || empty($_POST["mida"]) || empty($_POST["pes"])
        || empty($_POST["protesisDental"]) || empty($_POST["intolerancia"]) || empty($_POST["dietaHabitual"]) ||  empty($_POST["ID_ingreso"]) ||  empty($_POST["hora"]) || empty($_POST["dia"])
    ) {

        $alert = "<p class='msg_error'>Todos los campos son obligatorios</p>";
        print_r($_POST);
    } else {

        $alimentsNoGrassos = $_POST["alimentsNoGrassos"];
        $necessitatsAjudes = $_POST["necessitatsAjudes"];
        $inapetenciaAnorexia = $_POST["inapetenciaAnorexia"];
        $mida = $_POST["mida"];
        $pes = $_POST["pes"];
        $protesisDental = $_POST["protesisDental"];
        $intolerancia = $_POST["intolerancia"];
        $dietaHabitual = $_POST["dietaHabitual"];
        $ID_ingreso = $_POST["ID_ingreso"];
        $dia = $_POST["dia"];
        $hora = $_POST["hora"];
        // $ID_const  = $_POST["ID_const"];
       


        
        // $query = mysqli_query($conexion, "SELECT * FROM tconstants WHERE ID_ingreso = '$ID_ingreso'");
        // $resultado = mysqli_fetch_assoc($query);

        // if ($resultado > 0) {
        //     $alert = "<p class='msg_error'>El usuario ya existe</p>";
        // } else {
            $query_insertar = mysqli_query($conexion, "INSERT INTO tmenjars (alimentsNoGrassos, necessitatsAjudes, inapetenciaAnorexia, mida, pes, protesisDental,intolerancia,dietaHabitual,dia,hora,ID_ingreso)
            VALUES('$alimentsNoGrassos','$necessitatsAjudes','$inapetenciaAnorexia','$mida','$pes','$protesisDental','$intolerancia','$dietaHabitual','$dia','$hora','$ID_ingreso')");

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
        print_r($_POST);
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
        <h1>MENJAR I BEURE</h1>
        <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
        <form action="" id="validate" method="post" class="commom_form">
            <fieldset>
                <label for="pes"><i class="fa-solid fa-weight-scale"></i> Pes (kg): <input id="pes" name="pes" type="text" /></label>
                <label for="mida"><i class="fa-solid fa-ruler-horizontal"></i> Mida (cm): <input id="mida" name="mida" type="text" /></label>
            </fieldset>
            <fieldset>
                <label for="dietaHabitual"><i class="fa-solid fa-bowl-food"></i> Dieta habitual:<input id="dietaHabitual" name="dietaHabitual" type="text" /></label>
                <label for="alimentsNoGrassos"><i class="fa-solid fa-wheat-awn"></i> Aliments no grassos: <input id="alimentsNoGrassos" name="alimentsNoGrassos" type="text" /></label>
            </fieldset>
            <fieldset>
                <label for="intolerancia"><i class="fa-solid fa-wheat-awn-circle-exclamation"></i> Intolerancia:<input id="intolerancia" name="intolerancia" type="text" /></label>
                <label for="dia"><i class="fa-solid fa-wheat-awn-circle-exclamation"></i> Dia:<input id="intolerancia" name="dia" type="text" /></label>
            </fieldset>
            <fieldset class="radio_input_section">
                <div><i class="fa-solid fa-handshake-angle"></i>
                    Necessitat d'ajut: <br>
                    <label for="necessitatsAjudes"><input id="necessitatsAjudes-total" type="radio" name="necessitatsAjudes" class="inline" value="total"/> Total</label>
                    <label for="necessitatsAjudes"><input id="necessitatsAjudes-parcial" type="radio" name="necessitatsAjudes" class="inline" value="parcial"/> Parcial</label>
                    <label for="necessitatsAjudes"><input id="necessitatsAjudes-independentment" type="radio" name="necessitatsAjudes" class="inline" value="independent"/> Independent</label>
                </div>
                <div><i class="fa-sharp fa-solid fa-icicles"></i>
                    Inapetència i/o anorèxia: <br>
                    <label for="inapetenciaAnorexia"><input id="inapetenciaAnorexia-1" type="radio" name="inapetenciaAnorexia" class="inline" value="si"/> Si</label>
                    <label for="inapetenciaAnorexia"><input id="inapetenciaAnorexia-0" type="radio" name="inapetenciaAnorexia" class="inline" value="no"/> No</label>
                </div>
                <div><i class="fa-sharp fa-solid fa-teeth-open"></i>
                    Protesis dental: <br>
                    <label for="protesisDental"><input id="protesisDental-1" type="radio" name="protesisDental" class="inline" value="si"/> Si</label>
                    <label for="protesisDental"><input id="protesisDental-0" type="radio" name="protesisDental" class="inline" value="no"/> No</label>
                </div>
            </fieldset>
            <div class="hora_dia">
                <input type="radio" name="hora" id="dia" value="dia">
                <label for="dia">dia</label>
                <input type="radio" name="hora" id="tarda" value="tarda">
                <label for="tarda">tarda</label>
                <input type="radio" name="hora" id="nit" value="nit">
                <label for="nit">nit</label>
            </div>
            <input type="hidden" id="ID_ingreso" name="ID_ingreso" value="<?php echo $ID; ?>"/>
            <fieldset>
                <input type="submit" value="Submit" class="submitForm"/>
                <a href="infoMenjars.php?nHc=<?php echo $nHc."&ID=".$ID; ?>" class="submitForm" style="    background-color: #3b3b4f; border-color: white; color:white">Taula Menjars</a>
            </fieldset>
        </form>
        </div>
        </div>
</body>

</html>