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

			$userCond = array('role_id' => '83bbe0cd25d8cc4b8c076497a57d4b6452e84946b9042dc7983a7806a1f636cf');
			$data['peserta'] = $this->BasicQuery->selectAllResult('user',$userCond);
			// echo(json_encode($data));
			$this->load->view('admin/peserta',$data);

		}else{
			show_404();
		}
		
	}

}
