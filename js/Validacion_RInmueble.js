$("[data-mask]").inputmask();

$(".ReturnPage").click(function () {
  window.history.back();
});

document.getElementById("n_civico").addEventListener("input", function (e) {
  e.target.value = e.target.value.toUpperCase();
});

$(document).ready(function () {
  // Inicializar el Stepper
  const stepper = new Stepper(document.querySelector(".bs-stepper"));

  // Inicializar la validación en cada paso
  $("#regist_inmueble").validate({
    //Reglas/Validaciones
    rules: {
      //Datos basicos del inmueble
      nombre_inmueble: {
        minlength: 3,
        maxlength: 11,
      },
      n_civico: {
        required: true,
        minlength: 1,
        maxlength: 10,
      },
      numero_inmueble: {
        minlength: 11,
        maxlength: 11,
        required: true,
        pattern: /^0416|0426|0414|0424|0412\d{7}$/,
        number: true,
      },
      estado_inmueble: {
        required: true,
        minlength: 5,
        maxlength: 500,
      },
      parroquia: {
        required: true,
      },
      residencia: {
        required: true,
        minlength: 5,
        maxlength: 25,
      },

      //Datos de la direccion del inmueble
      ubicacion_entre_tipo: {
        required: true,
      },
      ubicacion_entre_text: {
        required: true,
        minlength: 2,
        maxlength: 25,
      },
      ubicacion_y_tipo: {
        required: true,
      },
      ubicacion_y_text: {
        required: true,
        minlength: 2,
        maxlength: 25,
      },
      lugar_inmuble_tipo: {
        required: true,
      },
      lugar_inmuble_text: {
        required: true,
        minlength: 4,
        maxlength: 25,
      },
      punto_referencia: {
        required: true,
        minlength: 5,
        maxlength: 100,
      },

      //Datos tecnicos del inmueble
      tipo_construccion_tipo: {
        required: true,
      },
      tipo_registro: {
        required: true,
      },
      medida_inmueble: {
        required: true,
        minlength: 1,
        maxlength: 10,
        number: true,
      },
      valor_inmueble: {
        required: true,
        minlength: 2,
        maxlength: 10,
        number: true,
      },

      //Datos medidas y linderos del inmueble
      entrada_lindero: {
        required: true,
      },
      norte_descripcion: {
        required: true,
        minlength: 2,
        maxlength: 20,
      },
      norte_medida: {
        required: true,
        minlength: 1,
        maxlength: 6,
      },
      sur_descripcion: {
        required: true,
        minlength: 2,
        maxlength: 20,
      },
      sur_medida: {
        required: true,
        minlength: 1,
        maxlength: 6,
      },
      este_descripcion: {
        required: true,
        minlength: 2,
        maxlength: 20,
      },
      este_medida: {
        required: true,
        minlength: 1,
        maxlength: 6,
      },
      oeste_descripcion: {
        required: true,
        minlength: 2,
        maxlength: 20,
      },
      oeste_medida: {
        required: true,
        minlength: 1,
        maxlength: 6,
      },
    },

    //Mensages de validaciones
    messages: {
      //Datos basicos del inmueble
      nombre_inmueble: {
        minlength: "Cantidad mínima es de 3 numeros",
        maxlength: "Cantidad máxima es de 11 numeros",
      },
      n_civico: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 caracteres",
        maxlength: "Cantidad máxima es de 10 caracteres",
      },
      numero_inmueble: {
        minlength: "Cantidad mínima es de 10 caracteres",
        maxlength: "Cantidad máxima es de 11 caracteres",
        required: "Campo Obligatorio",
        pattern: "El teléfono debe comenzar con 0416, 0426, 0414, 0424 o 0412",
        number: "Solo se permiten Número",
      },
      estado_inmueble: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 5 caracteres",
        maxlength: "Cantidad máxima es de 500 caracteres",
      },
      parroquia: {
        required: "Campo Obligatorio",
      },
      residencia: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 5 caracteres",
        maxlength: "Cantidad máxima es de 25 caracteres",
      },

      //Datos de la direccion del inmueble
      ubicacion_entre_tipo: {
        required: "Campo Obligatorio",
      },
      ubicacion_entre_text: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
        maxlength: "Cantidad máxima es de 25 caracteres",
      },
      ubicacion_y_tipo: {
        required: "Campo Obligatorio",
      },
      ubicacion_y_text: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
        maxlength: "Cantidad máxima es de 25 caracteres",
      },
      lugar_inmuble_tipo: {
        required: "Campo Obligatorio",
      },
      lugar_inmuble_text: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 4 caracteres",
        maxlength: "Cantidad máxima es de 25 caracteres",
      },
      punto_referencia: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 5 caracteres",
        maxlength: "Cantidad máxima es de 100 caracteres",
      },

      //Datos tecnicos del inmueble
      tipo_construccion_tipo: {
        required: "Campo Obligatorio",
      },
      tipo_registro: {
        required: "Campo Obligatorio",
      },
      medida_inmueble: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 caracteres",
        maxlength: "Cantidad máxima es de 10 caracteres",
        number: "Solo se permiten Número",
      },
      valor_inmueble: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
        maxlength: "Cantidad máxima es de 10 caracteres",
        number: "Solo se permiten Número",
      },

      //Datos medidas y linderos del inmueble
      entrada_lindero: {
        required: "Campo Obligatorio",
      },
      norte_descripcion: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
        maxlength: "Cantidad máxima es de 20 caracteres",
      },
      norte_medida: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 números",
        maxlength: "Cantidad máxima es de 6 números",
      },
      sur_descripcion: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
        maxlength: "Cantidad máxima es de 20 caracteres",
      },
      sur_medida: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 números",
        maxlength: "Cantidad máxima es de 6 números",
      },
      este_descripcion: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
        maxlength: "Cantidad máxima es de 20 caracteres",
      },
      este_medida: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 números",
        maxlength: "Cantidad máxima es de 6 números",
      },
      oeste_descripcion: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 2 caracteres",
        maxlength: "Cantidad máxima es de 20 caracteres",
      },
      oeste_medida: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 números",
        maxlength: "Cantidad máxima es de 6 números",
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

  const form = document.getElementById("regist_inmueble");
  $(".BtnRegisInm").click(function (e) {
    if ($("#regist_inmueble").valid()) {
      const RInmueble = {
        UrlControl: "../php/Controller/ControlerInmueble.php",
        UrlReturn: "../consul/inmueble/consul_inmueble.php",
        Formulario: document.getElementById("regist_inmueble"),
      };

      methodSend(RInmueble);
    }
  });

  // Funciones de control del paso a paso
  $(".toggleNextBasico").on("click", function (e) {
    e.preventDefault();
    // Verificar si el paso actual es válido
    if ($("#regist_inmueble").valid()) {
      stepper.next(); // Pasar al siguiente paso
    }
  });

  $(".toggleBack").on("click", function (e) {
    e.preventDefault();
    stepper.previous(); // Volver al paso anterior
  });
});
