<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("scripts.php"); ?>
</head>

<body>
    <?php
    include_once("header.php");

    ?>
    <div class="form_dades_container">
        <h1>CONSTANTS</h1>
        <form method="post" action='https://register-demo.freecodecamp.org'>
            <fieldset>
                <label for="temperatura"><i class="fa-solid fa-weight-scale"></i> Temperatura (ºC): <input id="temperatura" name="temperatura" type="number" /></label>
                <label for="pulsacions"><i class="fa-solid fa-stethoscope"></i> Pulsacions (ppm): <input id="pulsacions" name="pulsacions" type="number" /></label>
            </fieldset>
            <fieldset>
                <label for="presio_arterial"><i class="fa-sharp fa-solid fa-heart-pulse"></i> Pressió arterial (mm Hg):<input id="presio_arterial" name="presio_arterial" type="text" /></label>
                <label for="glucemia"><i class="fa-solid fa-eye-dropper"></i> Glucemia (mg/dL): <input id="glucemia" name="glucemia" type="number" /></label>
            </fieldset>
            <fieldset>
                <label for="saturacio"><i class="fa-sharp fa-solid fa-gauge-high"></i> Saturació 02 (%):<input id="saturacio" name="saturacio" type="number" /></label>
            </fieldset>
            <fieldset class="radio_input_section">
                <div class="input_conjunto">
                    EVN: <br>
                    <label for="evn"><input id="evn-1" type="radio" name="evn" class="inline" value="1" /> Si</label>
                    <label for="evn"><input id="evn-0" type="radio" name="evn" class="inline" value="0"/> No</label>
                </div>
                <div>
                    Reavaluacio dolor: <br>
                    <label for="reavaluacio-dolor"><input id="reavaluacio-dolor-total" type="radio" name="reavaluacio-dolor" class="inline" value="total"/> Total</label>
                    <label for="business-account"><input id="reavaluacio-dolor-parcial" type="radio" name="reavaluacio-dolor" class="inline" value="parcial"/> Parcial</label>
                    <label for="business-account"><input id="reavaluacio-dolor-independent" type="radio" name="reavaluacio-dolor" class="inline" value="independent"/> Independent</label>
                </div>
                <div>
                    Hemoglobina: <br>
                    <label for="hemoglobina"><input id="hemoglobina-1" type="radio" name="hemoglobina" class="inline" value="1"/> Si</label>
                    <label for="hemoglobina"><input id="hemoglobina-0" type="radio" name="hemoglobina" class="inline" value="0"/> No</label>
                </div>
            </fieldset>
            <fieldset>
                <label for="disfagia-liquida"> Disfagia líquida: <textarea name="disfagia-liquida" id="disfagia-liquida"></textarea></label>
                <label for="disfagia-solida"> Disfagia sòlida: <textarea name="disfagia-solida" id="disfagia-solida"></textarea></label>
            </fieldset>
            <input type="submit" value="Submit" />
        </form>
    </div>
</body>

</html>