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

			$userDetail = array('id_user' => $id);
			$data['data']['user_detail'] = $this->BasicQuery->selectAll('detail_user',$userDetail);

			$payCond = array('id_user' => $id, 'status' => 1);
			$data['data']['payment'] = $this->BasicQuery->selectAllResult('payment',$payCond);

			foreach ($data['data']['payment'] as $key => $value) {
				$data['data']['payment'][$key]['course'] = $this->BasicQuery->selectAll('course', array('id' => $value['course_id']));
			}

			$picArr=array("a"=>"1.jpg","b"=>"2.jpg","c"=>"3.jpg","d"=>"4.jpg");
			$data['profile_picture'] = base_url().'assets/pic/'.$picArr[array_rand($picArr,1)];
			if ($data['data']['user_detail']['profile_picture'] != '#') {
				$data['profile_picture'] = $data['data']['user_detail']['profile_picture'];
			}

			// fungsi ga guna 
			$isParticipant = false;
			if ($data['data']['user']['role_id'] == AS_STUDENT) {
				$isParticipant = true;
			}
			
			// echo(json_encode($data));
			$this->load->view('admin/user_info',$data);

		}else{
			show_404();
		}
		
	}

}
