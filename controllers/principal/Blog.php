<?php
class Blog extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index() {
        $data['title'] = 'Blog';
        $data['subtitle'] = 'Publicaciones';
        $this->views->getView('principal/blog/index', $data);
    }
}

?>