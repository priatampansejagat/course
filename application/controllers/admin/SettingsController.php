<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('dataseed.php');

class SettingsController extends CI_Controller
{

	public function index()
	{	

		$data = [];
		
		$this->globalfunction->isLogedIn('username');

		if ($this->mysession->loginGetData('role')== AS_ADMIN) {

			$data = $this->globalfunction->getBasicData();
			$data['onpage'] = 'SETTINGs';

			// echo json_encode($data);
			$this->load->view('admin/settings',$data);

		}else{
			show_404();
		}
		
	}
}
