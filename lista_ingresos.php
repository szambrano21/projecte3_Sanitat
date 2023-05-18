
<!DOCTYPE html>
<html lang="es">

<head>
  <?php include_once("scripts.php"); ?>
  <?php
  include_once('connexiobbddsanitat.php');

  ?>
    <title>Lista de ingresados</title>

</head>

<body>
  <?php
  include_once("header.php");


  ?>

  <!-- container_general - no tocar -->
  <div class="container_general">
    <div class="second_container">


    <h1 class="titulos">LLISTA D'INGRESOS</h1>



      <!-- ESPACIO -->
      <div class="anadir_busca">
                    <a href="ingres.php">AFEGIR NOU INGRÉS</a>

                    <form action="buscadorIngresos.php" class="form_container" method="get" name="formu">
                        <div class="field" id="searchform">
                            <input class="inputs" id="busqueda" name="busqueda" type="text" placeholder="Col·loca DNI o nom" />
                            <button type="submit" value="buscar"><img class="iconSearch" src="https://img.icons8.com/material-outlined/256/search.png"></button>
                        </div>
                    </form>
                </div><br>


      <?php

      /* PAGINADOR */

      $sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tingres");

      $resultado_registro = mysqli_fetch_assoc($sql_registro);
      $total_registro = $resultado_registro['total_registro'];

      $por_pagina = 5;

      if (empty($_GET['pagina'])) {
        $pagina = 1;
      } else {
        $pagina = $_GET['pagina'];
      }

      $desde = ($pagina - 1) * $por_pagina;
      $total_paginas = ceil($total_registro / $por_pagina);

      $sql = mysqli_query($conexion, "SELECT * FROM tingres JOIN tdades ON tingres.nHc = tdades.nHc ORDER BY nom ASC LIMIT $desde,$por_pagina
");

      $resultado = mysqli_num_rows($sql);

      if ($resultado > 0) {

        echo "

  <table class='tablas_usuarios'>
    <thead>
      <tr>
        <th>NOM</th>
        <th>COGNOMS</th>
        <th>DNI</th>
        <th>TELÈFON</th>
        <th>ACCIONS</th>
      </tr>
    </thead>

  ";

        while ($row = mysqli_fetch_assoc($sql)) {

          $nomIngreso = $row["nom"];
          $cognomIngreso = $row["cognom"];
          $dni = $row["DNI"];
          $telefono = $row["telefon"];



          echo "

    <tr>
        <td titulo='NOMBRE:'>$nomIngreso</td>
        <td titulo='APELLIDOS:'>$cognomIngreso</td>
        <td titulo='DNI:'>$dni</td>
        <td titulo='TELEFONO:'>$telefono</td>
        <td titulo='ACCIONES:'>
          <a class='link_editar' href='editarDatos.php?DNI=$dni'>EDITAR</a>";

          if ($dni != $_SESSION['DNI']) {
            echo "
              <a class='link_eliminar' href='eliminar_usuario.php?DNI=$dni'>ELIMINAR</a>  
            ";
          }
          echo "
        </td>
      </tr>
        ";
        }
      } else {
        echo "<h3 style='text-align:-webkit-center'>No encontrado</h3>";
      }
      ?>
      </table>


    <div class="paginationUser">
      <?php
      if ($pagina > 1) {
        echo "<li><a href='?pagina=" . ($pagina - 1) . "'>Anterior</a></li>";
      }

      for ($i = 1; $i <= $total_paginas; $i++) {
        if ($i == $pagina) {
          echo "<li><a class='pagina-actual'>$i</a></li>";
        } else {
          echo "<li><a href='?pagina=$i'>$i</a></li>";
        }
      }

      if ($pagina < $total_paginas) {
        echo "<li><a href='?pagina=" . ($pagina + 1) . "'>Siguiente</a></li>";
      }
      ?>
    </div>

    <?php

    mysqli_close($conexion); //cierra la BBDD

    ?>



  </div>
  </div>

</body>

</html>