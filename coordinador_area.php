<?php

session_start();
$id_coord = $_SESSION['id_coordinador'];

$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select id_area from coordinador_area where id_coordinador=".$id_coord."";
$res = pg_query($con, $sql);

$t = pg_fetch_assoc($res);
$id_area = $t["id_area"];

$sql = "select nombre from area where id_area=".$id_area."";
$res = pg_query($con, $sql);

$t = pg_fetch_assoc($res);
$area = $t["nombre"];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Iniciar sesion</title>
<body>
<h2><?php echo $area; ?></h2>
<form action="publicar.php" method="post">
<textarea name="cuerpo_noticia" rows="10" cols="40"></textarea><br />
<input id="publicar" value="Publicar noticia" type="submit"/>
</form>
<br />
<form action="administrar_colabs.php" method="post">
<input id="administrar_colaboradores" value="Administrar colaboradores" type="submit"/>
</form>
</body>
</head>