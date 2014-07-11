<?php
session_start();
$coord = $_POST['nombre'];
$pass = $_POST['pass'];

$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select id_usuario from usuario where nombre='".$coord."' and contrasena='".$pass."'";
$res = pg_query($con, $sql);

$t = pg_fetch_assoc($res);
$id_usuario = $t["id_usuario"];

$sql = "select id_grupo, id_coordinador from coordinador where id_usuario=".$id_usuario."";
$res = pg_query($con, $sql);

$t = pg_fetch_assoc($res);
$_SESSION['id_coordinador'] = $t["id_coordinador"];
if($t["id_grupo"]==1)
{
    header('Location: coordinador_general.php');
}
elseif($t["id_grupo"]==2)
{
    header('Location: coordinador_area.php');
};
?>