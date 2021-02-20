<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('news_model');


	}

	public function login()
	{

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			// $params   = json_decode(file_get_contents('php://input'), true);
			$params   = file_get_contents('php://input');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$response = $this->user_model->loginapp($username, $password);
			echo	json_encode($response);



		}

	}
	public function logout()
	{
		$id =$this->uri->segment('4');
		$response = $this->user_model->logoutapp($id);
		echo	json_encode($response);
	}
	public function getstate()
	{
		$id =$this->uri->segment('4');
		$response = $this->user_model->checktoken($id);
		if($response){
			$data['news'] = $this->news_model->state();
			echo	json_encode($data['news']);
		}
		else{
			$response = array('status' => 400, 'message' => 'Invalid Token');
			$rep =  array('success' =>true ,'status' => 200,'message' => 'State Detail','state'=>$response);
			echo	json_encode($rep);
		}
	}
	public function addstate() {
		$response = array();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('state', 'state', 'required');
		if ($this->form_validation->run() === FALSE) {
			$response['success'] = false;
			$response['status'] = 401;
			$response['error'] = "Something Went Wrong";
		} else {
			$this->news_model->set_state();
			$response['success'] = true;
			$response['status'] = 200;
			$response['message'] = "Operation performed successfully";
		}
		echo json_encode( $response );
  // return $this->response->setJSON($);
	}

	public function district() {
		// $token = $this->input->get_request_header('Authorization');
		// print_r($token);
		// die;
		$id =$this->uri->segment('4');

		$data['district'] = $this->news_model->district($id);
		$rep =  array('success' =>true ,'status' => 200,'message' => 'District Detail','state'=>$data['district'] );
		echo json_encode( $rep );
	}
	public function adddistrict() {
		$response = array();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('state', 'state', 'required');
		if ($this->form_validation->run() === FALSE) {
			$response['success'] = 	False;
			$response['status'] = 401;
			$response['error'] = "Something Went Wrong";
		} else {
			$this->news_model->set_district();
			$response['success'] = true;
			$response['status'] = 200;
			$response['message'] = "Operation performed successfully";
		}
		echo json_encode( $response );
	}
	public function child() {
		$data['child'] = $this->news_model->child();
		$rep =  array('success' =>true ,'status' => 200,'message' => 'child_profile','timestamp' => date('dmy'),'state'=>$data['child'] );
		echo json_encode( $rep );
	}
	public function addchild(){
		try{
			$response = array();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'name', 'required');
$config['upload_path'] = './screenshots'; //core folder (if you like upload to application folder use APPPATH)
$config['allowed_types'] = 'gif|jpg|png'; //allowed MIME types
$config['encrypt_name'] = TRUE; //creates uniuque filename this is mainly for security reason
$this->load->library('upload', $config);
if (!$this->upload->do_upload('file')) { //picture_upload is upload field name set in HTML eg. 
	$error = array('error' => $this->upload->display_errors());
}else{
  $file_naam=  $this->upload->data()['file_name']; // this is how you get for example "file name" of file
}
if ($this->form_validation->run() === FALSE) {
	$response['success'] = false;
	$response['status'] = 401;
	$response['error'] = "Something Went Wrong";
} else {
	$this->news_model->set_child($file_naam);
	$response['success'] = true;
	$response['status'] = 200;
	$response['message'] = "Operation performed successfully";
}
}
//catch exception
catch(Exception $e) {
	echo 'Message: ' .$e->getMessage();
}
echo json_encode( $response );
exit;
}
}