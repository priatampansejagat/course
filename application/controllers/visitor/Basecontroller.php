<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('dataseed.php');

class Basecontroller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		// $this->load->library(['MySession','MyFlash']);

		// $this->load->model(['']);

	}

	public function index()
	{

		//LOGIN STATUS FUNCTION======================================
		// if ($this->mysession->loginStatus() == false) {
		// 	redirect(base_url().'login','refresh');
		// }

		// if ($this->mysession->loginGetData('privilege')=='1') {

		// 	// get data user
		// 	$selfusername 	=	$this->mysession->loginGetData('username');		
		// 	$data = $this->loadData();


		// 	$this->load->view('admin/homeView',$data);

		// }else{
		// 	show_404();
		// }
		//LOGIN STATUS FUNCTION======================================

		$data = [];
		$this->load->view('visitor/home', $data);
	}

	public function auth()
	{
		$this->load->view('visitor/login');
	}

	public function register()
	{
		$this->load->view('visitor/register');
	}
}
