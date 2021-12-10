
const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,45}$/, // Letras y espacios, pueden llevar acentos.
    segundoNombre: /^[a-zA-ZÀ-ÿ\s]{0,45}$/,
	password: /^.{1,45}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

//validando datos del login y registro
function autenticarUsuario(correo, password){
    let iniciar = false;
    $.ajax({
        async: false,
        type: "POST",
        url: "controlador/accion/ajax_autenticarUser.php",
        data:{"correo": correo, "password": password},
        dataType: "json",
        success: function (response) {
            iniciar = response.estado;
            if(!response.estado){
                Swal.fire({
                    text: "Correo o contraseña invalido, por favor asegurese de estar registrado.",
                    icon: 'error'
                })
            }
        }
    });

    return iniciar;
}

$(document).ready(function () {
    $("#loginForm").submit(function (e) { 

        if($("#correoini").val() == ""){
            Swal.fire({
                title: "Campo de correo vacio.",
                text: 'Por favor ingrese su correo.',
                icon: 'warning'
            })
            return false;

        }else if(!expresiones.correo.test($("#correoini").val())){
            Swal.fire({
                title: "Campo de correo invalido.",
                text: 'Por favor ingrese un correo valido, ejemplo: "abcd@example.ext".',
                icon: 'warning'
            })
            return false;

        }else if($("#passini").val() == ""){
            Swal.fire({
                title: "Campo de contraseña vacio.",
                text: 'Por favor ingrese su contraseña.',
                icon: 'warning'
            })
            return false;

        }else if(!autenticarUsuario($("#correoini").val() ,$("#passini").val())){

            return false;
        }
        
    });

    $("#registForm").submit(function (e) { 
        if($("#correoregis").val() == ""){
            Swal.fire({
                title: "Campo de correo vacio.",
                text: 'Por favor ingrese su correo.',
                icon: 'warning'
            })
            return false;

        }else if(!expresiones.correo.test($("#correoregis").val())){
            Swal.fire({
                title: "Campo de correo invalido.",
                text: 'Por favor ingrese un correo valido, ejemplo: "abcd@example.ext".',
                icon: 'warning'
            })
            return false;

        }else if($("#passregis").val() == ""){
            Swal.fire({
                text: 'Por favor ingrese una contraseña.',
                icon: 'warning'
            })
            return false;

        }else if($("#pass2regis").val() == ""){
            Swal.fire({
                text: 'Por favor confirme su contraseña.',
                icon: 'warning'
            })
            return false;

        }else if($("#passregis").val() != $("#pass2regis").val()){
            Swal.fire({
                text: 'La contraseña que ingreso no coincide con su confirmación, por favor digitela nuevamente.',
                icon: 'warning'
            })
            return false;

        }else if($("#fnameregis").val() == ""){
            Swal.fire({
                text: 'Por favor ingrese su primer nombre.',
                icon: 'warning'
            })
            return false;

        }else if(!expresiones.nombre.test($("#fnameregis").val())){
            Swal.fire({
                text: 'Por favor ingrese su primer nombre, evite caracteres especiales "@/*-+".',
                icon: 'warning'
            })
            return false;

        }else if(!expresiones.segundoNombre.test($("#mnameregis").val())){
            Swal.fire({
                text: 'Por favor ingrese su segundo nombre, evite caracteres especiales "@/*-+".',
                icon: 'warning'
            })
            return false;  

        }else if($("#ape1regis").val() == ""){
            Swal.fire({
                text: 'Por favor ingrese su primer apellido.',
                icon: 'warning'
            })
            return false;

        }else if(!expresiones.nombre.test($("#ape1regis").val())){
            Swal.fire({
                text: 'Por favor ingrese su primer apellido, evite caracteres especiales "@/*-+".',
                icon: 'warning'
            })
            return false;
    
        }else if($("#ape2regis").val() == ""){
            Swal.fire({
                text: 'Por favor ingrese su segundo apellido.',
                icon: 'warning'
            })
            return false;

        }else if(!expresiones.nombre.test($("#ape2regis").val())){
            Swal.fire({
                text: 'Por favor ingrese su segundo apellido, evite caracteres especiales "@/*-+".',
                icon: 'warning'
            })
            return false;
    
        }else if($("#tel").val() == ""){
            Swal.fire({
                text: 'Por favor ingrese su número de teléfono.',
                icon: 'warning'
            })
            return false;

        }else if(!expresiones.telefono.test($("#tel").val())){
            Swal.fire({
                text: 'Por favor ingrese un número valído entre 7 y 14 digitos.',
                icon: 'warning'
            })
            return false;

        }
        
    });
});
