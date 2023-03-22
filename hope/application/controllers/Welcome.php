<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct() { 
        parent::__construct(); 
		$this->load->model('ChatModel');
		// echo($this->ChatModel->run_chat_script());
    }
	public function index()
	{	
		
		// $this->ChatModel->run_chat_script();
		// $this->load->view('chatbot.php');

	}
	public function get_output()
	{
		// message received from user
		$msg = $_POST['input'];
		$response = $this->ChatModel->write_input($msg);
		$data = array();
		$data['status'] = 200;
		$data['msg'] = $response;
		echo  json_encode($data);
		
	}
	public function start_chat()
	{
		$this->ChatModel->run_chat_script();
		header("refresh:0;url=".BASE_URL."chat");
	}
	public function call_chat()
	{
		$this->load->view('chatbot.php');
	}
}
