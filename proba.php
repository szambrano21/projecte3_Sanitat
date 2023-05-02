<?php 


if(!empty($_POST)){
    $alert="";
    if(empty($_POST["DNI"]) || empty($_POST["nom"]) || empty($_POST["cognom"]) || empty($_POST["nHc"]) || 
    empty($_POST["dataNaixament"]) || empty($_POST["sexe"]) || empty($_POST["telefon"]) || empty($_POST["resolucion"]) || empty($_POST["mail"]) 
    || empty($_POST["direccio"]) || empty($_POST["personaContacte"]) || empty($_POST["telefonPersonsaContacte"])  || empty($_POST["relacioContacte"])  ){


        $alert="<p class='msg_error'>Todos los campos son obligatorios</p>";
    }else{
        include_once('connexiosaraismabbdd.php');

        $DNI = $_POST["DNI"];
        $nom = $_POST["nom"];
        $cognom = $_POST["cognom"];
        $nHc = $_POST["nHc"];
        $dataNaixament = $_POST["dataNaixament"];
        $sexe = $_POST["sexe"];
        $telefon = $_POST["telefon"];
        $mail = $_POST["mail"];
        $direccio = $_POST['direccio'];
        $personaContacte = $_POST["personaContacte"];
        $telefonPersonsaContacte = $_POST['telefonPersonsaContacte'];
        $relacioContacte = $_POST["relacioContacte"];
//        $DNICreador = $_POST['DNICreador'];

        $query = mysqli_query($conexion,"SELECT * FROM tingres WHERE nom = '$nom'");
        $resultado = mysqli_fetch_assoc($query);

        if($resultado > 0){
            $alert="<p class='msg_error'>La proteína ya existe</p>";
        }else{

            $query_insertar = mysqli_query($conexion, "INSERT INTO tingres (nom, cognom, DNI, nHc, dataNaixament, sexe, telefon, mail, direccio, personaContacte,telefonPersonsaContacte, relacioContacte)
            VALUES('$DNI','$nom','$cognom','$nHc','$dataNaixament','$sexe','$telefon','$mail','$direccio' ,'$personaContacte' ,'$telefonPersonsaContacte' ,'$relacioContacte')");

            if($query_insertar){
                $alert="<p class='msg_correcto'>El ingreso ha sido creado correctamente</p>";
            }else{
                $alert="<p class='msg_error'>Error al dar de alta al ingreso del paciente</p>";
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
    
    <div class="container_general">
        <div class="espacio_arriba"></div>
        <div class="container_proba">
        <h1>INGRES DEL PACIENT</h1>
        <hr>
        <form action="proba.php">
            <div>
                <label for="nom">Nom</label><br>
                <input type="text" id="nom" name="nom"><br><br>
            </div>
            <div>
                <label for="cognom">Cognom</label><br>
                <input type="text" id="cognom" name="cognom"><br><br>
            </div>
            <div>
                <label for="DNI">DNI:</label><br>
                <input type="text" id="DNI" name="DNI">
            </div>
            <div>
                <label for="nHC">nHC:</label><br>
                <input type="text" id="nHC" name="nHC"><br><br>
            </div>

            <div>
                <label for="dataNaixament">Data de naixement:</label><br>
                <input type="date" id="dataNaixament" name="dataNaixament"><br><br>
            </div>
            <div>
                <label for="sexe">Sexe:</label><br>
                <input type="text" id="sexe" name="sexe">
            </div>
            <div>
                <label for="telefon">Telèfon:</label><br>
                <input type="text" id="telefon" name="telefon">
            </div>                        
            <div>
                <label for="mail">Correu electronic:</label><br>
                <input type="text" id="mail" name="mail">
            </div>
            <div>
                <label for="direccio">Direcció:</label><br>
                <input type="text" id="direccio" name="direccio">
            </div>
            <div>
                <label for="personaContacte">Persona de contacte:</label><br>
                <input type="text" id="personaContacte" name="personaContacte">
            </div>
            
            <div>
                <label for="telefonPersonsaContacte	">Telefon de la persona de contacto:</label><br>
                <input type="text" id="telefonPersonsaContacte	" name="telefonPersonsaContacte	">
            </div>

            <div>
                <label for="relacioContacte">Relació de la persona de contacto:</label><br>
                <input type="text" id="relacioContacte" name="relacioContacte">
            </div>

            <input type="submit" value="Submit">

        </form> 
        </div>
    </div>
</body>
</html>
