<?php 
require_once("..\PHP\libreria\conexion.php"); 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARDO.AI Inc.</title>
    <link rel="stylesheet" href="../estilos/estilo-barra.css">
    <link rel="stylesheet" href="../estilos/estilos-info.css">
    <link rel="stylesheet" href="../estilos/estilo-form.css">
    <link rel="icon" href="../img/cardo-icon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
    <style>
        #fondo{
            background-image: url(../img/grax.jpg);
            background-size: cover;
        }
    </style>
</head>
<body>
    <div id="fondo">
    <header id="barra-top">
        <nav>
            <ul>
                <li><a href="">Menu</a>
                <ul>
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a href="../HTML/modelo.html">Modelos</a></li>
                    <li><a href="../HTML/form-login.html">Cerrar Sesión</a></li>
                </ul>
                </li>
                <li><a href="../HTML/form-contacto.html">Contacto</a></li>
                <li><a href="../HTML/ubicacion.html">Ubicación</a></li>
                <li><a href="../HTML/form-reserva.html">Reservas</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <center><img src="../img/cardo-pinga.png" alt="Inicio sesion" width="25%" style="margin-top: 5%;"></center>
        <?php 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $modelo = $_POST['modelo'];
            $direccion = $_POST['direccion'];
            $postal = $_POST['postal'];

            $strSQL="INSERT INTO reserva(id,nombre, modelo, direccion, postal) ";
            $strSQL.="VALUES(0,'".$nombre."','".$modelo."','".$direccion."','".$postal."')";

            $r=mysqli_query($conn,$strSQL);

            if($r){
                echo '<center><div id="aviso"><span>Gracias por hacer su reserva</span><br><a href="../index.html">Volver al inicio</a></div></center>';
            } else {
                echo '<center><div id="aviso"><span>Ha ocurrido un error inesperado</span><br>Volver al <a href="../index.html">inicio</a></div></center>';
            }
        }
        ?>
    </main>
    <footer id="botton_section">
        <a href="../index.html" id="logo-link"><img src="../img/kardo.png" height="50" alt="Logo"></a>
        <nav>
            <ul>
                <li><a href="../HTML/acerca.html">Acerca de</a></li>
                <li><a href="https://www.youtube.com/">Youtube</a></li>
                <li><a href="https://twitter.com/">Twitter</a></li>
                <li><a href="https://www.instagram.com/">Instagram</a></li>
            </ul>
        </nav>
        <p style="font-size: small;">Copyright &copy; 2024 Cardo.AI Inc.</p>
    </footer>
</div>
</body>
</html>