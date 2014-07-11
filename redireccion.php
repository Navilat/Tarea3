<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Postular</title>
</head>
<body>
<?php

$user = $_POST['nombre'];
$pass = $_POST['pass'];

$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select contrasenia from usuario where nombre='".$user."'";
$res = pg_query($con,$sql);
$t = pg_fetch_assoc($res);
if($t["contrasena"]==$pass)
{
    header('Location: noticias.php');
}
else
{
?>
    <h1>ERROR!</h1>
    <p>Nombre de usuario no existe, o la contrasenia no es correcta. <a href="InicioSesion.php">VOLVER</a></p>  
<?php    
}
?>
</body>
</html>