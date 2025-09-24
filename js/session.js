$(document).ready(function () {
  var $container = $("#tu-contenedor"); // Reemplaza '#tu-contenedor' con el selector correcto

  var $dark_mode_icon = $("<i />", {
    // Icono inicial (sol)

    class: "fas fa-sun", // Usa Font Awesome o el icono que prefieras
    "aria-hidden": "true", // Para accesibilidad
    id: "boton-cambiar-tema", // ID para el botón
  }).on("click", function () {
    $("body").toggleClass("dark-mode");
    // Alterna la clase 'dark-mode'
    if ($("body").hasClass("dark-mode")) {
      $(this).removeClass("fa-sun").addClass("fa-moon"); // Cambia a luna
      localStorage.setItem("theme", "dark"); // Guarda la preferencia
    } else {
      $(this).removeClass("fa-moon").addClass("fa-sun"); // Cambia a sol
      localStorage.setItem("theme", "light"); // Guarda la preferencia
    }
  });

  $container.append($dark_mode_icon);

  // Carga el tema guardado en localStorage al cargar la página
  if (localStorage.getItem("theme") === "dark") {
    $("body").addClass("dark-mode");
    $dark_mode_icon.removeClass("fa-sun").addClass("fa-moon");
  }

  $(".notificacion-btn").on("click", function () {
    let form = $(this).closest(".notificacion-form");
    let id_solicitud = form.data("id");

    const data = new FormData(form[0]);

    fetch("php/Controller/ControlerNotifi.php", {
      method: "POST",
      body: data,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        if (data.status == true) {
          window.location.href = "consul/solicitud/consul_solicitud.php";
        } else {
          Swal.fire("ERROR!", data.mensaje, "error");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        Swal.fire("ERROR!", "Ocurrió un error inesperado.", "error");
      });
  });

  function actualizarHora() {
    const ahora = new Date();
    const horas = ahora.getHours();
    const minutos = ahora.getMinutes().toString().padStart(2, "0");
    const segundos = ahora.getSeconds().toString().padStart(2, "0");
    const amPm = horas >= 12 ? "PM" : "AM";
    const horaFormateada = horas % 12 || 12; // Convierte a formato de 12 horas

    const horaActual = `${horaFormateada}:${minutos}:${segundos} ${amPm}`;

    document.getElementById("reloj").textContent = horaActual;
  }

  // Ejecutar la función por primera vez y luego cada segundo
  actualizarHora();
  setInterval(actualizarHora, 1000);
});

// Tiempo de expiración de la sesión (en milisegundos)
const tiempoExpiracion = 20 * 60 * 1000;  

// Tiempo para mostrar el modal (5 minutos antes de la expiración)
const tiempoModal = tiempoExpiracion - 5 * 60 * 1000;

let temporizador;
let tiempoInicioSesion;

function iniciarTemporizador() {
  tiempoInicioSesion = Date.now();
  temporizador = setTimeout(mostrarModal, tiempoModal);
  mostrarTiempoRestante(); // Mostrar el tiempo restante inmediatamente
  setInterval(mostrarTiempoRestante, 60000);
}

function mostrarModal() {
  $("#modalMantenerSesion").modal("show");
}

function mostrarTiempoRestante() {
  const tiempoTranscurrido = Date.now() - tiempoInicioSesion;
  const tiempoRestante = tiempoExpiracion - tiempoTranscurrido;
  const minutosRestantes = Math.floor(tiempoRestante / 60000);
  const segundosRestantes = Math.floor((tiempoRestante % 60000) / 1000);

  if (tiempoRestante <= 0) {
    console.log("Sesión expirada");

    methodSend(CerrarSesion);
  } else {
    console.log(
      `Tiempo restante para la sesión: ${minutosRestantes} minutos y ${segundosRestantes} segundos`
    );
  }
}

iniciarTemporizador();

document
  .getElementById("btnMantenerSesion")
  .addEventListener("click", function () {
    clearTimeout(temporizador); // Limpia el temporizador existente
    iniciarTemporizador();

    let form = document.getElementById("ActivarSession");
    const data = new FormData(form);

    fetch(CerrarSesion["UrlControl"], {
      method: "POST",
      body: data,
    });
    $("#modalMantenerSesion").modal("hide"); // Cierra el modal
  });

document
  .getElementById("btnCerrarSesion")
  .addEventListener("click", function () {
    methodSend(CerrarSesion);
    $("#modalMantenerSesion").modal("hide");
  });

document.getElementById("cerrar").addEventListener("click", function () {
  
  methodSend(CerrarSesion);

});

