<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('dataseed.php');

class HomeController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->load->model(['BasicQuery']);

	}

	public function index()
	{
		$data = [];

		$this->globalfunction->isLogedIn('username');

		if ($this->mysession->loginGetData('privilege')=='fdd38312da2d5ddc4b90a49aaa2bcf52d586572db5ce37cb2630799476aa13e4') {

			// get data user and menu
			$selfusername 	=	$this->mysession->loginGetData('username');	
			$dataUser = $this->BasicQuery->selectAll('user',array('username' => $this->mysession->loginGetData('username')));
			$data['user'] = $dataUser;

			$condMenu = array( 'id_role' => 'fdd38312da2d5ddc4b90a49aaa2bcf52d586572db5ce37cb2630799476aa13e4' );
			$resultMenu = $this->BasicQuery->selectAllResult('menu',$condMenu);

			foreach ($resultMenu as $key => $value) {
				
				$data['menu'][$value['id']]=$value;

				// selecting submenu
				$condSubMenu = array('id_menu' => $value['id']);
				$resultSubMenu = $this->BasicQuery->selectAllResult('submenu',$condSubMenu);

				$data['menu'][$value['id']]['submenu'] = $resultSubMenu;

			}

			echo(json_encode($data));
			// $this->load->view('registered/home',$data);

		}else{
			show_404();
		}
		
	}

}
