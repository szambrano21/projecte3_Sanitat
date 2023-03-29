<?php
if(!empty($_POST)){
    $alert="";
    if(empty($_POST["nombre"]) || empty($_POST["dni"]) || empty($_POST["password"]) || empty($_POST["tipo"])){

        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
    }else{

        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $pass = md5($_POST["password"]);
        $tipo = $_POST["tipo"];


        $query = mysqli_query($conexion,"SELECT * FROM tusuario WHERE DNI = '$dni'");
        $resultado = mysqli_fetch_assoc($query);

        if($resultado > 0){
            $alert="<p class='msg_error'>El usuario ya existe</p>";
        }else{

            $query_insertar = mysqli_query($conexion, "INSERT INTO tusuario (DNI, Tipo, NombreUsuario, Password)
            VALUES('$dni','$tipo','$nombre','$pass')");

            if($query_insertar){
                $alert="<p class='msg_correcto'>El usuario ha sido creado correctamente</p>";
            }else{
                $alert="<p class='msg_error'>Error al crear el usuario</p>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once("scripts.php"); ?>

<style>
    body{
        display: flex;
    }

    @media screen and (max-width: 700px) {
        body{
        display: initial;
    }

}

    
</style>
</head>
<body>
    <?php 
    include_once("header.php");
    if($_SESSION['tipo'] != 'admin'){
        header("location: inicial.php");
    }
    
    ?>


<div class="container_general">
    <div class="espacio_arriba"></div>
    <div class="container_registrar">
        <h1>CREAR USUARIO</h1>
        <hr>
        <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
        <form action="" id="validate" method="post">
            <label for="nombre">Nom</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">


            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" placeholder="DNI" minlength="9" maxlength="9">


            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Contraseña">


            <label for="tipo">Tipus Usuari:</label>

            <select name="tipo" id="tipo">
                <option value="admin">admin</option>
                <option value="usuario">usuari</option>
            </select>

            <input class="btn_guardar" type="submit" value="Crear usuario">

        </form>

    </div>
</div>
</body>
</html>