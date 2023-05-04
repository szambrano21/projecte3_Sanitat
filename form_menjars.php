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
        margin: 0.5em auto;
        text-align: center;
        padding-bottom: 0.5em;
        border-bottom: 2px solid black;
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
        <h1>MENJAR I BEURE</h1>
        <form method="post" action='https://register-demo.freecodecamp.org'>
            <fieldset>
                <label for="pes"><i class="fa-solid fa-weight-scale"></i> Pes (kg): <input id="first-name" name="pes" type="text" /></label>
                <label for="talla"><i class="fa-solid fa-ruler-horizontal"></i> Mida (cm): <input id="last-name" name="pes" type="text" /></label>
            </fieldset>
            <fieldset>
                <label for="dieta_habitual"><i class="fa-solid fa-bowl-food"></i> Dieta habitual:<input id="email" name="email" type="email" /></label>
                <label for="new-password"><i class="fa-solid fa-wheat-awn"></i> Aliments no grassos: <input id="new-password" name="new-password" type="password" pattern="[a-z0-5]{8,}" /></label>
            </fieldset>
            <fieldset>
                <label for="email"><i class="fa-solid fa-wheat-awn-circle-exclamation"></i> Intolerancia:<input id="email" name="email" type="email" /></label>
            </fieldset>
            <fieldset class="radio_input_section">
                <div><i class="fa-solid fa-handshake-angle"></i>
                    Necessitat d'ajut: <br>
                    <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Total</label>
                    <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> Parcial</label>
                    <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> Independent</label>
                </div>
                <div><i class="fa-sharp fa-solid fa-teeth-open"></i>
                    Inapetència i/o anorèxia: <br>
                    <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Si</label>
                    <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> No</label>
                </div>
                <div><i class="fa-sharp fa-solid fa-teeth-open"></i>
                    Protesis dental: <br>
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