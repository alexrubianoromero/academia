<?php

$raiz =dirname(dirname(dirname(__file__)));
//  die('rutamodel '.$raiz);

require_once($raiz.'/conexion/Conexion.php');

class ProfesorModel extends Conexion
{
    public function traerClientes()
    {
        $sql = "select * from profesores ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $clientes = $this->get_table_assoc($consulta);
        return $clientes;
    }
    public function traerClienteFiltrado($idCliente)
    {
        $sql = "select * from profesores  where idcliente = '".$idCliente."' ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = mysql_fetch_assoc($consulta);
        return $cliente;
    }
    public function traerClienteFiltrado2($idCliente)
    {
        $sql = "select * from profesores  where idcliente = '".$idCliente."' ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }
    public function grabarCliente($request)
    {
        $sql = "insert into profesores  (nombre,identi,telefono,email,direccion,ciudad)    
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
        $sql = "select * from profesores where idcliente = '".$id."'  ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }


}