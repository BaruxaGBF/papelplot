$(document).ready(function () {
    verCarrito();
    
});

function verCarrito() {
    console.log("Entre")
    $.ajax({
        type: "POST",
        url: "../controlador/accion/Act_Carrito/ajax_verCarritoPorUsuario.php",
        dataType: "json",
        success: function (response) {
            agregarEnCarrito(response);
        }
    });
}

function eliminarDelCarrito($idArticulo) {
    console.log("Entre");
    $.ajax({
        type: "POST",
        url: "../controlador/accion/Act_Carrito/ajax_eliminarDelCarrito.php",
        dataType: "json",
        success: function (response) {
            console.log("Eliminado");
        }
    });
}

function agregarEnCarrito(response){
    let articulos = '';
    let precioTotal = 0;
    $.each(response, function(i) {
        precioTotal += parseInt(response[i].precio*response[i].existencia, 10);
        articulos = '<div class="col"><div class="card h-100"><img src="img/'+response[i].imagen+'" class="card-img-top" alt=""><div class="card-body"><h5 class="card-title">'+response[i].nombre+'</h5><span class="badge rounded-pill bg-info text-dark">$'+response[i].precio+'</span></div><div class="card-footer"><a href="detalleArticulo.php?id='+response[i].idArticulo+'"class="btn btn-primary">Detalles</a><span class="ms-2 me-3">Cantidad: &nbsp'+response[i].existencia+'</span><form class="display: inline-block" action="../controlador/accion/Act_Carrito/ajax_eliminarDelCarrito.php" method="post"><input type="hidden" name="idArticulo" value="'+response[i].idArticulo+'"><button type="submit" class="btn btn-danger"><i class="fas fa-eraser"></i></button></form></div></div></div>';
        $("#tiraCarrito").append(articulos);
        articulos ='';
    })
    $("#pTotal").html("$"+precioTotal);
}
