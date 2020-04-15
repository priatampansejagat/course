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

        // $this->load->library(['MySession','MyFlash']);

        // $this->load->model(['']);

    }

    public function index()
    {

        //LOGIN STATUS FUNCTION======================================
        // if ($this->mysession->loginStatus() == false) {
        // 	redirect(base_url().'login','refresh');
        // }

        // if ($this->mysession->loginGetData('privilege')=='1') {

        // 	// get data user
        // 	$selfusername 	=	$this->mysession->loginGetData('username');		
        // 	$data = $this->loadData();


        // 	$this->load->view('admin/homeView',$data);

        // }else{
        // 	show_404();
        // }
        //LOGIN STATUS FUNCTION======================================

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
                    redirect('User');
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

    public function setting()
    {
        $data['title'] = 'Setting';
        $data['page_title'] = 'My Account';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/auth/settings', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function courseList()
    {
        $data['title'] = 'Course List';
        $data['page_title'] = 'Course List';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/course/list', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function courseDetail($param)
    {
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

    public function payment()
    {
        $data['title'] = 'Payment Confirmation';
        $data['page_title'] = 'Payment Confirmation';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/payment/list', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function paymentConfirmation($id)
    {
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

    public function myCourse()
    {
        $data['title'] = 'My Course';
        $data['page_title'] = 'My Course';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/course/myCourse', $data);
        $this->load->view('visitor/templates/footer');
    }

    public function invoice()
    {
        $data['title'] = 'Invoice';
        $data['page_title'] = 'Invoice';

        $this->load->view('visitor/templates/header', $data);
        $this->load->view('visitor/templates/topbar', $data);
        $this->load->view('visitor/payment/invoice', $data);
        $this->load->view('visitor/templates/footer');
    }
}
