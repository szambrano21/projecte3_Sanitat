$(document).ready(function() {
    $.validator.addMethod("dni", function(value, element) {
        return this.optional(element) || /^[0-9]{8}[a-zA-Z]$/.test(value);
      }, "Si us plau, introdueix un DNI valid.");

    
    $.validator.addMethod("password", function(value, element) {
        // Mínimo 8 caracteres, una mayúscula y un símbolo
        let pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]).{8,}$/;
        
        return pattern.test(value);
      }, "La contrasenya ha de tenir almenys 8 caracteres, una mayuscula i un simbol.");


    $("#validate").validate({
        rules:{
            nombre : {
                required: true,
                minlength: 2
            },
            dni : {
                required: true,
                dni:true,
            },
            password: { 
                required:true, 
                password:true
            }
        },
        messages : {
            nombre: {
              required: "Introdueix el teu nom",
              minlength: "El nom a de tenir com a minim 2 caracters"
            },
            dni: {
                
                required: "Introdueix el DNI",
            },
            password : {
                required: "Introdueix la contrasenya"
            }
        }
        
    })
})