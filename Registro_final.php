<?php
session_start();
$user = $_SESSION['usuario'];
//echo $user; //<--KILL

$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select id_usuario from usuario where nombre='".$user."'";
$res = pg_query($con,$sql);

$t = pg_fetch_assoc($res);
$id_user = $t["id_usuario"];
//echo $id_user; //<-- KILL

$sql2 = "insert into colaborador (id_usuario) values (".$id_user.")";
pg_query($con,$sql2);

$sql = "select id_colaborador from colaborador where id_usuario=".$id_user."";
$res = pg_query($con,$sql);
$t = pg_fetch_assoc($res);
$id_colaborador = $t["id_colaborador"];
//echo $id_colaborador; //<-- KILL

if($_POST['prioridad1']!="")
{
    $sql3 = "select id_area from area where nombre='".$_POST['prioridad1']."'";
    $res = pg_query($con,$sql3);
    $t = pg_fetch_assoc($res);
    $id_area = $t["id_area"];
    
    pg_query($con,"insert into postulacion values (default, 1, ".$id_area.",".$id_colaborador.")" );
};
if($_POST['prioridad2']!="")
{
    $sql3 = "select id_area from area where nombre='".$_POST['prioridad2']."'";
    $res = pg_query($con,$sql3);
    $t = pg_fetch_assoc($res);
    $id_area = $t["id_area"];
    
    pg_query($con,"insert into postulacion values (default, 2, ".$id_area.",".$id_colaborador.")" );
};
if($_POST['prioridad3']!="")
{
    $sql3 = "select id_area from area where nombre='".$_POST['prioridad3']."'";
    $res = pg_query($con,$sql3);
    $t = pg_fetch_assoc($res);
    $id_area = $t["id_area"];
    
    pg_query($con,"insert into postulacion values (default, 3, ".$id_area.",".$id_colaborador.")" );
};
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Registrarse</title>
</head>
<body>
<h4>Felicitaciones!</h4>
<p>Ya estas registrado, ahora puedes iniciar sesion desde la <a href="PagPrincipal.php">pagina principal</a>.</p>
</body>
</html>
