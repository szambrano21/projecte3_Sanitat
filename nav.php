
<!-- 
<div class="menu">
        
        <ul>
            <li><a href='index.php'><i class="fa-solid fa-house-chimney"></i> HOMEPAGE</a></li>
           


            <?php
                if($_SESSION['tipo'] == 'admin' ){
                    
                    // echo '<li><a href="#"><i class="fa-solid fa-users"></i> USUARIOS</a>
                    // <ul>
                    //     <li><a href="crear_usuario.php"><i class="fa-solid fa-user-plus"></i> CREAR USUARIO</a>
                    //     <li><a href="listado_usuarios.php"><i class="fa-solid fa-users"></i> LISTADO DE USUARIOS</a>
                    // </ul>   
                    // </li>';
            }
            ?>

            <li><a href="#"><i class="fa-solid fa-dna"></i> PROTEINAS</a>
                <ul>
                    <li><a href="crear_proteina.php"><i class="fa-solid fa-dna"></i> CREAR PROTEINA</a>
                    <li><a href="listado_proteinas.php"><i class="fa-solid fa-dna"></i> LISTADO DE PROTEINAS</a>
                </ul>   
            </li>
            
            <li><a href="#"><i class="fa-solid fa-capsules"></i> FÁRMACOS</a>
                <ul>
                    <li><a href="crear_farmaco.php"><i class="fa-solid fa-prescription-bottle-medical"></i> CREAR FÁRMACO</a>
                    <li><a href="listado_farmacos.php"><i class="fa-solid fa-capsules"></i> LISTADO DE FÁRMACOS</a>
                </ul>   
            </li>
        
        </ul>

    </div> -->


            <div class="menu">
                <i class="fas fa-bars" id="btn_menu"></i>
                <div class="container_session">
            <li class="user_session"><h1><?php echo $_SESSION['nombre'] ,' - ', $_SESSION['tipo']?></h1> </li>
            <li class="user_session"><a class="salir" href="salir.php"><i class="fa-solid fa-power-off"></i></a></li>
        </div>
                    <ul class="menu_nav">

                        <li><span class="logotipo" href="inicial.php">LOGOTIPO</span></li>
                        <li><a class="active" href="inicial.php">DASHBOARD</a></li>
                        <li><a href="listadoUsuario.php">Usuarios</a></li>
                        <li><a href="ingresos.php">Ingresos</a></li>
                        <li><a href="pacientes.php">Pacientes</a></li>



                    </ul>

            </div>


    <script src="js/script.js"></script>