<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('dataseed.php');

class PesertaController extends CI_Controller
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

		if ($this->mysession->loginGetData('role')=='fdd38312da2d5ddc4b90a49aaa2bcf52d586572db5ce37cb2630799476aa13e4') {

			$data = $this->globalfunction->getBasicData();

			$data['onpage'] = 'PESERTA';
			// echo(json_encode($data));
			$this->load->view('registered/peserta',$data);

		}else{
			show_404();
		}
		
	}

}
