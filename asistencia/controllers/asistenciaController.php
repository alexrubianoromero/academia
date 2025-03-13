<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/asistencia/views/asistenciaView.php'); 
require_once($raiz.'/asistencia/models/AsistenciaModel.php'); 
// require_once($raiz.'/partes/models/PartesModel.php'); 
// require_once($raiz.'/movimientos/models/MovimientoParteModel.php'); 

class asistenciaController
{
    protected $view;
    protected $model;
    // protected $partesModel;
    // protected $MovParteModel;

    public function __construct()
    {
        session_start();
        if(!isset($_SESSION['id_usuario']))
        {
            echo 'la sesion ha caducado';
            echo '<button class="btn btn-primary" onclick="irPantallaLogueo();">Continuar</button>';
            die();
        }
        $this->view = new asistenciaView();
        $this->model = new AsistenciaModel();
        // $this->partesModel = new PartesModel();
        // $this->MovParteModel = new MovimientoParteModel();

        if($_REQUEST['opcion']=='actualizarAsistencia')
        {
            // echo '<pre>'; 
            // print_r($_REQUEST); 
            // echo '</pre>';
            // die();
            $this->actualizarAsistencia($_REQUEST);
        }
      
    }
    public function actualizarAsistencia($request)
    {
        $this->model->actualizarAsistencia($request);
    }
    
}    