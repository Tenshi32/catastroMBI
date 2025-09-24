$(function () {
  
  $.validator.setDefaults({
    submitHandler: function () {

      const TogglePasswd = {
        UrlControl: "../../php/Controller/ControlerUsuario.php",
        UrlReturn: "TogglePasswd.php",
        Formulario: document.getElementById("ToggleQuest"),
      };

      methodSend(TogglePasswd);

    }
  });
  $('#ToggleQuest').validate({

    //Reglas/Validaciones 
    rules: {

      //Datos Cita
      respuesta1: {
        required: true,
        minlength: 2,
      },

      respuesta2: {
        required: true,
        minlength: 2,
      },

      respuesta3: {
        required: true,
        minlength: 2,
      },

    },

    //Mensages de validaciones
    messages: {

      respuesta1: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
      },
      
      respuesta2: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
      },

      respuesta3: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
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
