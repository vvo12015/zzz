<?php

class Route {

    public static function withoutBasename($array){        
        $basename = strtolower(basename(getcwd()));
        $aftreBasename=FALSE;
        $result = array();
        foreach ($array as $value) {
            if (!($value === "")){
                $value = strtolower($value);
                if ((!$aftreBasename) && ($value === $basename)){
                    $aftreBasename=TRUE;
                }
                
                if ((!$aftreBasename) && !($value === $basename)){
                    array_push($result, $value);
                }
            }
        }
        return $result;
    }
    
    public static function Start() {
            //назначение параметров по умолчанию
            $controller_name = 'index';
            $action_name = 'index';
            $action_parameters = array();          
           
            //преобразуем строку запроса в массив
            $uri_array = explode('?', filter_input(INPUT_SERVER,'REQUEST_URI'));
          
            $route_array_raw = explode('/', $uri_array[0]);            
            $route_array = self::withoutBasename($route_array_raw);
           
            if (filter_var_array($route_array)){                
                if ($route_array === 'index.php') {
                    array_shift($route_array);
                }
                if(!empty($route_array[0])) {
                    $controller_name = $route_array[0];
                }

                if(!empty($route_array[1])) {
                    $action_name = $route_array[1];
                }
            }            
         
            // добавляем префиксы
            $controller_name = ucfirst($controller_name) .'Controller';
            $action_name = ucfirst($action_name) . 'Action';
            
            if(file_exists(ROOT . DS . '/app/controllers/'.$controller_name.'.php')) {
                include ROOT . DS . '/app/controllers/'.$controller_name.'.php';
            }
            else {
                include ROOT . DS . '/app/controllers/ErrorController.php';
                $controller_name = 'ErrorController';
            }
           
            
            $controller = new $controller_name();
        
            
            $controller->$action_name();
    }

}
