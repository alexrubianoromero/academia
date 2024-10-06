<?php

$raiz =dirname(dirname(dirname(__file__)));
//  die('rutamodel '.$raiz);

require_once($raiz.'/conexion/Conexion.php');

class GrupoModel extends Conexion
{

    public function traerGrupos()
    {
        $sql = "select * from grupos ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $clientes = $this->get_table_assoc($consulta);
        return $clientes;
    }

    public function traerGrupoId($id)
    {
        $sql = "select * from grupos where id = '".$id."' ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = mysql_fetch_assoc($consulta);
        return $cliente;
    }
    public function traerClienteFiltrado($idCliente)
    {
        $sql = "select * from grupos  where idcliente = '".$idCliente."' ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = mysql_fetch_assoc($consulta);
        return $cliente;
    }
    public function traerClienteFiltrado2($id)
    {
        $sql = "select * from grupos  where id = '".$id."' ";
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }
    public function grabarGrupo($request)
    {
        $sql = "insert into grupos  (nombreGrupo)    
            values ('".$request['nombre']."'
            ) ";
        $consulta = mysql_query($sql,$this->connectMysql());
        // $clientes = $this->get_table_assoc($consulta);
        // return $clientes;
    }

    public function traerClienteId($id)
    {
        $sql = "select * from grupos where idcliente = '".$id."'  ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }


}