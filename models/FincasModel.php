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
    public function getFincasArchivosadjuntos($id_predio)
    {
        $sql = "SELECT * FROM archivospredios WHERE id_predio = $id_predio";
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

    public function registrararchivosadjuntos($nombre_archivo, $foto, $id_predio)
    {
        $sql = "INSERT INTO archivospredios (nombre_archivo,ruta,id_predio) VALUES (?,?,?)";
        $array = array($nombre_archivo,$foto,$id_predio);
        return $this->insertar($sql, $array);
    }
    
}
?>