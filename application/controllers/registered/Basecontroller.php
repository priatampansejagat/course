<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('dataseed.php');

class BaseController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		// $this->load->library(['MySession','MyFlash']);

		// $this->load->model(['']);
		// $this->load->model('BaseModel');
	}

	public function index()
	{
		$data_dummy = $this->BaseModel->test();
		echo ($data_dummy['menu']);

		$data = [];
		// $this->load->view('registered/basepage',$data);
	}

	public function register()
	{
		$this->load->view('registered/auth/register.php');
	}
}
