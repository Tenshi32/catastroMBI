$(function () {
  
  $.validator.setDefaults({
    submitHandler: function () {

      const UnlockQuest = {
        UrlControl: "../../php/Controller/ControlerUsuario.php",
        UrlReturn: "UnlockQuest.php",
        Formulario: document.getElementById("UnlockUsuario"),
      };

      methodSend(UnlockQuest);

    }
  });
  $('#UnlockUsuario').validate({

    //Reglas/Validaciones 
    rules: {

      //Datos Cita
      usuario: {
        required: true,
      },

    },

    //Mensages de validaciones
    messages: {

      usuario: {
        required: "Campo Obligatorio",
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
      $(element).removeClass('is-invalid');
    }

  });
});
