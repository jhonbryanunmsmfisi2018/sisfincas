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

                if($data[$i]['foto'] !=""){
                    $data[$i]['foto'] = '<div>
                        <center><a href="'.$data[$i]['foto'].'" class="btn btn-info btn-sm" target="_blank" onclick="eliminarUsuario(' . $data[$i]['id'] . ')"><i class="fa fa-eye"></i></a></center>
                    </div>';
                }else{
                    $data[$i]['foto'] = '';
                }

                $data[$i]['latlong'] = '<div>
                    <center><a href="https://earth.google.com/web/search/'.$data[$i]['latlong'].'" target="_blank">'.$data[$i]['latlong'].'</a></center>
                </div>';
                
                /*$data[$i]['latlong'] = '<div>
                    <center><a href="https://maps.google.com/?q='.$data[$i]['latlong'].'&z=2&t=k" target="_blank">'.$data[$i]['latlong'].'</a></center>
                </div>';*/

                $data[$i]['archivosadjuntos'] = '<div>
                    <center><a href="#" class="btn btn-primary" type="button" onclick="mostrarArchivos(' . $data[$i]['id'] . ')"><i class="fas fa-link"></i></a></center>
                </div>';

                $data[$i]['acciones'] = '<div>
            
                <button class="btn btn-danger" type="button" onclick="eliminarUsuario(' . $data[$i]['id'] . ')"><i class="fas fa-times-circle"></i></button>
                <button class="btn btn-info" type="button" onclick="editarUsuario(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
                </div>';
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function listararchivosadjuntos()
        {
            $id_predio = $_GET["id"];
            $data = $this->model->getFincasArchivosadjuntos($id_predio);
            for ($i=0; $i < count($data); $i++) { 

                if($data[$i]['ruta'] !=""){
                    $data[$i]['ruta'] = '<div>
                        <center><a href="'.$data[$i]['ruta'].'" class="btn btn-info btn-sm" target="_blank" onclick="eliminarUsuario(' . $data[$i]['id'] . ')"><i class="fa fa-eye"></i></a></center>
                    </div>';
                }else{
                    $data[$i]['ruta'] = '';
                }

                $data[$i]['acciones'] = '<div>
                                            <button class="btn btn-danger" type="button" onclick="eliminarUsuario(' . $data[$i]['id'] . ')"><i class="fas fa-times-circle"></i></button>
                                        </div>';
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function registrar()
        {   
            
            if (isset($_POST['codigo'])){
                $codigo = strClean($_POST['codigo']);
                //$nombre = strClean($_POST['nombre']);
                $direccion = strClean($_POST['direccion']);
                $latlong = strClean($_POST['latlong']);
                $valor = strClean($_POST['valor']);
                $ubicacion = strClean($_POST['ubicacion']);                
                $id_categoria = strClean($_POST['id_categoria']);
                $foto = $_FILES['foto'];
                $name = $foto['name'];
                $tmp = $foto['tmp_name'];

                date_default_timezone_set("America/Lima"); // formato de fecha de America/Lima
                $fecha = date('YmdHis');

                if($name == ""){
                    $destino = "";
                }else{
                    $destino = 'assets/images/fincas/' .  $fecha . '.jpg';
                    move_uploaded_file($tmp, $destino);
                }
                
                $data = $this->model->registrar($codigo, $direccion, $latlong,$valor, $ubicacion, $id_categoria, $destino);
            }
        }

        public function registrararchivosadjuntos()
        {   
            
            if (isset($_POST['nombre_archivo'])){
                $nombre_archivo = strClean($_POST['nombre_archivo']);
                $id_predio = ($_POST['id_predio']);
                $foto = $_FILES['foto'];
                $name = $foto['name'];
                $tmp = $foto['tmp_name'];

                date_default_timezone_set("America/Lima"); // formato de fecha de America/Lima
                $fecha = date('YmdHis');

                if($name == ""){
                    $destino = "";
                }else{
                    $destino = 'assets/images/archivospredios/' .  $fecha . '.pdf';
                    move_uploaded_file($tmp, $destino);
                }
                
                $data = $this->model->registrararchivosadjuntos($nombre_archivo,$destino,$id_predio);
            }
            
        }
         
    }
?>