<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
	
	public function __construct() 
    { 
        parent::__construct(); 
		$key = file_get_contents("./application/key.txt");
		$this->load->model('ChatModel');
		$this->client = $this->ChatModel->create_client($key);
    }
    public function get_chat()
    {
        $msg = $_POST['input'];
        if(!file_exists("./data/test.json"))
            $this->ChatModel->encode_chat_json("Hi","","test.json"); 
        else
            $this->ChatModel->encode_chat_json($msg,"","test.json");
        $data  = $this->ChatModel->get_chat_json("test.json");
        $template = $this->ChatModel->create_template($data);
        $result = ($this->ChatModel->chat_completion($this->client,$template));
        $this->ChatModel->encode_chat_json($msg,$result,"test.json");
        $data = array('status' => 200, 'msg' => $result);
        echo json_encode($data);
    }
    public function call_chat()
    {
        $this->load->view('chatbot.php');
    }
	
}
