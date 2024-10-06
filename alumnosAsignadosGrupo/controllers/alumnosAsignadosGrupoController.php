<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/alumnosAsignadosGrupo/views/alumnosAsignadosGruposView.php'); 
require_once($raiz.'/alumnosAsignadosGrupo/models/AlumnosAsignadosGrupoModel.php'); 
// require_once($raiz.'/partes/models/PartesModel.php'); 
// require_once($raiz.'/movimientos/models/MovimientoParteModel.php'); 

class alumnosAsignadosGrupoController
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
        $this->view = new alumnosAsignadosGruposView();
        $this->model = new AlumnosAsignadosGrupoModel();
        // $this->partesModel = new PartesModel();
        // $this->MovParteModel = new MovimientoParteModel();

        if($_REQUEST['opcion']=='gruposMenu')
        {
            // die('llego al controlador ');
            $this->gruposMenu();
        }
        if($_REQUEST['opcion']=='listarGrupos')
        {
            $this->listarGrupos();
        }
        if($_REQUEST['opcion']=='listarClienteFiltrado')
        {
            $this->listarClienteFiltrado($_REQUEST);
        }
        if($_REQUEST['opcion']=='listarClienteFiltradoDesdeGrupos')
        {
            // die('llego a controlador grupos '); 
            $this->listarClienteFiltradoDesdeGrupos($_REQUEST);
        }

        if($_REQUEST['opcion']=='formuNuevoGrupo')
        {
            // die('llego a nuevo cliente');
            $this->formuNuevoGrupo();
        }
        if($_REQUEST['opcion']=='grabarGrupo')
        {
            // die('llego a nuevo cliente');
            $this->grabarGrupo($_REQUEST);
        }
        
        if($_REQUEST['opcion']=='verIntegratesGrupo')
        {
            // die('llego a nuevo cliente');
            $this->view->verIntegratesGrupo($_REQUEST['idGrupo']);
        }
        

    }
    public function listarGrupos()
    {
        $clientes = $this->model->traerGrupos();
        $this->view->mostrarGrupos($clientes);   
    }
    public function listarClienteFiltrado($request)
    {
        $clientes = $this->model->traerClienteFiltrado($request['idCliente']); 
        $this->view->mostrarCLientes($clientes);   
    }
    public function listarClienteFiltradoDesdeGrupos($request)
    {
        $grupos = $this->model->traerClienteFiltrado2($request['id']); 
        // echo '<pre>'; print_r($clientes); echo '</pre>';
        // die(); 
        $this->view->mostrarGrupos($grupos);   
    }
    public function gruposMenu()
    {
        $grupos = $this->model->traerGrupos();
        $this->view->gruposMenu($grupos);   
    }
    public function formuNuevoGrupo()
    {
        // $clientes = $this->model->traerClientes();
        $this->view->formuNuevoGrupo();   
    }
    public function grabarGrupo($request)
    {
        // $clientes = $this->model->traerClientes();
        $this->model->grabarGrupo($request);   
        echo ' grabado!';
    }
    
}    