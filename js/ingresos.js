$(document).ready(function () {

  // Array ingresos
  let ingresos = [];

  $.ajax({
    url: "consultar_ingresos.php",
    dataType: "json",
    success: function (data) {
      console.log(data);

      ingresos = data;

      let tarjeta = "";
      $counter = 0;

      // Código para crear las tarjetas HTML de los ingresos...

      // Si quedó una persona sin pareja, cerramos el último <li> para evitar errores de HTML
      if ($counter % 2 != 0) {
        tarjeta += '</li></ul>';
      }
      $('#container_paciente').append(tarjeta);

      // Actualizar la cuenta de resultados
      $("#total_resultados").text($counter);

      // Agregar la clase "pagina_actual" al botón de la Sala 1
      $('.pagination button[value="1"]').addClass('pagina_actual');

      // Mostrar los ingresos de la Sala 1 al iniciar la página
      actualizarLista();
    },
    error: function (xhr, status, error) {
      console.error(xhr, status, error);
      alert('Ha habido un error al cargar los datos.');
    }
  });


  function actualizarLista() {
    // Obtener el valor seleccionado del botón de la paginación
    let salaSeleccionada = $('.pagina_actual').val();

    // Vaciar el contenedor de ingresos
    $('#container_paciente').empty();

    // Filtrar los ingresos por la sala seleccionada y crear nuevas tarjetas HTML para los ingresos que cumplen con el filtro
    let tarjeta = "";
    let ingresosFiltrados = ingresos.filter(paciente => paciente.assignacioSala === salaSeleccionada);
    ingresosFiltrados.forEach((paciente, index) => {
      // Si es la primera persona del par, abrimos un <ul>
      if (index % 2 === 0) {
        tarjeta += '<ul>';
      }

      tarjeta += `<a href="tablaPaciente.php?nHc=${paciente.nHc}"><p> ${paciente.nom} ${paciente.cognom}</p>`;

      tarjeta += '<p>' + paciente.nHc + '</p>';
      tarjeta += '<p>' + paciente.assignacioLlit + '</p>';


      // Si es la segunda persona del par, cerramos el <ul>
      if (index % 2 !== 0 || index === ingresosFiltrados.length - 1) {
        tarjeta += '</a></ul>';
      }
    });

    // Agregar las nuevas tarjetas HTML al contenedor de ingresos
    $('#container_paciente').append(tarjeta);

    // Actualizar la cuenta de resultados
    $("#total_resultados").text(ingresosFiltrados.length);
  }

  // Actualizar la lista cada vez que se hace clic en un botón de la paginación
  $('.pagination').on('click', 'button', function () {
    // Cambiar la clase del botón actual y de los demás botones
    $('.pagination button').removeClass('pagina_actual');
    $(this).addClass('pagina_actual');

    // Actualizar la lista de ingresos
    actualizarLista();
  });

});