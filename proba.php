<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari paciente</title>
</head>
<body>

    <form action="proba.php">
        <div>
            <label for="dni">Name:</label><br>
            <input type="text" id="dni" name="dni">
        </div>
        <div>
            <label for="nHC">Apellido:</label><br>
            <input type="text" id="nHC" name="nHC"><br><br>
        </div>
        <div>
            <label for="nombre_complet">Nombre completo:</label><br>
            <input type="text" id="nombre_complet" name="nombre_complet"><br><br>
        </div>
        <div>
            <label for="data_nacimiento">Data de nacimiento:</label><br>
            <input type="text" id="data_nacimiento" name="data_nacimiento"><br><br>
        </div>
        <div>
            <label for="sexo">Sexo:</label><br>
            <input type="text" id="sexo" name="sexo"><br><br>
        </div>
        <div>
            <label for="telefono">Telefono:</label><br>
            <input type="text" id="telefono" name="telefono">
        </div>                        
        <div>
            <label for="mail">Correo electronico:</label><br>
            <input type="text" id="mail" name="mail">
        </div>
        <div>
            <label for="direccion">direccion:</label><br>
            <input type="text" id="direccion" name="direccion">
        </div>
        <div>
            <label for="persona_contacto">Persona de contacto:</label><br>
            <input type="text" id="persona_contacto" name="persona_contacto">
        </div>
        
        <div>
            <label for="telefono_personaContacto">Telefono de la persona de contacto:</label><br>
            <input type="text" id="telefono_personaContacto" name="telefono_personaContacto">
        </div>

        <div>
            <label for="relacioPersonaContacte">Relacion de la persona de contacto:</label><br>
            <input type="text" id="relacioPersonaContacte" name="relacioPersonaContacte">
        </div>

        <input type="submit" value="Submit">

    </form> 
</body>
</html>
