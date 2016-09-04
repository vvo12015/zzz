<?php

class User extends Model {

    function _constructor(){
        $this->admin_modify = true;
    }
}