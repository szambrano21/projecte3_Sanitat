<?php include_once("scripts.php");
include_once('connexiobbddsanitat.php');
?>
<!DOCTYPE html>
<html>

<head>

</head>
<style>
  /*	
	Table Responsive
	===================
	Author: https://github.com/pablorgarcia
 */

  @charset "UTF-8";
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

  body {
    font-family: 'Open Sans', sans-serif;
    font-weight: 300;
    line-height: 1.42em;
    color: #A7A1AE;
    /* background-color: #1F2739; */
  }

  h1 {
    font-size: 3em;
    font-weight: 300;
    line-height: 1em;
    text-align: center;
    color: black;
  }

  h2 {
    font-size: 1em;
    font-weight: 300;
    text-align: center;
    display: block;
    line-height: 1em;
    padding-bottom: 2em;
    color: #FB667A;
  }

  h2 a {
    font-weight: 700;
    text-transform: uppercase;
    color: #FB667A;
    text-decoration: none;
  }

  .blue {
    color: #185875;
  }

  .yellow {
    color: #FFF842;
  }

  .containerInfo th h1 {
    font-weight: bold;
    font-size: 1em;
    text-align: left;
    color: #185875;
  }

  .containerInfo td {
    font-weight: normal;
    font-size: 1em;
    -webkit-box-shadow: 0 2px 2px -2px #0E1119;
    -moz-box-shadow: 0 2px 2px -2px #0E1119;
    box-shadow: 0 2px 2px -2px #0E1119;
  }

  .containerInfo {
    text-align: left;
    overflow: hidden;
    width: 80%;
    margin: 0 auto;
    display: table;
    padding: 0 0 2em 0;
  }

  .containerInfo td,
  .containerInfo th {
    padding-bottom: 2%;
    padding-top: 2%;
    /* padding-left: 2%; */
  }

  /* Background-color of the odd rows */
  .containerInfo tr:nth-child(odd) {
    background-color: #323C50;
  }

  /* Background-color of the even rows */
  .containerInfo tr:nth-child(even) {
    background-color: #2C3446;
  }

  .containerInfo th {
    background-color: #1F2739;
  }

  .containerInfo td:first-child {
    color: #FB667A;
  }

  .containerInfo tr:hover {
    background-color: #464A52;
    -webkit-box-shadow: 0 6px 6px -6px #0E1119;
    -moz-box-shadow: 0 6px 6px -6px #0E1119;
    box-shadow: 0 6px 6px -6px #0E1119;
  }

  .containerInfo td:hover {
    background-color: #FFF842;
    color: #403E10;
    font-weight: bold;

    box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
    transform: translate3d(6px, -6px, 0);

    transition-delay: 0s;
    transition-duration: 0.4s;
    transition-property: all;
    transition-timing-function: line;
  }

  @media (max-width: 800px) {

    .containerInfo td:nth-child(4),
    .containerInfo th:nth-child(4) {
      display: none;
    }
  }
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
    <h1 class="titulos">TAULA MENJARS</h1>
      <!-- <h1><span class="blue">&lt;</span>Taula Menjars<span class="blue">&gt;</span> <span class="yellow">DIA, TARDA Y NIT</pan> -->
      </h1>
      <br>
      <!-- <h2>Created with love by <a href="https://github.com/pablorgarcia" target="_blank">--</a></h2> -->
      <?php
            $ID = $_GET['ID'];
            $sql = mysqli_query($conexion, "SELECT *
            FROM tmenjars
            WHERE tmenjars.ID_ingreso = '$ID' AND tmenjars.hora = 'dia'
            ");
            
            if (mysqli_num_rows($sql) > 0) {
              

            // $id = $row["id"];
            
            ?>
            <!-- <th style="background-color: #85b0fa;"> -->
            

      <table class="containerInfo">
      
        <thead>
          <tr>  
            <th style="background: #85b0fa ">
              <a href="form_menjars.php?ID=<?php echo $ID; ?>"><i class="fa-sharp fa-solid fa-plus"></i></a>
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
              <h1>mida</h1>
            </th>
            <th>
              <h1>Pes</h1>
            </th>
            <th>
              <h1>alimentsNoGrassos</h1>
            </th>
            <th>
              <h1>inapetenciaAnorexia</h1>
            </th>
            <th>
              <h1>protesisDental</h1>
            </th>
            <th>
              <h1>intolerancia</h1>
            </th>
            <th>
              <h1>dietaHabitual</h1>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php 
            while ($row = mysqli_fetch_assoc($sql))
          {
            $alimentsNoGrassos = $row["alimentsNoGrassos"];
            $necessitatsAjudes  = $row["necessitatsAjudes"];
            $inapetenciaAnorexia = $row["inapetenciaAnorexia"];
            $mida = $row["mida"];
            $pes = $row["pes"];
            $intolerancia = $row["intolerancia"];
            $dietaHabitual = $row["dietaHabitual"];
            $protesisDental = $row["protesisDental"];
            $dia = $row["dia"];
          ?>
          <tr>
            <td><?php echo $dia ?></td>
            <td><?php echo $mida ?></td>
            <td><?php echo $pes ?></td>
            <td><?php echo $alimentsNoGrassos ?></td>
            <td><?php echo $inapetenciaAnorexia ?></td>
            <td><?php echo $protesisDental ?></td>
            <td><?php echo $intolerancia ?></td>
            <td><?php echo $dietaHabitual ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
              <?php
          }else{
            echo "No tiene datos de la mañana";
          }
              ?>

      <!-- TARDAAAAAAAAA -->
      <?php
            $ID = $_GET['ID'];

            $sql = mysqli_query($conexion, "SELECT *
            FROM tmenjars
            WHERE tmenjars.ID_ingreso = '$ID' AND tmenjars.hora = 'tarde'
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
              <h1>DIA</h1>
            </th>
            <th>
              <h1>mida</h1>
            </th>
            <th>
              <h1>Pes</h1>
            </th>
            <th>
              <h1>alimentsNoGrassos</h1>
            </th>
            <th>
              <h1>inapetenciaAnorexia</h1>
            </th>
            <th>
              <h1>protesisDental</h1>
            </th>
            <th>
              <h1>intolerancia</h1>
            </th>
            <th>
              <h1>dietaHabitual</h1>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php 
            while ($row = mysqli_fetch_assoc($sql))
          {
            $alimentsNoGrassos = $row["alimentsNoGrassos"];
            $necessitatsAjudes  = $row["necessitatsAjudes"];
            $inapetenciaAnorexia = $row["inapetenciaAnorexia"];
            $mida = $row["mida"];
            $pes = $row["pes"];
            $intolerancia = $row["intolerancia"];
            $dietaHabitual = $row["dietaHabitual"];
            $protesisDental = $row["protesisDental"];
            $dia = $row["dia"];
          ?>
          <tr>
            <td><?php echo $dia ?></td>
            <td><?php echo $mida ?></td>
            <td><?php echo $pes ?></td>
            <td><?php echo $alimentsNoGrassos ?></td>
            <td><?php echo $inapetenciaAnorexia ?></td>
            <td><?php echo $protesisDental ?></td>
            <td><?php echo $intolerancia ?></td>
            <td><?php echo $dietaHabitual ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php
            }else{
              echo "no tiene datos de la tarde";
            }

      ?>
      <!-- NOCHEEEEEEEEEEEEE -->
      <?php
            $ID = $_GET['ID'];

            $sql = mysqli_query($conexion, "SELECT *
            FROM tmenjars
            WHERE tmenjars.ID_ingreso = '$ID' AND tmenjars.hora = 'noche'
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
              <h1>DIA</h1>
            </th>
            <th>
              <h1>mida</h1>
            </th>
            <th>
              <h1>Pes</h1>
            </th>
            <th>
              <h1>alimentsNoGrassos</h1>
            </th>
            <th>
              <h1>inapetenciaAnorexia</h1>
            </th>
            <th>
              <h1>protesisDental</h1>
            </th>
            <th>
              <h1>intolerancia</h1>
            </th>
            <th>
              <h1>dietaHabitual</h1>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php 
            while ($row = mysqli_fetch_assoc($sql))
          {
            $alimentsNoGrassos = $row["alimentsNoGrassos"];
            $necessitatsAjudes  = $row["necessitatsAjudes"];
            $inapetenciaAnorexia = $row["inapetenciaAnorexia"];
            $mida = $row["mida"];
            $pes = $row["pes"];
            $intolerancia = $row["intolerancia"];
            $dietaHabitual = $row["dietaHabitual"];
            $protesisDental = $row["protesisDental"];
            $dia = $row["dia"];
          ?>
          <tr>
            <td><?php echo $dia ?></td>
            <td><?php echo $mida ?></td>
            <td><?php echo $pes ?></td>
            <td><?php echo $alimentsNoGrassos ?></td>
            <td><?php echo $inapetenciaAnorexia ?></td>
            <td><?php echo $protesisDental ?></td>
            <td><?php echo $intolerancia ?></td>
            <td><?php echo $dietaHabitual ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php
            }else{
              echo "no tiene datos";
            }
      ?>
    </div>
  </div>

</body>

</html>