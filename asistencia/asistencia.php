<?php
date_default_timezone_set('America/Bogota');
$raiz = dirname(__file__);
//  die($raiz);
 require_once($raiz.'/controllers/alumnosController.php');  
$alumnosController = new alumnosController();

?>