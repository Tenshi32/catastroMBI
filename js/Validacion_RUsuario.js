function togglepassword() {
  var password = document.getElementById("Passwd");
  var confirm_password = document.getElementById("PasswdConfirm");
  if (password.type === "password") {
    password.type = "text";
    confirm_password.type = "text";
  } else {
    confirm_password.type = "password";
    password.type = "password";
  }
}

const form = document.getElementById("create-login");
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      const RUsuario = {
        UrlControl: "php/Controller/ControlerUsuario.php",
        UrlReturn: "login.php",
        Formulario: document.getElementById("create-login"),
      };

      methodSend(RUsuario);
    },
  });
  $("#create-login").validate({
    //Reglas/Validaciones
    rules: {
      //Datos Personales
      cedula: {
        required: true,
        minlength: 6,
        maxlength: 8,
        number: true,
      },
      nombre: {
        required: true,
        minlength: 4,
        pattern: /^[a-zA-Z\s]+$/,
      },
      apellido: {
        required: true,
        minlength: 4,
        pattern: /^[a-zA-Z\s]+$/,
      },
      fecha_nac: {
        required: true,
        date: true,
      },
      correo: {
        required: true,
        email: true,
      },
      direccion: {
        required: true,
        minlength: 5,
      },

      //Datos de la Cuenta
      usuario: {
        required: true,
        minlength: 5,
        pattern: /^[a-zA-Z1-9]+$/,
      },

      Passwd: {
        required: true,
        minlength: 5,
        pattern: /^[a-zA-Z1-9.]+$/,
      },
      PasswdConfirm: {
        required: true,
        minlength: 5,
        pattern: /^[a-zA-Z1-9.]+$/,
      },
      nivel: {
        required: true,
      },
      //Datos de Seguridad
      pregunta1: {
        required: true,
      },
      repuesta1: {
        required: true,
        minlength: 2,
      },
      pregunta2: {
        required: true,
      },
      repuesta2: {
        required: true,
        minlength: 2,
      },
      pregunta3: {
        required: true,
      },
      repuesta3: {
        required: true,
        minlength: 2,
      },
    },

    //Mensages de validaciones
    messages: {
      //Datos Personales
      cedula: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 numeros",
        maxlength: "Cantidad máxima es de 8 numeros",
        number: "Solo se permiten Numero",
      },
      nombre: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 caracteres",
        pattern: "Solo se permiten Texto",
      },
      nivel: {
        required: "Campo Obligatorio",
      },
      apellido: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 caracteres",
        pattern: "Solo se permiten Texto",
      },
      fecha_nac: {
        required: "Campo Obligatorio",
        date: "Introduzca una Fecha Valida",
      },
      correo: {
        required: "Campo Obligatorio",
        email: "Introduzca un Correo Eletronico Valido",
      },
      direccion: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 caracteres",
      },

      //Datos de la Cuenta
      usuario: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 caracteres",
        pattern: "El usuario debe incluir solo texto y numero",
      },
      Passwd: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 5 caracteres",
        pattern:
          "La contraseña debe incluir al menos una mayúscula, minúscula, número y punto(.)",
      },
      PasswdConfirm: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 5 caracteres",
        pattern:
          "La contraseña debe incluir al menos una mayúscula, minúscula, número y punto(.)",
      },

      //Datos de Seguridad
      pregunta1: {
        required: "Campo Obligatorio",
      },
      repuesta1: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
      },
      pregunta2: {
        required: "Campo Obligatorio",
      },
      repuesta2: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
      },
      pregunta3: {
        required: "Campo Obligatorio",
      },
      repuesta3: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
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
