<?php
class FincasModel extends Query{
    public function __construct()
    {
        parent::__construct();        
    }
    public function getFincas($estado)
    {
        $sql = "SELECT p.*, m.medida, c.categoria FROM productos p INNER JOIN medidas m ON p.id_medidad = m.id INNER JOIN categorias c ON p.id_categoria = c.id WHERE p.estado = $estado";
        return $this->selectAll($sql);
    }
    public function getDatos($table)
    {
        $sql = "SELECT * FROM $table WHERE estado = 1";
        return $this->selectAll($sql);
    }
    public function registrar($codigo, $nombre, $precio_compra, $precio_venta,$cantidad, 
    $id_categoria, $foto)
    {
        $sql = "INSERT INTO productos (codigo, descripcion, precio_compra,
         precio_venta, cantidad  id_categoria, foto) VALUES (?,?,?,?,?,?,?)";
        $array = array($codigo, $nombre, $precio_compra, $precio_venta,  $cantidad, 
        $id_categoria, $foto);
        return $this->insertar($sql, $array);
    }
}
?>