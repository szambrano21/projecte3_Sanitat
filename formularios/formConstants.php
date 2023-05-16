
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once("../scripts.php"); ?>

    <style>
        body {
            display: flex;
        }

        @media screen and (max-width: 700px) {
            body {
                display: initial;
            }

        }
    </style>
</head>

<body>
    <?php
    include_once("../header.php");
    if ($_SESSION['tipo'] != 'admin') {
        header("location: inicial.php");
    }

    ?>

    <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
    <div class="container_general">
        <div class="container_ingres">
            <h1>CONSTANTS</h1>
            <hr>
            <form action="">
                <div>
                    <h2>Pressa de constants</h2>
                    <div>
                        <label class="labelForm" for="temperatura"><i class="fa-solid fa-weight-scale"></i> Temperatura</label>
                        <input type="text" id="temperatura" name="temperatura" />
                    </div>
                    <div>
                        <label class="labelForm" for="presioArterial"><i class="fa-solid fa-ruler-vertical"></i> Pressio Arterial</label>
                        <input type="text" id="presioArterial" name="presioArterial">
                    </div>
                    <div>
                        <label class="labelForm" for="pols"><i class="fa-solid fa-utensils"></i> Pols</label>
                        <input type="text" id="pols" name="pols">
                    </div>
                    <div>
                        <label class="labelForm" for="glucemia"><i class="fa-solid fa-ruler-vertical"></i> Glucemia</label>
                        <input type="text" id="glucemia" name="glucemia">
                    </div>

                    <div>
                        <label class="labelForm" for="saturacioO2"><i class="fa-solid fa-bowl-food"></i> SaturacioO2</label>
                        <input type="text" id="saturacioO2" name="saturacioO2">
                    </div>

                    <div>
                        <label>EVN</label>
                        <div class="input-group-check">
                            <input type="checkbox" class="checkbox" id="EVN" name="EVN" value="si" required>SI
                            <input type="checkbox" class="checkbox" id="EVN" name="EVN" value="no" required>NO
                        </div>
                    </div>

                    <div>
                        <label for="reavaluacioDolor">Reavaluacio dolor:</label>
                        <div class="input-group-check">
                            <input type="checkbox" name="reavaluacioDolor" value="dificultat"> Total
                            <input type="checkbox" name="reavaluacioDolor" value="dificultat"> Parcial
                            <input type="checkbox" name="reavaluacioDolor" value="dificultat"> Independent
                        </div>
                    </div>
                    <div>
                        <label>hemoglobina</label>
                        <div class="input-group-check">
                            <input type="checkbox" name="hemoglobina" value="si"> Si
                            <input type="checkbox" name="hemoglobina" value="no"> No
                        </div>
                    </div>

                    <div>
                        <label class="labelForm" for="disfagiaLiquida"><i class="fa-solid fa-bowl-food"></i> Disfagia liquida</label>
                        <input type="text" id="disfagiaLiquida" name="disfagiaLiquida">
                    </div>
                    <div>
                        <label class="labelForm" for="disfagiaSolids"><i class="fa-solid fa-bowl-food"></i> Disfagia solids</label>
                        <input type="text" id="disfagiaSolids" name="disfagiaSolids">
                    </div>
                </div>
                <input type="hidden" id="id" name="id" value="<?php echo $row['Id']; ?>">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>