<?php

include_once('connexiobbddsanitat.php');

if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST["nombre"]) || empty($_POST["dni_usuario"]) || empty($_POST["tipo"])) {
        $alert = "<p class='msg_error'>Todos los campos son obligatorios</p>";
    } else {

        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $dni_usuario = $_POST["dni_usuario"];
        $pass = md5($_POST["password"]);
        $tipo = $_POST["tipo"];

        $query = mysqli_query($conexion, "SELECT * FROM tusuaris WHERE DNI = '$dni'

        ");
        $resultado = mysqli_fetch_assoc($query);

        if ($resultado > 0) {
            $alert = "<p class='msg_error'>El usuario ya existe</p>";
        } else {
            if (empty($_POST['password'])) {
                $sql_update = mysqli_query($conexion, "UPDATE tusuaris
                SET nomUsuari = '$nombre', tipo = '$tipo', DNI = '$dni'
                WHERE DNI = '$dni_usuario'");
            } else {
                $sql_update = mysqli_query($conexion, "UPDATE tusuaris
                SET nomUsuari = '$nombre', tipo = '$tipo', DNI = '$dni', Password = '$pass'
                WHERE DNI = '$dni_usuario'");
            }
            if ($sql_update) {
                $alert = "<p class='msg_correcto'>El usuario ha sido actualizado correctamente</p>";
            } else {
                $alert = "<p class='msg_error'>Error al actualizar el usuario</p>";
            }
        }
    }
}

/* Mostrar datos */
if (empty($_GET['DNI'])) {
    header("location: listadoUsuario.php");
}
/* aqui revisarrrrrrrrrrrrrrr */
$dni = $_GET['DNI'];
$dni_usuario = $_GET['DNI'];

$sql = mysqli_query($conexion, "SELECT DNI, tipo, nomUsuari, Password FROM tusuaris WHERE DNI = '$dni'");

$resultado_sql = mysqli_num_rows($sql);

if ($resultado_sql == 0) {
    header("location: listadoUsuario.php");
} else {
    $option = '';
    while ($row = mysqli_fetch_assoc($sql)) {

        $nombre = $row['nomUsuari'];
        $tipo = $row['tipo'];

        if ($tipo == "admin") {
            $option = "<option value='admin' select>admin</option>";
        } else if ($tipo == "editor") {
            $option = "<option value='editor' select>editor</option>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once("scripts.php") ?>
    <script src="js/validate_update_user.js"></script>
    <link rel="stylesheet" href="css/validate.css">
</head>

<body>
    <?php

    include_once("header.php");

    if ($_SESSION['tipo'] != 'admin') {
        header("location: index.php");
    }
    ?>

    <br>
    <br>
    <br>

    <div class="form_dades_container">
        <h1>ACTUALIZAR USUARIO</h1>
        <hr>
        <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
        <form class="commom_form" action="" id="validate" method="post" enctype="multipart/form-data">
            <input type="hidden" name="dni_usuario" value="<?php echo $dni_usuario; ?>">
            <fieldset>
                <label for="nombre"> Nom:
                    <input id="nombre" name="nombre" type="text" placeholder="Nom" value="<?php echo $nombre; ?>" />
                </label>
                <label for="dni">DNI
                    <input type="text" name="dni" id="dni" placeholder="DNI" minlength="9" maxlength="9" value="<?php echo $dni; ?>">
                </label>
            </fieldset>

            <fieldset>
                <label for="password">Contraseña
                    <input type="password" name="password" id="password" placeholder="Contraseña">
                </label>
                <label for="tipo"> Tipo de Usuario
                    <select name="tipo" id="tipo" class="noPrimerItem">
                        <option value="admin">admin</option>
                        <option value="editor">editor</option>
                    </select>
                </label>
            </fieldset>

            <input class="submitForm" type="submit" value="Actualizar usuario">
        </form>
    </div>

</body>

</html>