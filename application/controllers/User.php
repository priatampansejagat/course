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

        $data = [];
        $this->load->view('visitor/home', $data);
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
            $this->load->view('visitor/login');
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

                if (isset($data_object->data->content->id)) {
                    $data_session = array(
                        'id'                 => $data_object->data->content->id,
                        'username'           => $data_object->data->content->username,
                        'fullname'           => $data_object->data->content->fullname,
                        'role'               => $data_object->data->content->j3b5vhj23v5k2b3k52b3k5hb2hv3gh2cjgvhjvhfyuvjbvg2f3u5vjvv,
                    );
                    $this->session->set_userdata($data_session);
                    redirect('User');
                } else if ($data_object->data->message == 'Username dan password tidak boleh kosong') {
                    $this->session->set_flashdata('login_error', 'error');
                    redirect('login');
                } else if ($data_object->data->message == 'Periksa kembali username dan password') {
                    $this->session->set_flashdata('login_error', 'error');
                    redirect('login');
                } else {
                    $this->session->set_flashdata('login_error', 'error');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('login_error', 'error');
                redirect('login');
            }
        }
    }

    public function register()
    {
        $this->load->view('visitor/register');
    }
}
