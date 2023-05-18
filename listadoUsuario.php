<!DOCTYPE html>
<html lang="es">

<head>
  <?php include_once("scripts.php"); ?>
  <?php
  include_once('connexiobbddsanitat.php');

  ?>

</head>

<body>
  <?php
  include_once("header.php");

  if ($_SESSION['tipo'] != 'admin') {
    header("location: inicial.php");
  }
  ?>

  <!-- container_general - no tocar -->
  <div class="container_general">
    <div class="second_container">


      <h1 class="titulos">LLISTA D'USUARIOS</h1>

      <div class="navegacion">
        <a href="inicial.php">Home ></a>&nbsp<p>LLISTA D'USUARIS</p>
      </div>

      <div class="anadir_busca">
        <a href="crear_usuari.php">AFEGIR NOU USUARI</a>

        <form action="buscadorUsuari.php" class="form_container" method="get" name="formu">
          <div class="field" id="searchform">
            <input class="inputs" id="busqueda" name="busqueda" type="text" placeholder="Col·loca DNI o nom" />
            <button type="submit" value="buscar"><img class="iconSearch" src="https://img.icons8.com/material-outlined/256/search.png"></button>
          </div>
        </form>
      </div>

      <h3 style="padding: 10px 4px 0 4px">Col·loca clau login</h3>
      <form action="#" method="post" name="clau" class="form_container" style="margin: 10px 4px">

        <div class="field" id="searchform">

          <input class="inputs" id="codi" name="codi" type="text" placeholder="Col·loca la clau" style="flex:initial" />
          <button type="submit" value="buscar"><img class="iconSearch" src="https://img.icons8.com/material-outlined/256/search.png"></button>
        </div>

      </form>
      <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>


      <?php

      /* CLAVE LOGIN */


      if ($_POST) {
        $nom = $_SESSION['nombre'];

        $codi = $_POST["codi"];

        $query = mysqli_query($conexion, "SELECT * FROM tusuaris WHERE nomUsuari = '$nom'");
        $resultado = mysqli_fetch_assoc($query);

        if ($resultado) {
          // El usuario existe, actualizar el campo 'codi'
          $query_actualizar = mysqli_query($conexion, "UPDATE tusuaris SET codi = '$codi' WHERE nomUsuari = '$nom'");

          if ($query_actualizar) {
            $alert = "<p class='msg_correcto'>El código ha sido insertado correctamente en el usuario.</p>";
          } else {
            $alert = "<p class='msg_error'>Error al actualizar el código del usuario.</p>";
          }
        } else {
          $alert = "<p class='msg_error'>El usuario no existe.</p>";
        }
      }



      /* PAGINADOR */

      $sql_registro = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM tusuaris");

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

      $sql = mysqli_query($conexion, "SELECT * FROM tusuaris ORDER BY nomUsuari ASC LIMIT $desde,$por_pagina
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

          $nomUsuari = $row["nomUsuari"];
          $cognomUsuari = $row["cognomUsuari"];
          $dni = $row["DNI"];
          $telefono = $row["telefono"];



          echo "

    <tr>
        <td titulo='NOMBRE:'>$nomUsuari</td>
        <td titulo='APELLIDOS:'>$cognomUsuari</td>
        <td titulo='DNI:'>$dni</td>
        <td titulo='TELEFONO:'>$telefono</td>
        <td titulo='ACCIONES:'>
          <a class='link_editar' href='editar_usuario.php?DNI=$dni'>EDITAR</a>";

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