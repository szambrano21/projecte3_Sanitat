<?php

include_once('connexiobbddsanitat.php');
 //recogemos id

$data = $_GET['data'];
$ID = $_GET['ID'];
$nHc = $_GET['nHc'];

if (!empty($_POST)) {
    $alert = "";
    if (
        empty($_POST["respMin"]) || empty($_POST["tos"]) || empty($_POST["expectoracio"]) || empty($_POST["colorPell"]) || empty($_POST["observacions"])
        ||  empty($_POST["oxigenTerapia"]) ||  empty($_POST["ID_ingreso"]) || empty($_POST["hora"]) || empty($_POST["dia"])
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
        $dia = $_POST["dia"];
        $hora = $_POST["hora"];
        $ID_ingreso = $_POST["ID_ingreso"];

        $fecha_actual = date("d-m-Y h:i:s");


            $query_update = mysqli_query($conexion, "UPDATE trespiratories 
            SET respMin = '$respMin', tos = '$tos', expectoracio = '$expectoracio', colorPell = '$colorPell', observacions = '$observacions', oxigenTerapia = '$oxigenTerapia', dia = '$fecha_actual', hora = '$hora' 
            WHERE ID_ingreso = '$ID_ingreso' AND dia = '$dia' ");

            if ($query_update) {
                $alert = "<p class='msg_correcto'> Dades actualizades correctament</p>";
            } else {
                $alert = "<p class='msg_error'>Error al actualizar les dades</p>";
            }
    }
}


/* aqui revisarrrrrrrrrrrrrrr */

// $nHc = $_GET['nHc'];    
$sql = mysqli_query($conexion,"SELECT * FROM trespiratories 
WHERE dia = '$data' AND ID_ingreso = $ID ");

// // echo $nHc;

$resultado_sql = mysqli_num_rows($sql);
// $sql = mysqli_query($conexion,"SELECT * FROM tingres WHERE nHc = '$nHc'");

// $resultado_sql = mysqli_num_rows($sql);

if($resultado_sql == 0){
header("location: inici.php");
}
else{
$option = '';

while($row = mysqli_fetch_assoc($sql)){

    $respMin = $row["respMin"];
    $tos = $row["tos"];
    $expectoracio = $row["expectoracio"];
    $colorPell = $row["colorPell"];
    $observacions = $row["observacions"];
    $oxigenTerapia = $row["oxigenTerapia"];
    $dia = $row["dia"];
    $hora = $row["hora"];
    $ID_ingreso = $row["ID_ingreso"];

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
                <label for="respMin"><i class="fa-sharp fa-solid fa-lungs"></i> Resp / min: <input id="respMin" name="respMin" type="text" value="<?php echo $respMin ?>" /></label>
                <label for="dia"><i class="fa-solid fa-wheat-awn-circle-exclamation"></i> Dia:<input id="intolerancia" name="dia" type="text" value="<?php echo $dia ?>" /></label>

            </fieldset>

            <fieldset class="radio_input_section">
                
            <div class="input_conjunto">
                <i class="fa-solid fa-box-tissue"></i>
                Expectoració: <br>
                <label for="expectoracio">
                    <input id="personal-account" type="radio" name="expectoracio" value="no" class="inline" <?php if ($expectoracio == 'no') echo 'checked'; ?> /> Si
                </label>
                <label for="expectoracio">
                    <input id="business-account" type="radio" name="expectoracio" value="si" class="inline" <?php if ($expectoracio == 'si') echo 'checked'; ?> /> No
                </label>
            </div>

            <div class="input_conjunto"><i class="fa-solid fa-mask-ventilator"></i>
                Oxigenoterapia: <br>
                <label for="oxigenTerapia"><input id="personal-account" type="radio" name="oxigenTerapia" value="si" class="inline" <?php echo ($oxigenTerapia == 'si') ? 'checked' : ''; ?> /> Si</label>
                <label for="oxigenTerapia"><input id="business-account" type="radio" name="oxigenTerapia" value="no" class="inline" <?php echo ($oxigenTerapia == 'no') ? 'checked' : ''; ?> /> No</label>
            </div>

            </fieldset>
            <fieldset>
                <div class="input_conjunto"><i class="fa-solid fa-head-side-cough"></i>
                    Tos: <br>
                    <label for="tos"><input id="personal-account" type="radio" name="tos" value="no" class="inline" <?php echo ($tos == 'no') ? 'checked' : ''; ?> /> Si</label>
                    <label for="tos"><input id="business-account" type="radio" name="tos" value="si" class="inline" <?php echo ($tos == 'si') ? 'checked' : ''; ?> /> No</label>
                </div>
                <div class="input_conjunto"><i class="fa-solid fa-child"></i>
                    Coloració pell i mucoses: <br>
                    <label for="colorPell"><input id="personal-account" type="radio" name="colorPell" class="inline" value="rosada" <?php echo ($colorPell == 'rosada') ? 'checked' : ''; ?> /> Rosada</label>
                    <label for="colorPell"><input id="business-account" type="radio" name="colorPell" class="inline" value="palidesa" <?php echo ($colorPell == 'palidesa') ? 'checked' : ''; ?> /> Pal.lidessa</label>
                    <label for="colorPell"><input id="business-account" type="radio" name="colorPell" class="inline" value="cianosi" <?php echo ($colorPell == 'cianosi') ? 'checked' : ''; ?> /> Cianosi</label>
                </div>
            </fieldset>
            <fieldset class="textarea_section">
                <label for="observacions"> Observacions: <textarea name="observacions"><?php echo $observacions; ?></textarea></label>
            </fieldset>
            
                
            <div class="hora_dia">
                <input type="radio" name="hora" id="dia" value="dia" <?php echo ($hora === 'dia') ? 'checked' : ''; ?>>
                <label for="dia">dia</label>
                <input type="radio" name="hora" id="tarda" value="tarda" <?php echo ($hora === 'tarda') ? 'checked' : ''; ?>>
                <label for="tarda">tarda</label>
                <input type="radio" name="hora" id="nit" value="nit" <?php echo ($hora === 'nit') ? 'checked' : ''; ?>>
                <label for="nit">nit</label>
            </div>
            
            <input type="hidden" id="ID_ingreso" name="ID_ingreso" value="<?php echo $ID; ?>"/>
            <fieldset>
                <input type="submit" value="Submit" class="submitForm"/>
                <a href="infoRespiracio.php?nHc=<?php echo $nHc."&ID=".$ID; ?>" class="submitForm" style="    background-color: #3b3b4f; border-color: white; color:white">Taula Respiracions</a>
            </fieldset>
        </form>
    </div>
    </div>

</body>

</html>