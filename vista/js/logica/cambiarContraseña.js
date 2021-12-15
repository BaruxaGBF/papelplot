var url_string = window.location.href;
var url = new URL(url_string);
var idUsuario = url.searchParams.get("id");

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,45}$/, // Letras y espacios, pueden llevar acentos.
    segundoNombre: /^[a-zA-ZÀ-ÿ\s]{0,45}$/,
    password: /^.{1,45}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

$(document).ready(function () {

    $("#idUsuario").val(idUsuario)

    $("#btn-cambiarContraseña").click(function (e) { 
        if($("#inputPassword").val() == ""){
            Swal.fire({
                title: "Campo de contraseña vacio.",
                text: 'Por favor ingrese una contraseña.',
                icon: 'warning'
            })
            return false;

        }else if($("#inputPassword2").val() == ""){
            Swal.fire({
                title: "Campo de confirmar contraseña vacio.",
                text: 'Por favor confirme su contraseña.',
                icon: 'warning'
            })
            return false;

        }else if($("#inputPassword").val() != $("#inputPassword2").val()){
            Swal.fire({
                title: "Las contraseñas no coinciden.",
                text: 'La contraseña que ingreso no coincide con su confirmación, por favor digitela nuevamente.',
                icon: 'warning'
            })
            return false;
        }
    });
});