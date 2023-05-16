<?php

include_once('connexiobbddsanitat.php');

if(!empty($_SESSION['activo'])){
    header("location: inicial.php");

}else{

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
            $saturacioO2 = $_POST["saturacioO2"];
            $EVN = $_POST["EVN"];
            $reavaluacioDolor = $_POST["reavaluacioDolor"];
            $hemoglobina = $_POST["hemoglobina"];
            $disfagiaLiquida = $_POST["disfagiaLiquida"];
            $disfagiaSolids = $_POST["disfagiaSolids"];        
            $ID_const  = $_POST["ID_const"];
            $idIngreso = $_POST["ID_ingreso"];

            $query = mysqli_query($conexion,"SELECT * FROM tconstants WHERE ID_const = '$ID_const'");
            $resultado = mysqli_fetch_assoc($query);
            

            if($resultado > 0){
                $alert="<p class='msg_error'>El usuario ya existe</p>";
            }else{

                $query_insertar = mysqli_query($conexion, "INSERT INTO tconstants (temperatura, presioArterial, pols, glucemia, saturacioO2, EVN,reavaluacioDolor,hemoglobina,disfagiaLiquida,disfagiaSolids,ID_ingreso)
                VALUES('$temperatura','$presioArterial','$pols',' $glucemia ',' $saturacioO2 ','$EVN','$reavaluacioDolor','$hemoglobina','$disfagiaLiquida','$disfagiaSolids','$idIngreso')");

                if($query_insertar){
                    $alert="<p class='msg_correcto'>El usuario ha sido creado correctamente</p>";
                }else{
                    $alert="<p class='msg_error'>Error al crear el usuario</p>";
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
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once("scripts.php"); ?>

    <style>
        body {
            display: flex;
        }

        @media screen and (max-width: 700px) {
            body {
                display: initial;
            }

        }
    </style>
</head>

<body>
    <?php
    include_once("header.php");
    // if($_SESSION['tipo'] != 'admin'){
    //     header("location: inicial.php");
    // }

    ?>



    <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
    <div class="container_general">
        <div class="container_ingres">
            <h1>CONSTANTS</h1>
            <hr>
            <form action="" method="post">
                <p><?php echo $_SESSION['nHc']?> </p>
                <label for="temperatura">Temperatura:</label>
                <input type="text" name="temperatura" id="temperatura" ><br>

                <label for="presioArterial">Presión Arterial:</label>
                <input type="text" name="presioArterial" id="presioArterial" ><br>

                <label for="pols">Pulso:</label>
                <input type="text" name="pols" id="pols" ><br>

                <label for="glucemia">Glucemia:</label>
                <input type="text" name="glucemia" id="glucemia" ><br>

                <label for="saturacioO2">Saturación de Oxígeno:</label>
                <input type="text" name="saturacioO2" id="saturacioO2" ><br>

                <label for="EVN">Escala Visual Numérica (EVN):</label>
                <input type="text" name="EVN" id="EVN" ><br>

                <label for="reavaluacioDolor">Reevaluación del Dolor:</label>
                <input type="text" name="reavaluacioDolor" id="reavaluacioDolor" ><br>

                <label for="hemoglobina">Hemoglobina:</label>
                <input type="text" name="hemoglobina" id="hemoglobina" ><br>

                <label for="disfagiaLiquida">Disfagia Líquida:</label>
                <input type="text" name="disfagiaLiquida" id="disfagiaLiquida" ><br>

                <label for="disfagiaSolids">Disfagia Sólidos:</label>
                <input type="text" name="disfagiaSolids" id="disfagiaSolids" ><br>

                <!-- <label for="ID_ingreso">ID de Ingreso:</label>
                <input type="text" name="ID_ingreso" id="ID_ingreso" required><br> -->

                <!-- <input id="prodId" name="prodId" type="hidden" value="<?php echo $nHc ;?>"> -->
                
                href='eliminar_usuario.php?DNI=$dni'
                <input type="submit"  value="Enviar">
            </form>
        </div>
    </div>



    <!-- 
-----------GRAFICO EXAMPLE---------
-- Incluye la librería de Chart.js --
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

-- Crea un elemento canvas para mostrar el gráfico --
<canvas id="grafico"></canvas>
$PAS_NORMAL = 120;
$PAD_NORMAL = 80;
$PAS_MAX = 140;
$PAD_MAX = 90;
$PAS_MIN = 90;
$PAD_MIN = 60;

<script>
  var ctx = document.getElementById('grafico').getContext('2d');
  var chart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: <?php //echo json_encode($labels); ?>,
          datasets: [
              {
                  label: 'PAS',
                  data: <?php // echo json_encode($data_pas); ?>,
                  borderColor: 'rgba(255, 99, 132, 1)',
                  borderWidth: 1,
                  pointRadius: 0,
                  yAxisID: 'y-axis-1'
              },
              {
                  label: 'PAD',
                  data: <?php //echo json_encode($data_pad); ?>,
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1,
                  pointRadius: 0,
                  yAxisID: 'y-axis-2'
              },
              {
                  label: 'PAS normal',
                  data: <?php //echo json_encode(array_fill(0, count($data_pas), $PAS_NORMAL)); ?>,
                  borderDash: [5,5],
                  borderColor: 'rgba(0,0,0,0.5)',
                  borderWidth: 1,
                  pointRadius:

-->