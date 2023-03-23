$(document).ready(function() {
    // dni con patron de 8 numeros y una letra
    $.validator.addMethod("dni", function(value, element) {
        return this.optional(element) || /^[0-9]{8}[a-zA-Z]$/.test(value);
    }, "Por favor, introduzca un DNI válido.");
/*
    //localidad tipo string
    $.validator.addMethod("localidad", function(value, element) {
        return this.optional(element) || typeof value === "string"; //comprobamos si es una cadena de caracteres
    }, "Por favor, introduzca una localidad válida.");
    
    //provincia tipo string
    $.validator.addMethod("provincia", function(value, element) {
        return this.optional(element) || typeof value === "string"; //comprobamos si es una cadena de caracteres
    }, "Por favor, introduzca una localidad válida.");

    //comprobación de radio buttons
    $.validator.addMethod("radioGroupRequired", function(value, element, options) {
        let group = $(element).closest("form").find("[name='" + options + "']");
        return group.filter(":checked").length > 0;
    }, "Por favor seleccione al menos una opción.");
*/

    $("#basic-form").validate({
        rules: {
        dni : {
            required: true,
            dni:true,
        },
        nHC : { //averiguar 
            required: true,
            
        },
        nom_complet : {
            required: true,
            minlength: 2
        },
        data_naixement:{
            required: true
        },
        sexe: {
            required: true
        },
        telefon: {
            required: true,
            number: true,
            maxlength: 9,
            minlength: 9
        },
        mail: {
            required:true,
            email: true
        },
        tipoPersona: {//guardar en radiobuttons
            radioGroupRequired: "tipoPersona"
        },
        pregunta: {
            required:{
                depends: function(elem){
                    if ($('input[type=radio][name=pregunta]:checked').length < 0) {
                        // Se ha seleccionado al menos un radio button
                        console.log("selecciona al menos un radio button");
                    } 
                }
            },
        },
        
        },

        messages : {
        
        nom_complet: {
            required: "Inserte su nombre",
            minlength: "El nombre debería tener 2 carácteres como mínimo"
        },
        
        apellidos: {
            required: "Inserte su apellido",
            minlength: "El apellido debería tener 3 carácteres como mínimo"
        },
        direccion:{
            required: "Inserte su dirección"
        } ,
        cp:{
            number: "Codigo postal no valido (son numeros)"
        },

        dni: {
            required: "Introduce el DNI",
            dni: "dni no valido",
            maxlength: "introduce  8 numeros y una letra"
        },
        age: {
            required: "Introduce tu edad",
            number: "Por favor introduce tu edad con números",
            min: "Deberías ser mayor de edad"
        },
        email: {
            required: "Introduce al menos un correo electronico o un numero de telefono",
            email: "El email debería estar en el formato: abc@dominio.tld"
        },
        telefono: {
            number:"Introduce el telefono en numeros",
            required: "Introduce al menos un correo electronico o un numero de telefono",
            min: "Introduce  9 caracteres",
            maxlength: "introduce  9 caracteres"            
        },
        tipoPersona: {
            radioGroupRequired: "Por favor seleccione al menos una opción."
        },
        queja: {
            required: "Si la queja a sido seleccionada, es obligatoria responder, sino quiere responder no seleccione "
        },

        }
    });

         $("input[name=pregunta]").click(function(){
         
                console.log($("input[name=pregunta]").val());
                console.log($(this).checked);
                
                //console.log($(this).attr("id"));
            });
        $("#queja").click(function(  ) {
            css()
            console.log(" Elemento: " + this.value + "\n Seleccionado: " + this.checked);

            console.log(this.checked);
            if (this.checked == true){
                $("#quejas").css("display", "block");
                
            }
            else
            {
                $("#quejas").css("display", "none");
            }
            
        });

        $("#sugerencia").click(function(  ) {
            css()
            console.log(" Elemento: " + this.value + "\n Seleccionado: " + this.checked);
            console.log($("#sugerencias").css("display"));
            if (this.checked == true) {
                $("#sugerencias").css("display", "block");
                
            }
            else
            {
                $("#sugerencias").css("display", "none");
            } 
        });
        function css(){
            $("textarea").focus(function (){
                $(this).css("background", "white");
            })

            $("textarea").blur(function (){
                $(this).css("background", "gray");
            })
        }
    });