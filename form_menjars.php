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
                <label for="pes"><i class="fa-solid fa-weight-scale"></i> Pes (kg): <input id="pes" name="pes" type="text" /></label>
                <label for="mida"><i class="fa-solid fa-ruler-horizontal"></i> Mida (cm): <input id="mida" name="mida" type="text" /></label>
            </fieldset>
            <fieldset>
                <label for="dieta_habitual"><i class="fa-solid fa-bowl-food"></i> Dieta habitual:<input id="dieta_habitual" name="dieta_habitual" type="text" /></label>
                <label for="aliments-no-grassos"><i class="fa-solid fa-wheat-awn"></i> Aliments no grassos: <input id="aliments-no-grassos" name="aliments-no-grassos" type="text" /></label>
            </fieldset>
            <fieldset>
                <label for="intolerancia"><i class="fa-solid fa-wheat-awn-circle-exclamation"></i> Intolerancia:<input id="intolerancia" name="intolerancia" type="text" /></label>
            </fieldset>
            <fieldset class="radio_input_section">
                <div><i class="fa-solid fa-handshake-angle"></i>
                    Necessitat d'ajut: <br>
                    <label for="necessitat-ajut-total"><input id="necessitat-ajut-total" type="radio" name="necessitat-ajut" class="inline" value="total"/> Total</label>
                    <label for="necessitat-ajut"><input id="necessitat-ajut-parcial" type="radio" name="necessitat-ajut" class="inline" value="parcial"/> Parcial</label>
                    <label for="necessitat-ajut"><input id="necessitat-ajut-independent" type="radio" name="necessitat-ajut" class="inline" value="independent"/> Independent</label>
                </div>
                <div><i class="fa-sharp fa-solid fa-icicles"></i>
                    Inapetència i/o anorèxia: <br>
                    <label for="anorexia-1"><input id="anorexia-1" type="radio" name="anorexia" class="inline" value="1"/> Si</label>
                    <label for="anorexia-0"><input id="anorexia-0" type="radio" name="anorexia" class="inline" value="0"/> No</label>
                </div>
                <div><i class="fa-sharp fa-solid fa-teeth-open"></i>
                    Protesis dental: <br>
                    <label for="protesis-dental-1"><input id="protesis-dental-1" type="radio" name="protesis-dental" class="inline" value="1"/> Si</label>
                    <label for="protesis-dental-0"><input id="protesis-dental-0" type="radio" name="protesis-dental" class="inline" value="0"/> No</label>
                </div>
            </fieldset>
            <input type="submit" value="Submit" />
        </form>
    </div>
</body>

</html>