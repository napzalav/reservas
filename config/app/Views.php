<?php
class Views{
    public function getView($ruta, $vista, $data=""){
        if ($ruta == 'principal') {
            $vista = 'views/' . $vista . '.php';
        } else {
            $vista = 'views/' . $ruta . '/' . $vista . '.php';
        }
        require $vista;
    }
}







?>