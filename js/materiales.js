$(document).ready(function(){
    load(1);
});

function load(page){
    var q= $("#q").val();
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'./ajax/buscar_materiales.php?action=ajax&page='+page+'&q='+q,
         beforeSend: function(objeto){
         $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
      },
        success:function(data){
            $("#outer_div3").html(data).fadeIn('slow');
            $('#loader').html('');
            
        }
    })
}

function eliminar (id)
{
        swal({
title: "Realmente deseas eliminar?",
text: "Una vez eliminado, no volveras a ver el programa",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {

if (willDelete) {
swal("Programa eliminado exitosamente", {
icon: "success",
});
$.ajax({
type: "GET",
url: "./ajax/buscar_materiales.php",
data: "id="+id,
 beforeSend: function(objeto){
    $("#resultados3").html("Mensaje: Cargando...");
  },
success: function(datos){
$("#resultados3").html(datos);
load(1);
}
    });
} else {

}
});
}



$( "#guardar_programa" ).submit(function( event ) {
$('#guardar_datos').attr("disabled", true);

var parametros = $(this).serialize();
$.ajax({
    type: "POST",
    url: "ajax/nuevo_material.php",
    data: parametros,
     beforeSend: function(objeto){
        $("#resultados_ajax3").html("Mensaje: Cargando...");
      },
    success: function(datos){
    $("#resultados_ajax3").html(datos);
    $('#guardar_datos').attr("disabled", false);
    document.getElementById("guardar_programa").reset();
    load(1);
  }
});
event.preventDefault();
})

$( "#editar_programa" ).submit(function( event ) {
$('#actualizar_datos').attr("disabled", true);

var parametros = $(this).serialize();
$.ajax({
    type: "POST",
    url: "ajax/editar_material.php",
    data: parametros,
     beforeSend: function(objeto){
        $("#resultados_ajax3").html("Mensaje: Cargando...");
      },
    success: function(datos){
    $("#resultados_ajax3").html(datos);
    $('#actualizar_datos').attr("disabled", false);
    load(1);
  }
});
event.preventDefault();
})

function obtener_datos(id){
    var programa = $("#programa"+id).val();
    var grupo = $("#grupo"+id).val();
        var estado = $("#estado"+id).val();
    $("#mod_programa").val(programa);
    $("#mod_estado").val(estado);
    $("#mod_grupo").val(grupo);
    $("#mod_id").val(id);

}




