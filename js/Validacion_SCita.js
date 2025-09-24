//Money Euro
$("[data-mask]").inputmask();
//Initialize Select2 Elements
$(".select2").select2();

document
  .getElementById("inmueble")
  .addEventListener("change", function () {
  
    console.log(this.value);

    let Documentacio = { 
      url: "../php/select_sectores.php",
      data:{
        doc:["Cedula", "Rif", "Documento de Propiedad","Constancia Catastral", "Titulo Supletorio"],
        id:this.value,
      }
    }

    RastrearDocumentos(Documentacio);

  });

document
  .getElementById("representativeChoice")
  .addEventListener("change", function () {
    const TipoRepresentante = {
      valor: this.value,
      form: document.getElementById("legalRepresentativeForm"),
      rules: [
        "#Autorizacion",
        "#nombre_legal",
        "#apellido_legal",
        "#cedula_legal",
        "#numero_legal",
      ],
      valorAdd: "Legal Representative",
    };

    mostrarFormulario(TipoRepresentante);
  });

function MotivosCitas() {
  const Motivos = {
    select: document.getElementById("motivos"),
    codigo: document.getElementById("motivo_codigo"),
    cantidad: document.getElementById("motivo_cantidad"),
    texto: document.getElementById("motivo_texto"),
  };

  const resultadoSpan = document.getElementById("resultado");
  const opcionesSeleccionadas = Motivos["select"].selectedOptions;

  if (opcionesSeleccionadas.length > 5) {
    for (let i = 0; i < Motivos["select"].options.length; i++) {
      Motivos["select"].options[i].disabled = true;
    }
  } else {
    for (let i = 0; i < Motivos["select"].options.length; i++) {
      Motivos["select"].options[i].disabled = false;
    }
  }

  multiSelect(Motivos);

  resultadoSpan.textContent = opcionesSeleccionadas.length;
}

const RadioTitulo = document.querySelectorAll('input[name="opcion1"]');
const FormTitulo = [
  {
    id: "si",
    form: document.getElementById("formulario1"),
    rules: ["#Titulo_Supletorio"],
  },
  {
    id: "si",
    form: document.getElementById("formulario1"),
    rules: ["#Titulo_Supletorio"],
  },
];

radioForm(FormTitulo, RadioTitulo);

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

$(function () {
  bsCustomFileInput.init();

  $.validator.setDefaults({
    submitHandler: function () {
      const SCita = {
        UrlControl: "../php/Controller/ControlerCita.php",
        UrlReturn: "../consul/citas/consul_soli.php",
        Formulario: document.getElementById("SoliCita"),
      };

      methodSend(SCita);
    },
  });
  $("#SoliCita").validate({
    //Reglas/Validaciones
    rules: {
      //Datos Cita
      inmueble: {
        required: true,
      },

      representativeChoice: {
        required: true,
      },

      nombre_legal: {
        minlength: 3,
        maxlength: 50,
        pattern: /^[a-zA-Z\s]+$/,
      },

      apellido_legal: {
        minlength: 3,
        maxlength: 50,
        pattern: /^[a-zA-Z\s]+$/,
      },

      cedula_legal: {
        minlength: 6,
        maxlength: 8,
        number: true,
      },

      numero_legal: {
        minlength: 11,
        maxlength: 11,
        pattern: /^0416|0426|0414|0424|0412\d{7}$/,
        number: true,
      },

      motivos: {
        required: true,
      },

      Titulo_Supletorio: {
        accept: "application/pdf",
      },

      Autorizacion: {
        accept: "application/pdf",
      },

      Constancia_Catastral: {
        accept: "application/pdf",
      },

      Cedula: {
        required: true,
        accept: "application/pdf",
      },
      Rif: {
        required: true,
        accept: "application/pdf",
      },
      Propiedad_Documento: {
        required: true,
        accept: "application/pdf",
      },

      opcion1: {
        required: true,
      },

      opcion2: {
        required: true,
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

      representativeChoice: {
        required: "Campo Obligatorio",
      },

      nombre_legal: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 3 numeros",
        maxlength: "Cantidad máxima es de 50 numeros",
        pattern: "Solo se permiten Texto",
      },

      apellido_legal: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 3 numeros",
        maxlength: "Cantidad máxima es de 50 numeros",
        pattern: "Solo se permiten Texto",
      },

      cedula_legal: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 6 numeros",
        maxlength: "Cantidad máxima es de 8 numeros",
        number: "Solo se permiten Número",
      },

      numero_legal: {
        required: "Campo Obligatorio",
        minlength: "Cantidad mínima es de 11 numeros",
        maxlength: "Cantidad máxima es de 11 numeros",
        pattern: "El teléfono debe comenzar con 0416, 0426, 0414, 0424 o 0412",
        number: "Solo se permiten Número",
      },

      motivos: {
        required: "Campo Obligatorio",
      },

      Titulo_Supletorio: {
        required: "Campo Obligatorio",
        accept: "Solo se permiten archivos PDF",
      },

      Constancia_Catastral: {
        required: "Campo Obligatorio",
        accept: "Solo se permiten archivos PDF",
      },
      Autorizacion: {
        required: "Debe cargar un archivo PDF",
        accept: "Solo se permiten archivos PDF",
      },
      Cedula: {
        required: "Debe cargar un archivo PDF",
        accept: "Solo se permiten archivos PDF",
      },
      Rif: {
        required: "Debe cargar un archivo PDF",
        accept: "Solo se permiten archivos PDF",
      },
      Propiedad_Documento: {
        required: "Debe cargar un archivo PDF",
        accept: "Solo se permiten archivos PDF",
      },

      opcion1: {
        required: "Campo Obligatorio",
      },

      opcion2: {
        required: "Campo Obligatorio",
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
