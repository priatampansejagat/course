<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Semua session harus ditulis disini, gunanya supaya mudah mencari script atay key yang ada di aplikasi ini, tidak terpencar ke file2 yang lain...

class MySession {
    var $CI;
    public function __construct($params = array())
    {
        $this->CI =& get_instance();

        $this->CI->load->helper('url');
    		$this->CI->load->library('session');
    		$this->CI->config->item('base_url');
        
    }

    public function setData($key,$value){
        $newdata = array( 
            $key       => $value
        );  

        $this->CI->session->set_userdata($newdata);
    }

    public function unsetData($key){
       $array_items = array($key);
        $this->CI->session->unset_userdata($array_items);
    }

    public function getData($key){
       return $this->CI->session->userdata($key);
    }

    public function checkData($key){
      if ($this->CI->session->userdata($key) != NULL) {
          return true;       
      } else {
          return false;     
      }
    }


    // Login
    public function loginStatus($datauser){
      if ($this->CI->session->userdata($datauser)) {
        return true;
      }else{
        return false;
      }
    }

    public function loginSetData($username,$status,$privilege){

        $newdata = array( 
           'username'       => $username, 
           'status'         => $status,
           'privilege'      => $privilege
        );  

        $this->CI->session->set_userdata($newdata);

    }

    public function loginUnsetData(){
        $array_items = array('username','status','privilege');
        $this->CI->session->unset_userdata($array_items);
    }

    public function loginGetData($key){
        return $this->CI->session->userdata($key);
    }

}

?>