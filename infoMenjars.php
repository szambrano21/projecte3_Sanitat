<?php include_once("scripts.php"); 
include_once('connexiobbddsanitat.php');
?>

<link rel="stylesheet" href="css/infoStyles.css">
</head>


<body>
<?php   
    include_once("header.php");

    if($_SESSION['tipo'] != 'admin'){
      header("location: inicial.php");
    }
     ?> 


<div class="container container_general " >
  
  <div class="content">
    <div class="page active" data-page="dashboard">
      <!-- <div class="header">
        <div class="title">
          <h2>Dades Pacient</h2>
        </div>
      </div> -->
      <div class="grid">
      <div class="card-verticle">
          <div class="card-small">
          <?php
            $sql = mysqli_query($conexion, "SELECT * FROM tmenjars");
            $resultado = mysqli_num_rows($sql);
            if($resultado > 0){

                $row = mysqli_fetch_assoc($sql);
                    $alimentsNoGrassos = $row["alimentsNoGrassos"];
                    $necessitatsAjudes  = $row["necessitatsAjudes"];
                    $inapetenciaAnorexia = $row["inapetenciaAnorexia"];
                    $mida = $row["mida"];
                    $pes = $row["pes"];
                    $allergies = $row["protesisDental"];
                    $intolerancia = $row["intolerancia"];
                    $dietaHabitual = $row["dietaHabitual"];
                    $expectoracio = $row["expectoracio"];
                    $protesisDental = $row["protesisDental"];
                    // $id = $row["id"];

                    ?>
                    <div class="body">
                        <h2>Aliments no grassos</h2>
                        <p>
                        <?php echo $alimentsNoGrassos;?>
                        </p>
                    </div>
                    <div class="body">
                        <h3>Necessitats d'ajudes</h3>
                        <p>
                        <?php echo $necessitatsAjudes;?>
                        s
                        </p>
                    </div>
                    <div class="body">
                        <h3>Inapetencia anorexia</h3>
                        <p>
                        <?php echo $inapetenciaAnorexia;?>
                        
                        </p>
                    </div>
                    <div class="body">
                        <h3>mida</h3>
                        <p>
                          <?php echo $mida;?>
                        </p>
                    </div>
                    <div class="body">
                        <h3>pes</h3>
                        <p>
                          <?php echo $pes;?>
                        </p>
                    </div>
                    <div class="body">
                        <h3>protesisDental</h3>
                        <p>
                        <?php echo $protesisDental;?>
                        
                        </p>
                    </div>

                    
            <!-- <span class="title">
              Active Users
            </span>
            <h2 class="text">12</h2>
            <div class="body">
              a
            </div> -->
            <?php
            }
                    ?>
          </div>
          <div class="card-small">
            <span class="title">
              Active Users
            </span>
            <!-- <h2 class="text">12</h2> -->
            <div class="body">
                <h3>intolerancia</h3>
                <p>
                <?php echo $intolerancia;?>
                </p>
            </div>
            <div class="body">
                <h3>dietaHabitual</h3>
                <p>
                <?php echo $dietaHabitual;?>
                
                </p>
            </div>
            <div class="body">
                <h3>expectoracio</h3>
                <p>
                <?php echo $expectoracio;?>
                
                </p>
            </div>
          </div>
          <!-- <div class="card-small">
            <span class="title">
              Modificación de datos
            </span>
            <div class="body">
                <p>
                    <a class="link_editar" href="editar_usuario.php?DNI=$dni">EDITAR</a>
                </p>
            </div>
            <div class="body">
                <p>
                    <a class="link_eliminar" href="eliminar_usuario.php?DNI=$dni">ELIMINAR</a>
                </p>
            </div>
          </div> -->
        </div>
        <div class="card-verticle">
          <!-- <div class="card-small">
            <span class="title">
              Active Users
            </span>
            <h2 class="text">12</h2>
            a
          </div> -->
          <div class="card-small">
            <span class="title">
              Modificación de datos
            </span>
            <div class="body">
                <p>
                    <a class="link_editar" href="editar_usuario.php?DNI=$dni">EDITAR</a>
                </p>
            </div>
            <div class="body">
                <p>
                    <a class="link_eliminar" href="eliminar_usuario.php?DNI=$dni">ELIMINAR</a>
                </p>
            </div>
          </div>
        </div>  

      </div>
      
    </div>
   
  
 
  </div>
  <div class="sidebar">

  </div>
  <div class="dialog">
    <div class="dialog-block">
      <h2>Are you sure you want to logout?</h2>
      <div class="controls">
        <a href="#" class="button">Logout</a>
        <a data-dialog-action="cancel" href="#" class="button">Cancel</a>
      </div>
    </div>
  </div>
</div>
</body>