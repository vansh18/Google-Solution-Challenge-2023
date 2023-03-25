<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChatModel extends CI_Model
{
    public function get_chat_json($filename)
    {
        $max_past_conv = 15; // Set max chats passed to template
        $file = "./data/".$filename;
        $data = json_decode(file_get_contents($file),true);
        while(sizeof($data['chat'])>$max_past_conv)
        {
            array_shift($data['chat']);
        }
        return $data['chat'];
    }
    public function create_template($chat_arr)
    {
        $chat = "";
        foreach($chat_arr as $convo)
        {
            $chat = $chat.sprintf("User:%s\nHope:%s",$convo['user'],$convo['hope']);
        }

        $template = sprintf("Hope is an expert in performing Cognitive Behavioural Therapy. Hope will be the Users Therapist.
        Hope will converse with the user and help the user to overcome their mental health problems. Hope is very experienced and keeps in mind previous conversations made with the user.
        User will share their thoughts and problems with Hope and Hope will try and solve them by Cognitive Behavioural Therapy.
        Hope can help users who struggle with anxiety, depression, trauma, sleep disorder, relationships, work-stress, exam-stress and help them.
        Hope may also suggest breathing exercises or simple tasks or any other conventional methods that may help the User.%s
        ",$chat);
        return $template;
    }
    public function create_client($apikey)
    {
        $client = OpenAI::client($apikey);
        return $client;
    }
    function chat_completion($client,$msg)
    {
        $response = $client->completions()->create([
            'model' => 'text-davinci-003',
            'max_tokens' => 1000,
            'prompt' => $msg,
            'temperature' => 0
        ]);
        
        $result = $response->choices[0]->text;
        return $result;
        
    }
    public function encode_chat_json($usermsg,$hopemsg,$filename)
    {
        $file = "./data/".$filename;
        if(file_exists($file))
        {
            $data = json_decode(file_get_contents($file),true);
            array_push($data['chat'],array('user' => $usermsg , 'hope' => $hopemsg));
            file_put_contents($file,json_encode($data,JSON_PRETTY_PRINT));
        }
        else
        {
            $data = array('chat' => array(0 => array('user' => $usermsg , 'hope' => $hopemsg)));
            file_put_contents($file,json_encode($data,JSON_PRETTY_PRINT));
        }
    }
}   

?>