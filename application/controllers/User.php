<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('dataseed.php');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('curl_api');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    private function isUser()
    {
        if (isset($_SESSION['id'])) {
            if ($_SESSION['role'] == AS_ADMIN) {
                redirect('home');
            }
        }

        return false;
    }

    public function index()
    {
        $this->isUser();

        $data['title'] = 'Home';
        $data['page_tittle'] = 'Research Academy';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/home/home', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function auth()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => "Field Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => "Field Tidak Boleh Kosong"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('visitor/auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($username && $password) {
                $option = array(
                    'type' => 'post',
                    'url_api' => URL_API_LOGIN,
                    'data' => json_encode((object) ["username" => $username, "password" => $password]),
                );

                $this->curl_api->set_option($option);
                $data_object = $this->curl_api->exec();

                if (isset($data_object->data->id)) {
                    $data_session = array(
                        'id'                 => $data_object->data->id,
                        'username'           => $data_object->data->username,
                        'fullname'           => $data_object->data->fullname,
                        'role'               => $data_object->data->j3b5vhj23v5k2b3k52b3k5hb2hv3gh2cjgvhjvhfyuvjbvg2f3u5vjvv
                    );
                    $this->session->set_userdata($data_session);
                    if ($data_object->data->j3b5vhj23v5k2b3k52b3k5hb2hv3gh2cjgvhjvhfyuvjbvg2f3u5vjvv == AS_ADMIN) {
                        redirect('home');
                    } else if ($data_object->data->j3b5vhj23v5k2b3k52b3k5hb2hv3gh2cjgvhjvhfyuvjbvg2f3u5vjvv == AS_MENTOR) {
                        redirect('home');
                    } else {
                        redirect('User');
                    }
                } else if ($data_object->data->message == 'Username dan password tidak boleh kosong') {
                    $this->session->set_flashdata('login_error', 'error');
                    redirect('User/auth');
                } else if ($data_object->data->message == 'Periksa kembali username dan password') {
                    $this->session->set_flashdata('login_error', 'error');
                    redirect('User/auth');
                } else {
                    $this->session->set_flashdata('login_error', 'error');
                    redirect('User/auth');
                }
            } else {
                $this->session->set_flashdata('login_error', 'error');
                redirect('User/auth');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('User');
    }

    public function register()
    {
        $this->load->view('visitor/auth/register');
    }

    public function forget_pass()
    {
        $this->load->view('visitor/auth/forget_pass');
    }

    public function setting()
    {
        $this->isUser();

        $data['title'] = 'Setting';
        $data['page_title'] = 'My Account';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/auth/settings', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function courseList()
    {
        $this->isUser();

        $data['title'] = 'Course List';
        $data['page_title'] = 'Course List';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/course/list', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function change_password()
    {
        $this->isUser();

        $data['title'] = 'Change Password';
        $data['page_title'] = 'Change Password';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/auth/change_password', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function courseDetail($param)
    {
        $this->isUser();

        $option = array(
            'type' => 'post',
            'url_api' => URL_API_DATATABLE,
            'data' => json_encode((object) ["ihateapple" => "single_course", "id" => $param]),
        );

        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();

        if (isset($data_object->data->id)) {
            $data['title'] = 'Course Detail';
            $data['page_title'] = 'Course Detail';
            $data['data_course'] = $data_object;

            $this->load->view('visitor/templates/header', $data);
            $this->load->view('visitor/templates/topbar', $data);
            $this->load->view('visitor/course/detail', $data);
            $this->load->view('visitor/templates/footer');
        }
    }

    public function eventList()
    {
        $this->isUser();

        $data['title'] = 'Event List';
        $data['page_title'] = 'Event List';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/event/list', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function eventDetail($param)
    {
        $this->isUser();

        $option = array(
            'type' => 'post',
            'url_api' => URL_API_DATATABLE,
            'data' => json_encode((object) ["ihateapple" => "single_event", "event_id" => $param]),
        );

        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();

        if (isset($data_object->data->event_info->id)) {
            $data['title'] = 'Event Detail';
            $data['page_title'] = 'Event Detail';
            $data['data_event'] = $data_object->data;

            $this->load->view('visitor/templates/header', $data);
            $this->load->view('visitor/templates/topbar', $data);
            $this->load->view('visitor/event/detail', $data);
            $this->load->view('visitor/templates/footer');
        }
    }

    public function mentorDetail($param)
    {
        $this->isUser();

        $option = array(
            'type' => 'post',
            'url_api' => URL_API_DATATABLE,
            'data' => json_encode((object) ["ihateapple" => "single_user", "user_id" => $param]),
        );

        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();

        if (isset($data_object->data->user->id)) {
            $data['title'] = 'Mentor Detail';
            $data['page_title'] = 'Mentor Detail';
            $data['data_user'] = $data_object->data;

            $this->load->view('visitor/templates/header', $data);
            $this->load->view('visitor/templates/topbar', $data);
            $this->load->view('visitor/mentor/detail', $data);
            $this->load->view('visitor/templates/footer');
        }
    }

    public function payment()
    {
        $this->isUser();

        $data['title'] = 'Payment Confirmation';
        $data['page_title'] = 'Payment Confirmation';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/payment/list', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function paymentConfirmation($id)
    {
        $this->isUser();

        $data['title'] = 'Payment Confirmation';
        $data['page_title'] = 'Payment Confirmation';
        $data['id_payment'] = $id;

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/payment/index', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function registCourse($course_id)
    {
        $this->isUser();

        if (!isset($_SESSION["id"])) {
            redirect('User/auth');
        }

        $option = array(
            'type' => 'post',
            'url_api' => URL_API_REGISTCOURSE,
            'data' => json_encode((object) ["user_id" => $_SESSION["id"], "course_id" => $course_id]),
        );

        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();

        if ($data_object->status == 200) {
            $data['title'] = 'Invoice';
            $data['page_title'] = 'Invoice';
            $data['data_payment'] = $data_object;

            $this->load->view('visitor/templates/header', $data);
            $this->load->view('visitor/templates/topbar', $data);
            $this->load->view('visitor/payment/invoice', $data);
            $this->load->view('visitor/templates/footer');
        } else {
            $data['title'] = 'Payment Confirmation';
            $data['page_title'] = 'Payment Confirmation';

            $this->load->view('visitor/templates/header', $data);
            $this->load->view('visitor/templates/topbar', $data);
            $this->load->view('visitor/payment/list', $data);
            $this->load->view('visitor/templates/footer');
        }
    }

    public function registEvent($event_id)
    {
        $this->isUser();

        if (!isset($_SESSION["id"])) {
            redirect('User/auth');
        }

        $option = array(
            'type' => 'post',
            'url_api' => URL_API_REGISTEVENT,
            'data' => json_encode((object) ["user_id" => $_SESSION["id"], "event_id" => $event_id]),
        );

        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();

        if ($data_object->status == 200) {
            $data['title'] = 'Invoice';
            $data['page_title'] = 'Invoice';
            $data['data_payment'] = $data_object;

            $this->load->view('visitor/templates/header', $data);
            $this->load->view('visitor/templates/topbar', $data);
            $this->load->view('visitor/payment/invoiceEvent', $data);
            $this->load->view('visitor/templates/footer');
        } else {
            $data['title'] = 'Payment Confirmation';
            $data['page_title'] = 'Payment Confirmation';

            $this->load->view('visitor/templates/header', $data);
            $this->load->view('visitor/templates/topbar', $data);
            $this->load->view('visitor/payment/list', $data);
            $this->load->view('visitor/templates/footer');
        }
    }

    public function myCourse()
    {
        $this->isUser();

        $data['title'] = 'My Course';
        $data['page_title'] = 'My Course';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/course/myCourse', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function myEvent()
    {
        $this->isUser();

        $data['title'] = 'My Event';
        $data['page_title'] = 'My Event';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/event/myEvent', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function classDetail($course_id)
    {
        $this->isUser();

        $data['title'] = 'Class Detail';
        $data['page_title'] = 'Class Detail';
        $data['course_id'] = $course_id;

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/course/detailClass', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function myEventDetail($event_id)
    {
        $this->isUser();

        $data['title'] = 'List Course Event';
        $data['page_title'] = 'List Course Event';
        $data['event_id'] = $event_id;

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/event/detailEvent', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function myClassEventDetail($event_id, $course_id)
    {
        $this->isUser();

        $data['title'] = 'Course Detail';
        $data['page_title'] = 'Course Detail';
        $data['event_id'] = $event_id;
        $data['course_id'] = $course_id;

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/event/classEvent', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function classVideo($course_id, $chapter_id)
    {
        $this->isUser();

        $data['title'] = 'Class Detail';
        $data['page_title'] = 'Class Detail';
        $data['course_id'] = $course_id;
        $data['chapter_id'] = $chapter_id;

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/course/classVideo', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function classEventVideo($event_id, $course_id, $chapter_id)
    {
        $this->isUser();

        $data['title'] = 'Class Detail';
        $data['page_title'] = 'Class Detail';
        $data['course_id'] = $course_id;
        $data['chapter_id'] = $chapter_id;
        $data['event_id'] = $event_id;

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/event/classEventVideo', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function classTask($course_id)
    {
        $this->isUser();

        $data['title'] = 'Class Detail';
        $data['page_title'] = 'Class Detail';
        $data['course_id'] = $course_id;

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/course/uploadTask', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function taskEvent($course_id, $event_id)
    {
        $this->isUser();

        $data['title'] = 'Class Detail';
        $data['page_title'] = 'Class Detail';
        $data['course_id'] = $course_id;
        $data['event_id'] = $event_id;

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/event/eventTask', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function invoice()
    {
        $this->isUser();

        $data['title'] = 'Invoice';
        $data['page_title'] = 'Invoice';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/payment/invoice', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function certificateDetail($course_id)
    {
        $this->isUser();

        $data['title'] = 'Class Detail';
        $data['page_title'] = 'Class Detail';
        $data['course_id'] = $course_id;

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/course/certificateDetail', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function certificate($course_id, $id)
    {
        $this->isUser();

        $option = array(
            'type' => 'post',
            'url_api' => URL_API_DATATABLE,
            'data' => json_encode((object) ["ihateapple" => "mycourse_room", "user_id" => $_SESSION["id"], "course_id" => $course_id]),
        );

        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();

        $data['course_id'] = $course_id;
        preg_match_all('!\d+!', $id, $cert_no);
        $data['cert_no'] = $cert_no;
        // var_dump($data['cert_no']);
        // die;
        if (isset($data_object->data->course_detail->id)) {
            $data['title'] = 'Certificate';
            $data['page_title'] = 'Certificate';
            $data['data_course'] = $data_object;

            $this->load->view('visitor/certificate/certificate', $data);
        }
    }
}
