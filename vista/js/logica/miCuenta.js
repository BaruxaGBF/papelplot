
const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,45}$/, // Letras y espacios, pueden llevar acentos.
    segundoNombre: /^[a-zA-ZÀ-ÿ\s]{0,45}$/,
    password: /^.{1,45}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const user = {
    correo: "", password: "", primerNombre: "", segundoNombre: "", primerApellido: "", segundoApellido: "",
    telefono: ""
}

$(document).ready(function () {

    verUsuario($("#idUsuario").val());
    $("#formUser input").prop("disabled", true);
    $("#btn-updateUser").prop("disabled", true);


    $("#dtuser").click(function (e) {
        $("#inputEmail4").prop("disabled", false);
        $("#inputPassword4").prop("disabled", false);
    });

    $("#dtuser2").click(function (e) {
        $("#inputnombre1").prop("disabled", false);
        $("#inputnombre2").prop("disabled", false);
        $("#inputapellido1").prop("disabled", false);
        $("#inputapellido2").prop("disabled", false);
        $("#telefono").prop("disabled", false);
    });

    $("#btn-updateUser").click(function (e) {

        if ($("#inputEmail4").val() == "") {
            Swal.fire({
                title: "Correo invalido",
                text: 'Por favor ingrese su correo.',
                icon: 'warning'
            })
            return false;

        } else if (!expresiones.correo.test($("#inputEmail4").val())) {
            Swal.fire({
                title: "Correo invalido",
                text: 'Por favor ingrese un correo valido, ejemplo: "abcd@example.ext".',
                icon: 'warning'
            })
            return false;

        } else if ($("#inputPassword4").val() == "") {
            Swal.fire({
                title: 'Contraseña en blanco',
                text: 'Por favor ingrese una contraseña.',
                icon: 'warning'
            })
            return false;

        } else if ($("#inputnombre1").val() == "") {
            Swal.fire({
                title: "Nombre vacio",
                text: 'Por favor ingrese su primer nombre.',
                icon: 'warning'
            })
            return false;

        } else if (!expresiones.nombre.test($("#inputnombre1").val())) {
            Swal.fire({
                title: "Nombre invalido",
                text: 'Por favor ingrese su primer nombre, evite caracteres especiales "@/*-+".',
                icon: 'warning'
            })
            return false;

        } else if (!expresiones.segundoNombre.test($("#inputnombre2").val())) {
            Swal.fire({
                title: "Segundo nombre invalido",
                text: 'Por favor ingrese su segundo nombre, evite caracteres especiales "@/*-+".',
                icon: 'warning'
            })
            return false;

        } else if ($("#inputapellido1").val() == "") {
            Swal.fire({
                title: "Primer apellido vacio",
                text: 'Por favor ingrese su primer apellido.',
                icon: 'warning'
            })
            return false;

        } else if (!expresiones.nombre.test($("#inputapellido1").val())) {
            Swal.fire({
                title: "Primer apellido invalido",
                text: 'Por favor ingrese su primer apellido, evite caracteres especiales "@/*-+".',
                icon: 'warning'
            })
            return false;

        } else if ($("#inputapellido2").val() == "") {
            Swal.fire({
                title: "Segundo apellido vacio",
                text: 'Por favor ingrese su segundo apellido.',
                icon: 'warning'
            })
            return false;

        } else if (!expresiones.nombre.test($("#inputapellido2").val())) {
            Swal.fire({
                title: "Segundo apellido invalido",
                text: 'Por favor ingrese su segundo apellido, evite caracteres especiales "@/*-+".',
                icon: 'warning'
            })
            return false;

        } else if ($("#telefono").val() == "") {
            Swal.fire({
                title: "Teléfono vacio",
                text: 'Por favor ingrese su número de teléfono.',
                icon: 'warning'
            })
            return false;

        } else if (!expresiones.telefono.test($("#telefono").val())) {
            Swal.fire({
                title: "Télefono invalido",
                text: 'Por favor ingrese un número valído entre 7 y 14 digitos.',
                icon: 'warning'
            })
            return false;
        }

        Swal.fire({
            title: '¿Estás seguro de guardar estos cambios?',
            text: "Puedes cambiarlos en cualquier momento, pero recuerdalos.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, quiero guardar.',
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                actualizarUser($("#inputEmail4").val(), $("#inputPassword4").val(),
                    $("#inputnombre1").val(), $("#inputnombre2").val(), $("#inputapellido1").val(), $("#inputapellido2").val(), $("#telefono").val());
            }
        })

    });

    $(".miCuenta").keyup(function (e) {
        e.preventDefault();
        if ($("#inputEmail4").val() != user.correo) {
            return $("#btn-updateUser").prop("disabled", false);
        }

        if ($("#inputPassword4").val() != user.password) {
            return $("#btn-updateUser").prop("disabled", false);
        }

        if ($("#inputnombre1").val() != user.primerNombre) {
            return $("#btn-updateUser").prop("disabled", false);
        }

        if ($("#inputnombre2").val() != user.segundoNombre) {
            return $("#btn-updateUser").prop("disabled", false);
        }

        if ($("#inputapellido1").val() != user.primerApellido) {
            return $("#btn-updateUser").prop("disabled", false);
        }

        if ($("#inputapellido2").val() != user.segundoApellido) {
            return $("#btn-updateUser").prop("disabled", false);
        }

        if ($("#telefono").val() != user.telefono) {
            return $("#btn-updateUser").prop("disabled", false);
        }

        return $("#btn-updateUser").prop("disabled", true);
    });

});

function verUsuario(idUsuario) {
    console.log($("#idUsuario").val());
    $.ajax({
        type: "POST",
        url: "../controlador/accion/ajax_verUsuarioporid.php",
        data: { idUsuario: idUsuario },
        dataType: "json",
        success: function (response) {
            insertarEnForm(response);
        }
    });
}

function insertarEnForm(response) {
    $("#inputEmail4").val(response.correo);
    user.correo = response.correo;
    $("#inputPassword4").val(response.password);
    user.password = response.password;
    $("#inputnombre1").val(response.primerNombre);
    user.primerNombre = response.primerNombre;
    $("#inputnombre2").val(response.segundoNombre);
    user.segundoNombre = response.segundoNombre;
    $("#inputapellido1").val(response.primerApellido);
    user.primerApellido = response.primerApellido;
    $("#inputapellido2").val(response.segundoApellido);
    user.segundoApellido = response.segundoApellido;
    $("#telefono").val(response.telefono);
    user.telefono = response.telefono;
}

function actualizarUser(correo, password, primerNombre, segundoNombre, primerApellido, segundoApellido, telefono) {
    $.ajax({
        type: "post",
        url: "../controlador/accion/ajax_editarUsuario.php",
        data: {
            "correo": correo, "password": password, "primerNombre": primerNombre, "segundoNombre": segundoNombre,
            "primerApellido": primerApellido, "segundoApellido": segundoApellido, "telefono": telefono
        },
        dataType: "json",
        success: function (response) {
            if (response.estado != 0) {
                let timerInterval
                Swal.fire({
                    title: 'Cambio realizado con exíto',
                    html: 'Recargando página en <b></b> milisegundos.',
                    icon: "success",
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        location.reload(true);
                    }
                })
            }
        }
    });

}

