<?php
class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    //reportes graficos
    public function index()
    {
        $data['title'] = 'Panel administrativo';
        $data['script'] = 'index.js';
        $this->views->getView('admin', 'home', $data);
    }
    //datos de la unidad de fincas
    public function datos()
    {
        $data['title'] = 'Datos de Fincas';
        $data['script'] = 'admin.js';
        $data['fincas'] = $this->model->getDatos();
        $this->views->getView('admin', 'index', $data);
    }
    //modificar datos

    public function modificar()
    {
        if (isset($_POST)) {
            $ruc = strClean($_POST['ruc']);
            $nombre = strClean($_POST['nombre']);
            $telefono = strClean($_POST['telefono']);
            $correo = strClean($_POST['correo']);
            $direccion = strClean($_POST['direccion']);
            $impuesto = strClean($_POST['impuesto']);
            $mensaje = strClean($_POST['mensaje']);
            $id = strClean($_POST['id']);

            if (empty($ruc)) {
                $res = array('msg' => 'El RUC es requerido', 'type' => 'warning');
            } else if (empty($nombre)) {
                $res = array('msg' => 'El NOMBRE es requerido', 'type' => 'warning');
            } else if (empty($telefono)) {
                $res = array('msg' => 'El TELEFONO es requerido', 'type' => 'warning');
            } else if (empty($correo)) {
                $res = array('msg' => 'El CORREO es requerido', 'type' => 'warning');
            } else if (empty($direccion)) {
                $res = array('msg' => 'La DIRECCION es requerido', 'type' => 'warning');
            } else {
                $data = $this->model->actualizar(
                    $ruc,
                    $nombre,
                    $telefono,
                    $correo,
                    $direccion,
                    $impuesto,
                    $mensaje,
                    $id
                );
                if ($data == 1) {
                    $res = array('msg' => 'DATOS MODIFICADO', 'type' => 'success');
                } else {
                    $res = array('msg' => 'ERROR AL ACTUALIZAR', 'type' => 'error');
                }
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
