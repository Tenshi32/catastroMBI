$(function () {
  bsCustomFileInput.init();

  $.validator.setDefaults({
    submitHandler: function () {
      const PAvaluo = {
        UrlControl: "../../php/Controller/ControlerAvaluo.php",
        UrlReturn: "../../proces/avaluacion/consul_ava.php",
        Formulario: document.getElementById("ProceAvaluo"),
      };

      methodSend(PAvaluo);
    },
  });
  $("#ProceAvaluo").validate({
    //Reglas/Validaciones
    rules: {
      //Datos Terreno
      edad_efectiva: {
        required: true,
        number: true,
        maxlength: 2,
      },

      refaccion: {
        required: true,
      },

      TipologiaTerreno: {
        required: true,
      },

      TipologiaConstruccion: {
        required: true,
      },

      depresiacion: {
        required: true,
      },

      observacion_avaluo: {
        required: true,
        maxlength: 200,
      },
    },

    //Mensages de validaciones
    messages: {
      edad_efectiva: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Numero",
        maxlength: "Cantidad máxima es de 2 caracteres",
      },
      refaccion: {
        required: "Campo Obligatorio",
      },
      TipologiaConstruccion: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Numero",
      },
      TipologiaTerreno: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Numero",
      },
      depresiacion: {
        required: "Campo Obligatorio",
      },
      observacion_avaluo: {
        required: "Campo Obligatorio",
        maxlength: "Cantidad máxima es de 200 caracteres",
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
