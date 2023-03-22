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

    <form action="ingres.php">
        <div>
            <h2>Datos generales</h2>
            <div>
                <label for="dni">Fecha:</label><br>
                <input type="date" id="date" name="date">
            </div>        
            <div>
                <label for="asignacionCama">Asignación de cama:</label><br>
                <input type="text" id="asignacionCama" name="asignacionCama">
            </div>
            <div>
                <label for="asignacionCama">Asignación de cama:</label><br>
                <input type="text" id="asignacionCama" name="asignacionCama">
            </div>        
        </div>
        <div>
            <h2>Necesidades respiratorias</h2>
            <div>
                <label for="dni">Name:</label><br>
                <input type="text" id="dni" name="dni">
            </div>        
            <div>
                <label for="dni">Name:</label><br>
                <input type="text" id="dni" name="dni">
            </div>        
        </div>
        <div>
            <h2>Necesidades de comer y beber</h2>
            <div>
                <label for="dni">Name:</label><br>
                <input type="text" id="dni" name="dni">
            </div>        
            <div>
                <label for="dni">Name:</label><br>
                <input type="text" id="dni" name="dni">
            </div>        
        </div>
        <input type="submit" value="Submit">

    </form> 
</body>
</html>
