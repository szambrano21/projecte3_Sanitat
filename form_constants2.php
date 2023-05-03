<style>
    .form_container {
        margin: 0 auto;
        width: 100%;
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
        margin: 1em auto;
        text-align: center;
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
        margin: 1rem 0;
        width: 45%;
    }

    input,
    textarea,
    select {
        margin: 10px 0 0 0;
        width: 100%;
        min-height: 2.5em;
        font-size: 1.2rem;
    }

    input,
    textarea {
        background-color: #0a0a23;
        border: 1px solid #0a0a23;
        color: #ffffff;
        padding: 0.5rem;
    }

    .radio_input_section fieldset {
        display: inline-block;
        margin: 10px 15px 0 0;
        width: 30%;
        margin: 0.5rem 0;
    }

    .inline {
        width: unset;
        margin: 0 0.5em 0 0;
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

    .radio_input_section {
        margin-top: 1em;
    }

    input[type="file"] {
        padding: 1px 2px;
    }

    textarea {
        resize: none;
        height: 15vh;
    }
    /* Estilos para dispositivos móviles */
    @media only screen and (max-width: 850px) {
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
                <label for="first-name"><i class="fa-solid fa-weight-scale"></i> Temperatura (ºC): <input id="first-name" name="first-name" type="text" /></label>
                <label for="last-name"><i class="fa-solid fa-stethoscope"></i> Pulsacions (ppm): <input id="last-name" name="last-name" type="text" /></label>
            </fieldset>
            <fieldset>
                <label for="email"><i class="fa-sharp fa-solid fa-heart-pulse"></i> Pressió arterial (mm Hg):<input id="email" name="email" type="email" /></label>
                <label for="new-password"><i class="fa-solid fa-eye-dropper"></i> Glucemia (mg/dL): <input id="new-password" name="new-password" type="password" pattern="[a-z0-5]{8,}" /></label>
            </fieldset>
            <fieldset>
                <label for="email"><i class="fa-sharp fa-solid fa-gauge-high"></i> Saturació 02 (%):<input id="email" name="email" type="email" /></label>
                <!-- <label for="new-password">Create a New Password: <input id="new-password" name="new-password" type="password" pattern="[a-z0-5]{8,}" /></label> -->
            </fieldset>
            <fieldset class="radio_input_section">
                <div>
                    EVN: <br>
                    <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Si</label>
                    <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> No</label>
                </div>
                <div>
                    Reavaluacio dolor: <br>
                    <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Total</label>
                    <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> Parcial</label>
                    <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> Independent</label>
                </div>
                <div>
                    hemoglobina: <br>
                    <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Si</label>
                    <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> No</label>
                </div>
                <!-- </fieldset>
            <fieldset> -->
            </fieldset>
            <fieldset>
                <label for="Disfagia liquida"> Disfagia líquida: <textarea></textarea></label>
                <label for="Disfagia sòlida"> Disfagia sòlida: <textarea></textarea></label>
            </fieldset>
            <input type="submit" value="Submit" />
        </form>
    </div>
</body>

</html>