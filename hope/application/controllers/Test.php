<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller 
{
    public function index()
    {
        $this->load->model('gcp_config');
        $bucketName = 'hope_bucket';
        $cloudPath = "user_data/test.txt";
        $fileContent = "Hello this is a test file uplaod from my laptop yay!";
        $this->gcp_config->uploadFile($bucketName, $fileContent, $cloudPath);
    }
}
?>