<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/validate_ingres.js"></script>
    <title>Formulari paciente</title>
</head>
<body>

    <form action="proba.php">
        <div>
            <label for="dni">DNI:</label><br>
            <input type="text" id="dni" name="dni">
        </div>
        <div>
            <label for="nHC">nHC:</label><br>
            <input type="text" id="nHC" name="nHC"><br><br>
        </div>
        <div>
            <label for="nom_complet">Nombre completo:</label><br>
            <input type="text" id="nom_complet" name="nom_complet"><br><br>
        </div>
        <div>
            <label for="data_naixement">Data de nacimiento:</label><br>
            <input type="date" id="data_naixement" name="data_naixement"><br><br>
        </div>
        <div>
            <label for="sexe">Sexo:</label><br>
            <input type="text" id="sexe" name="sexe">
        </div>
        <div>
            <label for="telefon">Telefon:</label><br>
            <input type="text" id="telefon" name="telefon">
        </div>                        
        <div>
            <label for="mail">Correo electronico:</label><br>
            <input type="text" id="mail" name="mail">
        </div>
        <div>
            <label for="direccio">Direccio:</label><br>
            <input type="text" id="direccio" name="direccio">
        </div>
        <div>
            <label for="personaContacte">Persona de contacte:</label><br>
            <input type="text" id="personaContacte" name="personaContacte">
        </div>
        
        <div>
            <label for="telefon_personaContacto">Telefon de la persona de contacto:</label><br>
            <input type="text" id="telefon_personaContacto" name="telefon_personaContacto">
        </div>

        <div>
            <label for="relacioPersonaContacte">Relació de la persona de contacto:</label><br>
            <input type="text" id="relacioPersonaContacte" name="relacioPersonaContacte">
        </div>

        <input type="submit" value="Submit">

    </form> 
</body>
</html>
