<?php
session_start();

$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select id_usuario from usuario where nombre = '".$_SESSION['user']."'";
$res = pg_query($con, $sql);

$t = pg_fetch_assoc($res);
$id_usuario = $t["id_usuario"];

$sql = "select id_colaborador, seleccionado from colaborador where id_usuario = ".$id_usuario."";
$res = pg_query($con, $sql);

$t = pg_fetch_assoc($res);
$id_colaborador = $t["id_colaborador"];
$seleccionado = $t["seleccionado"];

?> 
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Inicio</title>
</head>
<body>
<?php

if($seleccionado!="t")
{
    ?>
    <h3>UPS!</h3> 
    <p>Lo sentimos, aun no has sido seleccionado, vuelve mas tarde. <a href="PagPrincipal.php">SALIR</a></p>
    <?php
}
elseif($seleccionado=="t")
{
    $sql = "select id_area from postulacion where id_colaborador = ".$id_colaborador."";
    $res = pg_query($con, $sql);
    
    $t = array();
    while($reg = pg_fetch_assoc($res))
    {
        $t[]=$reg;
    };
    ?> 
    <h2>Bienvenido <?php echo $_SESSION['user']; ?> !</h2>
    <p>Para ver las noticias de un area, elige una de las areas de las que has sido seleccionado:</p>
    <form action="redirect_noticias.php" method="post">
    Area: <select name="area">
    <?php
    for($i=0;$i<sizeof($t);$i++)
    {
        $res = pg_query($con, "select nombre from area where id_area = ".$t[$i]["id_area"]."");
        $r = pg_fetch_assoc($res);
         
        ?>
        <option><?php echo $r["nombre"] ?></option>
        <?php
    }
}

?>
</select>
<input id="ir_a_noticias" value="Ver noticias" type="submit"/>
</form>
</body>
</html>