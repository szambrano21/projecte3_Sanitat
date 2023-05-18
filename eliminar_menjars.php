<?php 
include_once('connexiobbddsanitat.php');
$nHc = $_GET['nHc'];
$ID_ingreso = $_GET['ID'];

if(!empty($_POST)){
    $ID_menjar = $_POST["ID_menjar"];
    
    $sql_delete = mysqli_query($conexion, "DELETE FROM tmenjars WHERE tmenjars.ID_menjar = $ID_menjar");

    if($sql_delete){
        header("location: x.php");
    }else{
        echo "ERROR AL ELIMINAR";
    }

}else{

}


 if(empty($_REQUEST['ID_menjar'])){
    header("location: x.php");
   }
   else{

    $ID_menjar = $_REQUEST['ID_menjar'];

    $sql = mysqli_query($conexion, "SELECT ID_menjar,dia, ID_ingreso FROM tmenjars WHERE ID_menjar = $ID_menjar");

    $resultado = mysqli_num_rows($sql);


    if($resultado > 0){

        while ($row = mysqli_fetch_assoc($sql)) {
            $ID_menjar = $row["ID_menjar"];
            $ID_ingreso = $row["ID_ingreso"];
            $dia = $row["dia"];
        }
    }else{
        header("location: infoMenjars.php?nHc=$nHc&ID=$ID_ingreso");
    }

   }

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once("scripts.php")?>
</head>
<body>
    <?php include_once("header.php")?>
<br>
<br>
<br>




    <div style="margin-top: 100px"></div>
<br>

<div class="eliminar_Usuario">
    <h2>¿Estás seguro de eliminar esta proteína?</h2>

    <p>ID Menjar: <?php echo $ID_menjar ?></p>
    <p>ID: <?php echo $ID_ingreso ?></p>
    <p>Data: <?php echo $dia ?></p>
    
    <form method="post" action="">
        <a href="infoMenjars.php?nHc=<?php echo $nHc."&ID=".$ID_ingreso;?>" class="btn_cancel">Cancelar</a>
        <input type="submit" value="Aceptar" class="btn_ok">
        <input type="hidden" name="ID_menjar" value="<?php echo $ID_menjar; ?>">

    </form>

</div>



</body>
</html>
