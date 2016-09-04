<?php
class CustomerController extends Controller {
    
    private $formWrongDate = NULL;
    
    public function setFormWrongDate($form = NULL){
        $this->formWrongDate = $form;
    }
    
    public function getFormWrongDate(){
        return $this->formWrongDate;
    }
    
    
    public function IndexAction() {
        $this->ListAction();
    }

    public function ListAction() {
        $this->setTitle("Користувачі");
        $this->setView("list");
        $this->renderLayout();
    }
    
      public function generateCustomerFilters(){
        $result = array
            (
                    "name" => FILTER_SANITIZE_STRING,
                    "email" => FILTER_VALIDATE_EMAIL,
                    "password" => FILTER_SANITIZE_STRING,
            );
        
        $result['confirm_password'] = $result["password"];

        return $result;
    }

    public function RegisterAction() {
        $this->setTitle("Реєстрація");
        exit;
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
            $form = $this->checkAfterFiltersCustomer();
            if ($form['add']) {
                unset($form['add']);
                unset($form['information error']);
                Helper::getModel('Customers')->insert($form);
                $this->LoginAction();
                exit();
            }else{
                $this->setFormWrongDate($form);
            }
        }
        //$this->setView("register");
       // $this->renderLayout();
        $this->view->generate("register", "layout");
    }

    private function checkAfterFiltersCustomer(){
        
        $filters = $this->generateCustomerFilters();
        $form = \filter_input_array(INPUT_POST, $filters);
        
        if (!empty($form['email'])) {
            $email = $form['email'];
        
        
        $customer = Helper::getModel('Customers')->initCollection()
                ->filter(['email', $email], "and", ['='])
                ->getCollection()
                ->selectFirst();
        
            if (($form['password'] === $form['confirm_password'])) {
                if (empty($customer)) {
                    $form['add'] = TRUE;
                    $form['password'] = md5($form['password']);
                    unset($form['confirm_password']);
                }else{
                    $form['add'] = FALSE;
                    unset($form['email']);
                    $form['information error'] = "Такий користувач вже існує";
                }
            }else{
                unset($form['password']);
                unset($form['confirm_password']);
                $form['add'] = FALSE;
                $form['information error'] = "Невідповідність паролів";
            }
        }else{
            $form['add'] = FALSE;
            unset($form['email']);
            $form['information error'] = "Не правильний або відсутній email";
        }
        return $form;
    }
    
    
    public function LoginAction() {       
       
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
            $email = filter_input(INPUT_POST, 'email');
            $password = md5(filter_input(INPUT_POST, 'password'));
            
            $customer = Helper::getModel('Customers')->initCollection()
                    ->filter(['email', $email, 'password', $password], "and", ['=', '='])
                    ->getCollection()
                    ->selectFirst();
            if(!empty($customer)) {
                $_SESSION['id'] = $customer['id'];
                header("Location: " . BP . "\index\index");
            } else {
                $this->invalid_password = 1;
            }

        }
       $this->view->generate("login", "layout"); 
       //$this->setView("login");   
       //$this->renderView();
    }
    public function LogoutAction() {
        
        $_SESSION = [];

       // expire cookie

        if (\filter_input(INPUT_COOKIE, "session_name"))
        {
            setcookie(session_name(), "", time() - 3600, "/");
        }

        $this->setView('index');
        $this->renderLayout();
    }
    
}