<?php
class Conectar
{
    
    public function con()
    {
        $cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
        $con = pg_connect($cadena) or die (' :( Error de conexión!');
        
        return $con;

    }
}

class Trabajo extends Conectar
{
    private $t;
    public function __construct()
    {
        $this->t=array();
    }
    public function get_area()
    {
        $sql = "select * from Area;";
        $res = pg_query(parent::con(), $sql);
        while($reg = pg_fetch_assoc($res))
        {
            $this->t[]=$reg;
        }
        return $this->t;
        
    }
        
    
} 
?>