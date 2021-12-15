var url_string = window.location.href;
var url = new URL(url_string);
var idArticulo = url.searchParams.get("id");
var max = 0;

$(document).ready(function () {
    verArticulo(idArticulo);
    mostrarComentarios(idArticulo);
    $("#hacerComentario").click(function (e) { 
        e.preventDefault();
        if($("#txtComent").val().length < 3) {
            Swal.fire({
                title: "Campo vacio.",
                text: 'Por favor ingrese un comentario que contenga palabras.',
                icon: 'warning'
            })
            return false;
        }

        enviarComentario(idArticulo,$("#txtComent").val());
    });

    $("#addCarrito").click(function (e) { 
        if($("#nItems option:selected").val() != "Seleccione una cantidad Max: "+max){
            agregarAlCarrito(idArticulo,parseInt($("#nItems option:selected").val(), 10));
        }else{
            Swal.fire({
                title: "Por favor ingrese una cantidad.",
                text: 'Ingrese una cantidad en el botón al costado de "Agregar al carrito".',
                icon: 'warning'
            })
        }
    });

});

function agregarAlCarrito(idArticulo,cantidad) {
    console.log(idArticulo+"-"+cantidad);
    $.ajax({
        type: "POST",
        url: "../controlador/accion/Act_Carrito/act_registrarCarrito.php",
        data:{"idArticulo": idArticulo, "cantidad": cantidad},
        dataType: "json",
        success: function (response) {
            Swal.fire({
                title: 'Has agregado al carrito con exíto.',
                text: "¿Quiere revisarlo ahora?",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No, seguir viendo articulos',
                confirmButtonText: 'Si! llevame ahí.'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(location).attr('href','carritoUser.php');
                    console.log("Esta vaina no lo manda")
                }
            })
        }
    });
}

function verArticulo(idArticulo){
    $.ajax({
        type: "post",
        url: "../controlador/accion/act_verArticuloxid.php",
        data:{idArticulo: idArticulo},
        dataType: "json",
        success: function (response) {
            agregarEnVista(response);
        }
    });
}

function agregarEnVista(response) {
    max = parseInt(response.existencia,10);

    for(let i = 1; i <= max; i++) {
        $("#nItems").append('<option value="'+i+'">'+i+'</option>');
    }

    $("#max").append("Seleccione una cantidad Max: " + max);
    $("#imgArt").attr("src", "img/"+response.imagen);
    $("#nombreArticulo").append(response.nombre);
    $("#descripcion").append(response.descripcion);
    $("#precio").append("$"+response.precio);
}

function enviarComentario(idArticulo, comentario){
    $.ajax({
        type: "post",
        url: "../controlador/accion/ajax_registrarComentario.php",
        data:{"idArticulo": idArticulo ,"comentario": comentario},
        dataType: "json",
        success: function (response) {
            mostrarComentarios(idArticulo);
        }
    });
}

function mostrarComentarios(idArticulo){
    console.log("entre");
    $.ajax({
        type: "post",
        url: "../controlador/accion/ajax_verComentariosXart.php",
        data:{"idArticulo": idArticulo},
        dataType: "json",
        success: function (response) {
            $("#comentarios").empty();
            insertarComentarios(response);
        }
    });
}

function insertarComentarios(response) {
    let comentarios = '';

    $.each(response, function(i) {
        comentarios ='<div class="col-12 mt-4 mb-4 coment"><h5 class="col-12">User_'+response[i].idusuario+'</h5><div class="col-12 mt-2">'+response[i].comentario+'</div></div>';
        $("#comentarios").append(comentarios);
        comentarios ='';
    })

}

