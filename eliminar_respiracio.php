<?php 
include_once('connexiobbddsanitat.php');
$nHc = $_GET['nHc'];
$ID_ingreso = $_GET['ID'];

if(!empty($_POST)){
    $ID_resp = $_POST["ID_resp"];
    
    $sql_delete = mysqli_query($conexion, "DELETE FROM trespiratories WHERE trespiratories.ID_resp = $ID_resp");

    if($sql_delete){
        header("location: x.php");
    }else{
        echo "ERROR AL ELIMINAR";
    }

}else{

}


 if(empty($_REQUEST['ID_resp'])){
    header("location: x.php");
   }
   else{

    $ID_resp = $_REQUEST['ID_resp'];

    $sql = mysqli_query($conexion, "SELECT ID_resp,dia, ID_ingreso FROM trespiratories WHERE ID_resp = $ID_resp");

    $resultado = mysqli_num_rows($sql);


    if($resultado > 0){

        while ($row = mysqli_fetch_assoc($sql)) {
            $ID_resp = $row["ID_resp"];
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

    <p>ID Menjar: <?php echo $ID_resp ?></p>
    <p>ID: <?php echo $ID_ingreso ?></p>
    <p>Data: <?php echo $dia ?></p>
    
    <form method="post" action="">
        <a href="infoMenjars.php?nHc=<?php echo $nHc."&ID=".$ID_ingreso;?>" class="btn_cancel">Cancelar</a>
        <input type="submit" value="Aceptar" class="btn_ok">
        <input type="hidden" name="ID_resp" value="<?php echo $ID_resp; ?>">

    </form>

</div>



</body>
</html>
