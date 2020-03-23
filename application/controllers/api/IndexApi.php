<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexApi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl_api');
        $this->load->library('session');
    }

    public function post_file()
    {
        $filename = $_FILES['file']['name'];
        $filedata = $_FILES['file']['tmp_name'];
        $cFile = curl_file_create($filedata, $_FILES['file']['type'], $filename);
        $postfields = array("file" => $cFile, "filename" => $filename);
        $target_url = $_POST["url"];
        $request_headers = array(
            "x-auth-userid: " . $this->session->userdata('id'),
            "Content-Type:multipart/form-data"
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $target_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_exec($ch);
        curl_close($ch);
    }

    public function post()
    {
        $data = $this->input->post();

        if(isset($data['param'])){
            $encode = json_encode($data['param']);
        }else{
            $encode = '';
        }
        
        $option = array(
            'type' => 'post',
            'url_api' => $this->input->post('url'),
            'data' => $encode
        );

        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();
        if ($data_object->status !== 200) {
            http_response_code($data_object->status);
        }
        echo json_encode($data_object);
    }

    public function put()
    {
        $data = $this->input->post();
        $option = array(
            'type' => 'PUT',
            'url_api' => $this->input->post('url'),
            'data' => json_encode($data['param']),
            'headers' => "x-auth-userid: " . $this->session->userdata('id')
        );

        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();
        if ($data_object->status !== 200) {
            http_response_code($data_object->status);
        }
        echo json_encode($data_object);
    }

    public function get()
    {
        $data = $this->input->post();
        $option = array(
            'type' => 'GET',
            'url_api' => $this->input->post('url'),
            'headers' => "x-auth-userid: " . $this->session->userdata('id')
        );
        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();

        echo json_encode($data_object);
    }

}
