<?php

class View {
    
    private $title;
    
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    function generate($content_view, $layout, $data = null){
		include ROOT . DS . '/app/layouts/'.$layout.'.php';
    }
    
    function generateForm($data = null, $status_admin = false){
        include ROOT . DS . '/app/layouts/layoutForm.php';
    }
}
