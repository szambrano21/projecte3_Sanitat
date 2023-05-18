<?php

include_once('connexiobbddsanitat.php');

if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST["nombre"]) || empty($_POST["dni"]) || empty($_POST["password"]) || empty($_POST["tipo"]) || empty($_POST["clau_temporal"])) {

        $alert = "<p class='msg_error'>Todos los campos son obligatorios</p>";
    } else {
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $cognom = $_POST["cognomUsuari"];
        $telefono = $_POST["telefono"];
        $pass = md5(mysqli_real_escape_string($conexion, $_POST["password"]));

        $tipo = $_POST["tipo"];
        $clau_temporal = $_POST["clau_temporal"];


        $query = mysqli_query($conexion, "SELECT * FROM tusuaris WHERE DNI = '$dni'");
        $resultado = mysqli_fetch_assoc($query);

        if ($resultado > 0) {
            $alert = "<p class='msg_error'>El usuario ya existe</p>";
        } else {

            $query = mysqli_query($conexion, "SELECT * FROM tusuaris WHERE codi = '$clau_temporal' ");
            $resultado = mysqli_num_rows($query);

            if ($resultado > 0) {

                while ($row = mysqli_fetch_assoc($query)) {

                    $codi = $row["codi"];

                    if ($clau_temporal == $codi) {

                        $query_insertar = mysqli_query($conexion, "INSERT INTO tusuaris (DNI, tipo, nomUsuari, cognomUsuari, telefono, Password)
                        VALUES('$dni','$tipo','$nombre',' $cognom ',' $telefono ','$pass')");

                        if ($query_insertar) {
                            $alert = "<p class='msg_correcto'>L'usuari ha sigut creat correctament</p>";
                        } else {
                            $alert = "<p class='msg_error'>Error al crear el usuario</p>";
                        }
                    } else {
                        $alert = "<p class='msg_error'>La clau es incorrecta</p>";
                    }
                }
            } else {
                $alert = "<p class='msg_error'>Error al crear el usuario</p>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once("scripts.php"); ?>

    <script>
        window.onload = function() {

            let input_clau = document.getElementById('clau_temporal');
            input_clau.value = "";

        }
    </script>

    <style>
        .container_login {
            flex-direction: column;
        }

        .login label {
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .container_login .submitRegister , .container_login a{

            color: #fff;
            border: none;
            background-color: #1F354A;
            border-radius: 25px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 20px;
            display: flex;
            width: 100%;
            text-decoration: none;
            max-width: 300px;
            align-items: center;
            justify-content: center;
            margin: auto;
        }

        input,
        select {
            min-height: 30px;
            font-size: 16px;
        }
    </style>

</head>

<body>
    <?php

    session_start();

    ?>







    <div class="container_login">
        <h1>REGISTRO USUARIO</h1>

        <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
        <hr>
        <form class="login" action="#" id="registro" method="post" style="max-width: 450px">
            <label for="nombre">Nom
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            </label>

            <label for="cognomUsuari">Cognom Usuari
                <input type="text" name="cognomUsuari" id="cognomUsuari" placeholder="cognomUsuari">
            </label>
            <label for="dni">DNI
                <input type="text" name="dni" id="dni" placeholder="DNI" minlength="9" maxlength="9">
            </label>
            <label for="telefono">telefono
                <input type="text" name="telefono" id="telefono" placeholder="telefono" minlength="9" maxlength="9">
            </label>
            <label for="password">Contrasenya
                <input type="password" name="password" id="password" placeholder="Contrasenya">
            </label>
            <label for="tipo">Tipus Usuari:
                <select name="tipo" id="tipo">
                    <option value="usuario">usuari</option>
                </select>
            </label>

            <label for="clau_temporal">Clau temporal
                <input type="password" name="clau_temporal" id="clau_temporal" placeholder="clau_temporal">
            </label>

            <input type="submit" value="REGISTRAR" class="submitRegister" style="margin-bottom: 10px">
            <a href="index.php" class="button">TORNAR</a>


        </form>

    </div>
</body>

</html>