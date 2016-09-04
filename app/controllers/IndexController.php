<?php

class IndexController extends Controller {
    
    public function IndexAction() {
        
        $this->view->setTitle("Форма відгуків");
        $view_name;
        if (empty($_SESSION['admin'])) {
            $view_name = "user";
        }else{
            $view_name = "moderator";
        }
        $this->view->generate($view_name, "layout", Helper::getModel("User")->getData());
    }

}