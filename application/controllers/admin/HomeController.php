<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('dataseed.php');

class HomeController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		// $this->load->model(['']);

	}

	public function index()
	{	

		// echo(json_encode($_SESSION));
		$data = [];

		$this->globalfunction->isLogedIn('username');

		if ($this->mysession->loginGetData('role')==AS_ADMIN) {

			$data = $this->globalfunction->getBasicData();

			$data['onpage'] = 'HOME';
			// echo(json_encode($data));
			$this->load->view('admin/home',$data);

		}else{
			show_404();
		}
		
	}

}
