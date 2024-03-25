<?php
//extendemos desde la clase Controller en la carpeta app para realizar una herencia
//para cargar la herencia necesitamos generar un constructor y adentro cargar el modelo mediante "parent"
class Principal extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index() {
        $data = $this->model->getPrueba();
        print_r($data);
        //$this->views->getView('principal', 'index', $data);
        
        
        
        // echo $data;
        // echo 'Mensaje desde el controlador';
    }

}











?>