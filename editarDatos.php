<?php
        include_once('connexiobbddsanitat.php');

$alert = '';


if(!empty($_SESSION['activo'])){
    header("location: inicial.php");

}else{


if(!empty($_POST)){
    if(empty($_POST["nom"]) || empty($_POST["cognom"]) || empty($_POST["DNI"]) || empty($_POST["nHc"]) || empty($_POST["dataNaixament"]) || empty($_POST["sexe"])  || empty($_POST["telefon"]) 
    || empty($_POST["mail"])  || empty($_POST["direccio"]) || empty($_POST["personaContacte"])  || empty($_POST["telefonPersonsaContacte"])
    || empty($_POST["relacioContacte"])
    )  
    {
        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
    }else{
        include_once('connexiobbddsanitat.php');
        // $nHc = mysqli_real_escape_string($conexion, $_POST["nHc"]);
        $nom = $_POST["nom"];
        $cognom = $_POST["cognom"];
        $DNI = $_POST["DNI"];
        $nHc = $_POST["nHc"];
        $dataNaixament = $_POST["dataNaixament"];
        $sexe = $_POST["sexe"];
        $telefon = $_POST["telefon"];
        $mail = $_POST["mail"];
        $direccio = $_POST["direccio"];
        $personaContacte = $_POST["personaContacte"];
        $telefonPersonsaContacte = $_POST["telefonPersonsaContacte"];
        $relacioContacte = $_POST["relacioContacte"];

        $_SESSION['nHc'] = $nHc;

        $query = mysqli_query($conexion, "SELECT * FROM tdades WHERE nHc = '$nHc'");
        $resultado = mysqli_num_rows($query);
        
        
            // $sql_update = mysqli_query($conexion, "UPDATE tusuaris
            // SET nomUsuari = '$nombre', tipo = '$tipo', DNI = '$dni', Password = '$pass'
            // WHERE DNI = '$dni_usuario'");

            $query_insertar = mysqli_query($conexion, "UPDATE tdades 
            SET  nom = '$nom', cognom = '$cognom',DNI = '$DNI', nHc = '$nHc', dataNaixament = '$dataNaixament', sexe = '$sexe', telefon = '$telefon', mail = '$mail', direccio = '$direccio', personaContacte = '$personaContacte', telefonPersonsaContacte = '$telefonPersonsaContacte', relacioContacte = '$relacioContacte'
            WHERE DNI = '$DNI'");

            // VALUES ('$DNI', '$nom', '$cognom', '$nHc', '$dataNaixement', '$sexe','$telefon', '$mail', '$direccio', '$personaContacte', '$telefonPersonsaContacte', '$relacioContacte')");

// INSERT INTO `tdades` (`nom`, `cognom`, `DNI`, `nHc`, `dataNaixament`, `sexe`, `telefon`, `mail`, `direccio`, `personaContacte`, `telefonPersonsaContacte`, `s`) 
// VALUES ('aaaaaaaaa', 'aaaaa', '3946798S', 'aaadeww2112', '1', 'a', '111', 'sa', 'wwww', 'wwww', '23321', 'wwq');


            if($query_insertar){
                $alert="<p class='msg_correcto'>El paciente ha sido actualizado correctamente</p>";
            }else{
                $alert="<p class='msg_error'>Error al actualizar el usuario</p>";
            }
        }

    }
}

/* aqui revisarrrrrrrrrrrrrrr */
$DNI = $_GET['DNI'];
// $IDFarmaco = $_GET['id_farmaco'];

$sql = mysqli_query($conexion,"SELECT * FROM tdades WHERE DNI = '$DNI'");

$resultado_sql = mysqli_num_rows($sql);

if($resultado_sql == 0){
header("location: inici.php");
}
else{
$option = '';
while($row = mysqli_fetch_assoc($sql)){
    $DNI = $row['DNI'];
    $nom = $row['nom'];
    $cognom = $row['cognom'];
    $nHc = $row['nHc'];
    $dataNaixament = $row['dataNaixament'];
    $sexe = $row['sexe'];
    $telefon = $row['telefon'];
    $mail = $row['mail'];
    $direccio = $row['direccio'];
    $personaContacte = $row['personaContacte'];
    $telefonPersonsaContacte = $row['telefonPersonsaContacte'];
    $relacioContacte = $row['relacioContacte'];


}

}


?>

<style>
    .form_container form {
        width: 100%;
        background-color: lightcyan;
        padding: 60px;
    }

    .form_container h1 {
        align-items: center;
        text-align: center;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("scripts.php") ?>

    <title>Tabla Paciente</title>
</head>

<body>
    <?php include_once("header.php") ?>
    <div class="container_general">
        <div class="second_container">
            <div class="form_dades_container">
                <h1>Edita datos del paciente</h1>
                <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>

                <form action="" id="validate" method="post" class="commom_form">
                    <fieldset>
                        <label for="nom">Nom:
                            <input type="text" name="nom" id="nom" value="<?php echo $nom ?>">
                        </label>
                        <label for="cognom">Cognoms:
                            <input type="text" name="cognom" id="cognom" value="<?php echo $cognom ?>">
                        </label>
                    </fieldset>
                    
                    <fieldset>

                        <label for="nHc">Número de Historia Clínica:
                            <input type="text" name="nHc" id="nHc" value="<?php echo $nHc ?>">
                        </label>
                        <label for="dataNaixament">Fecha de Nacimiento:
                            <input type="text" name="dataNaixament" id="dataNaixament" value="<?php echo $dataNaixament ?>">
                        </label>    
                    </fieldset>
                        
                    <fieldset>
                        <label for="DNI">DNI:
                            <input type="text" name="DNI" id="DNI" value="<?php echo $DNI ?>">
                        </label>
                        <label for="sexe">Sexo:
                            <select name="sexe" id="sexe">
                                <option value="masculino" <?php echo ($sexe == 'masculino') ? 'selected' : ''; ?>>Masculino</option>
                                <option value="femenino" <?php echo ($sexe == 'femenino') ? 'selected' : ''; ?>>Femenino</option>
                                <option value="otro" <?php echo ($sexe == 'otro') ? 'selected' : ''; ?>>Otro</option>
                            </select>
                        </label>
                    </fieldset>
                    <fieldset>
                        <label for="telefon">Teléfono:
                            <input type="text" name="telefon" id="telefon" value="<?php echo $telefon ?>">
                        </label>
                        <label for="mail">Correo Electrónico:
                            <input type="text" name="mail" id="mail" value="<?php echo $mail ?>">
                        </label>
                    </fieldset>
                    <fieldset>
                        <label for="direccio">Dirección:
                            <input type="text" name="direccio" id="direccio" value="<?php echo $direccio ?>"><br>
                        </label>
                        <label for="personaContacte">Persona de Contacto:
                            <input type="text" name="personaContacte" id="personaContacte" value="<?php echo $personaContacte ?>"><br>
                        </label>
                    </fieldset>

                    <fieldset>
                        <label for="telefonPersonsaContacte">Teléfono de Contacto:
                            <input type="text" name="telefonPersonsaContacte" id="telefonPersonsaContacte" value="<?php echo $telefonPersonsaContacte ?>"><br>
                        </label>
                        <label for="relacioContacte">Relación con la Persona de Contacto:
                            <input type="text" name="relacioContacte" id="relacioContacte" value="<?php echo $relacioContacte ?>"><br>
                        </label>
                    </fieldset>
                    <input type="submit" value="Enviar" >
                </form>
            </div>
        </div>
    </div>
</body>

</html>