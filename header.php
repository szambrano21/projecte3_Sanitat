<?php
session_start();
if(empty($_SESSION['activo'])){
    header("location: index.php");
}
?>
    <header>
        <div class="container_general_menu">
            <?php include_once("nav.php") ;?>
        </div>
    </header>
    
    