<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginModel extends CI_Model
{
    public function validate($email,$password)
    {
        $this->db->select('password,user_id');
        $this->db->from('User_Data');
        $this->db->where('email',$email);
        $query=$this->db->get();
        $result=$query->row_array();
        if($result['password']==$password)
        {
            return true;
        }
        else
            return false;
    }
    public function register($name,$email,$password)
    {
        $details = array(
            'username' => $name,
            'email' => $email,
            'password' => $password,
        );
        // if ($this->db->error()['code'] == 1062) {
        //     // Handle the error caused by inserting duplicate values
        //     echo 'email already exists';
        // }
        try 
        {
            $this->db->insert("User_Data", $details);   
        } 
        catch (Exception $e) 
        {
            if ($this->db->error()['code'] == 1062) {
                echo 'Error: Email already exists';
                return "";
            } else {
                echo 'Error: ' . $e->getMessage();
                return "";
            }
        }
        //begin session once user is registered
        $_SESSION['email'] = $email;
        $this->db->select('username,user_id');
        $this->db->from('User_Data');
        $this->db->where('email',$email);
        $query=$this->db->get();
        $result=$query->row_array();
        if(array_key_exists('user_id',$result))
        {
            $_SESSION['name'] = $result['username'];
            $_SESSION['userid'] = $result['user_id'];
            $_SESSION['status'] = 'loggedin';
        }

    }
    public function create_session($email)
    {
        $_SESSION['email'] = $email;
        $this->db->select('username,user_id');
        $this->db->from('User_Data');
        $this->db->where('email',$email);
        $query=$this->db->get();
        $result=$query->row_array();
        $_SESSION['name'] = $result['username'];
        $_SESSION['userid'] = $result['user_id'];
        $_SESSION['status'] = 'loggedin';
        // echo 'Session Successfully Created';
    }
    public function destroy_session()
    {
        session_unset();
        session_destroy();
    }
}