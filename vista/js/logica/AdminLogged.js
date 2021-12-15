var TipoP = 0;

$(document).ready(function () {
    ajaxVerArticulos();
    $('#Agregar').attr('data-target','#EditarArticulo');
    $('#Agregar').html("Agregar Nuevo Articulo")



    $("#VProductos").click(function (e) {
        if (TipoP != 0) {
            ajaxVerArticulos();
            $('#Agregar').attr('data-target','#EditarArticulo');
            TipoP = 0;
        }

    });

    $("#VCategorias").click(function (e) {
        if (TipoP != 1) {
            ajaxVerCategorias();
            $('#Agregar').attr('data-target','#EditarCategoria');
            TipoP = 1;
        }
    });

    $("#VUsuarios").click(function (e) {
        if (TipoP != 2) {
            ajaxVerUsuarios();
            $('#Agregar').attr('data-target','#EditarUsuario');
            TipoP = 2;
        }
    });

    $("#editar").click(function (e) {
        console.log("editando");
    })

    $('#Agregar').click(function (e){
        VaciatModal()
    })



})

function VaciatModal(){
    switch (TipoP){
        case 0:{
            CargarCAtegorias();
            $('#formularioArticulo')[0].action='../controlador/accion/Act_Articulos/act_registarArticulo.php'
            $('#formularioArticulo')[0].reset();
            break;
        }
        case 1:{
            $('#formularioCategoria')[0].action='../controlador/accion/Act_Categorias/act_registrarCategoria.php'
            $('#formularioCategoria')[0].reset();
            break;
        }
        case 2:{
            $('#formularioUsuario')[0].action='../controlador/accion/Act_Usuarios/act_registrarUsuario.php'
            $('#formularioUsuario')[0].reset();
            break;
        }
    }
}

// Cargar Articulos
function ajaxVerArticulos() {
    CargarCAtegorias();
    $.ajax({
        url: "../controlador/accion/Act_Articulos/act_verArticulos.php",
        success: function (result) {
            insertarArticulosEnTabla(JSON.parse(result))
        },
        error: function (xhr) {
            alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
        }
    });
}
function insertarArticulosEnTabla(result) {
    let Inser = '';

    $("#titulo").html("Articulos");

    $("#tablaC thead tr th").remove();
    $("#tablaC tbody tr").remove();

    $("#tablaC thead tr").append(
        "<th scope=" + "col" + " style=" + "text-align:center;" + ">#</th> " +
        "<th scope=" + "col" + " style=" + "text-align:center;" + ">Nombre</th>" +
        "<th scope=" + "col" + " style=" + "text-align:center;" + ">Precio</th>" +
        "<th scope=" + "col" + " style=" + "text-align:center;" + ">Categorias</th>" +
        "<th scope=" + "col" + " style=" + "text-align:center;" + ">Descripcion</th>" +
        "<th scope=" + "col" + " style=" + "text-align:center;" + ">Cantidad Dis.</th>" +
        "<th scope=" + "col" + " style=" + "text-align:center;" + ">Editar</th>"

    );

    $.each(result, function (i) {
        let Nombre=NombreCategoria(result[i].idCategoria);
        Inser += '<tr>' +
            '<th scope="row" style="text-align:center;" >' + result[i].idArticulo + '</th>' +
            '<td scope="row" style="text-align:center;">' + result[i].nombre + '</td>' +
            '<td scope="row" style="text-align:center;">' + result[i].precio + '</td>' +
            '<td scope="row" style="text-align:center;">' + Nombre + '</td>' +
            '<td scope="row" style="text-align:center;">' + result[i].descripcion + '</td>' +
            '<td scope="row" style="text-align:center;">' + result[i].existencia + '</td>' +
            '<th scope="row"  style="text-align:center;"> ' + '<button type="button" onclick="editarArticulo(' + result[i].idArticulo + ')"   id="editar"   class="editar mr-3 btn btn-info btn-md" data-toggle="modal" data-target="#EditarArticulo">Editar</button>' + '</th>' +
            '</tr>'


    })

    $("#tablaC tbody").append(Inser);
    //insertarDatosUsuarioEnModal()

}
function editarArticulo(id) {
    $('#formularioArticulo')[0].action='../controlador/accion/Act_Articulos/act_editarArticulo.php'
    $.ajax({
        type: "POST",
        data: { idArticulo: parseInt(id, 10), TipoP: 0 },
        url: "../controlador/accion/Act_Articulos/act_verArticuloxid.php",
        success: function (data) {
            let Articulo = JSON.parse(data)
            $("#EditarArticulo input[name='idArticulo']").val(Articulo.idArticulo);
            $("#EditarArticulo input[name='nombre']").val(Articulo.nombre);
            $("#EditarArticulo input[name='precio']").val(Articulo.precio);
            $("#EditarArticulo input[name='descripcion']").val(Articulo.descripcion);
            console.log(Articulo);
            //$("#EditarArticulo input[name='imagen']").val(Articulo.imagen);
            $("#EditarArticulo input[name='existencia']").val(Articulo.existencia);
            $("#EditarArticulo input[name='idCategoria']").val(Articulo.idCategoria);
            let options = $("#Categoria option");
            let Nombre=NombreCategoria(Articulo.idCategoria);
            for(let f=0;f<options.length;f++){
                if(options[f].value==Articulo.idCategoria){
                    $("#Categoria option:eq(" + f + ")").prop('selected', true);
                }
            }

        }
    })
}
function CambiarCategoria(){
    $("#EditarArticulo input[name='idCategoria']").val($("#Categoria").val());
}


