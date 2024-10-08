<?php

$raiz =dirname(dirname(dirname(__file__)));
//  die('rutamodel '.$raiz);

require_once($raiz.'/conexion/Conexion.php');

class AsistenciaModel extends Conexion
{
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


}