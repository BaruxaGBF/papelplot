var url_string = window.location.href;
var url = new URL(url_string);
var cadena = url.searchParams.get("abuscar");

$(document).ready(function () {
    $("#abuscar").val(cadena);
    $("#tituloResultado").append("Resultados de búsqueda para "+cadena);
    obtenerBusqueda(cadena);
});

function obtenerBusqueda(cadena) {
    $.ajax({
        type: "POST",
        url: "../controlador/accion/Act_Articulos/act_buscarArticulo.php",
        data:{abuscar: cadena},
        dataType: "json",
        success: function (response) {
            llenarBusqueda(response);
        }
    });
}

function llenarBusqueda(response){
    let articulos = '';

    $.each(response, function(i) {
        articulos = '<div class="col"><div class="card h-100"><img src="img/'+response[i].imagen+'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+response[i].nombre+'</h5><span class="badge rounded-pill bg-info text-dark">$'+response[i].precio+'</span></div><div class="card-footer"><a href="detalleArticuloUnlogged.php?id='+response[i].idArticulo+'"class="btn btn-primary">Detalles</a></div></div></div>';
        $("#resultadosBusqueda").append(articulos);
        articulos ='';
    })
}