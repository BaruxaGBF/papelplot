<?php
session_start();
if (!isset($_SESSION['ID_USUARIO'])) {
  header("Location: ../index.html");
} else if ($_SESSION['ADMIN'] == 0) {
  header("Location: userLogged.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/AdminLogged.css">
  <link rel="stylesheet" type="text/css" href="CSS/userLog.css">
  <link rel="stylesheet" type="text/css" href="CSS/estilos.css">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  <script src="js/librerias/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/378e7ea857.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="js/logica/AdminLogged.js"></script>

  <title>AdminLogged</title>
</head>

<body>

  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="userLogged.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <img src="https://www.papelplot.net/images/logo-papelplot.png" alt="logo-papelplot">
        </a>

        <ul id="opc" class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li id="VProductos" class="nav-link px-2 link-secondary">Ver Productos</li>
          <li id="VCategorias" class="nav-link px-2 link-secondary">Ver Categorias</li>
          <li id="VUsuarios" class="nav-link px-2 link-secondary">ver Usuarios</li>
        </ul>

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
                  <?php if (isset($_SESSION['ID_USUARIO']) && ($_SESSION['ADMIN'] == 1))
                    echo '<li><a href="AdminLogged.php"> Administrar</a></li>';
                  ?>
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
    </div>
  </header>




  <div id="tabla">
    <div id="contenido" class="">
      <div id="Head">
        <h2 id="titulo">Articulos</h2>
        <button id="Agregar" type="submit" class="btn btn-primary" data-toggle="modal" data-target="">Agregar Nuevo
          Usuario</button>
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




  <div class="modal fade" id="EditarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="agreC">Editar Categorias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id='formularioCategoria' method="post" action="../controlador/accion/Act_Categorias/act_editarcategoria.php">
          <div class="modal-body">
            <input type="hidden" name="idCategoria" value="">
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="col-md-8"><input id="cNombre" placeholder="Nombre" type="text" class="form-control" name="nombre"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="EditarArticulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AgreA">Editar Articulo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id='formularioArticulo' method="post" action="../controlador/accion/Act_Articulos/act_editarArticulo.php" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="idArticulo" value="">
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="col-md-8"><input id="aNombre" placeholder="Nombre" type="text" class="form-control" name="nombre"></div>
            </div>

            <div id='EleccionI' style="padding:7px 0;" class="justify-content-center row">
              <div class="sexo col-md-8">
                <input type="hidden" name="imagenI" value="">
                <select onchange="ELI()" id="EImagen" class="form-control" name="Categoria">
                  <option selected>Dejar imagen actual</option>
                  <option>Cambiar imagen</option>
                </select>
              </div>
            </div>

            <div id="Iimagen" style="padding:7px 0;" class="justify-content-center row">
              <div class="mb-3 col-md-8">
                <label for="formFile" class="form-label">Imagen</label>
                <input class="form-control" type="file" id="formFile" name='imagen' accept="image/jpeg">
              </div>
            </div>
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="col-md-8"><input id="aPrecio" placeholder="Precio" type="text" class="form-control" name="precio"></div>
            </div>
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="sexo col-md-8">
                <input type="hidden" name="idCategoria" value="1">
                <select onchange="CambiarCategoria()" id="Categoria" class="form-control" name="Categoria">

                </select>
              </div>
            </div>
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="col-md-8"><input id="aDescripcion" placeholder="descripcion" type="text" class="form-control" name="descripcion"></div>
            </div>
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="col-md-8"><input id="aCantidad" placeholder="Cantidad" type="text" class="form-control" name="existencia"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="EditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AgreU">Editar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id='formularioUsuario' method="post" action="../controlador/accion/Act_Usuarios/editarUsuario.php">
          <div class="modal-body">
            <input type="hidden" name="idUsuario" value="">
            <input type="hidden" name="password" value="">
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="col-md-8"><input id="uNombre" placeholder="PrimerNombre" type="text" class="form-control" name="primerNombre"></div>
            </div>
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="col-md-8"><input id="uNombre" placeholder="SegundoNombre" type="text" class="form-control" name="segundoNombre"></div>
            </div>
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="col-md-8"><input id="uNombre" placeholder="PrimerApellido" type="text" class="form-control" name="primerApellido"></div>
            </div>
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="col-md-8"><input id="uNombre" placeholder="SegundoApellido" type="text" class="form-control" name="segundoApellido"></div>
            </div>
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="col-md-8"><input id="uCorreo" placeholder="Correo" type="text" class="form-control" name="correo"></div>
            </div>
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="sexo col-md-8">
                <input type="hidden" name="esAdmin" value="">
                <select onchange="CambiarEsadmin()" id="esAdmin" class="form-control" name="">
                  <option>No</option>
                  <option>Si</option>
                </select>
              </div>
            </div>
            <div style="padding:7px 0;" class="justify-content-center row">
              <div class="col-md-8"><input id="uTelefono" placeholder="Telefono" type="text" class="form-control" name="telefono"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


</body>

</html>