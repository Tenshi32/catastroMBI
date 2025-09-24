


$(function () {
  bsCustomFileInput.init();
});

const form = document.getElementById("SoliEts");
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {

      const SEmpa = {
        UrlControl: "../php/Controller/ControlerEmpa.php",
        UrlReturn: "../consul/citas/consul_soli.php",
        Formulario: document.getElementById("SoliEts"),
      };

      methodSend(SEmpa);

    }
  });
  $('#SoliEts').validate({

    //Reglas/Validaciones 
    rules: {

      //Datos Personales
      inmueble: {
        required: true,
      },

      Propiedad_Documento: {
        required: true,
        accept: "application/pdf"
      },

      nombre_ocupante: {
        minlength: 3,
        maxlength: 50,
        pattern: /^[a-zA-Z\s]+$/,
        required: true,
      },
      apellido_ocupante: {
        minlength: 3,
        maxlength: 50,
        pattern: /^[a-zA-Z\s]+$/,
        required: true,
      },
      id_ocupante: {
        required: true,
        minlength: 6,
        number: true,
      },
      Telefono_ocupante: {
        required: true,
        minlength: 11,
        maxlength: 11,
        pattern: /^0416|0426|0414|0424|0412\d{7}$/,
        number: true,
      },

      razon_solicitud: {
        required: true,
        minlength: 4,
        maxlength: 100,
      },

    },

    //Mensages de validaciones
    messages: {

      nombre_ocupante: {
        minlength: "Cantidad mínima es de 3 numeros",
        maxlength: "Cantidad máxima es de 50 numeros",
        pattern: "Campo de solo texto",
        required: "Campo Obligatorio",
      },
      apellido_ocupante: {
        minlength: "Cantidad mínima es de 3 numeros",
        maxlength: "Cantidad máxima es de 50 numeros",
        pattern: "Campo de solo texto",
        required: "Campo Obligatorio",
      },
      id_ocupante: {
        minlength: "Cantidad mínima es de 6 numeros",
        number: "Solo se permiten Numero",
        required: "Campo Obligatorio",
      },
      Telefono_ocupante: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 11 numeros",
        maxlength: "Cantidad máxima es de 11 numeros",
        pattern: "El teléfono debe comenzar con 0416, 0426, 0414, 0424 o 0412",
        number: "Solo se permiten Numero",
      },

      razon_solicitud: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 caracteres",
        maxlength: "Cantidad máxima es de 100 caracteres",
      },

      inmueble: {
        required: "Campo Obligatorio",
      },
      titulo_supletorio: {
        required: "Debe cargar un archivo PDF",
        accept: "Solo se permiten archivos PDF"
      },

    },

    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },

    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },

    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
      $(element).addClass("is-valid");
    }

  });
});