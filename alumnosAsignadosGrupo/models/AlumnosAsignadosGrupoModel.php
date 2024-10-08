<?php

$raiz =dirname(dirname(dirname(__file__)));
//  die('rutamodel '.$raiz);

require_once($raiz.'/conexion/Conexion.php');

class AlumnosAsignadosGrupoModel extends Conexion
{

    public function traerAlumnosGrupoId($id)
    {
        $sql = "select * from alumnosAsignadosGrupo  where idGrupo = '".$id."' ";
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());
        $alumnos = $this->get_table_assoc($consulta);
        return $alumnos;
    }


    public function traerGrupos()
    {
        $sql = "select * from alumnosAsignadosGrupo ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $clientes = $this->get_table_assoc($consulta);
        return $clientes;
    }
    public function traerClienteFiltrado($idCliente)
    {
        $sql = "select * from alumnosAsignadosGrupo  where idcliente = '".$idCliente."' ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = mysql_fetch_assoc($consulta);
        return $cliente;
    }
    public function traerClienteFiltrado2($id)
    {
        $sql = "select * from alumnosAsignadosGrupo  where id = '".$id."' ";
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }
    public function grabarGrupo($request)
    {
        $sql = "insert into alumnosAsignadosGrupo  (nombreGrupo)    
            values ('".$request['nombre']."'
            ) ";
        $consulta = mysql_query($sql,$this->connectMysql());
        // $clientes = $this->get_table_assoc($consulta);
        // return $clientes;
    }

    public function traerClienteId($id)
    {
        $sql = "select * from alumnosAsignadosGrupo where idcliente = '".$id."'  ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }


}