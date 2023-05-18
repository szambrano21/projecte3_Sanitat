<?php
include_once('connexiobbddsanitat.php');

$alert = '';



if(!empty($_SESSION['activo'])){
    header("location: inicial.php");

}else{
    if(!empty($_POST)){
        
        $alert="";
        if(empty($_POST["procedencia"]) || empty($_POST["assignacioLlit"]) || empty($_POST["assignacioSala"]) || empty($_POST["motiuIngres"]) || empty($_POST["dataIngres"])
        || empty($_POST["tractamentDomiciliari"]) || empty($_POST["allergies"]) || empty($_POST["habitsToxics"]) || empty($_POST["antecendentsPatologics"]) || empty($_POST["entornFamiliar"])  ){

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
            // $ID = $_POST["ID"];
            $nHc = $_POST["nHc"];
            

            // $query = mysqli_query($conexion,"SELECT * FROM tingres WHERE nHc = '$nHc'");
            // $resultado = mysqli_fetch_assoc($query);

            
            // if($resultado > 0){
                
                
            
                $query_insertar = mysqli_query($conexion, "INSERT INTO tingres (procedencia, assignacioLlit , assignacioSala, motiuIngres,
                dataIngres, tractamentDomiciliari, allergies, habitsToxics, antecendentsPatologics, entornFamiliar,nHc )
                VALUES('$procedencia','$assignacioLlit','$assignacioSala','$motiuIngres','$dataIngres', '$tractamentDomiciliari', '$allergies',
                '$habitsToxics', '$antecendentsPatologics','$entornFamiliar', '$nHc')");


                if($query_insertar){
                    $alert="<p class='msg_correcto'>El paciente ha sido ingresado correctamente</p>";
                    
                }else{
                    $alert="<p class='msg_error'>El paciente ya esta ingresado</p>";
                }
            
            
            
            //  $_SESSION['ID_ingreso'] =  $row['ID'];
            
            //     $query_insertar = mysqli_query($conexion, "INSERT INTO tconstants (procedencia, assignacioLlit, assignacioSala, motiuIngres, dataIngres, tractamentDomiciliari,allergies,habitsToxics,antecendentsPatologics,entornFamiliar,ID)
            //     VALUES('$procedencia','$assignacioLlit','$assignacioSala',' $motiuIngres ',' $dataIngres ','$tractamentDomiciliari','$allergies','$habitsToxics','$antecendentsPatologics','$entornFamiliar','$ID')");
                
            //     if($query_insertar){
            //         $alert="<p class='msg_correcto'>El codigo de ingreso ha sido creado correctamente</p>";
            //     }else{
            //         $alert="<p class='msg_error'>Error al crear el usuario</p>";
            //     }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once("scripts.php");

?>


</head>

<body>
    <?php 
        include_once("header.php");
        // if (empty($_SESSION['nHc']))
        // {
        // echo "no hay";
        // } 

        // if($_SESSION['tipo'] != 'admin'){
        //     header("location: inicial.php");
        // }

    
    ?>
    <div class="container_general">
        <div class="container_paciente">
            <div class="form_dades_container">
                <h1>Ingreso de paciente</h1>
                <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
                <form action="" id="validate" method="post">
                <div>
                    <h2>Dades generals</h2>
                        <fieldset>
                            <label for="dataIngres">Data d'ingres:
                                <input type="date" id="dataIngres" name="dataIngres">
                            </label>
                            <label for="procedencia">Procedencia:
                                <input type="text" name="procedencia" id="procedencia" >
                            </label>
                        </fieldset>
                        <fieldset>
                            <label for="assignacioLlit">Asignació de Cama:
                                <input type="text" name="assignacioLlit" id="assignacioLlit">
                            </label>
                            <label for="assignacioSala">Asignació de Sala:
                                <select name="assignacioSala">
                                    <option value="">--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <!-- <input type="text" name="assignacioSala" id="assignacioSala" > -->
                            </label>
                        </fieldset>
                        <fieldset>
                            <label for="motiuIngres">Motiu de Ingreso:
                                <input type="text" name="motiuIngres" id="motiuIngres" >
                            </label>
                            <label for="tractamentDomiciliari">Tratamiento Domiciliario:
                                <input type="text" name="tractamentDomiciliari" id="tractamentDomiciliari">
                            </label>
                        </fieldset>
                        <fieldset>
                            <label for="allergies">Alergias:
                                <input type="text" name="allergies" id="allergies">
                            </label>

                            <label for="habitsToxics">Hábitos Tóxicos:
                                <input type="text" name="habitsToxics" id="habitsToxics">
                            </label>
                        </fieldset>
                        <fieldset>
                            <label for="antecendentsPatologics">Antecedentes Patológicos:
                                <input type="text" name="antecendentsPatologics" id="antecendentsPatologics" >
                            </label>
                            <label for="entornFamiliar">Entorno Familiar:
                                <input type="text" name="entornFamiliar" id="entornFamiliar" >
                            </label>
                        </fieldset>
                        <!-- <label for="ID">ID:</label>
                        <input type="text" name="ID" id="ID" ><br> -->
                        <fieldset>
                        <label for="nHc">nHc:
                        <?php 

                        // $DNI = $_POST['dni'];
                        $query2 = mysqli_query($conexion, "SELECT tdades.nHc, tdades.nom
                        FROM tdades
                        LEFT JOIN tingres ON tdades.nHc = tingres.nHc
                        WHERE tingres.nHc IS NULL;");
                        //esta consulta solo muestra los numeros de historiales clinicos de las personas que no estan ingresadas. 
                        // $sql = mysqli_query($conexion, "SELECT * FROM tusuaris ORDER BY nomUsuari ASC LIMIT $desde,$por_pagina");
                        $resultado = mysqli_num_rows($query2);

                        if($resultado > 0){

                            // Crear el elemento select
                            echo '<select name="nHc">';
                        
                            // Recorrer los resultados y mostrar cada número de historial como una opción del select
                            while ($row = mysqli_fetch_assoc($query2)){
                                $nom = $row['nom'];

                                echo '<option value="' . $row['nHc'] . '">' .$nom."-".$row['nHc']. '</option>';
                                
                            }
                        
                            echo '</select>';
                        } else {
                            echo 'No se encontraron números de historial.';
                        }
                        
                        ?>
                        </label>
                        </fieldset>

<!--                         
                        <input type="text" name="nHc" id="nHc" > -->
                   
                        <!-- <input type="hidden" id="ID" name="ID" value="1"> -->
                        <input type="submit" value="Submit" class="submitForm">
                </div>
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