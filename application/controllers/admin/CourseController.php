<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('dataseed.php');

class CourseController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		// $this->load->model(['']);

	}

	public function index(){	

		// echo(json_encode($_SESSION));
		$data = [];
		
		$this->globalfunction->isLogedIn('username');

		if ($this->mysession->loginGetData('role')== AS_ADMIN) {

			$data = $this->globalfunction->getBasicData();
			$data['onpage'] = 'COURSE';

			// $userCond = array('role_id' => AS_MENTOR);
			// $data['mentor_list'] = $this->BasicQuery->selectAllResult('user',$userCond);
			// echo(json_encode($data));
			$this->load->view('admin/course',$data);

		}else{
			show_404();
		}
		
	}

	public function courseBy_id($id){
		$this->globalfunction->isLogedIn('username');

		if ($this->mysession->loginGetData('role')== AS_ADMIN) {

			$data = $this->globalfunction->getBasicData();
			$data['onpage'] = 'COURSE DETAIL';

			$userCond = array('role_id' => AS_MENTOR);
			$data['mentor_list'] = $this->BasicQuery->selectAllResult('user',$userCond);
			// echo(json_encode($data));

			$courseCond = array('id' => $id);
			$courseCond2 = array('course_id' => $id);
			$data['course']['info']			= $this->BasicQuery->selectAll('course',$courseCond);
			$data['course']['chapter'] 		= $this->BasicQuery->selectAllResult('course_chapter',$courseCond2);

			$userCond = array('id' => $data['course']['info']['mentor_id']);
			$data['course']['info']['mentor'] = $this->BasicQuery->selectAll('user',$userCond);

			$data['course']['info']['description'] = $this->globalfunction->changeto_HTMLcharref($data['course']['info']['description']);

			// echo(json_encode($data));
			$this->load->view('admin/course_detail',$data);

		}else{
			show_404();
		}

	}

	public function course_participant($id){
		$this->globalfunction->isLogedIn('username');

		if ($this->mysession->loginGetData('role')== AS_ADMIN) {

			$data = $this->globalfunction->getBasicData();
			$data['onpage'] = 'COURSE PARTICIPANTS';

			$courseCond = array('id' => $id);
			$courseCond2 = array('course_id' => $id);
			$data['course']['info']			= $this->BasicQuery->selectAll('course',$courseCond);
			$data['course']['member'] 		= $this->BasicQuery->selectAllResult('course_member',$courseCond2);

			echo(json_encode($data));
			// $this->load->view('admin/course_detail',$data);

		}else{
			show_404();
		}

	}

}
