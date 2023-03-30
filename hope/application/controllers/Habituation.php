<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Habituation extends CI_Controller 
{
    public function __construct() 
    { 
        parent::__construct(); 
        user_login(); // calls helper to check if user is logged in or not
        $this->load->model("HabitModel");
    }
    public function index()
    {
        
        $habits = $this->HabitModel->get_habits($_SESSION['userid']);
        // print_r($habits);
        $data = array('habits' => $habits);
        $this->load->view('habituation_view.php',$data);
    }
    public function add_habit()
    {
        $habit =  $_POST['habit'];
        // $habit =  'porn';
        $this->HabitModel->add_habit($habit,$_SESSION['userid']);
        echo (json_encode(array('status' => 200, 'reply' => 'success')));
    }
    public function delete_habit()
    {
        $habit_id = $_POST['habit'];
        $this->HabitModel->delete_habit($habit_id);
        echo (json_encode(array('status' => 200, 'reply' => 'success')));
    }
    public function reset_habit()
    {
        $habit_id = $_POST['habit'];
        $this->HabitModel->reset_habit($habit_id);
        echo (json_encode(array('status' => 200, 'reply' => 'success')));
    }
    // public function get_habits()
}
?>