const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,45}$/, // Letras y espacios, pueden llevar acentos.
    segundoNombre: /^[a-zA-ZÀ-ÿ\s]{0,45}$/,
    password: /^.{1,45}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

$(document).ready(function () {
    $("#form-recuperar").submit(function (e) { 
        if ($("#inputEmail").val() == "") {
            Swal.fire({
                title: "Correo vacio",
                text: 'Por favor ingrese un correo.',
                icon: 'warning'
            })
            return false;

        } else if (!expresiones.correo.test($("#inputEmail").val())) {
            Swal.fire({
                title: "Correo invalido",
                text: 'Por favor ingrese un correo valido, ejemplo: "abcd@example.ext".',
                icon: 'warning'
            })
            return false;
        }
    });
});