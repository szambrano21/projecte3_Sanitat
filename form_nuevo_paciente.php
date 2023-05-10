<?php

$alert = '';


if(!empty($_SESSION['activo'])){
    header("location: inicial.php");
}else{


if(!empty($_POST)){
    if(empty($_POST["nom"]) || empty($_POST["cognom"]) || empty($_POST["DNI"]) || empty($_POST["nHc"]) || empty($_POST["dataNaixement"]) || empty($_POST["sexe"])  || empty($_POST["telefon"]) 
    || empty($_POST["mail"])  || empty($_POST["direccio"]) || empty($_POST["personaContacte	"])  || empty($_POST["telefonPersonsaContacte"])
    || empty($_POST["relacioContacte"])
    )  
    {
        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
    }else{
        include_once('connexiobbddsanitat.php');
        $nHc = mysqli_real_escape_string($conexion, $_POST["nHc"]);
        

/*        $pass = md5(mysqli_real_escape_string($conexion, $_POST["password"]));
*/
        $query = mysqli_query($conexion, "SELECT * FROM tusuaris WHERE nHc = '$nHc'");
        $resultado = mysqli_num_rows($query);
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
            <div class="form_container">
                <h1>Nuevo paciente</h1>
                <form>
                    <div>
                        <label for="nom">Nom:</label>
                        <input type="text" id="nom" name="nom"><br><br>
                    </div>

                    <div>
                        <label for="cognoms">Cognoms:</label>
                        <input type="text" id="cognoms" name="cognoms"><br><br>
                    </div>

                    <div>
                        <label for="num-hc">Num. HC:</label>
                        <input type="text" id="num-hc" name="num-hc"><br><br>
                    </div>

                    <div>
                        <label for="dni">DNI:</label>
                        <input type="text" id="dni" name="dni"><br><br>
                    </div>

                    <div>
                        <label for="data-naixement">Data de naixement:</label>
                        <input type="date" id="data-naixement" name="data-naixement"><br><br>
                    </div>

                    <div>
                        <label for="sexo">Sexe:</label>
                        <select id="sexo" name="sexo">
                            <option value="" selected>Select</option>
                            <option value="hombre">Home</option>
                            <option value="mujer">Dona</option>
                        </select><br><br>
                    </div>

                    <div>
                        <label for="telefon">Telèfon:</label>
                        <input type="tel" id="telefon" name="telefon"><br><br>
                    </div>

                    <div>
                        <label for="mail">Correu electrònic:</label>
                        <input type="email" id="mail" name="mail"><br><br>
                    </div>

                    <div>
                        <label for="direccio">Direcció:</label>
                        <input type="text" id="direccio" name="direccio"><br><br>
                    </div>

                    <div>
                        <label for="contacte">Persona de contacte:</label>
                        <input type="text" id="contacte" name="contacte"><br><br>
                    </div>

                    <div>
                        <label for="telefon-contacte">Telèfon de persona de contacte:</label>
                        <input type="tel" id="telefon-contacte" name="telefon-contacte"><br><br>
                    </div>

                    <div>
                        <label for="relacio-contacte">Relació amb la persona de contacte:</label>
                        <input type="text" id="relacio-contacte" name="relacio-contacte"><br><br>
                    </div>

                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</body>

</html>