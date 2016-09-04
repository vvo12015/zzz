<?php

class View {
    
    private $title;
    private $data;
    
    public function getData(){
        return $this->data;
    }
    
    public function setData($data){
        return $this->data = $data;
    }
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    function generate($content_view, $layout){
		include ROOT . DS . '/app/layouts/'.$layout.'.php';
    }
    
    function generateForm($status_admin = false){
        include ROOT . DS . '/app/layouts/layoutForm.php';
    }
}
