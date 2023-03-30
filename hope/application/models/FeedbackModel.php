<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FeedbackModel extends CI_Model
{
    public function insert_feedback($feedback,$userid,$username)
    {
        $data = array(
            'userid' => $userid,
            'name' => $username,
            'feedback' => $feedback
        );
        return $this->db->insert("feedback",$data);
    }
}