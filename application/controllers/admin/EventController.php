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

	public function event_participant($id){
		$this->globalfunction->isLogedIn('username');

		if ($this->mysession->loginGetData('role')== AS_ADMIN) {

			$data = $this->globalfunction->getBasicData();
			$data['onpage'] = 'EVENT PARTICIPANTS';

			$eventCond = array('id' => $id);
			$eventCond2 = array('event_id' => $id);
			$data['event']['info']			= $this->BasicQuery->selectAll('event',$eventCond);
			$data['event']['member'] 		= $this->BasicQuery->selectAllResult('event_member',$eventCond2);

			// echo(json_encode($data));
			$this->load->view('admin/event_participant',$data);

		}else{
			show_404();
		}

	}

	public function event_gallery($id){
		$this->globalfunction->isLogedIn('username');

		if ($this->mysession->loginGetData('role')== AS_ADMIN) {

			$data = $this->globalfunction->getBasicData();
			$data['onpage'] = 'EVENT GALLERY';

			$eventCond = array('id' => $id);
			$data['event'] 		= $this->BasicQuery->selectAll('event',$eventCond);

			// echo(json_encode($data));
			$this->load->view('admin/event_gallery',$data);

		}else{
			show_404();
		}
	}

	
}
