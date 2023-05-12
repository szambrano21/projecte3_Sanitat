<?php

include_once('connexiobbddsanitat.php');

if(!empty($_POST)){
    $alert="";
    if(empty($_POST["temperatura"]) || empty($_POST["presioArterial"]) || empty($_POST["pols"]) || empty($_POST["glucemia"]) || empty($_POST["saturacioO2"])
    || empty($_POST["EVN"]) || empty($_POST["reavaluacioDolor"]) || empty($_POST["hemoglobina"]) || empty($_POST["disfagiaLiquida"]) || empty($_POST["disfagiaSolids"]) 
    ){

        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
        
    }else{

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
        $ID = $_POST["ID"];
        $ID_const  = $_POST["ID_const"];


        $query = mysqli_query($conexion,"SELECT * FROM tconstants WHERE ID_const = '$ID_const'");
        $resultado = mysqli_fetch_assoc($query);
        $ID_ingres = $row['ID_ingreso']; 

        if($resultado > 0){
            $alert="<p class='msg_error'>El usuario ya existe</p>";

        }else{

            $query_insertar = mysqli_query($conexion, "INSERT INTO tconstants (temperatura, presioArterial, pols, glucemia, saturacioO2, EVN,reavaluacioDolor,hemoglobina,disfagiaLiquida,disfagiaSolids,ID_ingreso)
            VALUES('$temperatura','$presioArterial','$pols',' $glucemia ',' $saturacioO2 ','$EVN','$reavaluacioDolor','$hemoglobina','$disfagiaLiquida','$disfagiaSolids','$ID_ingreso')");
            
            if($query_insertar){
                $alert="<p class='msg_correcto'>El usuario ha sido creado correctamente</p>";
            }else{
                $alert="<p class='msg_error'>Error al crear el usuario</p>";
            }
            include_once("header.php");
            if ($_SESSION['activo'] == true){
                
                $_SESSION['ID_ingreso'] = $ID_ingreso;
            }
        }
        
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

<?php

include_once('connexiobbddsanitat.php');

if(!empty($_POST)){
    $alert="";
    if(empty($_POST["temperatura"]) || empty($_POST["presioArterial"]) || empty($_POST["pols"]) || empty($_POST["glucemia"]) || empty($_POST["saturacioO2"])
    || empty($_POST["EVN"]) || empty($_POST["reavaluacioDolor"]) || empty($_POST["hemoglobina"]) || empty($_POST["disfagiaLiquida"]) || empty($_POST["disfagiaSolids"]) || empty($_POST["ID_ingreso "]) ){

        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
    }else{

        $temperatura = $_POST["temperatura"];
        $presioArterial = $_POST["presioArterial"];
        $pols = $_POST["pols"];
        $glucemia = $_POST["glucemia"];
        $saturacioO2 = ($_POST["saturacioO2"]);
        $EVN = $_POST["EVN"];
        $reavaluacioDolor = $_POST["reavaluacioDolor"];
        $hemoglobina = $_POST["hemoglobina"];
        $disfagiaLiquida = $_POST["disfagiaLiquida"];
        $disfagiaSolids = $_POST["disfagiaSolids"];        
        $idIngreso = $_POST["ID_ingreso"];
        $ID_const  = $_POST["ID_const"];


        // $query = mysqli_query($conexion,"SELECT * FROM tconstants WHERE ID_const = '$ID_const'");
        // $resultado = mysqli_fetch_assoc($query);

        
            $query_insertar = mysqli_query($conexion, "INSERT INTO tconstants (temperatura, presioArterial, pols, glucemia, saturacioO2, EVN,reavaluacioDolor,hemoglobina,disfagiaLiquida,disfagiaSolids,ID_ingreso)
            VALUES('$temperatura','$presioArterial','$pols',' $glucemia ',' $saturacioO2 ','$EVN','$reavaluacioDolor','$hemoglobina','$disfagiaLiquida','$disfagiaSolids','$idIngreso')");

            if($query_insertar){
                $alert="<p class='msg_correcto'>El codigo de ingreso ha sido creado correctamente</p>";
            }else{
                $alert="<p class='msg_error'>Error al crear el usuario</p>";
            }
    }
}

?>

</head>

<body>
    <?php
    include_once("header.php");
    ?>
    <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
    <div class="form_container">
        <h1>CONSTANTS</h1>
        <form method="post" action='form_constants.php'>
            <fieldset>
                <label for="temperatura"><i class="fa-solid fa-weight-scale"></i> Temperatura (ºC): <input id="temperatura" name="temperatura" type="number" /></label>
                <label for="pols"><i class="fa-solid fa-stethoscope"></i> Pulsacions (ppm): <input id="pols" name="pols" type="number" /></label>
            </fieldset>
            <fieldset>
                <label for="presioArterial"><i class="fa-sharp fa-solid fa-heart-pulse"></i> Pressió arterial (mm Hg):<input id="presio_arterial" name="presioArterial" type="text" /></label>
                <label for="glucemia"><i class="fa-solid fa-eye-dropper"></i> Glucemia (mg/dL): <input id="glucemia" name="glucemia" type="number" /></label>
            </fieldset>
            <fieldset>
                <label for="saturacioO2"><i class="fa-sharp fa-solid fa-gauge-high"></i> Saturació 02 (%):<input id="saturacio" name="saturacioO2" type="number" /></label>
            </fieldset>
            <fieldset class="radio_input_section">
                <div>
                    EVN: <br>
                    <label for="evn"><input id="evn-1" type="radio" name="EVN" class="inline" value="1" /> Si</label>
                    <label for="evn"><input id="evn-0" type="radio" name="EVN" class="inline" value="0"/> No</label>
                </div>
                <div>
                    Reavaluacio dolor: <br>
                    <label for="reavaluacioDolor"><input id="reavaluacio-dolor-total" type="radio" name="reavaluacioDolor" class="inline" value="total"/> Total</label>
                    <label for="business-account"><input id="reavaluacio-dolor-parcial" type="radio" name="reavaluacioDolor" class="inline" value="parcial"/> Parcial</label>
                    <label for="business-account"><input id="reavaluacio-dolor-independent" type="radio" name="reavaluacioDolor" class="inline" value="independent"/> Independent</label>
                </div>
                <div>
                    Hemoglobina: <br>
                    <label for="hemoglobina"><input id="hemoglobina-1" type="radio" name="hemoglobina" class="inline" value="1" /> Si</label>
                    <label for="hemoglobina"><input id="hemoglobina-0" type="radio" name="hemoglobina" class="inline" value="0" /> No</label>
                </div>
            </fieldset>
            <fieldset>
                <label for="disfagiaLiquida"> Disfagia líquida: <textarea name="disfagiaLiquida" id="disfagia-liquida"></textarea></label>
                <label for="disfagiaSolids"> Disfagia sòlida: <textarea name="disfagiaSolids" id="disfagia-solida"></textarea></label>
            </fieldset>
                <input type="hidden" id="idIngreso" name="idIngreso" value="1">
                <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>