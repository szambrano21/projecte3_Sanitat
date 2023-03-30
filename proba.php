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
                <label for="dni">DNI:</label><br>
                <input type="text" id="dni" name="dni">
            </div>
            <div>
                <label for="nHC">nHC:</label><br>
                <input type="text" id="nHC" name="nHC"><br><br>
            </div>
            <div>
                <label for="nom_complet">Nom complet:</label><br>
                <input type="text" id="nom_complet" name="nom_complet"><br><br>
            </div>
            <div>
                <label for="data_naixement">Data de naixement:</label><br>
                <input type="date" id="data_naixement" name="data_naixement"><br><br>
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
                <label for="telefon_personaContacto">Telefon de la persona de contacto:</label><br>
                <input type="text" id="telefon_personaContacto" name="telefon_personaContacto">
            </div>

            <div>
                <label for="relacioPersonaContacte">Relació de la persona de contacto:</label><br>
                <input type="text" id="relacioPersonaContacte" name="relacioPersonaContacte">
            </div>

            <input type="submit" value="Submit">

        </form> 
        </div>
    </div>
</body>
</html>
