//Money Euro
$('[data-mask]').inputmask()
//Initialize Select2 Elements
$('.select2').select2()

  const RadioCivil = document.querySelectorAll('input[name="estado_civil"]');
  const FormCivil = [
    {
      id: "casado(a)",
      form: document.getElementById("ActaMatrimonio"),
      rules: ["#folio_AM", "#tomo_AM", "#n_acta_AM", "#fecha_acta_AM"],
    },
    {
      id: "divorciado(a)",
      form: document.getElementById("SetenciaDivorcio"),
      rules: ["#folio_SD", "#tomo_SD", "#n_acta_SD", "#fecha_acta_SD"],
    },
    {
      id: "Concubino(a)",
      form: document.getElementById("UnionHechos"),
      rules: ["#folio_UH", "#n_acta_UH", "#fecha_acta_UH", "#anno_union"],
    },
  ];
  
  radioForm(FormCivil, RadioCivil);


  const RadioSetencia = document.querySelectorAll('input[name="doc_declaracion"]');
  const FormSetencia = [
    {
      id: "si",
      form: document.getElementById("DeclaracionSucesoral"),
      rules: ["#folio_DS", "#tomo_DS", "#n_acta_DS", "#fecha_acta_DS"],
    },
    {
      id: "si",
      form: document.getElementById("DeclaracionSucesoral"),
      rules: ["#folio_DS", "#tomo_DS", "#n_acta_DS", "#fecha_acta_DS"],
    },
  ];

  radioForm(FormSetencia, RadioSetencia);

$(function () {

  bsCustomFileInput.init();

  $.validator.setDefaults({
    submitHandler: function () {

      const SRTT = {
        UrlControl: "../php/Controller/ControlerRTT.php",
        UrlReturn: "../consul/citas/consul_soli.php",
        Formulario: document.getElementById("SoliRtt"),
      };

      methodSend(SRTT);

    }
  });
  $('#SoliRtt').validate({

    //Reglas/Validaciones 
    rules: {

      //Datos Cita
      inmueble: {
        required: true,
      },

      estado_civil: {
        required: true,
      },

      doc_declaracion: {
        required: true,
      },

      fecha_acta_AM: {

      },
      fecha_acta_UH: {

      },
      fecha_acta_SD: {

      },
      fecha_acta_DS: {

      },

      nombre_cc: {
        minlength: 3,
        maxlength: 50,
        required: true,
      },

      direccion_cc: {
        minlength: 3,
        maxlength: 50,
        required: true,
      },

      telefono_cc: {
        minlength: 11,
        maxlength: 11,
        pattern: /^0416|0426|0414|0424|0412\d{7}$/,
        number: true,
        required: true,
      },

      fecha_emision: {
        required: true,
      },

      //Opcionales
      folio_UH: {
        number: true,
        minlength: 1,
        maxlength: 10,
      },

      anno_union: {
        number: true,
        minlength: 1,
        maxlength: 2,
      },
      
      folio_AM: {
        number: true,
        minlength: 1,
        maxlength: 10,
      },

      tomo_AM: {
        number: true,
        minlength: 1,
        maxlength: 2,
      },

      n_acta_UH: {
        number: true,
        minlength: 4,
        maxlength: 11,
      },
      n_acta_AM: {
        number: true,
        minlength: 4,
        maxlength: 11,
      },

      folio_SD: {
        number: true,
        minlength: 1,
        maxlength: 10,
      },

      tomo_SD: {
        number: true,
        minlength: 1,
        maxlength: 2,
      },

      n_acta_SD: {
        number: true,
        minlength: 4,
        maxlength: 11,
      },

      rif_DS: {
        number: true,
        minlength: 1,
        maxlength: 12,
      },

      descripcion_DS: {
        minlength: 5,
        maxlength: 400,
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


      //Datos Cita
      inmueble: {
        required: "Campo Obligatorio",
      },

      estado_civil: {
        required: "Campo Obligatorio",
      },

      fecha_acta_AM: {
        required: "Campo Obligatorio",
      },

      fecha_acta_UH: {
        required: "Campo Obligatorio",
      },

      fecha_acta_SD: {
        required: "Campo Obligatorio",
      },

      fecha_acta_DS: {
        required: "Campo Obligatorio",
      },

      doc_declaracion: {
        required: "Campo Obligatorio",
      },

      nombre_cc: {
        minlength: "Cantidad mínima es de 3 numeros",
        minlength: "Cantidad máxima es de 50 numeros",
        required: "Campo Obligatorio",
      },

      direccion_cc: {
        minlength: "Cantidad mínima es de 3 numeros",
        maxlength: "Cantidad máxima es de 50 numeros",
        required: "Campo Obligatorio",
      },

      telefono_cc: {
        minlength: "Cantidad mínima es de 10 numeros",
        maxlength: "Cantidad máxima es de 11 numeros",
        pattern: "El teléfono debe comenzar con 0416, 0426, 0414, 0424 o 0412",
        number: "Solo se permiten Números",
        required: "Campo Obligatorio",
      },

      fecha_emision: {
        required: "Campo Obligatorio",
      },

      //Opcionales
      folio_AM: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 numeros",
        maxlength: "Cantidad máxima es de 10 numeros",
        number: "Solo se permiten Números",
      },

      anno_union: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 numeros",
        maxlength: "Cantidad máxima es de 2 numeros",
        number: "Solo se permiten Números",
      },
      
      tomo_AM: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 numeros",
        maxlength: "Cantidad máxima es de 2 numeros",
        number: "Solo se permiten Números",
      },

      n_acta_AM: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 4 numeros",
        maxlength: "Cantidad máxima es de 11 numeros",
        number: "Solo se permiten Números",
      },

      n_acta_UH: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 4 numeros",
        maxlength: "Cantidad máxima es de 11 numeros",
        number: "Solo se permiten Números",
      },

      folio_UH: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 numeros",
        maxlength: "Cantidad máxima es de 10 numeros",
        number: "Solo se permiten Números",
      },

      folio_SD: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 numeros",
        maxlength: "Cantidad máxima es de 10 numeros",
        number: "Solo se permiten Números",
      },

      tomo_SD: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 numeros",
        maxlength: "Cantidad máxima es de 2 numeros",
        number: "Solo se permiten Números",
      },

      n_acta_SD: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 4 numeros",
        maxlength: "Cantidad máxima es de 11 numeros",
        number: "Solo se permiten Números",
      },

      rif_DS: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 numeros",
        maxlength: "Cantidad máxima es de 12 numeros",
        number: "Solo se permiten Números",
      },

      descripcion_DS: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 5 numeros",
        maxlength: "Cantidad máxima es de 400 numeros",
        number: "Solo se permiten Números",
      },

      Propiedad_Documento: {
        required: "Campo Obligatorio",
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
