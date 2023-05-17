<?php include_once("scripts.php"); ?>
<?php
include_once('connexiobbddsanitat.php');
?>
<link rel="stylesheet" href="css/infoStyles.css">
</head>
<?php
$temperaturas = array();
$presioArterial = array();
$sql = mysqli_query($conexion, "SELECT temperatura,presioArterial FROM tconstants");
$resultado = mysqli_num_rows($sql);

if($resultado > 0) {
  while($row = mysqli_fetch_assoc($sql)) {
    array_push($temperaturas, $row["temperatura"]);
    array_push($presioArterial, $row["presioArterial"]);  
    }
}


?>

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
        <div class="card">
          <div class="head">
            <span class="icon">
              <i class="icon ion-pound"></i>
            </span>
            <span class="stat">
              Constants del pacient
            </span>
            <div class="status">
            </div>
          </div>
          <?php
            $sql = mysqli_query($conexion, "SELECT * FROM tconstants");
            $resultado = mysqli_num_rows($sql);


            if($resultado > 0){

                $row = mysqli_fetch_assoc($sql);
                    $temperatura = $row["temperatura"];
                    $presioArterial  = $row["presioArterial"];
                    $pols = $row["pols"];
                    $glucemia = $row["glucemia"];
                    $saturacioO2 = $row["saturacioO2"];
                    $EVN = $row["EVN"];
                    $reavaluacioDolor = $row["reavaluacioDolor"];
                    $hemoglobina = $row["hemoglobina"];
                    $disfagiaLiquida = $row["disfagiaLiquida"];
                    $disfagiaSolids = $row["disfagiaSolids"];
                    
                    //array of general in the graphic
                    
                    ?>
                    <div class="body">
                        <h2>Temperatura</h2>
                        <p>
                        <?php $temperatura;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Presio Arterial</h2>
                        <p>
                        <?php echo $presioArterial;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Pols</h2>
                        <p>
                        <?php echo $pols;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>SaturacioC02 </h2>
                        <p>
                        <?php echo $saturacioO2;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>EVN</h2>
                        <p>
                            <?php echo $EVN;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Reavaluacio de dolor</h2>
                        <p>
                            <?php echo $reavaluacioDolor ;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Hemoglobina</h2>
                        <p>
                            <?php echo $hemoglobina ;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Disfagia Solida</h2>
                        <p>
                            <?php echo $disfagiaLiquida ;?>
                        </p>
                    </div>
                    <div class="body">
                        <h2>Disfagia Liquida</h2>
                        <p>
                            <?php echo $disfagiaSolids ;?>
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
        
        <!--
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
                  variable
              </p>
          </div>
          <div class="body">
            <h2>Habits toxics</h2>
            <p>
                variable
            </p>
          </div>
          <div class="body">
            <h2>Antecedents patologics</h2>
            <p>
                variable
            </p>
          </div>
          <div class="body">
            <h2>Entorn Familiar</h2>
            <p>
                variable
            </p>
          </div>
          <div class="body">
            <h2>Procedencia del Pacient</h2>
            <p>
                variable
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
            -->
        <div class="card-verticle">
          <div class="card-small">
            <span class="title">
              Active Constants
            </span>
            <h2 class="text">12</h2>
            <div class="chart-container">
                <canvas id="temperatura-chart"></canvas>
            </div>
          <?php
 

// ID del paciente específico
$pacienteId = $_GET['ID']; // Reemplaza con el ID del paciente que deseas mostrar

// Consulta para obtener las temperaturas y presiones arteriales del paciente específico
$query = "SELECT temperatura, presioArterial FROM tconstants WHERE ID_ingreso IN (SELECT ID_ingreso FROM tingres WHERE ID_ingreso = $pacienteId)";
$result = mysqli_query($conexion, $query);

// Arreglos para almacenar las temperaturas y presiones arteriales
$temperaturas = [];
$presionesArteriales = [];

// Obtener los datos de temperaturas y presiones arteriales
while ($row = mysqli_fetch_assoc($result)) {
  $temperaturas[] = $row['temperatura'];
  $presionesArteriales[] = $row['presioArterial'];
}


?>

<!-- Código HTML para mostrar el gráfico -->
<div>
    <canvas id="temperatura-chart"></canvas>
</div>
<style>
  table {
    width: 100%;
    border-collapse: collapse;
  }

  th, td {
    padding: 8px;
    text-align: left;
    
  }

  th {
    background-color: #f2f2f2;
    border: 1px solid black;
  }
  td{
    color: black;
  }
</style>
<table>
  <thead>
    <tr>
      <th>Mati</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>25°C</td>
      <td>120/80</td>
      <td>120/80</td>
      <td>120/80</td>
    </tr>
    <thead>
    <tr>
      <th>Tarda</th>
    </tr>
    </thead>
      <td>25°C</td>
      <td>120/80</td>
      <td>120/80</td>
      <td>120/80</td>
    </tr>
    <thead>
    <tr>
      <th>Nit</th>
    </tr>
    </thead>
      <td>25°C</td>
      <td>120/80</td>
      <td>120/80</td>
      <td>120/80</td>
    </tr>
  </tbody>
</table>

<!-- Código JavaScript para generar el gráfico -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("temperatura-chart").getContext("2d");
        var temperaturaChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: <?php echo json_encode(range(1, count($temperaturas))); ?>,
                datasets: [{
                        label: "Temperatura",
                        data: <?php echo json_encode($temperaturas); ?>,
                        backgroundColor: "rgba(255, 99, 132, 0.2)",
                        borderColor: "rgba(69, 140, 248, 0.8)",
                        borderWidth: 1
                    },
                    {
                        label: "Presión Arterial",
                        data: <?php echo json_encode($presionesArteriales); ?>,
                        backgroundColor: "rgba(255, 99, 132, 0.2)",
                        borderColor: "rgba(255, 99, 132, 1)",
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                  },
            plugins: {
                title: {
                    display: true,
                    text: 'Gráfica de Temperatura y Presión Arterial',
                    font: {
                        size: 18
                    }
                }
            }
        }
    });
});
</script>

            <!-- <canvas id="chart"></canvas>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
            <script src="js/chart.js"></script> -->
          </div>
          <div class="card-small" style="height: 200px;">
            <span class="title">
              Modificación de datos
            </span>
            <div class="body">
                <p>
                    <a class='link_editar' href='editar_usuario.php?DNI=$dni'>EDITAR</a>
                </p>
            </div>
            <br>
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
</div>
</body>