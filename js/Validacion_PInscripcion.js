function mostrarFormularioNivel() {
  var opcion = document.querySelector('input[name="nivel"]:checked').value;
  var nivel_pb = document.getElementById("nivel_pb");
  var nivel_mayor = document.getElementById("nivel_mayor");
  var unidad_pb = document.getElementById("unidad_pb");
  var unidad_mayor = document.getElementById("unidad_mayor");

  if (opcion == "si") {
    nivel_mayor.style.display = "block";
    unidad_mayor.style.display = "block";
    nivel_pb.style.display = "none";
    unidad_pb.style.display = "none";
  } else {
    nivel_mayor.style.display = "none";
    unidad_mayor.style.display = "none";
    nivel_pb.style.display = "block";
    unidad_pb.style.display = "block";
  }
}

function mostrarFormularioSubParcela() {
  var opcion = document.querySelector('input[name="subparcela"]:checked').value;
  var subparcela_u = document.getElementById("subparcela_u");
  var subparcela_mayor = document.getElementById("subparcela_mayor");

  if (opcion === "si") {
    subparcela_u.style.display = "none";
    subparcela_mayor.style.display = "block";
  } else {
    subparcela_mayor.style.display = "none";
    subparcela_u.style.display = "block";
  }
}

function mostrarFormularioParcela() {
  var opcion = document.querySelector('input[name="parcela"]:checked').value;
  var parcela_u = document.getElementById("parcela_u");
  var parcela_mayor = document.getElementById("parcela_mayor");

  if (opcion === "si") {
    parcela_mayor.style.display = "block";
    parcela_u.style.display = "none";
  } else {
    parcela_u.style.display = "block";
    parcela_mayor.style.display = "none";
  }
}

//Initialize Select2 Elements
$(".select2").select2();

//Money Euro
$("[data-mask]").inputmask();

$(function () {
  bsCustomFileInput.init();

  $.validator.setDefaults({
    submitHandler: function () {
      const PInscrip = {
        UrlControl: "../../php/Controller/ControlerFicha.php",
        UrlReturn: "#",
        Formulario: document.getElementById("ProceInscrip"),
      };

      methodSend(PInscrip);
    },
  });
  $("#ProceInscrip").validate({
    //Reglas/Validaciones
    rules: {
      sector: {
        required: true,
      },

      parroquia: {
        required: true,
      },

      unidad_si: {
        minlength: 1,
      },

      nivel_si: {
        minlength: 1,
      },

      subparcela_si: {
        minlength: 1,
      },

      parcela_si: {
        minlength: 1,
      },

      nivel: {
        required: true,
      },

      subparcela: {
        required: true,
      },

      parcela: {
        required: true,
      },

      manzana_codigo: {
        number: true,
      },

      clases_operaciones: {
        required: true,
      },

      Propiedad_Documento: {
        required: true,
        accept: "application/pdf",
      },

      valor_inmueble: {
        required: true,
        number: true,
      },

      inmueble: {
        required: true,
      },
    },

    //Mensages de validaciones
    messages: {
      //
      sector: {
        required: "Campo Obligatorio",
      },

      parroquia: {
        required: "Campo Obligatorio",
      },

      unidad_si: {
        minlength: 1,
      },

      nivel_si: {
        minlength: 1,
      },

      subparcela_si: {
        minlength: 1,
      },

      parcela_si: {
        minlength: 1,
      },

      nivel: {
        required: "Campo Obligatorio",
      },

      subparcela: {
        required: "Campo Obligatorio",
      },

      parcela: {
        required: "Campo Obligatorio",
      },

      manzana_codigo: {
        number: "Solo se permiten numero",
      },

      clases_operaciones: {
        required: "Campo Obligatorio",
      },

      Propiedad_Documento: {
        required: "Debe cargar un archivo PDF",
        accept: "Solo se permiten archivos PDF",
      },

      valor_inmueble: {
        number: "Solo se permiten numero",
        required: "Campo Obligatorio",
      },

      inmueble: {
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
});
