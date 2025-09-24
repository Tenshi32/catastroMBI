$(".select2").select2();

$("[data-mask]").inputmask();

$(".ReturnPage").click(function () {
  window.history.back();
});

function actualizarCamposVentana() {
  const Ventana = {
    select: document.getElementById("ventana"),
    codigo: document.getElementById("ventana_codigo"),
    cantidad: document.getElementById("ventana_cantidad"),
    texto: document.getElementById("ventana_texto"),
  };

  multiSelect(Ventana);
}

function actualizarCamposPuerta() {
  const Puerta = {
    select: document.getElementById("puerta"),
    codigo: document.getElementById("puerta_codigo"),
    cantidad: document.getElementById("puerta_cantidad"),
    texto: document.getElementById("puerta_texto"),
  };

  multiSelect(Puerta);
}

function actualizarCamposServicio() {
  const Servicio = {
    select: document.getElementById("servicio_publico"),
    codigo: document.getElementById("servicio_codigo"),
    cantidad: document.getElementById("servicio_cantidad"),
    texto: document.getElementById("servicio_texto"),
  };

  multiSelect(Servicio);
}

$(document).ready(function () {
  const stepper = new Stepper(document.querySelector(".bs-stepper"));

  bsCustomFileInput.init();

  $("#ProceInspe").validate({
    //Reglas/Validaciones
    rules: {
      //Datos Terreno
      tipo_escala: {
        required: true,
      },
      topografia: {
        required: true,
      },
      acceso: {
        required: true,
      },
      forma: {
        required: true,
      },
      entorno: {
        required: true,
      },
      mejora: {
        required: true,
      },
      ubicacion: {
        required: true,
      },
      tenecia_terreno: {
        required: true,
      },
      regimen: {
        required: true,
      },
      servicio_publico: {
        required: true,
      },

      //Datos Generales
      tipo_construccion: {
        required: true,
      },
      descripcion_uso: {
        required: true,
      },
      regimen_construccion: {
        required: true,
      },
      techo_inmueble: {
        required: true,
      },
      soporte_inmueble: {
        required: true,
      },
      cubierta_inmueble: {
        required: true,
      },

      //Datos Complementario
      paredes_inmueble: {
        required: true,
      },
      acabado_inmueble: {
        required: true,
      },
      pintura_inmueble: {
        required: true,
      },
      instalaciones_electricas_inmueble: {
        required: true,
      },
      piso_inmueble: {
        required: true,
      },
      conservacion_inmueble: {
        required: true,
      },
      puerta: {
        required: true,
      },
      ventana: {
        required: true,
      },

      //Datos Otros Datos
      anno_construccion: {
        required: true,
        number: true,
        minlength: 1,
        maxlength: 2,
      },
      anno_refaccion: {
        required: true,
        number: true,
        minlength: 1,
        maxlength: 2,
      },
      n_niveles: {
        required: true,
        number: true,
        minlength: 1,
        maxlength: 2,
      },
      n_edificaciones: {
        required: true,
        number: true,
        minlength: 1,
        maxlength: 2,
      },
      observacion: {
        required: true,
        maxlength: 200,
      },
      area_m2_c: {
        required: true,
        number: true,
      },
      area_m2_t: {
        required: true,
        number: true,
      },

      area_cr: {
        number: true,
      },
      area_tr: {
        number: true,
      },
      area_cc: {
        number: true,
      },
      area_tc: {
        number: true,
      },
      manzana: {
        required: true,
        number: true,
      },
      Azotea: {
        required: true,
      },
      Sotano: {
        required: true,
      },
      Plano_Mensura: {
        required: true,
        extension: "png|jpg|jpeg",
      },
      clase_inmueble: {
        required: true,
      },
    },

    //Mensages de validaciones
    messages: {
      Plano_Mensura: {
        required: "Campo Obligatorio",
        accept: "Solo se permiten archivos PNG, JPG o JPEG",
      },
      //Datos Terreno
      topografia: {
        required: "Campo Obligatorio",
      },
      tipo_escala: {
        required: "Campo Obligatorio",
      },
      acceso: {
        required: "Campo Obligatorio",
      },
      forma: {
        required: "Campo Obligatorio",
      },
      ubicacion: {
        required: "Campo Obligatorio",
      },
      entorno: {
        required: "Campo Obligatorio",
      },
      mejora: {
        required: "Campo Obligatorio",
      },
      tenecia_terreno: {
        required: "Campo Obligatorio",
      },
      regimen: {
        required: "Campo Obligatorio",
      },
      servicio_publico: {
        required: "Campo Obligatorio",
      },

      //Datos Generales
      tipo_construccion: {
        required: "Campo Obligatorio",
      },
      descripcion_uso: {
        required: "Campo Obligatorio",
      },
      regimen_construccion: {
        required: "Campo Obligatorio",
      },
      techo_inmueble: {
        required: "Campo Obligatorio",
      },
      soporte_inmueble: {
        required: "Campo Obligatorio",
      },
      cubierta_inmueble: {
        required: "Campo Obligatorio",
      },

      //Datos Complementario
      paredes_inmueble: {
        required: "Campo Obligatorio",
      },
      acabado_inmueble: {
        required: "Campo Obligatorio",
      },
      pintura_inmueble: {
        required: "Campo Obligatorio",
      },
      instalaciones_electricas_inmueble: {
        required: "Campo Obligatorio",
      },
      piso_inmueble: {
        required: "Campo Obligatorio",
      },
      conservacion_inmueble: {
        required: "Campo Obligatorio",
      },
      puerta: {
        required: "Campo Obligatorio",
      },
      ventana: {
        required: "Campo Obligatorio",
      },

      //Datos Otros Datos
      anno_construccion: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 caracteres",
        maxlength: "Cantidad máxima es de 2 caracteres",
        number: "Solo se permiten Numero",
      },
      anno_refaccion: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 caracteres",
        maxlength: "Cantidad máxima es de 2 caracteres",
        number: "Solo se permiten Numero",
      },
      n_niveles: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 caracteres",
        maxlength: "Cantidad máxima es de 2 caracteres",
        number: "Solo se permiten Numero",
      },
      n_edificaciones: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 caracteres",
        maxlength: "Cantidad máxima es de 2 caracteres",
        number: "Solo se permiten Numero",
      },
      observacion: {
        required: "Campo Obligatorio",
        maxlength: "Cantidad máxima es de 200 caracteres",
      },
      area_m2_c: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Numero",
      },
      area_m2_t: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Numero",
      },
      manzana: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Numero",
      },
      Azotea: {
        required: "Campo Obligatorio",
      },
      
      area_cr: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Numero",
      },
      area_cc: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Numero",
      },
      area_tr: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Numero",
      },
      area_tc: {
        required: "Campo Obligatorio",
        number: "Solo se permiten Numero",
      },

      Sotano: {
        required: "Campo Obligatorio",
      },
      clase_inmueble: {
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

  $(".BtnProceInspe").click(function () {
    if ($("#ProceInspe").valid()) {
      const PInspec = {
        UrlControl: "../../php/Controller/ControlerInspeccion.php",
        UrlReturn: "../../proces/inspeccion/consul_inspe.php",
        Formulario: document.getElementById("ProceInspe"),
      };

      methodSend(PInspec);
    }
  });

  $(".toggleNextBasico").on("click", function (event) {
    event.preventDefault();

    if ($("#ProceInspe").valid()) {
      stepper.next();
    }
  });

  $(".toggleBack").on("click", function (event) {
    event.preventDefault();
    stepper.previous();
  });
});

const RadioTitulo = document.querySelectorAll('input[name="clase_inmueble"]');
const FormTitulo = [
  {
    id: "Mixto",
    form: document.getElementById("Mixto"),
    rules: ["#area_cr", "#area_cc", "#area_tr", "#area_tc"],
  },
  {
    id: "Mixto",
    form: document.getElementById("Mixto"),
    rules: ["#area_cr", "#area_cc", "#area_tr", "#area_tc"],
  },
];

radioForm(FormTitulo, RadioTitulo);