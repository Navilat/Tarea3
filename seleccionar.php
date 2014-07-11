<?php

$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select id_usuario from usuario where nombre='".$_POST['postulante']."'";
$res = pg_query($con, $sql);
$t = pg_fetch_assoc($res);
$id_usuario = $t["id_usuario"];

$sql = "update colaborador set seleccionado = true where id_usuario = ".$id_usuario."";
pg_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Administrar colaboradores</title>
</head>
<body>
<h3>Postulante seleccionado!</h3>
<p>Ahora el postulante podra acceder a las noticias de las areas a las que postulo. <a href="coordinador_general.php">VOLVER</a></p>
</body>
</html>