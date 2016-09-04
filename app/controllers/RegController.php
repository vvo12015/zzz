<?php

class RegController extends Controller {
    
	private $errorAuth = " ";
	
	public function getErrorAuth(){
		return $this->errorAuth;
	}
	
	public function setErrorAuth($error){
		$this->errorAuth = $error;
	}
	
    public function indexAction() {
		$this->registry['customer'] = $this->getModel('Auth')
				->initCollection()
				->sort(['last_name', 'ASC'])
				->getCollection()
				->select();
        $this->setTitle("Авторизація");
        $this->setView();
        $this->renderLayout();
    }
	
	public function checkAction(){
		if(\filter_input(INPUT_POST, 'email')){
			$this->registry['customer'] = $this->getModel('Auth')
				->initCollection()
				->filter(["email", \filter_input(INPUT_POST, 'email')], "and", array("="))
				->getCollection()
				->select();	
			if (isset($this->registry['customer'][0])){
				$customer = $this->registry['customer'][0];
				if ($customer['last_name'] === \filter_input(INPUT_POST, 'last_name')){
					$check = true;
					$time=time()+3600;
					$last_name=$customer['last_name'];
					$first_name=$customer['first_name'];
				}
			}
		}
		if ($check) {
			$this->setErrorAuth("Такий e-mail вже існує");
		}else{
			setCookie('last_name', $last_name, $time, '/');
			setCookie('first_name', $first_name, $time, '/');
		}
		
		$this->setTitle("Реєстрація");
        $this->indexAction();
	}
}