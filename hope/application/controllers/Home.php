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
    public function habituation()
    {
        $this->load->view('habituation_view.php');
    }
}
?>