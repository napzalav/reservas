<?php
//extendemos desde la clase Controller en la carpeta app para realizar una herencia
//para cargar la herencia necesitamos generar un constructor y adentro cargar el modelo mediante "parent"
class Principal extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index() {
        $data['title'] = 'Página principal';
    //     $data = get_nombre_dia(date('Y-m-d'));
    //     print_r($data);
        $this->views->getView('principal', 'index', $data);
    }
}

?>