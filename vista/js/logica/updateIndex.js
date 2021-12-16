$(document).ready(function () {
    articulosNuevos();
    articulosBaratos();
});

function articulosNuevos(){
    $.ajax({
        type: "POST",
        url: "../controlador/accion/ajax_verUltimasActualizaciones.php",
        dataType: "json",
        success: function (response) {
            agregarEnTira(response);
        }
    });
}

function articulosBaratos() {
    $.ajax({
        type: "POST",
        url: "../controlador/accion/ajax_articulosBaratos.php",
        dataType: "json",
        success: function (response) {
            agregarEnBaratos(response);
        }
    });
}

function agregarEnTira(response){

    let articulos = '';

    $.each(response, function(i) {
        articulos = '<div class="card" style="width: 18rem;"><img src="img/'+response[i].imagen+'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+response[i].nombre+'</h5><span class="badge rounded-pill bg-info text-dark">$'+response[i].precio+'</span></div><div class="card-footer"><a href="detalleArticuloUnlogged.php?id='+response[i].idArticulo+'"class="btn btn-primary">Detalles</a></div></div>';
        $(".contenedortira").append(articulos);
        articulos ='';
    })

}

function agregarEnBaratos(response){
    let articulos = '';

    $.each(response, function(i) {
        articulos = '<div class="col"><div class="card h-100"><img src="img/'+response[i].imagen+'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+response[i].nombre+'</h5><span class="badge rounded-pill bg-info text-dark">$'+response[i].precio+'</span></div><div class="card-footer"><a href="detalleArticuloUnlogged.php?id='+response[i].idArticulo+'"class="btn btn-primary">Detalles</a></div></div></div>';
        $("#articulosBaratos").append(articulos);
        articulos ='';
    })
}