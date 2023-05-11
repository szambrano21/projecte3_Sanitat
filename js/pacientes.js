$(document).ready(function () {

  // Array pacientes
  let pacientes = [];

  $.ajax({
    url: "consultar_pacientes.php",
    dataType: "json",
    success: function (data) {
      console.log(data);

      pacientes = data;

      let tarjeta = "";
      $counter = 0;

      // Código para crear las tarjetas HTML de los pacientes...

      // Si quedó una persona sin pareja, cerramos el último <li> para evitar errores de HTML
      if ($counter % 2 != 0) {
        tarjeta += '</li></ul>';
      }
      $('#container_paciente').append(tarjeta);

      // Actualizar la cuenta de resultados
      $("#total_resultados").text($counter);

      // Agregar la clase "pagina_actual" al botón de la Sala 1
      $('.pagination button[value="1"]').addClass('pagina_actual');

      // Mostrar los pacientes de la Sala 1 al iniciar la página
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

    // Vaciar el contenedor de pacientes
    $('#container_paciente').empty();

    // Filtrar los pacientes por la sala seleccionada y crear nuevas tarjetas HTML para los pacientes que cumplen con el filtro
    let tarjeta = "";
    let pacientesFiltrados = pacientes.filter(paciente => paciente.assignacioSala === salaSeleccionada);
    pacientesFiltrados.forEach((paciente, index) => {
      // Si es la primera persona del par, abrimos un <ul>
      if (index % 2 === 0) {
        tarjeta += '<ul>';
      }

      tarjeta += '<li><p>' + paciente.nom + '</p>';
      tarjeta += '<p>' + paciente.nHc + '</p>';
      tarjeta += '<p>' + paciente.assignacioLlit + '</p>';


      // Si es la segunda persona del par, cerramos el <ul>
      if (index % 2 !== 0 || index === pacientesFiltrados.length - 1) {
        tarjeta += '</li></ul>';
      }
    });

    // Agregar las nuevas tarjetas HTML al contenedor de pacientes
    $('#container_paciente').append(tarjeta);

    // Actualizar la cuenta de resultados
    $("#total_resultados").text(pacientesFiltrados.length);
  }

  // Actualizar la lista cada vez que se hace clic en un botón de la paginación
  $('.pagination').on('click', 'button', function () {
    // Cambiar la clase del botón actual y de los demás botones
    $('.pagination button').removeClass('pagina_actual');
    $(this).addClass('pagina_actual');

    // Actualizar la lista de pacientes
    actualizarLista();
  });

});
