<?php

class Controller {

    public $view = null; 
    protected $model;
    
    public function __construct(){
        $this->view = new View();
    }
    
    public function setView($view = null) {
        $this->view = $view;
    }

    public function getView() {
        return $this->view === null ? '404' : $this->view;
    }

    public function renderView() {
        if ($this->getView() ==="404") {
            $class_name = "ErrorController";
        } else {
            $class_name = get_called_class();
        }
        $controller = substr($class_name, 0, strpos($class_name, 'Controller'));
        $view_path = ROOT . DS . '/app/views/' . strtolower($controller) . '/' . strtolower($this->getView()) . '.php';
        if(file_exists($view_path)) {
            include $view_path;
        }
    }
    
    public function renderLayout($layout = "layout") {
        if(file_exists(ROOT . DS . '/app/layouts/'.$layout.'.php')) {
            include ROOT . DS . '/app/layouts/'.$layout.'.php';
        }      
    }

    function __call($name, $args) {
		$error = get_called_class();
		$this->setTitle($error);
        $this->setView('404');
        $this->renderLayout('layout_404');
    }
    
}