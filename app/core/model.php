<?php
class Model {

    private $table_reviews = "reviews";
    private $table_customers = "customers";
    protected $table_name;
    protected $collection;
    protected $sql;
    protected $params = [];
    protected $user_status;
    protected $sortParm = [];
    
    function _constructor($sortParam, $user_status){
        $this->sortPram=$sortPram;
        $this->user_status=$user_status;
    }
    
    
    public function getData(){
        $array_param_sort = [];
        if (\filter_input(INPUT_POST, 'sort_type')){
            $sort_category = \filter_input(INPUT_POST, 'sort_category');
            if($sort_category){
            if (($sort_category === 'name') || 
                ($sort_category === 'email')){
                    $sort_category = '`customers`.`'. $sort_category . '`';
                }else{
                    $sort_category = '`reviews`.`'. $sort_category.'`';
                }
            }
            $sort_type= \filter_input(INPUT_POST, 'sort_type');
            $array_param_sort = array($sort_category=>$sort_type);}
        return $this->my_initCollection()->
            filter_user()->
            my_sort($array_param_sort)->
            getCollection()->
            select();
            
    }
    
    public function my_initCollection() {
        $this->sql = "select * from " . '`' . $this->table_reviews . '`' . " JOIN "
            . '`' . $this->table_customers . '`' ." ON `customers`.`customer_id`=`reviews`.`customer_id`";
        return $this;
    }
    
    public function initCollection() {
        $this->sql = "select * from " . $this->table_name;
        return $this;
    }
    
    public function my_sort($sortParams = NULL) {
        if (!empty($sortParams)){
            $forStrParams=[];
            foreach ($sortParams as $sortName => $order) {
                array_push($forStrParams, $sortName . " " . $order);
            }
            $strParams = implode(", ", $forStrParams);
            $this->sql .= " order by " . $strParams;
        }
        return $this;
    }
    
    public function sort($params) {
        if (!empty($params)){
            $forStrParams=[];
            foreach ($params as $sortName => $order) {
                array_push($forStrParams, $sortName . " " . $order);
            }
            $strParams = implode(", ", $forStrParams);
            $this->sql .= " order by " . $strParams;
        }
        return $this;
    }
    
    public function filter_user($admin_modify = true){
        if ($admin_modify){
            $this->sql .= " WHERE `reviews`.`admin_modify` = 1";
        }
        return $this;
    }
    
    //filter(['sku', $diapasonBegin, 'sku', $diapasonEnd], "and", ['>' , '<'])
    public function filter($params, $condition, $comparisons) {
		$on = true;
		$c = 0;
		for($i=0;$i < count($params);$i+=2){
			$j=$i+1;
			if(isset($params[$i]) && isset($params[$j])) {
				if ($on){
					$this->sql .= " where ";
					$on=false;
					$this->sql .= "$params[$i]" . " $comparisons[$c]" . " ? ";										
				}else{
					$this->sql .= " $condition $params[$i]"  . "$comparisons[$c]" . "?";
				}
			}			
			array_push($this->params, $params[$j]);
			$c++;
		}
        return $this;
    }

    public function insert($param){
        $db = new DB();
        $keys = [];
        foreach ($param as $key=>$value) {
            array_push($keys, "`$key`");
        }
        $str_key = implode(", ", $keys);
        $this->sql = "INSERT INTO `" . $this->table_name . "` (" . $str_key;
        $this->params = [];
 
        $this->sql .= ") VALUES( ";
        $i=0;
        foreach ($param as $value) {
            $this->sql .= "? ";
            if ($i < count($param)-1) {
                $this->sql .= ", ";
            }
            array_push($this->params, $value);
            $i++;
        }
        
        $this->sql .= ");";
        $db->query($this->sql, $this->params);
    }
    
    public function updateOnOneColomn($arraySet, $condition){
        $forQuery = [];
        $this->params = [];
        $db = new DB();
        
        $this->sql = "UPDATE `" . $this->table_name . "` SET ";
        
        foreach ($arraySet as $nameColumn => $value) {
            array_push($forQuery, "`" . $nameColumn . "`=?");
            array_push($this->params, $value);
        }
        
        $this->sql .=  implode(", ", $forQuery)
                . " WHERE " . key($condition) . " = ?";
        
        array_push($this->params, array_shift($condition));
        
        $this->sql .= ";";
        $db->query($this->sql, $this->params);
    }
    
    public function getCollection() {
        $db = new DB();
        $this->sql .= ";";
        $this->collection = $db->query($this->sql, $this->params);
        return $this;
    }
    
    public function select() {
        return $this->collection;
    }
	
    public function selectFirst() {
        if (empty($this->collection[0])) {
            return null;
        }  else {
            return $this->collection[0];
        }
    }
    
}
