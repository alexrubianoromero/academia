<?php

$raiz =dirname(dirname(dirname(__file__)));
//  die('rutamodel '.$raiz);
require_once($raiz.'/alumnosAsignadosGrupo/models/AlumnosAsignadosGrupoModel.php'); 
require_once($raiz.'/conexion/Conexion.php');

class AsistenciaModel extends Conexion
{
    protected $asignadosModel;

    public function __construct()
    {
        $this->asignadosModel = new AlumnosAsignadosGrupoModel();

    }

    public function actualizarAsistencia($request)
    {
            $sql = "update controlAsistencia set asistio = '".$request['valor']."'   where id='".$request['idAsistencia']."'   ";
            // die($sql);
            $consulta = mysql_query($sql,$this->connectMysql());

    }


    public function traerAsistenciaIdAsignacion($idAsignacion)
    {
        $sql = "select * from controlAsistencia  where idAsignacion = '".$idAsignacion."'   order by fecha asc ";
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }
    public function traerFechasIdAsignacion($idGrupo)
    {
        $sql = "select distinct(a.fecha) from controlAsistencia a
        inner join alumnosAsignadosGrupo ag on (ag.id = a.idAsignacion )
        where ag.idGrupo = '".$idGrupo."'  order by a.fecha asc";
        // die($sql);
        $consulta = mysql_query($sql,$this->connectMysql());
        $clientes = $this->get_table_assoc($consulta);
        return $clientes;
    }
    public function traerIdAlumnosConIdIdGrupo($idGrupo)
    {
        $sql = "select distinct(ag.id) from controlAsistencia a
        inner join alumnosAsignadosGrupo ag on (ag.id = a.idAsignacion )
        where ag.idGrupo = '".$idGrupo."'  group by ag.id order by ag.id";
        // die($sql);
        $consulta = mysql_query($sql,$this->connectMysql());
        $asignados = $this->get_table_assoc($consulta);
        return $asignados;
    }


    public function traerClienteFiltrado2($idCliente)
    {
        $sql = "select * from cliente0  where idcliente = '".$idCliente."' ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }
    public function grabarCliente($request)
    {
        $sql = "insert into cliente0  (nombre,identi,telefono,email,direccion,ciudad)    
            values ('".$request['nombre']."','".$request['nit']."','".$request['telefono']."'
            ,'".$request['email']."'
            ,'".$request['direccion']."'
            ,'".$request['ciudad']."'
           
            ) ";
        $consulta = mysql_query($sql,$this->connectMysql());
        // $clientes = $this->get_table_assoc($consulta);
        // return $clientes;
    }

    public function traerClienteId($id)
    {
        $sql = "select * from cliente0 where idcliente = '".$id."'  ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }
    public function traerFechaHoy()
    {
        $fechaHoy =  time();
        $fechaHoy = date ( "Y-m-j" , $fechaHoy );
        return $fechaHoy;
    }
    public function revisarSiExisteFechaenAsistenciaIdGrupo($idGrupo)
    {
        $fechaHoy =  time();
        $fechaHoy = date ( "Y-m-j" , $fechaHoy );
        $sql = "select * from  controlAsistencia a 
        inner join alumnosAsignadosGrupo ag on (ag.id = a.idAsignacion )
        where a.fecha = '".$fechaHoy."'  
        and ag.idGrupo = '".$idGrupo."'
        ";
        // die($sql); 
        // $sql = "select distinct(ag.id) from controlAsistencia a
        // inner join alumnosAsignadosGrupo ag on (ag.id = a.idAsignacion )
        // where ag.idGrupo = '".$idGrupo."'  group by ag.id order by ag.id";
        // die($sql);
        $consulta = mysql_query($sql,$this->connectMysql());
        $filas = mysql_num_rows($consulta); 
        return $filas;
    } 

    public function crearNuevaFecha($idAsignacion,$fecha)
    {
        $sql = "insert into controlAsistencia (idAsignacion,fecha)    
            values ('".$idAsignacion."','".$fecha."') ";
        $consulta = mysql_query($sql,$this->connectMysql());
        
    }
    
    public function crearFechaAsistencia($idGrupo)
    {
        $fechaHoy = $this->traerFechaHoy();
        $idAsignados = $this->traerIdAlumnosConIdIdGrupo($idGrupo);
        // echo '<pre>'; 
        // print_r($idAsignados); 
        // echo '</pre>';
        // die(); 
        foreach($idAsignados as $idAsignado)
        {
            // echo '<br> '.$idAsignado['id']; 
            $this->crearNuevaFecha($idAsignado['id'],$fechaHoy);
        }
        
    }



}