$(function () {
  
  $.validator.setDefaults({
    submitHandler: function () {

      const UpPasswd = {
        UrlControl: "../../php/Controller/ControlerUsuario.php",
        UrlReturn: "../../login.php",
        Formulario: document.getElementById("TogglePasswd"),
      };

      methodSend(UpPasswd);

    }
  });
  $('#TogglePasswd').validate({

    //Reglas/Validaciones 
    rules: {

      //Datos Cita
      PasswdNew: {
        required: true,
        pattern: /^[a-zA-Z1-9\s]+$/,
      },

      PasswdNewConfirm: {
        required: true,
        pattern: /^[a-zA-Z1-9]+$/,
      },

    },

    //Mensages de validaciones
    messages: {

      PasswdNew: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 5 caracteres",
        pattern: "La contraseña debe incluir al menos una mayúscula, minúscula, número",
      },
      
      PasswdNewConfirm: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 5 caracteres",
        pattern: "La contraseña debe incluir al menos una mayúscula, minúscula, número",
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
