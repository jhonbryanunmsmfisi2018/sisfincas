<?php
    class Fincas extends Controller{
        public function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $data['title'] = 'Fincas';
            $data['script'] = 'fincas.js';
            $data['categorias'] = $this->model->getDatos('categorias');
            $this->views->getView('fincas','index', $data);
        }
        public function listar()
        {
            $data = $this->model->getFincas(1);
            for ($i=0; $i < count($data); $i++) { 
                $data[$i]['foto'] = '<div>
            
                    <center><a href="../myfilemgr/index.php" target="_blank" class="btn btn-primary" type="button" onclick="eliminarUsuario(' . $data[$i]['id'] . ')"><i class="fas fa-link"></i></a></center>
                </div>';

                $data[$i]['acciones'] = '<div>
            
                <button class="btn btn-danger" type="button" onclick="eliminarUsuario(' . $data[$i]['id'] . ')"><i class="fas fa-times-circle"></i></button>
                <button class="btn btn-info" type="button" onclick="editarUsuario(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
                </div>';
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar()
        {   
            if (isset($_POST['codigo']) && isset($_POST['nombre'])){
                $codigo = strClean($_POST['codigo']);
                $nombre = strClean($_POST['nombre']);
                $precio_compra = strClean($_POST['precio_compra']);
                $precio_venta = strClean($_POST['precio_venta']);
                $ubicacion = strClean($_POST['cantidad']);
                $p_registral = strClean($_POST['id_medidad']);
                $id_categoria = strClean($_POST['id_categoria']);
                $foto = $_FILES['foto'];
                $name = $foto['name'];
                $tmp = $foto['tmp_name'];
                $fecha = date('YmdHis');
                $destino = 'assets/images/fincas/' .  $fecha . '.jpg';
                $data = $this->model->registrar($codigo, $nombre, $precio_compra, $precio_venta, $ubicacion,
                $id_categoria, $destino);
            }
        }
         
    }
?>