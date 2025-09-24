
$(document).ready(function(){

    $('#parroquia').change(function(){

        recargarListaAlumno();

    });
})

function recargarListaAlumno(){
    $.ajax({
        type:"POST",
        url:"../direccion/select_sectores.php",
        data: "id_parroquia=" + $('#parroquia').val(),
        
        success:function(r){

            $('#sector').html(r);

        }
    });
}