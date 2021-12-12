var TipoP=0;

$(document).ready(function() { 
        ajaxVerArticulos();

    
    $("#VProductos").click(function (e) { 
        if(TipoP!=0){
         ajaxVerArticulos();
         TipoP=0;
        }
        
    });

    $("#VCategorias").click(function (e) { 
        if(TipoP!=1){
            ajaxVerCategorias();
            TipoP=1;
        }
    });

    $("#VUsuarios").click(function (e) { 
        if(TipoP!=2){
            ajaxVerUsuarios();
            TipoP=2;
        }
    });

    


})


// Cargar Articulos
function ajaxVerArticulos(){
    $.ajax({
        url: "../controlador/accion/Act_Articulos/act_verArticulos.php",
        success: function(result){ 
            insertarArticulosEnTabla(JSON.parse(result))
        },
    error: function(xhr){
        alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
      }});
}
function insertarArticulosEnTabla(result){
    let Inser = '';

    $("#titulo").html("Articulos");

    $("#tablaC thead tr th").remove();
    $("#tablaC tbody tr").remove();

    $("#tablaC thead tr").append(
        "<th scope="+"col"+">#</th> " +
        "<th scope="+"col"+">Nombre</th>" +
        "<th scope="+"col"+">Precio</th>" +
        "<th scope="+"col"+">Categorias</th>" +
        "<th scope="+"col"+">Descripcion</th>" +
        "<th scope="+"col"+">Cantidad Dis.</th>"
    );

    $.each(result, function(i) {
        
        Inser += '<tr>'+
        '<th scope="row">'+ result[i].idArticulo +'</th>'+
        '<td>'+ result[i].nombre + '</td>'+
        '<td>'+ result[i].precio + '</td>'+
        '<td>'+ "falta" + '</td>'+
        '<td>'+ result[i].descripcion + '</td>'+
        '<td>'+ result[i].existencia + '</td>'+
        '</tr>' 


    })

    $("#tablaC tbody").append(Inser);
    //insertarDatosUsuarioEnModal()

}

// Cargar Categorias
function ajaxVerCategorias(){
    $.ajax({
        url: "../controlador/accion/Act_Categorias/act_verCategorias.php",
        success: function(result){ 
            insertarCategoriasEnTabla(JSON.parse(result))
        },
    error: function(xhr){
        alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
      }});
}
function insertarCategoriasEnTabla(result){
    console.log(result);
    let Inser = ''
    $("#titulo").html("Usuarios");

    $("#tablaC thead tr th").remove();
    $("#tablaC tbody tr").remove();

    $("#tablaC thead tr").append(
        "<th scope="+"col"+">#</th> " +
        "<th scope="+"col"+">Nombre</th>"
    );
    
    $.each(result, function(i) {
        
        Inser += '<tr>'+
        '<th scope="row">'+ result[i].idCategoria +'</th>'+
        '<th scope="row">'+ result[i].nombre +'</th>'+
        '</tr>' 

    })

    $("#tablaC tbody").append(Inser);
    //insertarDatosUsuarioEnModal()

}

// Cargar Usuarios
function ajaxVerUsuarios(){
    $.ajax({
        url: "../controlador/accion/Act_Usuarios/act_verUsuarios.php",
        success: function(result){ 
            insertarUsuariosEnTabla(JSON.parse(result))
        },
    error: function(xhr){
        alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
      }});
}
function insertarUsuariosEnTabla(result){
    let Inser = ''
    $("#titulo").html("Usuarios");

    $("#tablaC thead tr th").remove();
    $("#tablaC tbody tr").remove();

    $("#tablaC thead tr").append(
        "<th scope="+"col"+">#</th> " +
        "<th scope="+"col"+">Nombre</th>" +
        "<th scope="+"col"+">correo</th>" +
        "<th scope="+"col"+">esAdmin</th>" +
        "<th scope="+"col"+">telefono</th>" 
    );
    
    $.each(result, function(i) {
        
        Inser += '<tr>'+
        '<th scope="row">'+ result[i].idUsuario +'</th>'+
        '<td>'+ result[i].primerNombre +  ' '  + ((result[i].segundoNombre!=null) ? result[i].segundoNombre: '') +  ' '  + result[i].primerApellido +  ' '  + result[i].segundoApellido +  ' '  + '</td>'+
        '<td>'+ result[i].correo + '</td>'+
        '<td>'+ ((result[i].esAdmin=="1") ? "si":"no") + '</td>'+
        '<td>'+ result[i].telefono + '</td>'+
        '</tr>' 


    })

    $("#tablaC tbody").append(Inser);
    //insertarDatosUsuarioEnModal()

}