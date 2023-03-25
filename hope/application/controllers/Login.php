<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() 
    { 
        parent::__construct(); 
		$key = file_get_contents("./application/key.txt");
		$this->load->model('LoginModel');
    }
    public function index()
    {
        $this->load->view('login_view.php');
    }
    public function signup()
    {
        $this->load->view('signup_view.php');
    }
    public function validate()
    {
        if($this->LoginModel->validate($_POST['email'],$_POST['password']))
            $response = array('status' => 200,'success' => true);
        else    
            $response = array('status' => 200,'success' => false);
       echo json_encode($response);
    }
    public function register_user()
    {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->LoginModel->register($name,$email,$password);
            echo json_encode(array('status' => 200, 'success' => true, 'email' => $email, 'password' => $password));
    }
}
?>