// Cargar Categorias
function ajaxVerCategorias() {
    $.ajax({
        url: "../controlador/accion/Act_Categorias/act_verCategorias.php",
        success: function (result) {
            insertarCategoriasEnTabla(JSON.parse(result))
        },
        error: function (xhr) {
            alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
        }
    });
}
function insertarCategoriasEnTabla(result) {
    console.log(result);
    let Inser = ''
    $("#titulo").html("Categorias");

    $("#tablaC thead tr th").remove();
    $("#tablaC tbody tr").remove();

    $("#tablaC thead tr").append(
        "<th scope=" + "col" + "  style=" + "text-align:center;" + ">#</th> " +
        "<th scope=" + "col" + " style=" + "text-align:center;" + " >Nombre</th>" +
        "<th scope=" + "col" + " style=" + "text-align:center;" + ">Editar</th>"
    );

    $.each(result, function (i) {
        Inser += '<tr>' +
            '<th scope="row" style="text-align:center;">' + result[i].idCategoria + '</th>' +
            '<th scope="row"  style="text-align:center;">' + result[i].nombre + '</th>' +
            '<th scope="row"  style="text-align:center;"> ' + '<button style="width: 6em;" type="button" onclick="editarCategoria(' + result[i].idCategoria + ')"   id="editar"   class="editar mr-3 btn btn-info btn-md" data-toggle="modal" data-target="#EditarCategoria">Editar</button>' + '</th>' +
            '</tr>'

    })

    $("#tablaC tbody").append(Inser);
    //insertarDatosUsuarioEnModal()

}
function editarCategoria(id) {
    $('#formularioArticulo')[0].action='../controlador/accion/Act_Categorias/act_editarcategoria.php';
    console.log(id);    CargarCAtegorias();
    $.ajax({
        type: "POST",
        data: { idCategoria: parseInt(id, 10) },
        url: "../controlador/accion/Act_Categorias/act_verCategoriaxid.php",
        success: function (data) {
            let Categoria = JSON.parse(data)

            //$("#modalEditarUsuario").modal('show');
            $("#EditarCategoria input[name='nombre']").val(Categoria.nombre);
            $("#EditarCategoria input[name='idCategoria']").val(Categoria.idCategoria);


        }
    })
}
function CargarCAtegorias() {
    $("#Categoria").empty();
    $.ajax({
        type: "POST",
        async: false,
        dataType: "json",
        url: "../controlador/accion/Act_Categorias/act_verCategorias.php",
        success: function (data) {
            inser = '';
            $("#EditarArticulo input[name='idCategoria']").val(data[0].idCategoria);
            $.each(data, function (i) {
                inser +=
                    '<option value='+ data[i].idCategoria + '>' + data[i].nombre + '</option>'
            })

            $("#Categoria").append(inser);

        }
    })
}
function NombreCategoria(id) {
    let Nombre='';
    $.ajax({
        type: "POST",
        async: false,
        data: { idCategoria: parseInt(id, 10) },
        url: "../controlador/accion/Act_Categorias/act_verCategoriaxid.php",
        success: function (data) {
            let Categoria = JSON.parse(data)
            Nombre=Categoria.nombre;
        }
    })
    return Nombre;
}


