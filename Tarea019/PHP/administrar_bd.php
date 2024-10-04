<?php 
require_once("..\PHP\libreria\conexion.php"); 
session_start(); 
$nombre_usuario = $_SESSION["nombre_usuario"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARDO.AI Inc.</title>
    <link rel="stylesheet" href="../estilos/estilo-barra.css">
    <link rel="stylesheet" href="../estilos/estilos-info.css">
    <link rel="icon" href="../img/cardo-icon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
    <style>
        #fondo{
            background-image: url(../img/fondo-admin.jpg);
            background-size: cover;
        }
        select {
        width: 200px;
        
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        padding: 5px;
        font-family: Poppins;
        text-align: center;
        }
        label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color:white;
        }
        button[type="submit"] {
        background-color: orange;
        color: black;
        border: none;
        padding: 1%;
        padding-right: 10%;
        padding-left: 10%;
        margin-top: 4%;
        margin-bottom: 4%;
        cursor: pointer;
        transition: background-color 0.5s;
        font-size: 100%;
        font-family: Poppins;
        }
        button[type="submit"]:hover{
            color: white;
            background-color: #292929;
        }
        table {
        border-collapse: collapse;
        width: 100%;
        }
        td, th {
        border: 2px solid orange;
        padding: 10px; 
        text-align: left; 
        color: white; 
        }
        th {
        background-color: orange; 
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
        <center><img src="../img/cardo-pinga.png" alt="Inicio sesion" width="25%" style="margin-top: 5%;margin-bottom:8%;"></center>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $opcion = $_POST['opcion'];
        if ($opcion == "usuario") {
            $strSQL="SELECT * FROM usuario";
            $r=mysqli_query($conn,$strSQL);
            print "<table border='1'>";
            print "<tr>";
            print "<th>NOMBRE</th>";
            print "<th>EMAIL</th>";
            print "<th>CONTRASEÑA</th>";
            print "<th>TELÉFONO</th>";
            print "</tr>";
        while($consulta=mysqli_fetch_assoc($r)){
            print "<tr>";
            print "<td>".$consulta["nombre"]."</td>";
            print "<td>".$consulta["email"]."</td>";
            print "<td>".$consulta["contrasena"]."</td>";
            print "<td>".$consulta["telefono"]."</td>";
            print "</tr>";
            }
        print "</table>";

        } elseif($opcion == "mensaje") {
            $strSQL="SELECT * FROM contacto";
            $r=mysqli_query($conn,$strSQL);
            print "<table border='1'>";
            print "<tr>";
            print "<th>NOMBRE</th>";
            print "<th>EMAIL</th>";
            print "<th>ASUNTO</th>";
            print "<th>MENSAJE</th>";
            print "</tr>";
        while($consulta=mysqli_fetch_assoc($r)){
            print "<tr>";
            print "<td>".$consulta["nombre"]."</td>";
            print "<td>".$consulta["email"]."</td>";
            print "<td>".$consulta["asunto"]."</td>";
            print "<td>".$consulta["mensaje"]."</td>";
            print "</tr>";
            }
        print "</table>";
        } elseif($opcion == "reserva") {
            $strSQL="SELECT * FROM reserva";
            $r=mysqli_query($conn,$strSQL);
            print "<table border='1'>";
            print "<tr>";
            print "<th>NOMBRE</th>";
            print "<th>MODELO</th>";
            print "<th>DIRECCIÓN</th>";
            print "<th>CODIGO POSTAL</th>";
            print "</tr>";
        while($consulta=mysqli_fetch_assoc($r)){
            print "<tr>";
            print "<td>".$consulta["nombre"]."</td>";
            print "<td>".$consulta["modelo"]."</td>";
            print "<td>".$consulta["direccion"]."</td>";
            print "<td>".$consulta["postal"]."</td>";
            print "</tr>";
            }
        print "</table>";
        }
    }
        ?>
        <form action="administrar_bd.php" method="post" style="margin-top: 5%;margin-bottom:7%;text-align:center;">
        <label for="opcion">Selecciona una opción:</label>
        <select name="opcion" id="opcion">
        <option value="usuario">Ver Usuarios</option>
        <option value="mensaje">Ver Mensajes</option>
        <option value="reserva">Ver Reservas</option>
        </select>
        <center><button type="submit">Aceptar</button></center>
        </form>
        
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