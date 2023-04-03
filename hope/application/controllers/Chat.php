<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
	
	public function __construct() 
    { 
        parent::__construct(); 
        user_login();// check if user is logged in
		$key = file_get_contents("./application/key.txt");
		$this->load->model('ChatModel');
		$this->client = $this->ChatModel->create_client($key);
    }
    public function get_chat()
    {
        $msg = $_POST['input'];
        $userid = strval($_SESSION['userid']);
        $filename = sprintf("user_chat_%s.json",$userid);
        if(!file_exists("./data/".$filename))
            $this->ChatModel->encode_chat_json("Hi","Hi there! How are you doing today?",$filename); 
        $data  = $this->ChatModel->get_chat_json($filename);
        $template = $this->ChatModel->create_template($data,$msg);
        $result = ($this->ChatModel->chat_completion($this->client,$template));
        $this->ChatModel->encode_chat_json($msg,$result,$filename);
        $data = array('status' => 200, 'msg' => $result);
        echo json_encode($data);
    }
    public function call_chat()
    {
        $this->load->view('chatbot.php');
    }
	
}
