document.getElementById("contrato").addEventListener("change", function () {
  const TipoContrato = this.value;

  const Form = [
    (ArrendamientoForm = {
      id: "2",
      form: document.getElementById("contratoarrendamientoForm"),
      rules: [
        "#duracion_contrato",
        "#tipo_pago",
        "#Venta_Plazo",
        "#v_inmueble",
      ],
    }),
    (CompraventaForm = {
      id: "1",
      form: document.getElementById("contratocompraventaForm"),
      rules: [
        "#cedula_comprador",
        "#nombre_comprador",
        "#apellido_comprador",
        "#numero_comprador",
        "#nombre_legal",
        "#apellido_legal",
        "#cedula_legal",
        "#numero_legal",
        "#correo_abogado",
        "#numero_inpre",
        "#metodo_pago",
        "#monto_pago",
        "#fecha_entrega",
        "#Compra_Venta",
        "#Compra_Venta_Anterior",
        "#Propiedad_Documento",
      ],
    }),
  ];

  ocultarFormulario(Form, TipoContrato);
});

const RadioFicha = document.querySelectorAll('input[name="opcion2"]');
const FormFicha = [
  {
    id: "si",
    form: document.getElementById("formulario2"),
    rules: ["#Constancia_Catastral"],
  },
  {
    id: "si",
    form: document.getElementById("formulario2"),
    rules: ["#Constancia_Catastral"],
  },
];

radioForm(FormFicha, RadioFicha);

const RadioMision = document.querySelectorAll('input[name="opcion3"]');
const FormMision = [
  {
    id: "si",
    form: document.getElementById("formulario3"),
    rules: ["#vauche_vivienda", "#codigo_mision"],
  },
  {
    id: "si",
    form: document.getElementById("formulario3"),
    rules: ["#vauche_vivienda", "#codigo_mision"],
  },
];

radioForm(FormMision, RadioMision);

