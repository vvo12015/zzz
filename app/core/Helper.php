<?php

class Helper{
    
    public static function fontRedLabel($name, $flag = FALSE){
        $str = "<label class=\"control-label col-sm-2\" for=\"last_name\">" . $name . ":</label>";
        if ($flag) {
            $str = "<font color=\"red\">" . $str . "</font>";
        }
        return $str;
    }
    
    
    
    public static function simpleLink($request_uri, $name, $param = []){
        
        $path = $request_uri;
        
        if (!(strpos($path, BP)===0)){
            $path = BP . $path;
        }
        
        $strArray = [];
        if ((!(strpos($path, '?') === strlen($path)-1)) && (!empty($param))){
			foreach($param as $key=>$value){
				array_push($strArray, $key . '=' . $value);
			}
            $path .= "?" . implode('&', $strArray); 
        }
        
        return "<a href=\"". "$path\">". $name . "</a>";
    }
    
     public static function linkClass($className, $request_uri, $name, $param = []){
        $link = Helper::simpleLink($request_uri, $name, $param);
        
        return substr($link, 0, strpos($link, "href")) . "class=". $className . " " 
				. substr($link, strpos($link, "href"));
        
    }
    
    public static function getCustomer() {
        if (!empty($_SESSION['id'])) {
        $customer = self::getModel('customer')->initCollection()
            ->filter(['`id`', filter_var($_SESSION["id"])], "and", ['='])
            ->getCollection()
            ->selectFirst();
        if (!empty($customer)) {
            return $customer;
        }
        } else {
            return null;
        }
   }
   
   public static function getProduct($id) {
        if (!empty($id)) {
        return 
        $product = self::getModel('Product')->initCollection()
            ->filter(['`id`', $id], "and", ['='])
            ->getCollection()
            ->selectFirst();
        }
        else {
            return null;
        }
   }
   
       public static function getModel($name) {
        $model = new $name();
        return $model;
    }
}