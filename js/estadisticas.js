$(document).ready(function () {


  GrafDona();
  GrafAcciones();
  Grafparroquia();
  GrafTenencia();
  GrafContrato();
  GrafClase();


})

function GrafContrato() {
  $.ajax({
    type: "POST",
    url: "estadistica_datos.php",
    data: {
      Contrato: "Contrato",
    },
    dataType: "json",
    success: function (data) {


      var donutChartCanvas = $('#Contrato').get(0).getContext('2d');
      // Construye el objeto donutData con los datos del servidor
      var donutData = {

        labels: data.map(item => item.label), // Extrae las etiquetas

        datasets: [{

          data: data.map(item => item.data), // Extrae los 

          backgroundColor: data.map(item => item.color) // Extrae los colores

        }]

      };

      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      };

      // Crea la gráfica
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      });
    }
  });
}

function GrafClase() {
  $.ajax({
    type: "POST",
    url: "estadistica_datos.php",
    data: {
      Clase: "Clase",
    },
    dataType: "json",
    success: function (data) {


      var donutChartCanvas = $('#Clase').get(0).getContext('2d');
      // Construye el objeto donutData con los datos del servidor
      var donutData = {

        labels: data.map(item => item.label), // Extrae las etiquetas

        datasets: [{

          data: data.map(item => item.data), // Extrae los 

          backgroundColor: data.map(item => item.color) // Extrae los colores

        }]

      };

      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      };

      // Crea la gráfica
      new Chart(donutChartCanvas, {
        type: 'bar',
        data: donutData,
        options: donutOptions
      });
    }
  });
}

function GrafTenencia() {
  $.ajax({
    type: "POST",
    url: "estadistica_datos.php",
    data: {
      Tenencia: "Tenencia",
    },
    dataType: "json",
    success: function (data) {


      var donutChartCanvas = $('#Tenencias').get(0).getContext('2d');
      // Construye el objeto donutData con los datos del servidor
      var donutData = {

        labels: data.map(item => item.label), // Extrae las etiquetas

        datasets: [{

          data: data.map(item => item.data), // Extrae los 

          backgroundColor: data.map(item => item.color) // Extrae los colores

        }]

      };

      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      };

      // Crea la gráfica
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      });
    }
  });
}

function Grafparroquia() {
  $.ajax({
    type: "POST",
    url: "estadistica_datos.php",
    data: {
      Parroquias: "Parroquias",
    },
    dataType: "json",
    success: function (data) {


      var donutChartCanvas = $('#Parroquias').get(0).getContext('2d');
      // Construye el objeto donutData con los datos del servidor
      var donutData = {

        labels: data.map(item => item.label), // Extrae las etiquetas

        datasets: [{

          data: data.map(item => item.data), // Extrae los 

          backgroundColor: data.map(item => item.color) // Extrae los colores

        }]

      };

      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      };

      // Crea la gráfica
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      });
    }
  });
}

function GrafDona() {
  $.ajax({
    type: "POST",
    url: "estadistica_datos.php",
    data: {
      Inmuebles: "Inmuebles",
    },
    dataType: "json",
    success: function (data) {


      var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
      // Construye el objeto donutData con los datos del servidor
      var donutData = {

        labels: data.map(item => item.label), // Extrae las etiquetas

        datasets: [{

          data: data.map(item => item.data), // Extrae los 

          backgroundColor: data.map(item => item.color) // Extrae los colores

        }]

      };

      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      };

      // Crea la gráfica
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      });
    }
  });
}

function GrafAcciones() {
  $.ajax({
    type: "POST",
    url: "estadistica_datos.php",
    data: {
      accion: "Aciones",
    },

    dataType: "json", // Asegúrate de que dataType es "json"
    success: function (data) {

        var areaChartCanvas = $('#areaChart').get(0).getContext('2d');

        var areaChartData = {
            labels: data.labels, // Usa las etiquetas del servidor
            datasets: data.datasets // Usa los datasets del servidor
        };

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        };

        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        });
    }
  });
}

