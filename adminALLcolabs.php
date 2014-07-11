<?php

$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select * from colaborador where seleccionado is null";
$res = pg_query($con, $sql);

$t = array();
while($reg = pg_fetch_assoc($res))
{
    $t[]=$reg;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Administrar colaboradores</title>
</head>
<body>
<h3>Administracion de postulantes</h3>
<p>A continuacion se presenta una lista de los postulantes a todas las areas.</p>
<form action="seleccionar.php" method="post">
Postulantes:<select name="postulante">
<?php 
for($i=0;$i<sizeof($t);$i++)
{
    $s = pg_fetch_assoc(pg_query($con, "select id_usuario from colaborador where id_colaborador=".$t[$i]["id_colaborador"].""));
    $r = pg_fetch_assoc(pg_query($con, "select nombre from usuario where id_usuario = ".$s["id_usuario"].""));
    ?> 
    <option><?php echo $r["nombre"]; ?></option>
    <?php
}
?>
</select>
<input id="seleccionar" value="Seleccionar" type="submit"/>
<br />
</form>
</body>
</html>