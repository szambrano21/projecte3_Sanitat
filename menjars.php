<?php 


if(!empty($_POST)){
    $alert="";
    if(empty($_POST["pes"]) || empty($_POST["talla"]) || empty($_POST["mida"]) || empty($_POST["dietaHabitual"]) || 
    empty($_POST["alimentsNoGrassos"]) || empty($_POST["protesisDental"]) || empty($_POST["necessitatsAjudes"]) || empty($_POST["inapetenciaAnorexia"]) || empty($_POST["observacions"])){
        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
    }else{
        include_once('connexiobbddsanitat.php');

        $pes = $_POST["pes"];
        $talla = $_POST["talla"];
        $mida = $_POST["mida"];
        $dietaHabitual = $_POST["dietaHabitual"];
        $alimentsNoGrassos = $_POST["alimentsNoGrassos"];
        $protesisDental = $_POST["protesisDental"];
        $necessitatsAjudes = $_POST["necessitatsAjudes"];
        $inapetenciaAnorexia = $_POST["inapetenciaAnorexia"];
        $observacions = $_POST["observacions"];
        $id = $_POST['id'];

        // INSERT INTO `tmenjars` (`alimentsNoGrassos`, `necessitatsAjudes`, `inapetenciaAnorexia`, `mida`, `pes`, `protesisDental`, `intolerancia`, `dietaHabitual`, `expectoracio`, `Id`) VALUES ('f', 'f', 'f', '146', '25', '55', 'a', 'a', '456', NULL);

        $query = mysqli_query($conexion,"SELECT * FROM tmenjars WHERE Id = '$id'");
        $resultado = mysqli_fetch_assoc($query);

        if($resultado > 0){
            $alert="<p class='msg_error'>El formulario de comida ya existe</p>";
        }else{

            $query_insertar = mysqli_query($conexion, "INSERT INTO tmenjars (alimentsNoGrassos, necessitatsAjudes, inapetenciaAnorexia, mida, pes, protesisDental, intolerancia, dietaHabitual, expectoracio, Id)
            VALUES('$alimentsNoGrassos','$necessitatsAjudes','$inapetenciaAnorexia','$mida','$pes','$protesisDental','$intolerancia','$dietaHabitual','$expectoracio','$id')");

            if($query_insertar){
                $alert="<p class='msg_correcto'>El formulari ha sigut creat correctament</p>";
            }else{
                $alert="<p class='msg_error'>Error al crear el formulari</p>";
            }
        }
    }
}


?>

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
    <!--
    <div class="hero">
      <form>    
        <h2>Necessitats de menjar i beguda</h2>
        <hr>
        <br>
		<div class="row">
		    <div class="input-group">
                <input type="text" id="pes" name="pes" required />
                <label class="labelForm" for="pes"><i class="fa-solid fa-weight-scale"></i> Pes</label>
			</div>
			<div class="input-group">
                <input type="text" id="talla" required>
                <label class="labelForm" for="talla"><i class="fa-solid fa-ruler-vertical"></i> talla</label>
			</div>
            <div class="input-group">
                <input type="text" id="talla" required>
                <label class="labelForm" for="talla"><i class="fa-solid fa-ruler-vertical"></i> talla</label>
            </div>
		</div>
		<div class="input-group">
			<input type="text" id="dietaHabitual" required>
			<label class="labelForm" for="dietaHabitual"><i class="fa-solid fa-utensils"></i> Dieta Habitual</label>
		</div>
        <div class="input-group">
            <input type="text" id="alimentsNoGrassos" required>
            <label class="labelForm" for="alimentsNoGrassos"><i class="fa-solid fa-bowl-food"></i> Aliments no grats</label>
        </div>
        <div class="row">
            <div>
                <label>protesis Dental</label>
                <div class="input-group-check">
                    <input type="checkbox" class="checkbox" id="protesisDental" name ="protesisDental" value="protesisDental"  required>SI
                    <input type="checkbox" class="checkbox" id="protesisDental" name ="protesisDental" value="protesisDental"  required>NO
                </div>
            </div>
            <div>
                <label>dificultat</label>
                <div class="input-group-check">
                    <input type="checkbox" name="dificultat" value="Masticacion"> Masticacion
                    <input type="checkbox" name="dificultat" value="Deglucio"> Deglucio
                    <input type="checkbox" name="dificultat" value="Digestio"> Digestio
                </div>
            </div>
        </div>

        
        
        <div class="input-group">
            <label>Necessitat d'ajut:</label>
            <div class="input-group-check">
                <input type="checkbox" name="protesisDental" value="gusta"> Total
                <input type="checkbox" name="protesisDental" value="gusta"> Parcial
                <input type="checkbox" name="protesisDental" value="gusta"> Independent
            </div>
            <label>Signes de plec</label>
            <div class="input-group-check">
                <input type="checkbox" id="protesisDental" name="protesisDental" value="si"> Si
                <input type="checkbox" id="protesisDental"  name="protesisDental" value="no"> No
            </div>
        <div>

        <div class="row">
            <div>
                <label>Necessitat d'ajut</label>
                <div class="input-group-check">
                    <input type="checkbox" name="protesisDental" value="gusta"> Total
                    <input type="checkbox" name="protesisDental" value="gusta"> Parcial
                    <input type="checkbox" name="protesisDental" value="gusta"> Independent
                </div>
            </div>
            <div>
                <label>Signes de plec</label>
                <div class="input-group-check">
                    <input type="checkbox" name="protesisDental" value="si"> Si
                    <input type="checkbox" name="protesisDental" value="no"> No
                </div>
            </div>
        </div>
        <div>
            <label>Inapetència i/o anorèxia</label>
            <div class="input-group-check">
                <input type="checkbox" name="inapetenciaAnorexia" value="si"> Si
                <input type="checkbox" name="inapetenciaAnorexia" value="no"> No
            </div>
        </div>
        <div class="input-group">
            <textarea id="observacions" rows="8" required></textarea>
            <label class="labelForm" for="observacions"><i class="fas fa-comments"></i> Observacions</label>
        </div>

		<button class="buttonSubmit" type="submit">ENVIAR <i class="fas fa-paper-plane"></i></button>
      </form>
    </div>
    -->



    <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
<div class="container_general">
    <div class="container_ingres">
    <h1>MENJARS</h1>
        <hr>
        <form action="menjars.php">
            <div>
            <h2>Necessitats de menjar i beguda</h2>
                    <div>
                        <label class="labelForm" for="pes"><i class="fa-solid fa-weight-scale"></i> Pes</label>
                        <input type="text" id="pes" name="pes" />
                    </div>        
                    <div>
                        <label class="labelForm" for="talla"><i class="fa-solid fa-ruler-vertical"></i> talla</label>
                        <input type="text" id="talla" name="talla">
                    </div>
                    <div>
                        <label class="labelForm" for="dietaHabitual"><i class="fa-solid fa-utensils"></i> Dieta Habitual</label>
                        <input type="text" id="dietaHabitual" name="dietaHabitual">
                    </div>
                    <div>
                        <label class="labelForm" for="mida"><i class="fa-solid fa-ruler-vertical"></i> talla</label>
                        <input type="text" id="mida" name="mida">
                    </div>

                    <div>
                        <label class="labelForm" for="alimentsNoGrassos"><i class="fa-solid fa-bowl-food"></i> Aliments no grats</label>
                        <input type="text" id="alimentsNoGrassos" name="alimentsNoGrassos" >
            
                    </div> 
                    <div>
                        <label>protesis Dental</label>
                        <div class="input-group-check">
                            <input type="checkbox" class="checkbox" id="protesisDental" name ="protesisDental" value="protesisDental"  required>SI
                            <input type="checkbox" class="checkbox" id="protesisDental" name ="protesisDental" value="protesisDental"  required>NO
                        </div>
                    </div>
                    
                    <div>
                        <label for="necessitatsAjudes">Necessitat d'ajut:</label>
                        <div class="input-group-check">
                            <input type="checkbox" name="necessitatsAjudes" value="dificultat"> Total
                            <input type="checkbox" name="necessitatsAjudes" value="dificultat"> Parcial
                            <input type="checkbox" name="necessitatsAjudes" value="dificultat"> Independent
                        </div>
                    </div>
                    <div>
                        <label>Inapetència i/o anorèxia</label>
                        <div class="input-group-check">
                            <input type="checkbox" name="inapetenciaAnorexia" value="si"> Si
                            <input type="checkbox" name="inapetenciaAnorexia" value="no"> No
                        </div>
                    </div>
                    <div>
                        <label class="labelForm" for="observacions"><i class="fas fa-comments"></i> Observacions</label>
                        <textarea id="observacions" name="observacions"  ></textarea>
                    </div> 
            </div>
                <input type="hidden" id="id" name="id" value="<?php echo $row['Id']; ?>" >
                <input type="submit" value="Submit">
        </form>
    </div>
</div>
    