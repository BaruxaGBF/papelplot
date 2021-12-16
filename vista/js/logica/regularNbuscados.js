$(document).ready(function () {
    $("#mostrarTodos").click(function (e) { 
        e.preventDefault();
        $("#resultadosBusqueda").removeClass("def");
        $("#resultadosBusqueda").addClass("alargar");
        $("#mostrarTodos").hide();
    });
});