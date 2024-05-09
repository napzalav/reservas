<?php
//extendemos desde la clase Controller en la carpeta app para realizar una herencia
//para cargar la herencia necesitamos generar un constructor y adentro cargar el modelo mediante "parent"
class Principal extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index() {
        $data['title'] = 'Página principal';
        //TRAER SLIDERS
        $data['sliders'] = $this->model->getSliders();
        //Comprobamos que nos muestre el array desde la base de datos
        // print_r($data);
        // exit;
        $this->views->getView('index', $data);
    }
}

?>