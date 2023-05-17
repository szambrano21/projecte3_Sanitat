<?php include_once("scripts.php"); 
include_once('connexiobbddsanitat.php');
?>

<link rel="stylesheet" href="css/infoStyles.css">
</head>
<style>

  h1{
    color: black;
  }

  .target, .target-2{
    background-color: #1F354A;
    width: 350px;
    padding: 0 20px 20px 0px;
    margin: 20px;
    border-radius: 5px;
    height: 500px;
  }
  .target-2{
    height: 400px;
  }
  .container_target{
    display: flex;
    align-self: flex-start;
  }
  .iconn{
    display: inline-block;
    background-color: #cee1f5;
    height: 40px;
    width: 40px;
    color: black;
  }
  .grid{
    display: flex;
    margin: 10px 0px 3px 42px;
  }

  .col{
    padding: 10px;
  }

</style>

<body>
<?php   
    include_once("header.php");

    if($_SESSION['tipo'] != 'admin'){
      header("location: inicial.php");
    }
     ?>
<?php
          
$nHc = $_GET['nHc'];

$sql = mysqli_query($conexion, "SELECT *
FROM tingres
INNER JOIN tdades ON tingres.nHc = tdades.nHc
WHERE tingres.nHc = '$nHc'
");

$row = mysqli_fetch_assoc($sql);
//TDADES
$nom = $row['nom'];
$cognom = $row['cognom'];
$DNI = $row['DNI'];
$dataNaixament = $row['dataNaixament'];
$sexe = $row['sexe'];
$direccio = $row['direccio'];
$personaContacte = $row['personaContacte'];
$telefonPersonsaContacte = $row['telefonPersonsaContacte'];
$relacioContacte = $row['relacioContacte'];

//TINGRES
$fecha = $row["dataIngres"];
$assignacioLlit  = $row["assignacioLlit"];
$assignacioSala = $row["assignacioSala"];
$motiuIngres = $row["motiuIngres"];
$tractamentDomiciliari = $row["tractamentDomiciliari"];
$allergies = $row["allergies"];
$habitsToxics = $row["habitsToxics"];
$antecendentsPatologics = $row["antecendentsPatologics"];
$entornFamiliar = $row["entornFamiliar"];
$procedencia = $row["procedencia"];
?>

<div class="container_general">
<div class="second_container">


<h1 class="titulos">TABLA PACIENTE</h1>

<div class="container container_general" >

    <div class="container_target">
      
      <div class="target">
        <span class="iconn">
         <i class="fa-solid fa-bed" style="padding:10px"></i>
        </span>
        <h2 style="float:right"><?php echo $nHc;?></h2>
        <hr style="margin: 0px 0px 10px;">
        <div class="grid">
            <div class="col">
              <h3>Nombre</h3>
              <p><?php echo $nom;?></p>
            </div>
            <div class="col">
              <h3>Cognom</h3>
              <p><?php echo $cognom;?></p>
            </div>
            <div class="col">
              <h3>DNI</h3>
              <p><?php echo $DNI;?></p>
            </div>
        </div>
        <div class="grid">
            <div class="col">
              <h3>Data de naixement</h3>
              <p><?php echo $dataNaixament;?></p>
            </div>
            <div class="col">
              <h3>Sexe</h3>
              <p><?php echo $sexe;?></p>
            </div>
        </div>
        <div class="grid">
            <div class="col">
              <h3>direccio</h3>
              <p><?php echo $direccio;?></p>
            </div>
        </div>
        <div class="grid">
            <div class="col">
              <h3>Persona contacte</h3>
              <p><?php echo $personaContacte;?></p>
            </div>
            <div class="col">
              <h3>Telefon de la persona </h3>
              <p><?php echo $telefonPersonsaContacte;?></p>
            </div>
        </div>
        <div class="grid">
            <div class="col">
              <h3>Relacio amb el pacient</h3>
              <p><?php echo $relacioContacte;?></p>
            </div>
        </div>
      </div>
      <div class="target">
        <span class="iconn">
         <i class="fa-solid fa-bed" style="padding:10px"></i>
        </span>
        <h2 style="float:right">Ingresado</h2>
        <hr style="margin: 0px 0px 10px;">
        <div class="grid">
            <div class="col">
              <h3>Procedencia del pacient</h3>
              <p><?php echo $procedencia  ;?></p>
            </div>
            <div class="col">
              <h3>Motiu de l'ingres</h3>
              <p><?php echo $motiuIngres;?></p>
            </div>
        </div>
        <div class="grid">
            <div class="col">
              <h3>Data de ingres</h3>
              <p><?php echo $fecha;?></p>
            </div>
            <div class="col">
              <h3>Tractament domiciliari</h3>
              <p><?php echo $tractamentDomiciliari;?></p>
            </div>
        </div>
        <div class="grid">
            <div class="col">
              <h3>al·lèrgies</h3>
              <p><?php echo $allergies;?></p>
            </div>
            <div class="col">
              <h3>Habits toxics del pacient</h3>
              <p><?php echo $habitsToxics;?></p>
            </div>
        </div>
        <div class="grid">
            <div class="col">
              <h3>Antecedents patologics</h3>
              <p><?php echo $antecendentsPatologics;?></p>
            </div>
            <div class="col">
              <h3>Entorn familiar </h3>
              <p><?php echo $entornFamiliar;?></p>
            </div>
        </div>
      </div>
      <div class="target-2">
        <span class="iconn">
         <i class="fa-solid fa-bed" style="padding:10px"></i>
        </span>
        <h2 style="float:right">Sala i cama</h2>
        <hr style="margin: 0px 0px 10px;">
        <div class="grid">
            <div class="col">
              <h3>Nº sala assignada</h3>
              <p><?php echo $assignacioSala;?></p>
            </div>
        </div>
        <div class="grid">
            <div class="col">
              <h3>Nº d'habitació assignada</h3>
              <p><?php echo $assignacioLlit;?></p>
            </div>
        </div>
        <hr>
        <div class="grid">
            <!-- <div class="col">
              <h3>Nou ingres</h3>
              <br>
              <p><a class='link_editar' href='ingres.php?NHC=<?php echo $nHc?>'>+</a></p>
            </div> -->
            <div class="col">
              <h3>Editar dades d'ingres</h3>
              <br>
              <p><a class='link_editar' href='editar_ingres.php?nHc=<?php echo $nHc?>'>EDITAR</a></p>
            </div>
        </div>
        <div class="grid">
            <div class="col">
              <h3>Imprimir información completa</h3>
              <br>
              <p><a class='link_editar' id="link_imprimir" href="info_paciente.php?nHc=<?php echo $nHc; ?>">IMPRIMIR</a></p>
            </div>
        </div>
        <!-- <a class='link_editar' href='editar_usuario.php?DNI=$dni'>EDITAR</a> -->
      </div>
     

    </div>
    </div>
    
  <!-- <div class="content">
    <div class="page active" data-page="dashboard">
      <!-- <div class="header">
        <div class="title">
          <h2>Dades Pacient</h2>
        </div>
      </div> 
      <div class="grid">
        <div class="card">
          <div class="head">
            <span class="icon">
              <i class="fa-solid fa-bed"></i>
            </span>
            <span class="stat">
              Ingres del pacient?
            </span>
            <div class="status">
            </div>
          </div>
          <?php
          /*
             $nHc = $_GET['nHc'];

            $sql = mysqli_query($conexion, "SELECT * FROM tingres WHERE nHc = '$nHc'");

                    $row = mysqli_fetch_assoc($sql);
                    $fecha = $row["dataIngres"];
                    $assignacioLlit  = $row["assignacioLlit"];
                    $assignacioSala = $row["assignacioSala"];
                    $motiuIngres = $row["motiuIngres"];
                    $tractamentDomiciliari = $row["tractamentDomiciliari"];
                    $allergies = $row["allergies"];
                    $habitsToxics = $row["habitsToxics"];
                    $antecendentsPatologics = $row["antecendentsPatologics"];
                    $entornFamiliar = $row["entornFamiliar"];
                    $procedencia = $row["procedencia"];

                    ?>
                    <div class="body">
                        <h2>Data/Hora d'ingres</h2>
                        <p>
                          <?php $fecha;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Assignació de Llit</h2>
                        <p>
                        <?php echo $assignacioLlit;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Assignació de Sala</h2>
                        <p>
                        <?php echo $assignacioSala;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Procedència: </h2>
                        <p>
                        <?php echo $procedencia;?>
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

                */

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
                <a class='link_editar' href='editar_usuario.php?DNI=$dni'>EDITAR</a>
              </p>
            </div>
            <div class="body">
                <p>
                    <a class='link_editar' href='info_paciente.php?DNI=$dni'>IMPRIMIR</a>
                </p>
            </div>
            <div class="body">
                <p>
                    <a class='link_eliminar' href='eliminar_usuario.php?DNI=$dni'>ELIMINAR</a>
                </p>
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
</div> -->
</div>
</div>
</body>