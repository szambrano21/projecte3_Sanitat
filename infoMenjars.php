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
            <span class="title">
              Active Users
            </span>
            <h2 class="text">12</h2>
            <div class="graph">
              <div class="bar" data-day="sunday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="monday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="tuesday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="wednesday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="thursday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="friday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="saturday">
                <div class="bar-content"></div>
              </div>
            </div>
          </div>
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
        <div class="card-verticle">
          <div class="card-small">
            <span class="title">
              Active Users
            </span>
            <h2 class="text">12</h2>
            <div class="graph">
              <div class="bar" data-day="sunday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="monday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="tuesday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="wednesday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="thursday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="friday">
                <div class="bar-content"></div>
              </div>
              <div class="bar" data-day="saturday">
                <div class="bar-content"></div>
              </div>
            </div>
          </div>
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
        <div class="card">
          <div class="head">
            <span class="icon">
              <i class="icon ion-pound"></i>
            </span>
            <span class="stat">
              Ingres del pacient?
            </span>
            <div class="status">
            </div>
          </div>
          <?php
            $sql = mysqli_query($conexion, "SELECT * FROM tingres");
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
                    $id = $row["id"];

                    ?>
                    <div class="body">
                        <h2>Data/Hora d'ingres</h2>
                        <p>
                        <?php $alimentsNoGrassos;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Assignació de Llit</h2>
                        <p>
                        <?php echo $necessitatsAjudes;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Assignació de Sala</h2>
                        <p>
                        <?php echo $inapetenciaAnorexia;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Procedència: </h2>
                        <p>
                        <?php echo $pes;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Motiu de l'ingrés/diagnòstic</h2>
                        <p>
                            <?php echo $motiuIngres;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Tractament domiciliari</h2>
                        <p>
                            <?php echo $tractamentDomiciliari;?>
                        </p>
                    </div>


                    <?php

                }

        ?>
          <div class="footer">
            <div class="user">
              <div class="user-icon">
              </div>
              <span class="username">
                NAME OF PACIENT
              </span>
            </div>
          </div>
        </div>


        <div class="card">
          <div class="head">
            <span class="icon">
            <i class="fa-solid fa-person-dots-from-line" style="line-height: 3;"></i>
            </span>
            <span class="stat">
              Historial
            </span>
            <div class="status">
            </div>
          </div>
          <div class="body">
              <h2>Al·lèrgies:</h2>
              <p>
                  <?php echo $allergies;?>
              </p>
          </div>
          <div class="body">
            <h2>Habits toxics</h2>
            <p>
            <?php echo $habitsToxics;?>
            </p>
          </div>
          <div class="body">
            <h2>Antecedents patologics</h2>
            <p>
            <?php echo $antecendentsPatologics;?>
            </p>
          </div>
          <div class="body">
            <h2>Entorn Familiar</h2>
            <p>
            <?php echo $entornFamiliar;?>
            </p>
          </div>
          <div class="body">
            <h2>Procedencia del Pacient</h2>
            <p>
            <?php echo $procedencia;?>
            </p>
          </div>
          <div class="footer">
            <div class="user">
              <div class="user-icon">
              </div>
              <span class="username">
                uplusion23
              </span>
            </div>
          </div>
        </div>

      </div>
      <div class="stats">
        
      </div>
    </div>
    <div class="page noflex" data-page="users">
      <div class="header">
        <div class="title">
          <h2>Users</h2>
        </div>
      </div>
      <div class="grid">
        <div class="user-edit">
          <div class="header">
            <span class="icon">
              <i class="icon ion-person"></i>
            </span>
            <span class="user-edit-name">$_USERNAME</span>
            <a href="#" class="close"><i class="icon ion-close-round"></i></a>
          </div>
        </div>
        <div class="users-table">
          <div class="users-item header">
            <div class="table-item noflex">
              ID
            </div>
            <div class="table-item">
              Email Address
            </div>
            <div class="table-item">
              Username
            </div>
            <div class="table-item">
              Nickname
            </div>
            <div class="table-item">
              Active
            </div>
            <div class="table-item">
              Premium
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page noflex" data-page="download">
      <div class="header">
        <div class="title">
          <h2>Download</h2>
        </div>
      </div>
      <div class="grid">
        <div class="card wide">
          <div class="head">
            <span class="icon">
              <i class="icon ion-code-working"></i>
            </span>
            <span class="stat">
              Cheat Client
            </span>
            <div class="status">
            </div>
          </div>
          <div class="body">
            <h2>Latest Version: v$_VERSION</h2>
            <p>
              changelog here
            </p>
          </div>
          <div class="footer">
            <div class="user">
              <div class="user-icon">
              </div>
              <span class="username">
                Administrator 
              </span>
            </div>
            <a class="download" href="#">Download <i class="icon ion-archive"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="page noflex" data-page="about">
      <div class="header">
        <div class="title">
          <h2>About</h2>
        </div>
      </div>
      <div class="info-container">
        <div class="info">
          <a href="http://uplusion23.net/" target="_blank">Developer</a>
          <span>uplusion23</span>
        </div>
        <div class="info">
          <a href="#" target="_blank">Dashboard Version</a>
          <span>1.0.0</span>
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