<?php

class View {
    
    private $title;
    
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    function generate($content_view, $layout, $data = null)
	{
		/*
		if(is_array($data)) {
			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/
		include ROOT . DS . '/app/layouts/'.$layout.'.php';
	}
    
    function generateForm($data = null, $status_admin = false){
        include ROOT . DS . '/app/layouts/layoutForm.php';
    }
}
