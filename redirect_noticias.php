<?php

session_start();
$area = $_POST['area'];
$_SESSION['nombrearea'] = $area;

$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select id_area from area where nombre = '".$area."'";
$res = pg_query($con, $sql);

$t = pg_fetch_assoc($res);
$_SESSION['idarea'] = $t["id_area"];

header('Location: noticias.php');

?>