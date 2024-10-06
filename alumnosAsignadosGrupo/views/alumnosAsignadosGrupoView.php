<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/grupos/models/GrupoModel.php'); 
// require_once($raiz.'/clientes/models/TipoContribuyenteModel.php'); 
// require_once($raiz.'/subtipos/models/SubtipoParteModel.php'); 
// require_once($raiz.'/marcas/models/MarcaModel.php'); 

class alumnosAsignadosGruposView
{
 protected $model; 
 protected $tipoContriModel; 

 public function __construct()
 {
    $this->model= new GrupoModel(); 
    // $this->tipoContriModel= new TipoContribuyenteModel(); 
 }   
 public function gruposMenu($grupos)
 {
    
    ?>
    <div style="padding:5px;">
        <div class="row">
            <div class="col-lg-3">
                <button 
                data-bs-toggle="modal" 
                data-bs-target="#modalNuevoCliente"
                class="btn btn-primary" 
                onclick="formuNuevoGrupo();"
                >Nuevo Grupo</button>
            </div>
            <div class="col-lg-3">
                <select id = "id" name="id" onchange="listarClienteFiltradoDesdeGrupos();" class="form-control" >
                       <option value="-1">Seleccionar Grupo</option>
                       <?php  
                           foreach($grupos as $grupo)
                           {
                               echo '<option value ='.$grupo['id'].'>'.$grupo['nombreGrupo'].'</option>'; 
                           }
                       ?>
                </select>
            </div>

        </div>
        <div id="div_resultados_clientes" class="mt-3">
               <?php  $this->mostrarGrupos($grupos);   ?>
        </div>

        <?php   $this->modalNuevoCliente(); ?>
        <?php   $this->modalIntegrantes(); ?>
    </div>
    <?php
 }

 public function mostrarGrupos($grupos)
 {
    // $clientes = $this->model->traerClientes(); 
    echo '<table class="table table-striped">';
        echo '<tr>'; 
        echo '<th>Id Grupo</th>';
        echo '<th>Nombre Grupo</th>';
        echo '<th>Ver</th>';
     
       
        // echo '<th>TipoCont.</th>';
        // echo '<th>Sede.</th>';
        echo '</tr>';
        foreach($grupos as $grupo)
        {
            // $tipoCont =  $this->tipoContriModel->traerTipoId($cliente['idTipoContribuyente']);
            echo '<tr>'; 
            echo '<td>'.$grupo['id'].'</td>'; 
            echo '<td>'.$grupo['nombreGrupo'].'</td>'; 
            echo '<td>';
            echo ' <button 
                data-bs-toggle="modal" 
                data-bs-target="#modalIntegrantes"
                class="btn btn-primary" 
                onclick="verIntegratesGrupo('.$grupo['id'].');"
                >Integrantes</button>';

            echo  '</td>'; 
            
            // echo '<td>'.$tipoCont['descripcion'].'</td>'; 
            // echo '<td>'.$cliente['sede'].'</td>'; 
            echo '</tr>';
        }
    echo '</table>';   
 }
 public function modalNuevoCliente()
 {
     ?>
         <!-- Modal -->
         <div class="modal fade" id="modalNuevoCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Info Grupo</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body" id="modalBodyNuevoCliente">
                 
             </div>
             <div class="modal-footer">
                 <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="listarGrupos();" >Cerrar</button>
                 <button  type="button" class="btn btn-primary"  id="btnEnviar"  onclick="grabarGrupo();" >Grabar Grupo</button>
             </div>
             </div>
         </div>
         </div>

     <?php
 }
 public function modalIntegrantes()
 {
     ?>
         <!-- Modal -->
         <div class="modal fade" id="modalIntegrantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Integrantes Grupo</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body" id="modalBodyIntegrantes">
                 
             </div>
             <div class="modal-footer">
                 <!-- <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="listarGrupos();" >Cerrar</button>
                 <button  type="button" class="btn btn-primary"  id="btnEnviar"  onclick="grabarGrupo();" >Grabar Grupo</button> -->
             </div>
             </div>
         </div>
         </div>

     <?php
 }


 public function formuNuevoGrupo()
 {
   
     ?>
     <div class="row">
             <div class="col-md-6">
                 <label for="">Nombre Grupo</label>
                   <input class ="form-control" type="text" id="nombre">          
             </div>
          
     </div>

 

     <?php
 }

 public function formuNuevoClienteAnte()
 {
   
     ?>
     <div class="row">
             <div class="col-md-6">
                 <label for="">Nombre</label>
                   <input class ="form-control" type="text" id="nombre">          
             </div>
             <div class="col-md-6">
                 <label for="">Identificacion:</label>
                   <input class ="form-control" type="text" id="nit">          
             </div>
     </div>

     <div class="row">
             <div class="col-md-6">
                 <label for="">Telefono/Celular:</label>
                   <input class ="form-control" type="text" id="telefono">          
             </div>
             <div class="col-md-6">
                 <label for="">Correo:</label>
                   <input class ="form-control" type="text" id="email">          
             </div>
     </div>
     <div class="row">
             <div class="col-md-6">
                 <label for="">Direccion:</label>
                   <input class ="form-control" type="text" id="direccion">          
             </div>
             <div class="col-md-6">
                 <label for="">Ciudad:</label>
                   <input class ="form-control" type="text" id="ciudad">          
             </div>
     </div>
     <div class="row">
             <div class="col-md-6">
                 <label for="">Tipo Contribuyente:</label>
                 <select id="idTipoContribuyente" class ="form-control">
                     <option value ="">Seleccione...</option>
                     <?php
                        //   $tipoContribuyentes =  $this->tipoContriModel->traerTipoContribuyente();
                        //  foreach($tipoContribuyentes as $tipoContribuyente)
                        //  {
                        //      echo '<option value ="'.$tipoContribuyente['id'].'" >'.$tipoContribuyente['descripcion'].'</option>';
                        //  }
                     ?>

                 </select>   
                   <!-- <input class ="form-control" type="text" id="id">           -->
             </div>
             <div class="col-md-6">
                 <label for="">Sede:</label>
                   <input class ="form-control" type="text" id="sede">          
             </div>


            
     </div>

     <?php
 }

 public function verIntegratesGrupo($idGrupo)
 {
        echo 'idgrupo '.$idGrupo;
 }

}