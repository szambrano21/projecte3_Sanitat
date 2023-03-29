<?php

$alert = '';

session_start();
if(!empty($_SESSION['activo'])){
    header("location: inicial.php");
}else{


if(!empty($_POST)){
    if(empty($_POST["username"]) || empty($_POST["password"]) ) {
        $alert = "INGRESA TU USUARIO Y CONTRASEÑA";
    }else{
        include_once('connexiobbddsanitat.php');
        $user = mysqli_real_escape_string($conexion, $_POST["username"]);
        $pass = mysqli_real_escape_string($conexion, $_POST["password"]);

/*        $pass = md5(mysqli_real_escape_string($conexion, $_POST["password"]));
*/
        $query = mysqli_query($conexion, "SELECT * FROM tusuaris WHERE nomUsuari = '$user' AND Password = '$pass' ");
        $resultado = mysqli_num_rows($query);

        if($resultado > 0){
            $row = mysqli_fetch_assoc($query);
            session_start();
            $_SESSION['activo'] = true;
            $_SESSION['DNI'] = $row['DNI'];
            $_SESSION['nombre'] = $row['nomUsuari']; 
            $_SESSION['tipo'] = $row['Tipo']; 


            header("location: inicial.php");


        }else{
            $alert = "EL USUARIO Y LA CONTRASEÑA SON INCORRECTOS";
            session_destroy();
        }
    }
}
}

?>

<!DOCTYPE html>
<html>
<head>
    
<?php include_once("scripts.php")?>

</head>
<body>

<div class="container_login">
    <form class="login" action="index.php" id="formulario" method="post">
        <div class="container_usuario">
            <i class="fa-solid fa-user usuario_arriba"></i>
        </div>
        <label for="username">  
            <i class="fa-solid fa-user"></i>
            <input placeholder="username" type="text" name="username" id="username">
        </label>
        <label>
            <i class="fa-solid fa-lock"></i>
            <input placeholder="password" type="password" name="password" id="password">
        </label>
        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?> </div>

        <div class="container_link">
            <div class="check_remember">
                <input type="checkbox" name="guardar" id="guardar">
                <a href="" class="link">Remember me</a>
            </div>
            <a href="" class="link">Forgot your password?</a>
        </div>
        <br>
        <input type="submit" value="LOGIN" class="button">
    </form>
</div>
    <script src="login.js"></script>
</body>
</html>



