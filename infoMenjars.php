<?php include_once("scripts.php");
include_once('connexiobbddsanitat.php');
$nHc = $_GET['nHc'];
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/infoStyles.css">
</head>
<style>
 @charset "UTF-8";
 @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
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
              <a href="form_menjars.php?nHc=<?php echo $nHc."&ID=".$ID; ?>"><i class="fa-sharp fa-solid fa-plus"></i></a>
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
            $ID_menjar = $row["ID_menjar"];
            $ID_ingreso = $row["ID_ingreso"];
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
            <td style="display:table-cell; width:auto; background:none;"><a href="editar_menjars.php?nHc=<?php echo $nHc."&ID=".$ID."&data=".$dia;?>" style="color:red;"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td style="display:table-cell; width:auto; background:none;"><a href="eliminar_menjars.php?nHc=<?php echo $nHc."&ID_menjar=".$ID_menjar."&ID=".$ID_ingreso;?>" style="color:red;"><i class="fa-solid fa-trash"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
              <?php
          }else{
            // echo "No tiene datos de la mañana";
          
            ?>
            <table class="containerInfo" style="width: 30%;">
              <thead>
                <tr>
                  <th>Afegir dades del mati</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th><a href="form_menjars.php?nHc=<?php echo $nHc."&ID=".$ID; ?>"><i class="fa-sharp fa-solid fa-plus"></i></a></th>
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
            FROM tmenjars
            WHERE tmenjars.ID_ingreso = '$ID' AND tmenjars.hora = 'tarda'
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
            $ID_menjar = $row["ID_menjar"];
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
            <td style="display:table-cell; width:auto; background:none;"><a href="editar_menjars.php?nHc=<?php echo $nHc."&ID=".$ID."&data=".$dia;?>" style="color:red;"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td style="display:table-cell; width:auto; background:none;"><a href="eliminar_menjars.php?nHc=<?php echo $nHc."&ID_menjar=".$ID_menjar."&ID=".$ID_ingreso;?>" style="color:red;"><i class="fa-solid fa-trash"></i></a></td>

          </tr>
          <?php 
          } 
          ?>
        </tbody>
      </table>
      <?php
          }else{
            // echo "No tiene datos de la mañana";
          
            ?>
            <table class="containerInfo" style="width: 30%;">
              <thead>
                <tr>
                  <th>Afegir dades de la tarda</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <th><a href="form_respiracio.php?nHc=<?php echo $nHc."&ID=".$ID; ?>"><i class="fa-sharp fa-solid fa-plus"></i></a></th>
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
            FROM tmenjars
            WHERE tmenjars.ID_ingreso = '$ID' AND tmenjars.hora = 'nit'
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
            <th>
              <h1>Editar</h1>
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
            $ID_menjar = $row["ID_menjar"];
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
            <td style="display:table-cell; width:auto; background:none;"><a href="editar_menjars.php?nHc=<?php echo $nHc."&ID=".$ID."&data=".$dia;?>" style="color:red;"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td style="display:table-cell; width:auto; background:none;"><a href="eliminar_menjars.php?nHc=<?php echo $nHc."&ID_menjar=".$ID_menjar."&ID=".$ID_ingreso;?>" style="color:red;"><i class="fa-solid fa-trash"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php
          }else{
            // echo "No tiene datos de la mañana";
          
            ?>
            <table class="containerInfo" style="width: 30%;">
              <thead>
                <tr>
                  <th>Afegir dades de la nit</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <th><a href="form_menjars.php?nHc=<?php echo $nHc."&ID=".$ID; ?>"><i class="fa-sharp fa-solid fa-plus"></i></a></th>
                </tr>
              </tbody>
            </table>
            
            <?php
          }
          
              ?>
    </div>
  </div>

</body>

</html>