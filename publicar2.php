<?php
session_start();
$_SESSION['nombrearea']=$_POST['area_elegida'];
$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select id_area from area where nombre='".$_POST['area_elegida']."'";
$res = pg_query($con, $sql);
$t = pg_fetch_assoc($res);
$_SESSION['idarea']=$t["id_area"];
$sql = "insert into noticia values (default, '".$_POST['titulo']."','".$_POST['cuerpo_noticia']."', 1, ".$t["id_area"].")";
pg_query($con, $sql);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Publicar noticia</title>
</head>
<body>
<p>Noticia publicada! <a href="coordinador_general.php">VOLVER</a>.</p>
<br />
<p>Ver <a href="noticias.php">Noticias</a>.</p>
</body>
</html>