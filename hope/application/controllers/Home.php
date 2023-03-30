<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
    public function __construct() 
    { 
        parent::__construct(); 
        user_login(); // calls helper to check if user is logged in or not
    }
    public function index()
    {
        // print_r($_SESSION);
        $this->load->view('home_view.php');
    }
    public function meditation()
    {
        $this->load->view('meditation_view.php');
    }
    public function feedback()
    {
        if(!isset($_POST['feedback']))
        {
            $this->load->view("feedback_view.php");
        }
        else
        {
            $feedback = $_POST['feedback'];
            $this->load->model("FeedbackModel");
            $userid = $_SESSION['userid'];
            $username = $_SESSION['name'];
            $this->FeedbackModel->insert_feedback($feedback,$userid,$username);
            redirect('home');
        }
    }
}
?>