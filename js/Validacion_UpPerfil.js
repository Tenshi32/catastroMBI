function mostrarActualizar() {
  var perfil_readonly = document.getElementById("perfil_readonly");
  var perfil = document.getElementById("perfil");

  perfil.style.display = "block";
  perfil_readonly.style.display = "none";

}

function mostrarCancelar() {
  var perfil_readonly = document.getElementById("perfil_readonly");
  var perfil = document.getElementById("perfil");

  perfil_readonly.style.display = "block";
  perfil.style.display = "none";
}

const form = document.getElementById("UpdateUsuario");

$(function () {
  $.validator.setDefaults({
    submitHandler: function () {

      const UpUsuario = {
        UrlControl: "php/Controller/ControlerUsuario.php",
        UrlReturn: "perfil.php",
        Formulario: document.getElementById("UpdateUsuario"),
      };

      methodSend(UpUsuario);

    }
  });
  $('#UpdateUsuario').validate({

    //Reglas/Validaciones 
    rules: {

      //Datos Terreno
      fecha_nacimiento: {
        required: true,
      },

      direccion: {
        required: true,
      },

      correo: {
        required: true,
      },

    },

    //Mensages de validaciones
    messages: {
      fecha_nacimiento: {
        required: "Campo Obligatorio",
      },

      direccion: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Número"
      },

      correo: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Número"
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
