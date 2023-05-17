<?php

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
        
        if($resultado > 0){
            $alert="<p class='msg_error'>El paciente ya existe</p>";
        }else{

            $query_insertar = mysqli_query($conexion, "INSERT INTO tdades (nom,cognom,DNI,nHc,dataNaixament,sexe,telefon,mail,direccio,personaContacte,telefonPersonsaContacte,relacioContacte)
            VALUES ('$nom', '$cognom','$DNI', '$nHc', '$dataNaixament', '$sexe','$telefon', '$mail', '$direccio', '$personaContacte', '$telefonPersonsaContacte', '$relacioContacte')");

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

                <form action="" id="validate" method="post" class="commom_form">
                <fieldset>
                    <label for="nom">Nom:
                        <input type="text" id="nom" name="nom">
                    </label>
                    <label for="cognom">Cognoms:
                        <input type="text" id="cognom" name="cognom">
                    </label>
                </fieldset>



                <fieldset>
                    <label for="nHc ">Num. HC:
                        <input type="text" id="nHc" name="nHc">
                    </label>
                    <label for="dataNaixament">Data de naixement:
                        <input type="date" id="dataNaixament" name="dataNaixament">
                    </label>
                </fieldset>

                <fieldset>
                    <label for="DNI">DNI:
                        <input type="text" id="DNI" name="DNI">
                    </label>
                    <label for="sexe">Sexe:
                        <select id="sexe" name="sexe">
                            <option value="" selected>Select</option>
                            <option value="Home">Home</option>
                            <option value="dona">Dona</option>
                        </select>
                    </label>
                </fieldset>
                    
                <fieldset>
                    <label for="telefon">Telèfon:
                        <input type="tel" id="telefon" name="telefon">
                    </label>
                    <label for="mail">Correu electrònic:
                        <input type="email" id="mail" name="mail">
                    </label>
                </fieldset>

                <fieldset>
                    <label for="direccio">Direcció:
                        <input type="text" id="direccio" name="direccio">
                    </label>
                    <label for="personaContacte">Persona de contacte:
                        <input type="text" id="personaContacte" name="personaContacte">
                    </label>
                </fieldset>

                <fieldset>
                    <label for="telefonPersonsaContacte">Telèfon de persona de contacte:
                        <input type="tel" id="telefonPersonsaContacte" name="telefonPersonsaContacte">
                    </label>
                    <label for="relacioContacte">Relació amb la persona de contacte:
                        <input type="text" id="relacioContacte" name="relacioContacte">
                    </label>
                </fieldset>

                <input type="submit" value="Submit" class="submitForm">

                </form>
            </div>
        </div>
    </div>
</body>

</html>