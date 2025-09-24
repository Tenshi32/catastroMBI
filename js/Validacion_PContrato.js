//Initialize Select2 Elements
$(".select2").select2();

const TipoContrato = document.getElementById("tipo_contrato").value;
const Form = [
  (ArrendamientoForm = {
    id: "2",
    form: document.getElementById("contratoarrendamientoForm"),
    rules: ["#cuotas", "#periodo_r", "#clausulas", "#v_inmueble"],
  }),
  (CompraventaForm = {
    id: "1",
    form: document.getElementById("contratocompraventaForm"),
    rules: ["#Monto_pago", "#recibo_pago_pdf"],
  }),
];

const Clausula = {
  select: document.getElementById("clausulas"),
  codigo: document.getElementById("clausulas_codigo"),
  cantidad: document.getElementById("clausulas_cantidad"),
  texto: document.getElementById("clausulas_texto"),
};

$(document).ready(function () {
  $("#PContrato").validate({
    //Reglas/Validaciones
    rules: {
      //Datos Contratos
      fecha_otorgada: {
        required: true,
      },

      Monto_pago: {
        minlength: 5,
        maxlength: 11,
        number: true,
      },

      recibo_pago_pdf: {
        accept: "application/pdf",
      },

      cuotas: {
        minlength: 1,
        maxlength: 2,
        number: true,
      },

      periodo_r: {
        minlength: 1,
        maxlength: 2,
        number: true,
      },

      clausulas: {},

      v_inmueble: {
        minlength: 6,
        maxlength: 12,
        number: true,
      },
    },

    //Mensages de validaciones
    messages: {
      //Datos Personales
      fecha_otorgada: {
        required: "Campo Obligatorio",
      },

      Monto_pago: {
        required: "Campo Obligatorio",
        number: "Campo de solo Numero",
        minlength: "Cantidad mínima es de 5 caracteres",
        maxlength: "Cantidad máxima es de 11 caracteres",
      },

      recibo_pago_pdf: {
        required: "Campo Obligatorio",
        accept: "Solo se permiten archivos PDF",
      },

      cuotas: {
        number: "Campo de solo Numero",
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 caracteres",
        maxlength: "Cantidad máxima es de 2 caracteres",
      },

      periodo_r: {
        number: "Campo de solo Numero",
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 1 caracteres",
        maxlength: "Cantidad máxima es de 2 caracteres",
      },

      clausulas: {
        required: "Campo Obligatorio",
      },

      v_inmueble: {
        number: "Campo de solo Numero",
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 caracteres",
        maxlength: "Cantidad máxima es de 12 caracteres",
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

  multiSelect(Clausula);
  ocultarFormulario(Form, TipoContrato);
});
// Función para actualizar los campos ocultos y limitar las selecciones

$(function () {
  bsCustomFileInput.init();

  $.validator.setDefaults({
    submitHandler: function () {
      const PContrato = {
        UrlControl: "../../php/Controller/ControlerContrato.php",
        UrlReturn: "../../proces/contrato/form_cont.php",
        Formulario: document.getElementById("PContrato"),
      };

      methodSend(PContrato);
    },
  });
});
