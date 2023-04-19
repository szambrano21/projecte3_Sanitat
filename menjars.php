<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once("scripts.php"); ?>

<style>
    body{
        display: flex;
    }

    @media screen and (max-width: 700px) {
        body{
        display: initial;
    }

}

</style>
</head>

<body>
    <?php 
        include_once("header.php");
        if($_SESSION['tipo'] != 'admin'){
            header("location: inicial.php");
        }
    
    ?>
    <div class="hero">
      <form>    
            <h2>Necessitats de menjar i beguda</h2>
            <hr>
            <br>
			    <div class="row">
					<div class="input-group">
                            <input type="text" id="pes" name="pes" required />
                            <label for="pes"><i class="fa-solid fa-weight-scale"></i> Pes</label>
						</div>
						<div class="input-group">
								<input type="text" id="talla" required>
								<label for="talla"><i class="fa-solid fa-ruler-vertical"></i> talla</label>
						</div>
                        <div class="input-group">
								<input type="text" id="talla" required>
								<label for="talla"><i class="fa-solid fa-ruler-vertical"></i> talla</label>
				        </div>
				</div>
				<div class="input-group">
						<input type="text" id="dietaHabitual" required>
						<label for="dietaHabitual"><i class="fa-solid fa-utensils"></i> Dieta Habitual</label>
				</div>
				<div class="input-group">
						<input type="text" id="alimentsNoGrassos" required>
						<label for="alimentsNoGrassos"><i class="fa-solid fa-bowl-food"></i> Aliments no grats</label>
				</div>
				<div class="input-group">
						<textarea id="protesisDental" rows="8" required></textarea>
						<label for="protesisDental"><i class="fas fa-comments"></i> protesis Dental</label>
				</div>
                <div class="input-group">
						<textarea id="message" rows="8" required></textarea>
						<label for="message"><i class="fas fa-comments"></i> Mensaje</label>
				</div>

				<button type="submit">ENVIAR <i class="fas fa-paper-plane"></i></button>
      </form>
    </div>




    <!--
<div class="container_general">
    <div class="container_ingres">
    <h1>MENJARS</h1>
        <hr>
        <form action="menjars.php">
            <div>
            <h2>Necessitats de menjar i beguda</h2>
                    <div>
                        <label for="pes">Pes:</label><br>
                        <input type="text" id="pes" name="pes">
                    </div>        
                    <div>
                        <label for="talla">Talla:</label><br>
                        <input type="text" id="talla" name="talla">
                    </div>
                    <div>
                        <label for="dietaHabitual">dietaHabitual:</label><br>
                        <input type="text" id="dietaHabitual" name="dietaHabitual">
                    </div>
                    <div>
                        <label for="mida">Mida:</label><br>
                        <input type="text" id="mida" name="mida">
                    </div>
                    <div>
                        <label for="alimentsNoGrassos">Aliments no grats</label><br>
                        <input type="text" id="alimentsNoGrassos" name="alimentsNoGrassos">
                    </div>
                    <div>
                        <label for="intolerancia">Intolerancia a:</label><br>
                        <input type="text" id="intolerancia" name="intolerancia">
                    </div> 
                    <div>
                        <label for="protesisDental">Pròtesi dental</label><br>
                        <input type="text" id="protesisDental" name="protesisDental">
                    </div>
                    <div>
                        <label for="necessitatsAjudes">Necessitats d'ajuda</label><br>
                        <input type="text" id="necessitatsAjudes" name="necessitatsAjudes">
                    </div>
                    <div>
                        <label for="inapetenciaAnorexia">Inapetència i/o anorèxia</label><br>
                        <input type="text" id="inapetenciaAnorexia" name="inapetenciaAnorexia">
                    </div>
                    <div>
                        <label for="observacions">Observacions</label><br>
                        <textarea id="observacions" name="observacions"> </textarea>
                    </div> 
            </div>
            
                <input type="submit" value="Submit">
        </form>
    </div>
</div>
    -->