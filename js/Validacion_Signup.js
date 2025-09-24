$(function () {
  bsCustomFileInput.init();
});

function togglepassword() {
  var password = document.getElementById("Passwd");
  var confirm_password = document.getElementById("PasswdConfirm");
  if (password.type === "password") {
    password.type = "text";
    confirm_password.type = "text";
  } else {
    confirm_password.type = "password";
    password.type = "password";
  }
}

const form = document.getElementById("create-login");
const btn_login = document.getElementById("btn_login");

form.addEventListener("submit", (event) => {
  event.preventDefault();
  const data = new FormData(form);
  const info = Object.fromEntries(data);
  console.log(info);
  if (info.clave === "" || info.usuario === "") {
    Swal.fire("ERROR!", "debes ingresar todos los datos!", "error");
  } else {
    fetch("php/Controller/ControlerUsuario.php", {
      method: "POST",
      body: JSON.stringify(info),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);

        if (data.status == true) {
          Swal.fire("EXITOSO!", data.mensaje, "success");
          setTimeout(() => {
            window.history.back();
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
        } else {
        }
      });
  }
});
