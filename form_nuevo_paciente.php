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
    <!-- <div class="container_general"> -->
    <div class="form_dades_container">
        <h1>Nuevo paciente</h1>
        <hr>
        <form action="" id="validate" method="post" class="commom_form">
            <fieldset>
                <label for="nom">Nom:
                    <input type="text" id="nom" name="nom">
                </label>
                <label for="cognoms">Cognoms:
                    <input type="text" id="cognoms" name="cognoms">
                </label>
            </fieldset>
            <fieldset>
                <label for="num-hc">Num. HC:
                    <input type="text" id="num-hc" name="num-hc">
                </label>
                <label for="data-naixement">Data de naixement:
                    <input type="date" id="data-naixement" name="data-naixement">
                </label>
            </fieldset>
            <fieldset>
                <label for="dni">DNI:
                    <input type="text" id="dni" name="dni">
                </label>
                <label for="sexo">Sexe:
                    <select id="sexo" name="sexo">
                        <option value="" selected>Select</option>
                        <option value="hombre">Home</option>
                        <option value="mujer">Dona</option>
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
                <label for="contacte">Persona de contacte:
                    <input type="text" id="contacte" name="contacte">
                </label>
            </fieldset>
            <fieldset>
                <label for="telefon-contacte">Telèfon de persona de contacte:
                    <input type="tel" id="telefon-contacte" name="telefon-contacte">
                </label>
                <label for="relacio-contacte">Relació amb la persona de contacte:
                    <input type="text" id="relacio-contacte" name="relacio-contacte">
                </label>
            </fieldset>
        </form>
    </div>
    <!-- </div> -->

    <form>

        <div>

        </div>

        <div>

        </div>

        <input type="submit" value="Enviar">
    </form>

</body>

</html>