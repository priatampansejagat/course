<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('dataseed.php');

class EventController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

	}

	public function index() {
		
		$this->globalfunction->isLogedIn('username');

		$data = [];

		if ($this->mysession->loginGetData('role')== AS_ADMIN) {

			$data = $this->globalfunction->getBasicData();
			$data['onpage'] = 'EVENT';

			$this->load->view('admin/event',$data);

		}else{
			show_404();
		}
	}

	public function eventBy_id($event_id){
		// echo $event_id;
		$this->globalfunction->isLogedIn('username');

		if ($this->mysession->loginGetData('role')== AS_ADMIN) {

			$data = $this->globalfunction->getBasicData();
			$data['onpage'] = 'EVENT DETAIL';

			$eventCond = array('id' => $event_id);
			$data['event']			= $this->BasicQuery->selectAll('event',$eventCond);

			$data['event']['description'] = $this->globalfunction->changeto_HTMLcharref($data['event']['description']);

			$courseCond = array('status' => 1);
			$data['course_list'] = $this->BasicQuery->selectAllResult('course',$courseCond);

			// echo(json_encode($data));
			$this->load->view('admin/event_detail',$data);

		}else{
			show_404();
		}
	}

	
}
