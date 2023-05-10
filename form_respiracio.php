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
        <h1>Respiració</h1>
        <form method="post" action='https://register-demo.freecodecamp.org'>
            <fieldset>
                <label for="first-name"><i class="fa-sharp fa-solid fa-lungs"></i> Resp / min: <input id="first-name" name="first-name" type="text" /></label>
                <div class="input_conjunto"><i class="fa-solid fa-child"></i>
                    Coloració pell i mucoses: <br>
                    <label for="personal-account"><input id="personal-account" type="radio" name="color_pell" id="" class="inline" value="" /> Rosada</label>
                    <label for="business-account"><input id="business-account" type="radio" name="color_pell" id="" class="inline" value="" /> Pal.lidessa</label>
                    <label for="business-account"><input id="business-account" type="radio" name="color_pell" id="" class="inline" value="" /> Cianosi</label>
                </div>
            </fieldset>
            <fieldset class="radio_input_section">
                <div class="input_conjunto"><i class="fa-solid fa-head-side-cough"></i>
                    Tos: <br>
                    <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Si</label>
                    <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> No</label>
                </div>
                <div class="input_conjunto"><i class="fa-solid fa-box-tissue"></i>
                    Expectoració: <br>
                    <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Si</label>
                    <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> No</label>
                </div>
                <div class="input_conjunto"><i class="fa-solid fa-mask-ventilator"></i>
                    Oxigenoterapia: <br>
                    <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Si</label>
                    <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> No</label>
                </div>
                <!-- </fieldset>
                <fieldset> -->
            </fieldset>
            <fieldset class="textarea_section">
                <label for="Disfagia liquida"> Observacions: <textarea></textarea></label>
            </fieldset>
            <input type="submit" value="Submit" />
        </form>
    </div>
</body>

</html>