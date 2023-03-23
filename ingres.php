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
            <h2>Dades generals</h2>
            <div>
                <label for="date">Data d'ingres:</label><br>
                <input type="date" id="date" name="date">
            </div>        
            <div>
                <label for="asignacioCama">Asignación de cama:</label><br>
                <input type="text" id="asignacioCama" name="asignacioCama">
            </div>
            <div>
                <label for="procedencia" class="procedencia">Procedencia</label>
                <select class="style_procedencia" name="procedencia" id="procedencia">
                    <option selected>Selecciona una opcion</option>
                    <option value="trasllat">Trasllat</option>
                    <option value="urgencies">Urgencies</option>
                    <option value="programat">Programat</option>
                    <option value="altre">Altres</option>
                </select>
                <span>
                    <textarea class="altres"></textarea>
                </span>
            </div>
            <div>
                <label for="motiuIngres">Motiu d'ingres/ Diagnostic:</label><br>
                <input type="text" id="motiuIngres" name="motiuIngres">
            </div>
            <div>
                <label for="tractamentIngres">Tratamiento domiciliario:</label><br>
                <input type="text" id="tractamentIngres" name="tractamentIngres">
            </div>              

            <div>
                <p>Alergies:</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="">
                    <label class="form-check-label" for="">
                        SI
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="" checked>
                    <label class="form-check-label" for="">
                        NO
                    </label>
                </div>
                <div>
                    <label for="tipus">Tipus:</label><br>
                    <input type="text" id="tipus" name="tipus">
                </div>
            </div>
            <div>
                <label for="habitsToxics">Hàbits tòxics:</label><br>
                <input type="text" id="habitsToxics" name="habitsToxics">
            </div>
            <div>
                <label for="antecedentsPatologics">Hàbits tòxics:</label><br>
                <input type="text" id="antecedentsPatologics" name="antecedentsPatologics">
            </div>
            <div>
                <label for="entornFamiliar">Entor Familiar:</label><br>
                <input type="text" id="entornFamiliar" name="entornFamiliar">
            </div>

        </div>
        <div>
            <h2>Necessitats respiratòries</h2>
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
            <h2>Necessitats de menjar i beguda</h2>
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
