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
        session_reset();
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $contrasena = $_POST["contrasena"];
        
            $strSQL = "SELECT * FROM usuario WHERE nombre = '$name' AND contrasena = '$contrasena'";
            $r = mysqli_query($conn, $strSQL);
            
        
            if (mysqli_num_rows($r) == 1) {
                $_SESSION["nombre_usuario"] = $name;
                echo '<center><div id="aviso"><span>Inicio de sesión exitoso</span><br><center><a href="inicio.php" id="volver">Volver a Inicio</a></center></div></center>';
            } else {
                echo '<form action="login.php" method="post">';
                echo '    <div id="login">';
                echo '        <center><h1>Iniciar Sesión</h1></center>';
                echo '        <p>¿No tienes cuenta? <a href="../HTML/form-sign.html">Registrate</a></p>';
                echo '    </div>';
                echo '    <label for="name">Usuario:</label>';
                echo '    <input type="text" id="name" name="name" required>';
                echo '';
                echo '    <label for="contrasena">Contraseña:</label>';
                echo '    <input type="password" name="contrasena" id="contrasena" required>';
                echo '';
                echo '<center><div id="avisomal"><span>Usuario o contraseña incorrectos</span></div></center>';
                echo '    <center><button type="submit">Iniciar Sesión</button></center>';
                echo '</form>';
                
            }
        }
        ?>
    </main>
    <?php
    if ($nombre_usuario == "root") {
    echo '<footer id="administracion">';
    echo '    <nav id="barras">';
    echo '        <ul>';
    echo '            <li><a href="administrar_bd.php">Administrar Base de Datos</a></li>';
    echo '        </ul>';
    echo '    </nav>';
    echo '</footer>';
}
?>
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