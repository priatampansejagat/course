<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuModel extends CI_Model {

    public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->default = $this->load->database('default', TRUE);
    }



    public function menuByPrivilege(){

        $this->default->select('*')->from('menu');
        $query = $this->default->get();
        
        return $query->row_array();

    }


}


?>