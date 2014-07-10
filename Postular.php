<?php
session_start();
$_SESSION['usuario']=$_POST['nombre'];

$carrera = $_POST['carrera'];

$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select id_carrera from carrera where nombre='".$carrera."'";
$res = pg_query($con,$sql);

$t = pg_fetch_assoc($res);
$id_carrera = $t["id_carrera"];

$sql2 = "insert into usuario values (default, '".$_POST['nombre']."', '".$_POST['rol']."', '".$_POST['rut']."', '".$_POST['campus']."', '".$_POST['talla']."', '".$_POST['correo']."', '".$_POST['pass']."', ".$id_carrera.")";
pg_query($con,$sql2);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Postular</title>
</head>
<body>
<h2>Postulacion</h2>
<p>Los datos se han guardado exitosamente, ahora indique en que areas desea participar como colaborador.
Se puede postular a menos de 3 areas dejando en blanco los respectivos campos.</p>
<form action="Registro_final.php" method="post">

Prioridad 1:<select name="prioridad1">
<option></option>
<option>Coordinacion general</option>
<option>Tunel</option>
<option>Dinamicas</option>
<option>Concursos</option>
<option>Alimentacion</option>
<option>Registro visual</option>
<option>Audio</option>
</select><br />

Prioridad 2:<select name="prioridad2">
<option></option>
<option>Coordinacion general</option>
<option>Tunel</option>
<option>Dinamicas</option>
<option>Concursos</option>
<option>Alimentacion</option>
<option>Registro visual</option>
<option>Audio</option>
</select><br />

Prioridad 3:<select name="prioridad3">
<option></option>
<option>Coordinacion general</option>
<option>Tunel</option>
<option>Dinamicas</option>
<option>Concursos</option>
<option>Alimentacion</option>
<option>Registro visual</option>
<option>Audio</option>
</select><br />

<input id="boton_postular" value="Postular!" type="submit"/>
</form>
</body>
</html>