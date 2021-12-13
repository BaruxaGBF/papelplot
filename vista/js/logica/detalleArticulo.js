
var url_string = window.location.href;
var url = new URL(url_string);
var idArticulo = url.searchParams.get("id");

$(document).ready(function () {
    verArticulo(idArticulo);

    $("#hacerComentario").click(function (e) { 
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

});

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
    let max = parseInt(response.existencia,10);

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
    console.log("entre");
    $.ajax({
        type: "post",
        url: "../controlador/accion/ajax_registrarComentario.php",
        data:{"idArticulo": idArticulo ,"comentario": comentario},
        dataType: "json",
        success: function (response) {
            console.log("toy dentro ajax");
            alert(response.estado + response.msg);
        }
    });
}