$(function () {
  bsCustomFileInput.init();

  $.validator.setDefaults({
    submitHandler: function () {

      const SContrato = {
        UrlControl: "../php/Controller/ControlerContrato.php",
        UrlReturn: "../consul/citas/consul_soli.php",
        Formulario: document.getElementById("SoliContratos"),
      };

      methodSend(SContrato);

    },
  });
  $("#SoliContratos").validate({
    //Reglas/Validaciones
    rules: {
      //Datos Contratos
      inmueble: {
        required: true,
      },

      contrato: {
        required: true,
      },

      fecha_entrega: {},

      opcion1: {
        required: true,
      },

      opcion2: {
        required: true,
      },

      opcion3: {
        required: true,
      },

      correo_abogado: {
        email: true,
      },

      duracion_contrato: {},

      cedula_comprador: {
        minlength: 5,
        maxlength: 11,
        number: true,
      },

      nombre_comprador: {
        minlength: 3,
        maxlength: 50,
        pattern: /^[a-zA-Z\s]+$/,
      },

      apellido_comprador: {
        minlength: 3,
        maxlength: 50,
        pattern: /^[a-zA-Z\s]+$/,
      },

      numero_comprador: {
        minlength: 11,
        pattern: /^0416|0426|0414|0424|0412\d{7}$/,
        maxlength: 11,
        number: true,
      },

      cedula_legal: {
        minlength: 5,
        maxlength: 12,
        number: true,
      },
      nombre_legal: {
        minlength: 6,
        maxlength: 12,
        pattern: /^[a-zA-Z\s]+$/,
      },
      apellido_legal: {
        minlength: 5,
        maxlength: 12,
        pattern: /^[a-zA-Z\s]+$/,
      },
      numero_legal: {
        minlength: 10,
        maxlength: 11,
        number: true,
      },
      numero_inpre: {
        minlength: 4,
        maxlength: 7,
      },

      monto_pago: {
        minlength: 3,
        maxlength: 9,
        number: true,
      },

      metodo_pago: {
        minlength: 3,
        maxlength: 20,
        pattern: /^[a-zA-Z\s]+$/,
      },

      Compra_Venta: {
        accept: "application/pdf",
      },

      Compra_Venta_Anterior: {
        accept: "application/pdf",
      },

      Propiedad_Documento: {
        accept: "application/pdf",
      },

      tipo_pago: {
        minlength: 3,
        maxlength: 30,
        pattern: /^[a-zA-Z\s]+$/,
      },

      codigo_mision: {
        minlength: 6,
        maxlength: 10,
      },

      Venta_Plazo: {
        accept: "application/pdf",
      },

      Constancia_Catastral: {
        accept: "application/pdf",
      },

      vauche_vivienda: {
        accept: "application/pdf",
      },

      razon_solicitud: {
        required: true,
        minlength: 4,
        maxlength: 100,
      },
    },

    //Mensages de validaciones
    messages: {
      //Datos Personales
      inmueble: {
        required: "Campo Obligatorio",
      },

      contrato: {
        required: "Campo Obligatorio",
      },

      fecha_entrega: {
        required: "Campo Obligatorio",
      },

      correo_abogado: {
        required: "Campo Obligatorio",
        email: "Introduzca un Correo Eletronico Valido",
      },

      opcion1: {
        required: "Campo Obligatorio",
      },

      opcion2: {
        required: "Campo Obligatorio",
      },

      opcion3: {
        required: "Campo Obligatorio",
      },

      cedula_comprador: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 5 caracteres",
        maxlength: "Cantidad máxima es de 11 caracteres",
        number: "Solo se permiten Número",
      },

      nombre_comprador: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 3 caracteres",
        maxlength: "Cantidad máxima es de 50 caracteres",
        pattern: "Solo se permiten Texto",
      },

      apellido_comprador: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 3 caracteres",
        maxlength: "Cantidad máxima es de 50 caracteres",
        pattern: "Solo se permiten Texto",
      },

      numero_comprador: {
        minlength: "Cantidad mínima es de 11 caracteres",
        maxlength: "Cantidad máxima es de 11 caracteres",
        required: "Campo Obligatorio",
        pattern: "El teléfono debe comenzar con 0416, 0426, 0414, 0424 o 0412",
        number: "Solo se permiten Número",
      },

      cedula_legal: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 5 caracteres",
        maxlength: "Cantidad máxima es de 12 caracteres",
        number: "Solo se permiten Número",
      },
      nombre_legal: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 caracteres",
        maxlength: "Cantidad máxima es de 12 caracteres",
        pattern: "Solo se permiten Texto",
      },

      apellido_legal: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 5 caracteres",
        maxlength: "Cantidad máxima es de 12 caracteres",
        pattern: "Solo se permiten Texto",
      },
      numero_legal: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 10 caracteres",
        maxlength: "Cantidad máxima es de 11 caracteres",
        number: "Solo se permiten Número",
      },
      numero_inpre: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 4 caracteres",
        maxlength: "Cantidad máxima es de 7 caracteres",
      },

      duracion_contrato: {
        required: "Campo Obligatorio",
      },

      monto_pago: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 3 caracteres",
        maxlength: "Cantidad máxima es de 9 caracteres",
        number: "Solo se permiten Número",
      },

      metodo_pago: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 3 caracteres",
        maxlength: "Cantidad máxima es de 20 caracteres",
        pattern: "Solo se permiten Texto",
      },

      Compra_Venta: {
        required: "Campo Obligatorio",
        accept: "Solo se permiten archivos PDF",
      },

      Compra_Venta_Anterior: {
        required: "Campo Obligatorio",
        accept: "Solo se permiten archivos PDF",
      },

      Propiedad_Documento: {
        required: "Campo Obligatorio",
        accept: "Solo se permiten archivos PDF",
      },

      tipo_pago: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 3 caracteres",
        maxlength: "Cantidad máxima es de 30 caracteres",
        pattern: "Solo se permiten Texto",
      },

      codigo_mision: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 caracteres",
        maxlength: "Cantidad máxima es de 10 caracteres",
      },

      Venta_Plazo: {
        required: "Campo Obligatorio",
        accept: "Solo se permiten archivos PDF",
      },

      vauche_vivienda: {
        required: "Campo Obligatorio",
        accept: "Solo se permiten archivos PDF",
      },

      Constancia_Catastral: {
        required: "Campo Obligatorio",
        accept: "Solo se permiten archivos PDF",
      },

      razon_solicitud: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 caracteres",
        maxlength: "Cantidad máxima es de 100 caracteres",
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