// Cargar Usuarios
function ajaxVerUsuarios() {
    $('#Agregar').data('target','#EditarUsuario');
    $.ajax({
        url: "../controlador/accion/Act_Usuarios/act_verUsuarios.php",
        success: function (result) {
            insertarUsuariosEnTabla(JSON.parse(result))
        },
        error: function (xhr) {
            alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
        }
    });
}
function insertarUsuariosEnTabla(result) {
    let Inser = ''
    $("#titulo").html("Usuarios");

    $("#tablaC thead tr th").remove();
    $("#tablaC tbody tr").remove();

    $("#tablaC thead tr").append(
        "<th scope=" + "col" + ">#</th> " +
        "<th scope=" + "col" + ">Nombre</th>" +
        "<th scope=" + "col" + ">correo</th>" +
        "<th scope=" + "col" + ">esAdmin</th>" +
        "<th scope=" + "col" + ">telefono</th>" +
        "<th scope=" + "col" + " style=" + "text-align:center;" + ">Editar</th>"
    );

    $.each(result, function (i) {

        Inser += '<tr>' +
            '<th scope="row">' + result[i].idUsuario + '</th>' +
            '<td>' + result[i].primerNombre + ' ' + ((result[i].segundoNombre != null) ? result[i].segundoNombre : '') + ' ' + result[i].primerApellido + ' ' + result[i].segundoApellido + ' ' + '</td>' +
            '<td>' + result[i].correo + '</td>' +
            '<td>' + ((result[i].esAdmin == "1") ? "si" : "no") + '</td>' +
            '<td>' + result[i].telefono + '</td>' +
            '<th scope="row"  style="text-align:center;"> ' + '<button type="button" onclick="editarUsuario(' + result[i].idUsuario + ')"   id="editar"   class="editar mr-3 btn btn-info btn-md" data-toggle="modal" data-target="#EditarUsuario">Editar</button>' + '</th>' +
            '</tr>'


    })

    $("#tablaC tbody").append(Inser);
    //insertarDatosUsuarioEnModal()

}
function editarUsuario(id){
    $('#formularioUsuario')[0].action='../controlador/accion/Act_Usuarios/editarUsuario.php'
    $.ajax({
        type: "POST",
        data: { idUsuario: parseInt(id, 10) },
        url: "../controlador/accion/Act_Usuarios/ajax_verUsuarioporid.php",
        success: function (data) {
            let Usuario = JSON.parse(data)
            $("#EditarUsuario input[name='idUsuario']").val(Usuario.idUsuario);
            $("#EditarUsuario input[name='password']").val(Usuario.password);
            $("#EditarUsuario input[name='primerNombre']").val(Usuario.primerNombre);
            $("#EditarUsuario input[name='segundoNombre']").val(Usuario.segundoNombre);
            $("#EditarUsuario input[name='primerApellido']").val(Usuario.primerApellido);
            $("#EditarUsuario input[name='segundoApellido']").val(Usuario.segundoApellido);
            $("#EditarUsuario input[name='correo']").val(Usuario.correo);
            $("#esAdmin option:eq(" + Usuario.esAdmin + ")").prop('selected', true);
            $("#EditarUsuario input[name='esAdmin']").val(Usuario.esAdmin);
            $("#EditarUsuario input[name='telefono']").val(Usuario.telefono);

        }
    })

   
}
function CambiarEsadmin(){
    $("#EditarUsuario  input[name='esAdmin']").val(($("#esAdmin").val()=='Si'? '1':'0'));
}