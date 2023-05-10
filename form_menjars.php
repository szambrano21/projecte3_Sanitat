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
        <h1>MENJAR I BEURE</h1>
        <form method="post" action='https://register-demo.freecodecamp.org'>
            <fieldset>
                <label for="pes"><i class="fa-solid fa-weight-scale"></i> Pes (kg): <input id="pes" name="pes" type="text" /></label>
                <label for="mida"><i class="fa-solid fa-ruler-horizontal"></i> Mida (cm): <input id="mida" name="mida" type="text" /></label>
            </fieldset>
            <fieldset>
                <label for="dietaHabitual"><i class="fa-solid fa-bowl-food"></i> Dieta habitual:<input id="dietaHabitual" name="dietaHabitual" type="text" /></label>
                <label for="alimentsNoGrassos"><i class="fa-solid fa-wheat-awn"></i> Aliments no grassos: <input id="alimentsNoGrassos" name="alimentsNoGrassos" type="text" /></label>
            </fieldset>
            <fieldset>
                <label for="intolerancia"><i class="fa-solid fa-wheat-awn-circle-exclamation"></i> Intolerancia:<input id="intolerancia" name="intolerancia" type="text" /></label>
            </fieldset>
            <fieldset class="radio_input_section">
                <div class="input_conjunto"><i class="fa-solid fa-handshake-angle"></i>
                    Necessitat d'ajut: <br>
                    <label for="necessitatsAjudes-total"><input id="necessitatsAjudes-total" type="radio" name="necessitatsAjudes" class="inline" value="total" /> Total</label>
                    <label for="necessitatsAjudes-parcial"><input id="necessitatsAjudes-parcial" type="radio" name="necessitatsAjudes" class="inline" value="parcial" /> Parcial</label>
                    <label for="necessitatsAjudes-independent"><input id="necessitatsAjudes-independent" type="radio" name="necessitatsAjudes" class="inline" value="independent" /> Independent</label>
                </div>
                <div class="input_conjunto"><i class="fa-sharp fa-solid fa-icicles"></i>
                    Inapetència i/o anorèxia: <br>
                    <label for="inapetenciaAnorexia-1"><input id="inapetenciaAnorexia-1" type="radio" name="inapetenciaAnorexia" class="inline" value="1" /> Si</label>
                    <label for="inapetenciaAnorexia-0"><input id="inapetenciaAnorexia-0" type="radio" name="inapetenciaAnorexia" class="inline" value="0" /> No</label>
                </div>
                <div class="input_conjunto"><i class="fa-sharp fa-solid fa-teeth-open"></i>
                    Protesis dental: <br>
                    <label for="protesisDental-1"><input id="protesisDental-1" type="radio" name="protesisDental" class="inline" value="1" /> Si</label>
                    <label for="protesisDental-0"><input id="protesisDental-0" type="radio" name="protesisDental" class="inline" value="0" /> No</label>
                </div>
            </fieldset>
            <div class="hora_dia">
                <input type="radio" name="hora" id="dia">
                <label for="dia">dia</label>
                <input type="radio" name="hora" id="tarda">
                <label for="tarda">tarda</label>
                <input type="radio" name="hora" id="nit">
                <label for="nit">nit</label>
            </div>
            <input type="submit" value="Submit" />
        </form>
    </div>
</body>

</html>