<?php
session_start();
if (!isset($_SESSION['ID_USUARIO'])) {
    header("Location: ../index.html");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/miCuenta.css">
    <link rel="stylesheet" type="text/css" href="CSS/userLog.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
        </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>

    <script src="https://kit.fontawesome.com/378e7ea857.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="js/librerias/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/librerias/jquery.validate.min.js"></script>
    <script src="js/logica/miCuenta.js"></script>
    <title>Papelplot</title>
</head>

<body>
    <header>
        <div class="container header-content">
            <a href="userLogged.php" class="logo">
                <img src="https://www.papelplot.net/images/logo-papelplot.png" alt="logo-papelplot">
            </a>

            <div class="Search input-search">
                <form action="input">
                    <input class="enter" type="search" placeholder="Buscar...">
                    <button class="bSearch" type="submit">
                        Buscar
                    </button>
                </form>
            </div>

            <nav>
                <div class="navItem nav-content">

                    <div class="userinfo">
                        <button type="button" class="btUser">
                            <i class="iconNav far fa-user"></i>
                        </button>

                        <div class="userMenu">
                            <ul>
                                <li class="userName">
                                    <h4>
                                        Hola,
                                        <?php if (isset($_SESSION['ID_USUARIO'])) 
							            echo $_SESSION['NOMBRE_USUARIO']; 
						            ?>
                                    </h4>
                                </li>
                                <li><a href="#"> Mi cuenta</a></li>
                                <li><a href="#"> Compras</a></li>
                                <li id="logout"><a href="../controlador/accion/act_logout.php"> Salir</a></li>
                            </ul>
                        </div>
                    </div>

                    <span>|</span>

                    <a href="">
                        <!-- <img class ="iconItem" src="img/107831.png" alt="carrito"> -->
                        <i class="iconNav fas fa-shopping-cart"></i>
                    </a>

                    <span>|</span>

                    <a href="https://wa.me/573135493346" target="_blank">
                        <!-- <img class ="iconItem" src="img/whats.png" alt="contacto"> -->
                        <i class="iconNav fab fa-whatsapp"></i>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <section>
        <div class="containerm">
            <div class="miCuenta">
                <h1> Mi cuenta </h1> <br>
                <form class="row g-3" id="formUser" method="post" action="">
                    <div class="titulo"> 
                        <h4>Datos de usuario</h4>
                        <i id ="dtuser" class="fas fa-user-edit edit"></i>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input name="correo" type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="inputPassword4">
                    </div>

                    <div class="titulo"> 
                        <h4>Datos personales</h4>
                        <i id="dtuser2" class="fas fa-user-edit edit"></i>
                    </div>
                    <div class="col-md-6">
                        <label for="inputnombre1" class="form-label">Primer nombre</label>
                        <input name="primerNombre" type="text" class="form-control" id="inputnombre1">
                    </div>
                    <div class="col-md-6">
                        <label for="inputnombre2" class="form-label">Segundo nombre</label>
                        <input name="segundoNombre" type="text" class="form-control" id="inputnombre2">
                    </div>

                    <div class="col-md-6">
                        <label for="inputapellido1" class="form-label">Primer apellido</label>
                        <input name="primerApellido" type="text" class="form-control" id="inputapellido1">
                    </div>
                    <div class="col-md-6">
                        <label for="inputapellido2" class="form-label">Segundo apellido</label>
                        <input name="segundoApellido" type="text" class="form-control" id="inputapellido2">
                    </div>

                    <div class="col-4">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input name="telefono" type="number" class="form-control" id="telefono">
                    </div>

                    <div class="col-12">
                        <button id="btn-updateUser" type="button" class="btn btn-success">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <input name="idUsuario" id="idUsuario" type="hidden" value="<?php if (isset($_SESSION['ID_USUARIO'])) 
							            echo $_SESSION['ID_USUARIO']; 
						            ?>">

    <footer class="footer">
        <div class="footer-logo">
            <img src="img/logo-papelplot.png">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <h4>Barranquilla</h4>
                    <ul>
                        <li>PBX : 386 1001</li>
                        <li>Móvil: (313) 549-3346</li>
                        <li>Ventas@papelplot.net</li>

                    </ul>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <h4>Valledupar</h4>
                    <ul>
                        <li>Tel: 570-2570</li>
                        <li>Cel: 320-599-2053</li>
                        <li>Valledupar@papelplot.net</li>

                    </ul>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <h4>Cartagena</h4>
                    <ul>
                        <li>Tel: 692-8010</li>
                        <li>Cel: 320-514-5796</li>
                        <li>Cartagena@papelplot.net</li>

                    </ul>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <h4>Montería</h4>
                    <ul>
                        <li>Tel: 789-0997</li>
                        <li>Cel: 314-571-8868</li>
                        <li>Monteria@papelplot.net</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>