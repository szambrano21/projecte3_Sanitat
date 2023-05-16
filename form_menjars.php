<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("scripts.php"); ?>
</head>

<body>
    <?php
    include_once("header.php");

    ?>

    <div class="container_general">
        <div class="second_container">
            <div class="form_dades_container">
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
                            <label for="necessitat-ajut-total"><input id="necessitat-ajut-total" type="radio" name="necessitat-ajut" class="inline" value="total" /> Total</label>
                            <label for="necessitat-ajut"><input id="necessitat-ajut-parcial" type="radio" name="necessitat-ajut" class="inline" value="parcial" /> Parcial</label>
                            <label for="necessitat-ajut"><input id="necessitat-ajut-independent" type="radio" name="necessitat-ajut" class="inline" value="independent" /> Independent</label>
                        </div>
                        <div><i class="fa-sharp fa-solid fa-icicles"></i>
                            Inapetència i/o anorèxia: <br>
                            <label for="anorexia-1"><input id="anorexia-1" type="radio" name="anorexia" class="inline" value="1" /> Si</label>
                            <label for="anorexia-0"><input id="anorexia-0" type="radio" name="anorexia" class="inline" value="0" /> No</label>
                        </div>
                        <div><i class="fa-sharp fa-solid fa-teeth-open"></i>
                            Protesis dental: <br>
                            <label for="protesis-dental-1"><input id="protesis-dental-1" type="radio" name="protesis-dental" class="inline" value="1" /> Si</label>
                            <label for="protesis-dental-0"><input id="protesis-dental-0" type="radio" name="protesis-dental" class="inline" value="0" /> No</label>
                        </div>
                    </fieldset>
                    <input type="submit" value="Submit" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>