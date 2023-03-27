<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Storage extends CI_Controller 
{
    public function __construct() 
    { 
        parent::__construct(); 
        user_login();// check if user is logged in
		$this->load->model('ChatModel');
    }
    public function index()
    {
        $this->load->model('gcp_config');
        $bucketName = 'hope_bucket';
        $cloudPath = "user_data/test.txt";
        $fileContent = "Hello this is new content i am uploading!";
        // $this->gcp_config->uploadFile($bucketName, $fileContent, $cloudPath);
        // $this->gcp_config->downloadFile($bucketName,"user_data/test.txt","./data/test.txt");
    }
    public function upload_file() // called when user ends chat session
    {
        $userid = $_SESSION['userid'];
        $filename = sprintf("user_chat_%s.json",$userid);
        $fileContent = file_get_contents('./data/'.$filename); // get file content from temp file in data folder
        $this->load->model('gcp_config');
        $bucketName = 'hope_bucket';
        $cloudPath = "user_data/".$filename;
        if(!$this->gcp_config->uploadFile($bucketName, $fileContent, $cloudPath))// upload file contents to gcp
            $msg =  'file uplaod error';
        else
        {
            $msg = 'file uploaded successfully';
            if(!$this->ChatModel->delete_file($filename))//delete temp file once its uplaoded
                $msg =  $msg. 'file deletion failed';
            else
                $msg =  $msg. 'file deleted';
        }
        echo json_encode(array(
            'status' => 200,
            'response' => $msg
        ));
    }

    public function get_file()
    {
        $userid = $_SESSION['userid'];
        $filename = sprintf("user_chat_%s.json",$userid);
        $this->load->model('gcp_config');
        $bucketName = 'hope_bucket';
        $cloudPath = "user_data/".$filename;
        if(!$this->gcp_config->downloadFile($bucketName, $cloudPath, "./data/".$filename))// upload file contents to gcp
            $msg =  'file not found';
        else
        {
            $msg = 'file downloaded successfully';
            // if(!$this->ChatModel->write_file($filename))//delete temp file once its uplaoded
            //     $msg =  $msg. 'file writing failed';
            // else
            //     $msg =  $msg. 'file written';
        }
        echo json_encode(array(
            'status' => 200,
            'response' => $msg
        ));
    }


}
?>