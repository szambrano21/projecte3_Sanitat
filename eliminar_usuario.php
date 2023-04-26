<?php 
    include_once('connexiobbddsanitat.php');

if(!empty($_POST)){
    $dni_usuario = $_POST["DNI"];
    
    $sql_delete = mysqli_query($conexion, "DELETE FROM tusuaris WHERE DNI = '$dni_usuario'");

if($sql_delete){
    header("location: listadoUsuario.php");
}else{
    echo "ERROR AL ELIMINAR";
}

}


 if(empty($_REQUEST['DNI'])){
    
    header("location: listadoUsuario.php");
   }
   else{

    $dni_usuario = $_REQUEST['DNI'];

    $sql = mysqli_query($conexion, "SELECT nomUsuari, cognomUsuari,telefono, DNI, tipo FROM tusuaris WHERE DNI = '$dni_usuario'");

    $resultado = mysqli_num_rows($sql);


    if($resultado > 0){

        while ($row = mysqli_fetch_assoc($sql)) {

            $dni_usuario = $row["DNI"];
            $nombre = $row["nomUsuari"];
            $cognom = $row["cognomUsuari"];
            $tipo = $row["tipo"];
            $telefono = $row["telefono"];

        }
    }else{
        header("location: listadoUsuario.php");
    }

   }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once("scripts.php")?>
</head>
<body>
    <?php 
    include_once("header.php");
    
    if($_SESSION['tipo'] != 'admin'){
        header("location: index.php");

    }else if($_REQUEST['DNI'] == $_SESSION['DNI']){
        header("location: listadoUsuario.php");
    }

    ?>
<br>
<br>
<br>


    <div style="margin-top: 100px"></div>
<br>

<div class="eliminar_Usuario">
    <h2>¿Estás seguro de eliminar este usuario?</h2>

    <p>DNI: <?php echo $dni_usuario ?></p>
    <p>Nom: <?php echo $nombre ?></p>
    <p>Cognom: <?php echo $cognom ?></p>
    <p>Tipus: <?php echo $tipo ?></p>
    <p>Telefono: <?php echo $telefono ?></p>

    
    
    <form method="post" action="">
        <a href="listadoUsuario.php" class="btn_cancel">Cancelar</a>
        <input type="submit" value="Aceptar" class="btn_ok">
        <input type="hidden" name="DNI" value="<?php echo $dni_usuario; ?>">

    </form>

</div>


</body>

</html>

