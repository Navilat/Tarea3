<?php
$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select * from grupo";
$res = pg_query($con,$sql);
$t = array();
while($reg=pg_fetch_assoc($res))
{
    $t[]=$reg;
}
for($i=0;$i<sizeof($t);$i++)
{
    echo $t[$i]["crear_coor"];
}
?>
