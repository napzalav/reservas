<?php
//extendemos desde la clase Controller en la carpeta app para realizar una herencia
//para cargar la herencia necesitamos generar un constructor y adentro cargar el modelo mediante "parent"
class Principal extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index() {
        $data['title'] = 'Página principal';
        $this->views->getView('index', $data);
    }
}

?>