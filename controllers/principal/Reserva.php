<?php
class Reserva extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function verify() {
        $data['title'] = 'Verificar Disponibilidad';
        $data['subtitle'] = 'Publicaciones';
        $this->views->getView('principal/reservas', $data);
    }
}

?>