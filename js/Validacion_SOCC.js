


$(function () {
  
  bsCustomFileInput.init();

  $.validator.setDefaults({
    submitHandler: function () {

      const SOCC = {
        UrlControl: "../php/Controller/ControlerCita.php",
        UrlReturn: "../consul/citas/consul_soli.php",
        Formulario: document.getElementById("SoliOcc"),
      };

      methodSend(SOCC);

    }
  });
  $('#SoliOcc').validate({

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

      razon_solicitud: {
        required: true,
        minlength: 4,
        maxlength: 100,
      },

    },

    //Mensages de validaciones
    messages: {

      inmueble: {
        required: "Campo Obligatorio",
      },
      Propiedad_Documento: {
        required: "Debe cargar un archivo PDF",
        accept: "Solo se permiten archivos PDF"
      },
      razon_solicitud: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 caracteres",
        maxlength: "Cantidad máxima es de 100 caracteres",
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