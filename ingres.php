<?php

include_once('connexiobbddsanitat.php');

if(!empty($_POST)){
    $alert="";
    if(empty($_POST["procedencia"]) || empty($_POST["assignacioLlit "]) || empty($_POST["assignacioSala"]) || empty($_POST["motiuIngres"]) || empty($_POST["dataIngres"])
    || empty($_POST["tractamentDomiciliari"]) || empty($_POST["allergies"]) || empty($_POST["habitsToxics"]) || empty($_POST["antecendentsPatologics"]) || empty($_POST["entornFamiliar"]) || empty($_POST["ID"]) ){

        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
    }else{

        $procedencia = $_POST["procedencia"];
        $assignacioLlit = $_POST["assignacioLlit"];
        $assignacioSala = $_POST["assignacioSala"];
        $motiuIngres = $_POST["motiuIngres"];
        $dataIngres = $_POST["dataIngres"];
        $tractamentDomiciliari = $_POST["tractamentDomiciliari"];
        $allergies = $_POST["allergies"];
        $habitsToxics = $_POST["habitsToxics"];
        $antecendentsPatologics = $_POST["antecendentsPatologics"];
        $entornFamiliar = $_POST["entornFamiliar"];        
        $ID = $_POST["ID"];


        // $query = mysqli_query($conexion,"SELECT * FROM tconstants WHERE ID_const = '$ID_const'");
        // $resultado = mysqli_fetch_assoc($query);

        
            $query_insertar = mysqli_query($conexion, "INSERT INTO tconstants (procedencia, assignacioLlit, assignacioSala, motiuIngres, dataIngres, tractamentDomiciliari,allergies,habitsToxics,antecendentsPatologics,entornFamiliar,ID)
            VALUES('$procedencia','$assignacioLlit','$assignacioSala',' $motiuIngres ',' $dataIngres ','$tractamentDomiciliari','$allergies','$habitsToxics','$antecendentsPatologics','$entornFamiliar','$ID')");

            if($query_insertar){
                $alert="<p class='msg_correcto'>El codigo de ingreso ha sido creado correctamente</p>";
            }else{
                $alert="<p class='msg_error'>Error al crear el usuario</p>";
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
    <div class="container_general hero" >
        <div class="container_ingres">
            <h1>INGRES DEL PACIENT</h1>
            <hr>
            <form action="ingres.php">
                <div>
                    <h2>Dades generals</h2>
                    <div  class="input-group">
                        <label for="date">Data d'ingres:</label><br>
                        <input type="date" id="date" name="date">
                    </div>        
                    <div class="row">
                        <div class="input-group">
                            <label for="procedencia" class="procedencia">Procedencia</label>
                            <select class="style_procedencia" name="procedencia" id="procedencia">
                                <option selected>Selecciona una opcion</option>
                                <option value="trasllat">Trasllat</option>
                                <option value="urgencies">Urgencies</option>
                                <option value="programat">Programat</option>
                                <option value="altre">Altres</option>
                            </select>
                            <span>
                                <textarea class="altres">se usa javascript</textarea>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="asignacioCama">Asignación de cama:</label>
                            <input type="text" id="asignacioCama" name="asignacioCama">
                        </div>
                    </div>
                    <div>
                        <label for="motiuIngres">Motiu d'ingres/ Diagnostic:</label><br>
                        <input type="text" id="motiuIngres" name="motiuIngres">
                    </div>
                    <div>
                        <label for="tractamentIngres">Tratamiento domiciliario:</label><br>
                        <input type="text" id="tractamentIngres" name="tractamentIngres">
                    </div>              

                    <div class="row">
                            <p>al·lèrgies</p>
                            <div class="form-check">
                                <label>SI</label>
                                <input class="form-check-input" type="checkbox" value="" id="Alergies">
                            </div>
                            <div class="form-check">
                                <label>NO</label>   
                                <input class="form-check-input" type="checkbox" value="" id="Alergies" checked>
                            </div>
                            <div>
                                <label for="tipus">Tipus:</label>
                                <input type="text" id="Alergies" name="Alergies">
                            </div>
                        
                    </div>
                    <div>
                        <label for="habitsToxics">TABACO:</label><br>
                        <input type="checkbox" id="habitsToxics" name="tabaco">

                    </div>
                    <div>
                        <label for="antecedentsPatologics">Antecedents Patologicss:</label><br>
                        <input type="text" id="antecedentsPatologics" name="antecedentsPatologics">
                    </div>
                    <div>
                        <label for="entornFamiliar">Entor Familiar:</label><br>
                        <input type="text" id="entornFamiliar" name="entornFamiliar">
                    </div>

                </div>
                <!-- <div>
                    <h2>Necessitats respiratòries</h2>
                    <div>
                        <label for="res/min">Resp/min:</label><br>
                        <input type="text" id="res/min" name="res/min">
                    </div>        
                    <div>
                        <label for="tos">Tos:</label><br>
                        <input type="text" id="tos" name="tos">
                    </div>
                    <div>
                        <label for="expectoracio">Espectoriació:</label><br>
                        <input type="text" id="expectoracio" name="expectoracio">
                    </div>
                    <div>
                        <label for="oxigenoterapia">Oxigenoteràpia:</label><br>
                        <input type="text" id="oxigenoterapia" name="oxigenoterapia">
                    </div>
                    <div>
                        <label for="colorPell">Coloració a la pell:</label><br>
                        <input type="text" id="colorPell" name="colorPell">
                    </div>
                    <div>
                        <label for="observacions">Observacions:</label><br>
                        <textarea id="observacions" name="observacions"> </textarea>
                    </div>        
                </div> -->
                <!-- <div>
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
                        <label for="mida">Talla:</label><br>
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
                </div> -->
                <input type="hidden" id="ID" name="ID" value="1">
                <input type="submit" value="Submit">

            </form>
        </div>
    </div>
</body>
</html>

<!-- 

<section class="content">
	<ul class="list">
    <li class="list__item">
      <label class="label--checkbox">
          <input type="checkbox" class="checkbox" checked>
              tabaco
      </label>
    </li>
    <li class="list__item">
      <label class="label--checkbox">
          <input type="checkbox" class="checkbox">
            Item 2
      </label>
    </li>
    <li class="list__item">
      <label class="label--checkbox">
          <input type="checkbox" class="checkbox">
            Item 3
      </label>
    </li>
    <li class="list__item">
      <label class="label--checkbox">
          <input type="checkbox" class="checkbox">
            Item 4
      </label>
    </li>
  </ul>
</section>
-->