$(function () {
  
  $.validator.setDefaults({
    submitHandler: function () {

      const ToggleUsuario = {
        UrlControl: "../../php/Controller/ControlerUsuario.php",
        UrlReturn: "ToggleQuest.php",
        Formulario: document.getElementById("ToggleUsuario"),
      };

      methodSend(ToggleUsuario);

    }
  });
  $('#ToggleUsuario').validate({

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
