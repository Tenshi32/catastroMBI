


$(function () {
  bsCustomFileInput.init();
});

const form = document.getElementById("SoliRml");
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {

      event.preventDefault()
      const data = new FormData(form)

      fetch('../php/Controller/ControlerInspeccion.php', {
        method: 'POST',
        body: data
      })

        .then(response => response.json())
        .then(data => {

          console.log(data);

          if (data.status == true) {

            Swal.fire('EXITOSO!', data.mensaje, 'success');
            setTimeout(() => { window.location.href = "../consul/citas/consul_soli.php" }, 1000);

          } else if (data.status == false) {

            Swal.fire('ERROR!', data.mensaje, 'error');

          } else {

            Swal.fire('ERROR!', data.message, 'warning');
          }
        })

        .catch(error => {
          console.error('Error:', error);
          if (data.status == false) {

            Swal.fire('ERROR!', data.mensaje, 'error');

          }

        });

    }
  });
  $('#SoliRml').validate({

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