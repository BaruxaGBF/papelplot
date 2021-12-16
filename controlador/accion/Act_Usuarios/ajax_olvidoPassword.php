<?php

require_once(__DIR__ . "/../../mdb/mdbUsuario.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once(__DIR__ . "/../../lib/PHPMailer-master/src/SMTP.php"); 
require_once(__DIR__ . "/../../lib/PHPMailer-master/src/Exception.php");
require_once(__DIR__ . "/../../lib/PHPMailer-master/src/PHPMailer.php");

$correo =  $_POST['correo'];
$user = autenticarCorreo($correo);


if ($user != null) {
    date_default_timezone_set('Etc/UTC');
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = "pruebapapelplot@gmail.com";
    $mail->Password = "prueba123456789";
    


    $mail->setFrom('pruebapapelplot@gmail.com', 'PapelPlot');
    $mail->addAddress($correo);
    $mail->isHTML(true);
    $mail->Subject = 'Olvidaste tu contraseña';
    $mail->Body = "<h1>Cambiar Contraseña</h1>"."<a href='localhost/papelplot/vista/cambiarContraseña.html?id=".$user->getidUsuario()."'>Cambia tu contraseña aquí.</a>";
    
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }else{
        header("Location: ../../../vista/inicio.html");
    }

}else{
    header("Location: ../../../vista/inicio.html");
}