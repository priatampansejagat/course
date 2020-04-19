<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('dataseed.php');

class UsersController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		// $this->load->model(['']);

	}

	public function single_user($id)
	{	

		$data = [];
		
		$this->globalfunction->isLogedIn('username');

		if ($this->mysession->loginGetData('role')== AS_ADMIN) {

			$data = $this->globalfunction->getBasicData();
			$data['onpage'] = 'USER INFORMATION';

			$userCond = array('id' => $id);
			$data['data']['user'] = $this->BasicQuery->selectAll('user',$userCond);

			$payCond = array('id_user' => $id, 'status' => 1);
			$data['data']['payment'] = $this->BasicQuery->selectAllResult('payment',$payCond);

			foreach ($data['data']['payment'] as $key => $value) {
				$data['data']['payment'][$key]['course'] = $this->BasicQuery->selectAll('course', array('id' => $value['course_id']));
			}
			// echo(json_encode($data));
			$this->load->view('admin/user_info',$data);

		}else{
			show_404();
		}
		
	}

}
