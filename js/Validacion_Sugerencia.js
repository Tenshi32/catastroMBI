$(function () {
  $.validator.setDefaults({

    submitHandler: function () {
      
      let Sugerencia = {
        UrlControl: "php/Controller/ControlerUsuario.php",
        UrlReturn: "registrados.php",
        Formulario: document.getElementById("registroSugerencia"),
      };

      methodSend(Sugerencia);

    },
  });
  $("#registroSugerencia").validate({
    //Reglas/Validaciones
    rules: {
      //Datos Cita
      sugerencia: {
        required: true,
        maxlength: 100,
      },
    },

    //Mensages de validaciones
    messages: {
      sugerencia: {
        required: "Campo Obligatorio",
        maxlength: "Cantidad máxima es de 100 numeros",
      },
    },

    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },

    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },

    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
      $(element).addClass("is-valid");
    },
  });
});
