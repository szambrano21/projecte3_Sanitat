
$(document).ready(function() {
    $.validator.addMethod("dni", function(value, element) {
        return this.optional(element) || /^[0-9]{8}[a-zA-Z]$/.test(value);
      }, "Por favor, introduzca un DNI v���lido.");



    $("#validate").validate({
        rules:{
            nombre : {
                required: true,
                minlength: 3
            },
            dni : {
                required: true,
                dni:true,
            },

        },
        messages : {
            nombre: {
              required: "Introduzca su nombre",
              minlength: "El nombre deber���a tener 3 car���cteres como m���nimo"
            },
            dni: {
                dni: "dni no valido",
                required: "Introduce el DNI",
            }
        }
        
    })
})