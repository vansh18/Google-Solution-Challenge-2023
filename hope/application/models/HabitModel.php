<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HabitModel extends CI_Model
{
    public function add_habit($habit,$userid)
    {
        $details = array(
            'user_id' => $userid,
            'addiction' => $habit
        );
        $this->db->insert("habituation", $details);
        return $this->db->insert_id();
    }
    public function delete_habit($habit_id)
    {
        $this->db->where('addiction_id',$habit_id);
        $this->db->delete("habituation");
        return $this->db->insert_id();
    }
    public function get_habits($userid)
    {
        $this->db->select('addiction_id,addiction,start_time');
        $this->db->from('habituation');
        $this->db->where('user_id',$userid);
        $query = $this->db->get();
        $habits = $query->result_array();
        for($i =0; $i<sizeof($habits);$i++)
        {
            date_default_timezone_set('UTC');
            $start = new DateTime($habits[$i]['start_time']);
            $current = new DateTime();
            $interval = $start->diff($current);
            $elapsed = '';
            $years = $interval->format('%y');
            $months = $interval->format('%m');
            $days = $interval->format('%a');
            $hours = $interval->format('%h');
            $minutes = $interval->format('%i');
            $seconds = $interval->format('%s');
            if ($years > 0) {
                $elapsed .= $years . ' years ';
            }

            if ($months > 0) {
                $elapsed .= $months . ' months ';
            }

            if ($days > 0) {
                $elapsed .= $days . ' days ';
            }

            if ($hours > 0) {
                $elapsed .= $hours . ' hours ';
            }

            if ($minutes >= 0) {
                $elapsed .= $minutes . ' minutes ';
            }

            // if ($seconds > 0) {
            //     $elapsed .= $seconds . ' seconds';
            // }

            $habits[$i] += array('elapsed' => $elapsed);
            $habits[$i] += array('streak' => $days);
        }
        return $habits;
    }
    public function reset_habit($habit_id)
    {
        $this->db->where('addiction_id', $habit_id);
        $sql = "UPDATE habituation SET start_time = CURRENT_TIMESTAMP WHERE addiction_id = ?;";
        return $this->db->query($sql,$habit_id);
    }
    public function update_streak($habit_id,$userid)
    {
        $this->db->select('reset_count,max_streak');
        $this->db->from('habituation');
        $this->db->where('addiction_id',$habit_id);
        $query = $this->db->get();
        $reset_count = ($query->result_array())['reset_count'];
        $reset_count ++;
        $max_streak = ($query->result_array())['max_streak'];
        if($reset_count > 0)
        {
            
        }

    }
}