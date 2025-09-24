$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      const Login = {
        UrlControl: "php/Controller/ControlerSesion.php",
        UrlReturn: "registrados.php",
        Formulario: document.getElementById("CreateLogin"), // Usamos el objeto form recibido
      };
      methodSend(Login);
    },
  });

  $("#CreateLogin").validate({
    //Reglas/Validaciones
    rules: {
      //Datos Cita
      usuario: {
        required: true,
      },
      Passwd: {
        required: true,
      },
    },

    //Mensages de validaciones
    messages: {
      usuario: {
        required: "Campo Obligatorio",
      },
      Passwd: {
        required: "Campo Obligatorio",
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
    },
  });
});
