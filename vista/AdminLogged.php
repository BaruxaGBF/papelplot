<?php
session_start();
if (!isset($_SESSION['ID_USUARIO'])) {
    header("Location: ../index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/AdminLogged.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/librerias/jquery-3.6.0.min.js"></script> 
    <script src="https://kit.fontawesome.com/378e7ea857.js" crossorigin="anonymous"></script>
     <script src="js/logica/AdminLogged.js"></script>

    <title>AdminLogged</title>
</head>
<body>

<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <img src="https://www.papelplot.net/images/logo-papelplot.png" alt="logo-papelplot">
        </a>

        <ul id="opc" class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li id="VProductos" class="nav-link px-2 link-secondary">Ver Productos</li>
          <li id="VCategorias" class="nav-link px-2 link-secondary">Ver Categorias</li>
          <li id="VUsuarios" class="nav-link px-2 link-secondary">ver Usuarios</li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
</header>

  
  
  <div id="tabla">
        <div id="contenido" class="">
            <div id="Head">
                <h2 id="titulo" >Articulos</h2>
            </div>

            <div class="Tablas">
                <table id="tablaC" class="table">
                    <thead id="titulosC" class="table-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categorias</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cantidad Dis.</th>
                      </tr>
                    </thead>

                    <tbody>
                      
                      
                    </tbody>
                </table>  
            </div>
        </div>
    </div>


</body>
</html>