
$(document).ready(function(){

    var tabla = $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["colvis"],
      });
  
      tabla.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');  

      
    $('#accion, #fecha1, #fecha2, #Tipo').on('change keyup', function(){
        recargarListaAlumno();
    });

})

function recargarListaAlumno(){
    $.ajax({
        type:"POST",
        url:"SelectAuditoria/select_sectores.php",
        data: {
            accion: $('#accion').val(),
            fecha1: $('#fecha1').val(),
            fecha2: $('#fecha2').val(),
            Tipo: $('#Tipo').val(),
        },
        
        success: function(r){

            if ($.fn.DataTable.isDataTable('#example1')) {
                $('#example1').DataTable().destroy();
            }

            $('#example1 tbody').html(r); 
            
            // Inicializa DataTables con los nuevos datos
            var tabla = $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["colvis"],
                "paging": true,
                "pageLength": 5,
                "lengthMenu": [10, 25, 50, 100],
            });

            tabla.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
         
        }
    });
}