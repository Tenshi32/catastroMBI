
//Initialize Select2 Elements
$('.select2').select2()

//Money Euro
$('[data-mask]').inputmask()

document.getElementById("tipo_documento").addEventListener("change", function () {

  const TipoRegistro = [
    registradoForm = {
      id: "1",
      form: document.getElementById("registradoForm"),
      rules: ["#numero_titulo_supletorio", "#fecha_evacuacion"],
    },
    notariadoForm = {
      id: "2",
      form: document.getElementById("notariadoForm"),
      rules: ["#numero_documento", "#numero_folio", "#numero_tomo", "#numero_protocolo"],
    },
  ];

  ocultarFormulario(TipoRegistro, this.value);
  
});

$(function () {

  bsCustomFileInput.init();

  $.validator.setDefaults({
    submitHandler: function () {

      const SETS = {
        UrlControl: "../php/Controller/ControlerEvacuacion.php",
        UrlReturn: "../consul/citas/consul_soli.php",
        Formulario: document.getElementById("soli-ets"),
      };

      methodSend(SETS);
      
    }
  });
  $('#soli-ets').validate({

    //Reglas/Validaciones 
    rules: {

      //Datos Personales
      tipo_documento: {
        required: true,
      },

      inmueble: {
        required: true,
      },

      //datos registro
      numero_titulo_supletorio: {
        minlength: 4,
        maxlength: 8,
      },

      fecha_evacuacion: {
        date: true,
      },

      //datos notariados
      numero_documento: {
        minlength: 6,
        maxlength: 12,
      },

      numero_folio: {
        minlength: 4,
        maxlength: 7,
      },

      numero_tomo: {
        minlength: 3,
        maxlength: 6,
      },

      numero_protocolo: {
        maxlength: 1,
      },

      Cedula: {
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

      //Datos S TS
      tipo_documento: {
        required: "Campo Obligatorio",
      },
      inmueble: {
        required: "Campo Obligatorio",
      },
      numero_titulo_supletorio: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 4 caracteres",
        maxlength: "Cantidad máxima es de 8 caracteres",
      },
      fecha_evacuacion: {
        required: "Campo Obligatorio",
        date: "Introduzca una Fecha Valida",
      },
      numero_documento: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 caracteres",
        maxlength: "Cantidad máxima es de 12 caracteres",
      },
      numero_folio: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 4 caracteres",
        maxlength: "Cantidad máxima es de 7 caracteres",
      },
      numero_tomo: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 3 caracteres",
        maxlength: "Cantidad máxima es de 6 caracteres",
      },
      numero_protocolo: {
        required: "Campo Obligatorio",
        maxlength: "Cantidad máxima es de 1 caracteres",
      },
      Cedula: {
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