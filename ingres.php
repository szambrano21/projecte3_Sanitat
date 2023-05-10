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
                    $alert="<p class='msg_error'>Error al ingresar al paciente</p>";
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
        // if (empty($_SESSION['nHc']))
        // {
        // echo "no hay";
        // } 

        if($_SESSION['tipo'] != 'admin'){
            header("location: inicial.php");
        }

    
    ?>
    <div class="container_general">
        <div class="container_paciente">
            <div class="form_dades_container">
                <h1>Ingreso de paciente</h1>
                <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>
                <form action="" id="validate" method="post">
                <div>
                    <h2>Dades generals</h2>
                        
                        <label for="dataIngres">Data d'ingres:</label><br>
                        <input type="date" id="dataIngres" name="dataIngres">
                       
                        <label for="procedencia">Procedencia:</label>
                        <input type="text" name="procedencia" id="procedencia" ><br>

                        <label for="assignacioLlit">Asignació de Cama:</label>
                        <input type="text" name="assignacioLlit" id="assignacioLlit" ><br>

                        <label for="assignacioSala">Asignació de Sala:</label>
                        <input type="text" name="assignacioSala" id="assignacioSala" ><br>

                        <label for="motiuIngres">Motiu de Ingreso:</label>
                        <input type="text" name="motiuIngres" id="motiuIngres" ><br>

                        <!-- <label for="dataIngres">Fecha de Ingreso:</label>
                        <input type="date" name="dataIngres" id="dataIngres"><br> -->

                        <label for="tractamentDomiciliari">Tratamiento Domiciliario:</label>
                        <input type="text" name="tractamentDomiciliari" id="tractamentDomiciliari" ><br>

                        <label for="allergies">Alergias:</label>
                        <input type="text" name="allergies" id="allergies" ><br>

                        <label for="habitsToxics">Hábitos Tóxicos:</label>
                        <input type="text" name="habitsToxics" id="habitsToxics" ><br>

                        <label for="antecendentsPatologics">Antecedentes Patológicos:</label>
                        <input type="text" name="antecendentsPatologics" id="antecendentsPatologics" ><br>

                        <label for="entornFamiliar">Entorno Familiar:</label>
                        <input type="text" name="entornFamiliar" id="entornFamiliar" ><br>

                        <!-- <label for="ID">ID:</label>
                        <input type="text" name="ID" id="ID" ><br> -->
                        <label for="nHc">nHc:</label>
                        <?php 

                        // $DNI = $_POST['dni'];
                        $query2 = mysqli_query($conexion, "SELECT nHc FROM tdades");
                        // $sql = mysqli_query($conexion, "SELECT * FROM tusuaris ORDER BY nomUsuari ASC LIMIT $desde,$por_pagina");
                        $resultado = mysqli_num_rows($query2);
                        if($resultado > 0){

                            // Crear el elemento select
                            echo '<select name="nHc">';
                        
                            // Recorrer los resultados y mostrar cada número de historial como una opción del select
                            while ($row = mysqli_fetch_assoc($query2)){
                                
                                echo '<option value="' . $row['nHc'] . '">' . $row['nHc'] . '</option>';
                                
                            }
                        
                            echo '</select>';
                        } else {
                            echo 'No se encontraron números de historial.';
                        }

                        ?>

<!--                         
                        <input type="text" name="nHc" id="nHc" > -->
                   
                        <!-- <input type="hidden" id="ID" name="ID" value="1"> -->
                        <input type="submit" value="Submit">
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