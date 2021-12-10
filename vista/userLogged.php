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
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
    <link rel="stylesheet" type="text/css" href="CSS/userLog.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/378e7ea857.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Papelplot</title>
</head>

<body>
    <header>
        <div class="container header-content">
            <a href="#" class="logo">
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
                                <li><a href="micuenta.php"> Mi cuenta</a></li>
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

    <div class="Baner d-flex justify-content-center align-items-center flex-column">
        <h1 class="txBaner">
            Papelplot
        </h1>
        <p class="txBaner">Papeleria al por mayor y al detal </p>
        <button class="btn btn-success" onclick="location.href='https://youtu.be/dQw4w9WgXcQ'">Mas Informacion</button>
    </div>

    <section>
        <div class="container">
            <Article class="categorias">
                <div class="row">

                    <div class="col">
                        <h2>Categorías</h2>
                    </div>

                    <div class="w-100"></div>

                    <div class="col">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide shadow p-3 mb-5 bg-body rounded" data-bs-ride="carousel">
                            <div style="margin: 2px">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="6" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="7" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="8" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="9" aria-label="Slide 2"></button>
                                </div>

                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <img src="img/1.png" class="d-block w-100" alt="..." />
                                    </div>

                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="img/2.png" class="d-block w-100" alt="..." />
                                    </div>

                                    <div class="carousel-item">
                                        <img src="img/3.png" class="d-block w-100" alt="..." />
                                    </div>

                                    <div class="carousel-item">
                                        <img src="img/4.png" class="d-block w-100" alt="..." />
                                    </div>

                                    <div class="carousel-item">
                                        <img src="img/5.png" class="d-block w-100" alt="..." />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/6.png" class="d-block w-100" alt="..." />
                                    </div>

                                    <div class="carousel-item">
                                        <img src="img/7.png" class="d-block w-100" alt="..." />
                                    </div>

                                    <div class="carousel-item">
                                        <img src="img/8.png" class="d-block w-100" alt="..." />
                                    </div>

                                    <div class="carousel-item">
                                        <img src="img/9.png" class="d-block w-100" alt="..." />
                                    </div>

                                    <div class="carousel-item">
                                        <img src="img/10.png" class="d-block w-100" alt="..." />
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="col">
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <img src="img/10.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <img src="img/10.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <img src="img/10.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                </div>
            </Article>

            <article class="ofertas">
                <div class="row row-cols-1 row-cols-md-2 g-4">

                    <div class="col">
                        <div class="card">
                            <img src="img/ticket-576335.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="img/ticket-576335.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="img/ticket-576335.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="img/ticket-576335.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </article>
        </div>
    </section>

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