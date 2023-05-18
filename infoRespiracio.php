<?php include_once("scripts.php");
include_once('connexiobbddsanitat.php');
$nHc = $_GET['nHc'];
$ID = $_GET['ID'];
// $data = $_GET['data'];
$respMin0 = array();
$fecha = array();
$mañana = array();
$tarde = array();
$noche = array();
$sql = mysqli_query($conexion, "SELECT dia
FROM trespiratories
WHERE trespiratories.ID_ingreso = '$ID'");
$resultado = mysqli_num_rows($sql);

if ($resultado > 0) {
  while ($row = mysqli_fetch_assoc($sql)) {
    // array_push($respMin0, $row["respMin"]);
    array_push($fecha, $row["dia"]);
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/infoStyles.css">

</head>
<style>

</style>

<body>
  <?php
  include_once("header.php");

  if ($_SESSION['tipo'] != 'admin') {
    header("location: inicial.php");
  }
  ?>


  <div class="container_general">
    <div class="second_container">


      <h1 class="titulos">TAULA DADES RESPIRATORIES</h1>

      <div class="navegacion">
        <a href="inicial.php">Home ></a>&nbsp<a href="ingresos.php">SALES ></a>&nbsp<a href="tablaPaciente.php?nHc=<?php echo $nHc; ?>">TAULA PACIENT ></a> &nbsp <p>TAULA DADES RESPIRATORIES</p>
      </div>

      <!-- <h1><span class="blue">&lt;</span>Taula Menjars<span class="blue">&gt;</span> <span class="yellow">DIA, TARDA Y NIT</pan> -->
      </h1>
      <br>
      <!-- <h2>Created with love by <a href="https://github.com/pablorgarcia" target="_blank">--</a></h2> -->
      <?php

      $sql = mysqli_query($conexion, "SELECT *
            FROM trespiratories
            WHERE trespiratories.ID_ingreso = '$ID' AND trespiratories.hora = 'dia'
            ");

      if (mysqli_num_rows($sql) > 0) {


        // $id = $row["id"];

      ?>
        <!-- <th style="background-color: #85b0fa;"> -->


        <table class="containerInfo">

          <thead>
            <tr>
              <th style="background: #85b0fa">

                <a href="form_respiracio.php?nHc=<?php echo $nHc . "&ID=" . $ID; ?>"><i class="fa-sharp fa-solid fa-plus"></i></a>
              </th>
            </tr>
            <tr>
              <th>MATI</th>
            </tr>
          </thead>
          <thead>
            <tr>

              <th>
                <h1>Dia</h1>
              </th>
              <th>
                <h1>Respiracio/min</h1>
              </th>
              <th>
                <h1>Tos</h1>
              </th>
              <th>
                <h1>Expectoracio</h1>
              </th>
              <th>
                <h1>Color Pell</h1>
              </th>
              <th>
                <h1>Observacions</h1>
              </th>
              <th>
                <h1>Oxigenoterapia</h1>
              </th>
              <!-- <th>
              <h1>dietaHabitual</h1>
            </th> -->
              <th>
                <h1>Editar</h1>
              </th>
              <th>
                <h1>Eliminar</h1>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($sql)) {
              $respMin = $row["respMin"];
              $tos  = $row["tos"];
              $expectoracio = $row["expectoracio"];
              $colorPell = $row["colorPell"];
              $observacions = $row["observacions"];
              $oxigenTerapia = $row["oxigenTerapia"];
              // $dietaHabitual = $row["dietaHabitual"];
              // $protesisDental = $row["protesisDental"];
              $dia = $row["dia"];
              $ID_resp = $row["ID_resp"];
              $ID_ingreso = $row["ID_ingreso"];
              array_push($mañana, $respMin);

            ?>
              <tr>
                <td><?php echo $dia ?></td>
                <td><?php echo $respMin ?></td>
                <td><?php echo $tos ?></td>
                <td><?php echo $expectoracio ?></td>
                <td><?php echo $colorPell ?></td>
                <td><?php echo $observacions ?></td>
                <td><?php echo $oxigenTerapia ?></td>
                <!-- <td><?php echo $intolerancia ?></td>-->

                <td style="display:table-cell; width:auto; background:none;"><a href="editar_respiracio.php?nHc=<?php echo $nHc . "&ID=" . $ID . "&data=" . $dia . "&ID_resp=" . $ID_resp; ?>" style="color:red;"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td style="display:table-cell; width:auto; background:none;"><a href="eliminar_respiracio.php?nHc=<?php echo $nHc . "&ID_resp=" . $ID_resp . "&ID=" . $ID_ingreso; ?>" style="color:red;"><i class="fa-solid fa-trash"></i></a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php
      } else {
        // echo "No tiene datos de la mañana";
        $mañana = "--";
      ?>
        <table class="containerInfo" style="width: 30%;">
          <thead>
            <tr>
              <th>Afegir dades del mati</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th><a href="form_respiracio.php?nHc=<?php echo $nHc . "&ID=" . $ID; ?>"><i class="fa-sharp fa-solid fa-plus"></i></a></th>
            </tr>
          </tbody>
        </table>

      <?php
      }
      ?>

      <!-- TARDAAAAAAAAA -->
      <?php
      $ID = $_GET['ID'];

      $sql = mysqli_query($conexion, "SELECT *
            FROM trespiratories
            WHERE trespiratories.ID_ingreso = '$ID' AND trespiratories.hora = 'tarda'
            ");


      if (mysqli_num_rows($sql) > 0) {

      ?>
        <table class="containerInfo">
          <thead>
            <tr>
              <th>TARDA</th>

            </tr>
          </thead>
          <thead>
            <tr>

              <th>
                <h1>Dia</h1>
              </th>
              <th>
                <h1>Respiracio/min</h1>
              </th>
              <th>
                <h1>Tos</h1>
              </th>
              <th>
                <h1>Expectoracio</h1>
              </th>
              <th>
                <h1>Color Pell</h1>
              </th>
              <th>
                <h1>Observacions</h1>
              </th>
              <th>
                <h1>Oxigenoterapia</h1>
              </th>
              <!-- <th>
              <h1>dietaHabitual</h1>
            </th> -->
              <th>
                <h1>Editar</h1>
              </th>
              <th>
                <h1>Eliminar</h1>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($sql)) {
              $respMin = $row["respMin"];
              $tos  = $row["tos"];
              $expectoracio = $row["expectoracio"];
              $colorPell = $row["colorPell"];
              $observacions = $row["observacions"];
              $oxigenTerapia = $row["oxigenTerapia"];
              // $dietaHabitual = $row["dietaHabitual"];
              // $protesisDental = $row["protesisDental"];
              $dia = $row["dia"];
              $ID_resp = $row["ID_resp"];
              $ID_ingreso = $row["ID_ingreso"];
              array_push($tarde, $row["respMin"]);
            ?>
              <tr>
                <td><?php echo $dia ?></td>
                <td><?php echo $respMin ?></td>
                <td><?php echo $tos ?></td>
                <td><?php echo $expectoracio ?></td>
                <td><?php echo $colorPell ?></td>
                <td><?php echo $observacions ?></td>
                <td><?php echo $oxigenTerapia ?></td>
                <!-- <td><?php echo $intolerancia ?></td>-->

                <td style="display:table-cell; width:auto; background:none;"><a href="editar_respiracio.php?nHc=<?php echo $nHc . "&ID=" . $ID . "&data=" . $dia . "&ID_resp=" . $ID_resp; ?>" style="color:red;"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td style="display:table-cell; width:auto; background:none;"><a href="eliminar_respiracio.php?nHc=<?php echo $nHc . "&ID_resp=" . $ID_resp . "&ID=" . $ID_ingreso; ?>" style="color:red;"><i class="fa-solid fa-trash"></i></a></td>
              </tr>

            <?php
            }
            ?>
          </tbody>
        </table>

      <?php
      } else {
        // echo "No tiene datos de la mañana";
        $tarde = "--";

      ?>
        <table class="containerInfo" style="width: 30%;">
          <thead>
            <tr>
              <th>Afegir dades de la tarda</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th><a href="form_respiracio.php?nHc=<?php echo $nHc . "&ID=" . $ID; ?>"><i class="fa-sharp fa-solid fa-plus"></i></a></th>
            </tr>
          </tbody>
        </table>

      <?php
      }
      ?>
      <!-- NOCHEEEEEEEEEEEEE -->
      <?php
      $ID = $_GET['ID'];

      $sql = mysqli_query($conexion, "SELECT *
            FROM trespiratories
            WHERE trespiratories.ID_ingreso = '$ID' AND trespiratories.hora = 'nit'
            ");


      if (mysqli_num_rows($sql) > 0) {


        // $id = $row["id"];


      ?>

        <table class="containerInfo">
          <thead>
            <tr>
              <th>NIT</th>
            </tr>
          </thead>
          <thead>
            <tr>

              <th>
                <h1>Dia</h1>
              </th>
              <th>
                <h1>Respiracio/min</h1>
              </th>
              <th>
                <h1>Tos</h1>
              </th>
              <th>
                <h1>Expectoracio</h1>
              </th>
              <th>
                <h1>Color Pell</h1>
              </th>
              <th>
                <h1>Observacions</h1>
              </th>
              <th>
                <h1>Oxigenoterapia</h1>
              </th>
              <!-- <th>
              <h1>dietaHabitual</h1>
            </th> -->
              <th>
                <h1>Editar</h1>
              </th>
              <th>
                <h1>Eliminar</h1>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($sql)) {
              $respMin = $row["respMin"];
              $tos  = $row["tos"];
              $expectoracio = $row["expectoracio"];
              $colorPell = $row["colorPell"];
              $observacions = $row["observacions"];
              $oxigenTerapia = $row["oxigenTerapia"];
              // $dietaHabitual = $row["dietaHabitual"];
              // $protesisDental = $row["protesisDental"];
              $dia = $row["dia"];
              $ID_resp = $row["ID_resp"];
              $ID_ingreso = $row["ID_ingreso"];
              array_push($noche, $row["respMin"]);
            ?>
              <tr>
                <td><?php echo $dia ?></td>
                <td><?php echo $respMin ?></td>
                <td><?php echo $tos ?></td>
                <td><?php echo $expectoracio ?></td>
                <td><?php echo $colorPell ?></td>
                <td><?php echo $observacions ?></td>
                <td><?php echo $oxigenTerapia ?></td>
                <!-- <td><?php echo $intolerancia ?></td>-->

                <td style="display:table-cell; width:auto; background:none;"><a href="editar_respiracio.php?nHc=<?php echo $nHc . "&ID_resp=" . $ID_resp . "&data=" . $dia . "&ID=" . $ID; ?>" style="color:red;"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td style="display:table-cell; width:auto; background:none;"><a href="eliminar_respiracio.php?nHc=<?php echo $nHc . "&ID_resp=" . $ID_resp . "&ID=" . $ID_ingreso; ?>" style="color:red;"><i class="fa-solid fa-trash"></i></a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php
      } else {
        // echo "No tiene datos de la mañana";
        $noche = "--";

      ?>
        <table class="containerInfo" style="width: 30%;">
          <thead>
            <tr>
              <th>Afegir dades de la nit</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th><a href="form_respiracio.php?nHc=<?php echo $nHc . "&ID=" . $ID; ?>"><i class="fa-sharp fa-solid fa-plus"></i></a></th>
            </tr>
          </tbody>
        </table>

      <?php
      }

      ?>

      <?php

      if ($mañana == "--" && $mañana == $tarde && $tarde == $mañana) {
        echo "<p>No hay datos para el grafico<p>";
      } else {
      ?>

        <div class="container-chart">
          <canvas id="respiracio-chart" title="Datos del dia de respiracion/min el gráfico"></canvas>
        </div>
        <!-- Código JavaScript para generar el gráfico -->

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          $(document).ready(function() {

            var ctx = $('#respiracio-chart');
            var respiracioChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: <?php echo json_encode($fecha); ?>,
                datasets: [{
                    label: 'Dia respiracio/min',
                    data: <?php echo json_encode($dia); ?>,
                    backgroundColor: '#ff83f5',
                    borderColor: '#ff83f5',
                    borderWidth: 1,
                  },
                  {
                    label: 'Tarde respiracio/min',
                    data: <?php echo json_encode($tarde); ?>,
                    backgroundColor: '#48ffce',
                    borderColor: '#48ffce',
                    borderWidth: 1
                  },
                  {
                    label: 'Noche respiracio/min',
                    data: <?php echo json_encode($noche); ?>,
                    backgroundColor: '#f7ff71',
                    borderColor: '#f7ff71',
                    borderWidth: 1
                  },
                ],
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero: true
                    }
                  }],
                  xAxes: [{
                    display: true,
                    scaleLabel: {
                      display: true,
                      labelString: 'Periodo del día'
                    },
                    ticks: {
                      // callback: function(value, index, values) {
                      //     return ['Día', 'Tarde', 'Noche'][value - 1];
                      // }
                    }
                  }]
                }
              }
            });
          });
        </script>
      <?php
      }
      ?>
    </div>
  </div>

</body>

</html>