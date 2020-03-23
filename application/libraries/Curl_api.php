<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Curl_api {


	private $base_url = BASE_URL_API;

	private $url_api;

	private $ch;

	private $type;

	private $headers;

	private $datatype;

	private $data = array();


	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function set_url_api($url)
	{
		$this->url_api = $url;
	}

	public function set_url_base($url)
	{
		$this->base_url = $url;
	}

	public function set_option($option = array()){
		if(isset($option["base_url"])){
			$this->base_url = $option["base_url"];
			unset($option["base_url"]);
		}
		if(isset($option["url_api"])){
			$this->url_api = $option["url_api"];
			unset($option["url_api"]);
		}
		if(isset($option["type"])){
			$this->type = $option["type"];
			unset($option["type"]);
		}
		if(isset($option["headers"])){
			$this->headers = $option["headers"];
			unset($option["headers"]);
		}
		if(isset($option["data"])){
			$this->data = $option["data"];
			unset($option["data"]);
		}
		if(isset($option["datatype"])){
			$this->datatype = $option["datatype"];
			unset($option["datatype"]);
		}
	}

	public function exec(){
		$ch = curl_init();
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		if(isset($this->url_api)){
			$url_request = $this->base_url . $this->url_api;
			curl_setopt($ch, CURLOPT_URL, $url_request);
		}else{
			return false;
		}
		
		if(isset($this->type)){
			switch (strtolower($this->type)) {
				case 'post':
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
					break;
				case 'get':
					curl_setopt($ch, CURLOPT_POST, false);
					curl_setopt($ch, CURLOPT_HTTPGET, true);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
					break;
				case 'put':
					curl_setopt($ch, CURLOPT_POST, false);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
					break;
				default:
					# code...
					break;
			}
		}

		if(isset($this->headers)){
			$header = array(
				// 'x-auth-userid: '.superadmin_id,
				'Content-Type: application/json'
			);
			$header[0] = $this->headers;
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		}else{
			if(isset($this->datatype)){
				if($this->datatype != 'application/json'){
					curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest", "Content-Type: form-data"));
				}
				else{
					curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest", "Content-Type: application/json; charset=utf-8"));
				}
			}
			else{
				curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest", "Content-Type: application/json; charset=utf-8"));
			}
		}

		if(isset($this->data)){
			curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);	
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$this->ch = $ch;
        $data = curl_exec($this->ch);
		return json_decode($data);
	}

}