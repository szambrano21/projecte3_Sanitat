<?php

include_once('connexiobbddsanitat.php');

if(!empty($_POST)){
    $alert="";
    if(empty($_POST["nombre"]) || empty($_POST["dni"]) || empty($_POST["password"]) || empty($_POST["tipo"])){

        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
    }else{

        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $cognom = $_POST["cognomUsuari"];
        $telefono = $_POST["telefono"];
        $pass = md5($_POST["password"]);
        $tipo = $_POST["tipo"];


        $query = mysqli_query($conexion,"SELECT * FROM tusuaris WHERE DNI = '$dni'");
        $resultado = mysqli_fetch_assoc($query);

        if($resultado > 0){
            $alert="<p class='msg_error'>El usuario ya existe</p>";
        }else{

            $query_insertar = mysqli_query($conexion, "INSERT INTO tusuaris (DNI, tipo, nomUsuari, cognomUsuari, telefono, Password)
            VALUES('$dni','$tipo','$nombre',' $cognom ',' $telefono ','$pass')");

            if($query_insertar){
                $alert="<p class='msg_correcto'>L'usuari ha sigut creat correctament</p>";
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



<script src="js/validate_user.js"></script>
<link rel="stylesheet" href="css/validate.css">

</head>
<body>
<?php 

session_start();

?>



    


    <div class="container_general">
            <div class="second_container">
                <div class="form_dades_container">
        <h1>CREAR USUARIO</h1>
        <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
        <hr>
        <form action="" id="validate" method="post">
            <fieldset>
                <label for="nombre">Nom
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                </label>
            
                <label for="cognomUsuari">Cognom Usuari
                    <input type="text" name="cognomUsuari" id="cognomUsuari" placeholder="cognomUsuari" >
                </label>
            </fieldset>
            <fieldset>
                <label for="dni">DNI
                <input type="text" name="dni" id="dni" placeholder="DNI" minlength="9" maxlength="9">
                </label>
                <label for="telefono">telefono
                    <input type="text" name="telefono" id="telefono" placeholder="telefono" minlength="9" maxlength="9">
                </label>
            </fieldset>
            <fieldset>
                <label for="password">Contrasenya
                    <input type="password" name="password" id="password" placeholder="Contrasenya">
                </label>    
                <label for="tipo">Tipus Usuari:
                    <select name="tipo" id="tipo">
                        <option value="admin">admin</option>
                        <option value="usuario">usuari</option>
                    </select>
                </label>
            </fieldset>
            
            <input type="submit" value="Crear Usuari" class="submitForm">

        </form>

    </div>
</div>
</body>
</html>