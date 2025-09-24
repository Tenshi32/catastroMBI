$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      const NegarCita = {
        UrlControl: "../../php/Controller/ControlerCita.php",
        UrlReturn: "../../consul/solicitud/consul_solicitud.php",
        Formulario: document.getElementById("NegarSoli"),
      };

      methodSend(NegarCita);
    },
  });
  $("#NegarSoli").validate({
    //Reglas/Validaciones
    rules: {
      //Datos Cita
      razon_negacion: {
        required: true,
      },
    },

    //Mensages de validaciones
    messages: {
      razon_negacion: {
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
      $(element).addClass("is-valid");
    },
  });
});
