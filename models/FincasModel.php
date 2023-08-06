<?php
class FincasModel extends Query{
    public function __construct()
    {
        parent::__construct();        
    }
    public function getFincas($estado)
    {
        $sql = "SELECT p.*, c.categoria FROM predios p INNER JOIN categorias c ON p.id_categoria = c.id WHERE p.estado = $estado";
        return $this->selectAll($sql);
    }
    public function getDatos($table)
    {
        $sql = "SELECT * FROM $table WHERE estado = 1";
        return $this->selectAll($sql);
    }
    public function registrar($codigo, $precio_compra, $precio_venta,$cantidad,$id_categoria, $foto)
    {
        $sql = "INSERT INTO predios (codigo, nombre_predio,latlong,valor,departamento,id_categoria,foto) VALUES (?,?,?,?,?,?,?)";
        $array = array($codigo, $codigo,$precio_compra,$precio_venta,$cantidad,$id_categoria,$foto);
        return $this->insertar($sql, $array);
    }
}
?>