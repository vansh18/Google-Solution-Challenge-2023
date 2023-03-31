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
        if(!isset($_SESSION['userid']))
            $this->load->view('landing_view.php');
        else
        {
            redirect('home');// redirect if user already logged in
        }
    }
    public function user_login()
    {
        if(!isset($_SESSION['userid']))
            $this->load->view('login_view.php');
        else
        {
            redirect('home');// redirect if user already logged in
        }
    }
    public function signup()
    {
        if(!isset($_SESSION['userid']))
            $this->load->view('signup_view.php');
        else
        {
            redirect('home');// redirect if user already logged in
        }
    }
    public function validate()
    {
        if($this->LoginModel->validate($_POST['email'],$_POST['password']))
        {
            $response = array('status' => 200,'success' => true);
            $this->LoginModel->create_session($_POST['email']);// create session once user data validated
        }
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
    public function knowing_you()
    {
        $this->load->view("knowing_view.php");
    }
    public function user_logout()
    {
        $this->LoginModel->destroy_session();
        redirect("login");
    }
}
?>