<?php

$alert = '';


if(!empty($_SESSION['activo'])){
    header("location: inicial.php");

}else{


if(!empty($_POST)){
    if(empty($_POST["nom"]) || empty($_POST["cognom"]) || empty($_POST["DNI"]) || empty($_POST["nHc"]) || empty($_POST["dataNaixement"]) || empty($_POST["sexe"])  || empty($_POST["telefon"]) 
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
        $dataNaixement = $_POST["dataNaixement"];
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
        
        if($resultado > 0){
            $alert="<p class='msg_error'>El paciente ya existe</p>";
        }else{

            $query_insertar = mysqli_query($conexion, "INSERT INTO tdades (nom,cognom,DNI,nHc,dataNaixament,sexe,telefon,mail,direccio,personaContacte,telefonPersonsaContacte,relacioContacte)
            VALUES ('$DNI', '$nom', '$cognom', '$nHc', '$dataNaixement', '$sexe','$telefon', '$mail', '$direccio', '$personaContacte', '$telefonPersonsaContacte', '$relacioContacte')");

// INSERT INTO `tdades` (`nom`, `cognom`, `DNI`, `nHc`, `dataNaixament`, `sexe`, `telefon`, `mail`, `direccio`, `personaContacte`, `telefonPersonsaContacte`, `s`) 
// VALUES ('aaaaaaaaa', 'aaaaa', '3946798S', 'aaadeww2112', '1', 'a', '111', 'sa', 'wwww', 'wwww', '23321', 'wwq');


            if($query_insertar){
                $alert="<p class='msg_correcto'>El paciente ha sido creado correctamente</p>";
            }else{
                $alert="<p class='msg_error'>Error al crear al paciente</p>";
            }
        }

    }
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
        <div class="container_paciente">
            <div class="form_dades_container">
                <h1>Nuevo paciente</h1>
                <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>

                <form action="" id="validate" method="post">
                    <label for="nom">Nombre:</label>
                    <input type="text" name="nom" id="nom" ><br>

                    <label for="cognom">Apellido:</label>
                    <input type="text" name="cognom" id="cognom" ><br>

                    <label for="DNI">DNI:</label>
                    <input type="text" name="DNI" id="DNI" ><br>

                    <label for="nHc">Número de Historia Clínica:</label>
                    <input type="text" name="nHc" id="nHc" ><br>

                    <label for="dataNaixement">Fecha de Nacimiento:</label>
                    <input type="date" name="dataNaixement" id="dataNaixement" ><br>

                    <label for="sexe">Sexo:</label>
                    <select name="sexe" id="sexe" >
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                    </select><br>
                    
                    <label for="telefon">Teléfono:</label>
                    <input type="text" name="telefon" id="telefon"><br>

                    <label for="mail">Correo Electrónico:</label>
                    <input type="email" name="mail" id="mail" ><br>

                    <label for="direccio">Dirección:</label>
                    <input type="text" name="direccio" id="direccio" ><br>

                    <label for="personaContacte">Persona de Contacto:</label>
                    <input type="text" name="personaContacte" id="personaContacte"><br>

                    <label for="telefonPersonsaContacte">Teléfono de Contacto:</label>
                    <input type="tel" name="telefonPersonsaContacte" id="telefonPersonsaContacte" ><br>

                    <label for="relacioContacte">Relación con la Persona de Contacto:</label>
                    <input type="text" name="relacioContacte" id="relacioContacte" ><br>

                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</body>

</html>