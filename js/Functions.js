function ocultarFormulario(ArrFoms, Value) {
  for (const Form of ArrFoms) {
    if (Value === Form["id"]) {
      Form["form"].style.display = "block";

      for (const Campos of Form["rules"]) {
        $(Campos).rules("add", { required: true });
      }
    } else {
      Form["form"].style.display = "none";
    }
  }
}

function multiSelect(Obj) {
  const SelectOption = Obj["select"].selectedOptions;
  const Optiontext = Array.from(SelectOption)
    .map((option) => option.text)
    .join("<br> ");
  const OptionValue = Array.from(SelectOption)
    .map((option) => option.value)
    .join(", ");

  const OptionCant = SelectOption.length;

  console.log(SelectOption);

  // Asignar los valores a los campos ocultos
  Obj["codigo"].value = OptionValue;
  Obj["cantidad"].value = OptionCant;
  Obj["texto"].value = Optiontext;
}

function methodSend(Obj) {
  event.preventDefault();

  const data = new FormData(Obj["Formulario"]);

  fetch(Obj["UrlControl"], {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);

      if (data.status == true) {
        Swal.fire(data.mensaje, "", "success");

        setTimeout(() => {
          window.location.href = Obj["UrlReturn"];
        }, 1000);
      } else if (data.status == false) {
        Swal.fire("ERROR!", data.mensaje, "error");
      } else {
        Swal.fire("ERROR!", data.message, "warning");
      }
    })

    .catch((error) => {
      console.error("Error:", error);
      if (data.status == false) {
        Swal.fire("ERROR!", data.mensaje, "error");
      }
    });
}

function mostrarFormulario(ArrFoms) {
  if (ArrFoms["valor"] === ArrFoms["valorAdd"]) {
    ArrFoms["form"].style.display = "block";

    for (const Campos of ArrFoms["rules"]) {
      $(Campos).rules("add", { required: true });
    }
  } else {
    ArrFoms["form"].style.display = "none";
  }
}

function radioForm(ArrFoms, Value) {
  Value.forEach((Form) => {
    Form.addEventListener("change", function () {
      ocultarFormulario(ArrFoms, Form.value);
    });
  });
}

function RastrearDocumentos(Doc) {
  $.ajax({
    type: "POST",
    url: Doc["url"],
    data: Doc.data,

    success: function (r) {
      $("#MostrarDocumento").html(r);

      $("#CargarDocumento").hide();
      
    },
  });
}
