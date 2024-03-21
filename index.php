<?php
require_once 'config/config.php';

//CAPTURAR URL ACTUAL
$currentPageUrl = $_SERVER['REQUEST_URI'];

//VERIFICAR SI EXISTE LA RUTA ADMIN
$isAdmin = strpos($currentPageUrl, '/' . ADMIN) !== false;

//COMPROBAR SI EXISTE GE PARA CREAR URL AMIGABLES
$ruta = empty($_GET['url']) ? 'principal/index' : $_GET['url'];

//CREAR UN ARRAY A PARTIR DE LA RUTA
$array = explode('/', $ruta);

//VALIDAR SI NOS ECONTRAMOS EN LA RUTA ADMIN
if ($isAdmin && (count($array) == 1
|| (count($array) == 2 && empty($array[1])))
&& $array[0] == ADMIN) {
    //CREAR CONTROLADOR
    $controller = 'admin';
    $metodo = 'login';
} else {
    $indiceUrl = ($isAdmin) ? 1 : 0 ;
    $controller = ucfirst($array[$indiceUrl]);
    $metodo = 'index';
}

//VALIDAR METODOS
$metodoIndice = ($isAdmin) ? 2 : 1 ;
if (!empty($array[$metodoIndice]) && $array[$metodoIndice] != '') {
    $metodo = $array[$metodoIndice];
}

//VALIDAR METODOS
$parametro = '';
$parametroIndice = ($isAdmin) ? 3 : 2 ;
if (!empty($array[$metodoIndice]) && $array[$metodoIndice] != '') {
    for ($i = $parametroIndice; $i < count($array); $i++) {
        $parametro .= $array[$i] . ',';
    }
    $parametro = trim($parametro, ',');
}










?>