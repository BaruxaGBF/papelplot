$(document).ready(function () {
    $("#buscar").click(function (e) { 
        let buscar = $("#abuscar").val().trim(); 

        if(buscar == ""){
            Swal.fire({
                title: "Campo vacio.",
                text: 'Por favor ingrese lo que quiera buscar.',
                icon: 'warning'
            })
            return false;
        }
        buscarRelacionados(buscar);
        e.preventDefault();
    });
  
});

function buscarRelacionados(buscar) {
    $(location).attr('href','buscarArticulo.php?abuscar='+ buscar+'');
}