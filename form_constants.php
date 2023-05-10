<style>
    .form_container {
        margin: 0 auto 30px auto;
        width: 96%;
        max-width: 1000px;
        height: auto;
        background-color: #1b1b32;
        color: #f5f6f7;
        padding: 20px;
        font-family: Tahoma;
        font-size: 18px;
    }

    h1,
    p {
        margin: 0.5em auto 1em auto;
        text-align: center;
        padding-bottom: 0.5em;
        border-bottom: 1px solid #dadbee;
    }

    form {
        max-width: 800px;
        min-width: 300px;
        margin: auto;
        display: flex;
        padding-bottom: 2em;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    fieldset {
        margin: auto;
        border: none;
        display: flex;
        width: 100%;
        flex-wrap: wrap;
        justify-content: space-between;
        align-content: space-around;
    }

    label {
        margin: 0.5rem 0;
        width: 45%;
    }

    input,
    textarea,
    select {
        margin: 10px 0 0 0;
        width: 100%;
        min-height: 2em;
        font-size: 1.2rem;
    }

    input,
    textarea {
        background-color: #0a0a23;
        border: 1px solid #0a0a23;
        color: #ffffff;
        padding: 0.5rem;
    }

    input[type="radio"] {
        height: 3em;
    }

    .radio_input_section fieldset {
        display: inline-block;
        margin: 10px 15px 0 0;
        width: 30%;
        margin: 0.5rem 0;
    }

    .inline {
        width: unset;
        margin: 0 0 0 0.5em;
        vertical-align: middle;
    }

    input[type="submit"] {
        display: flex;
        width: calc(40% - 0.5vw);
        margin: 2em auto 0 auto;
        height: 2em;
        justify-content: center;
        align-items: center;
        font-size: 1.2rem;
        background-color: #3b3b4f;
        border-color: white;
    }

    .radio_input_section label {
        margin: 0 15px 0 0;
    }

    .radio_label {
        width: 45%;
        margin: 0.5em;
    }

    .radio_input_section {
        margin: 2em;
    }

    input[type="file"] {
        padding: 1px 2px;
    }

    textarea {
        resize: none;
        height: 15vh;
    }

    .textarea_section label {
        width: 100%;
    }

    /* Estilos para dispositivos móviles */
    @media only screen and (max-width: 750px) {
        label {
            width: 80%;
        }

        .radio_input_section label {
            margin: 0 15px 0 0;
        }

        .radio_input_section {
            align-content: flex-start;
        }

        fieldset {
            flex-direction: column;
        }

        .radio_input_section {
            width: 80%;
        }

        .radio_label {
            width: 80%;
            display: flex;
            margin: 0.5em;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: center;
            justify-content: flex-start;
        }

        input[type="radio"] {
            height: 0;
        }
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("scripts.php"); ?>
</head>

<body>
    <?php
    include_once("header.php");

    ?>
    <div class="form_container">
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
                <div>
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