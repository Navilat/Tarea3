<?php
session_start();
$nombre_area = $_SESSION['nombrearea'];
$id = $_SESSION['id_coordinador'];

$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select id_area from area where nombre ='".$nombre_area."'";
$res = pg_query($con, $sql);

$t = pg_fetch_assoc($res);
$id_area = $t["id_area"];
$_SESSION['idarea']=$id_area;

$sql = "insert into noticia values (default, '".$_POST['titulo']."','".$_POST['cuerpo_noticia']."', ".$id.", ".$id_area.");";
pg_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Publicar noticia</title>
</head>
<body>
<p>Noticia publicada! <a href="coordinador_area.php">VOLVER</a>.</p>
<br />
<p>Ver <a href="noticias.php">Noticias</a>.</p>
</body>
</html>