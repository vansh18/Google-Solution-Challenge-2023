<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChatModel extends CI_Model
{
    public function __construct() { 
        parent::__construct(); 
		// echo($this->ChatModel->run_chat_script());
    }
    public function run_chat_script()
    {
        $command = "nohup python3 application/models/memory_bot.py > /dev/null 2>&1 &";
        shell_exec($command);
        file_put_contents("/Applications/XAMPP/xamppfiles/htdocs/Google-Solution-Challenge-2023/hope/application/models/input.txt","hi###");
        return 'script running';
    }
    public function write_input($input)
    {
        $input = $input."###";
        $optfile = fopen("/Applications/XAMPP/xamppfiles/htdocs/Google-Solution-Challenge-2023/hope/application/models/output.txt", "r") or die("Unable to open file!");
        $prev_output = $new_output = file_get_contents("/Applications/XAMPP/xamppfiles/htdocs/Google-Solution-Challenge-2023/hope/application/models/output.txt");
        //write input into file
        file_put_contents("/Applications/XAMPP/xamppfiles/htdocs/Google-Solution-Challenge-2023/hope/application/models/input.txt",$input);
        // $inpfile = fopen("/Applications/XAMPP/xamppfiles/htdocs/Google-Solution-Challenge-2023/hope/application/models/input.txt", "w") or die("Unable to open file!");
        if($input == '*exit*')
            file_put_contents("/Applications/XAMPP/xamppfiles/htdocs/Google-Solution-Challenge-2023/hope/application/models/input.txt","exit###");
        $new_output = $prev_output;
        sleep(2);
        // $new_output = fread($optfile,filesize("/Applications/XAMPP/xamppfiles/htdocs/Google-Solution-Challenge-2023/hope/application/models/output.txt"));
        $new_output = file_get_contents("/Applications/XAMPP/xamppfiles/htdocs/Google-Solution-Challenge-2023/hope/application/models/output.txt");
        $cur_time = time();
        while (($prev_output == $new_output) || $new_output == "")
        {
            $new_output = file_get_contents("/Applications/XAMPP/xamppfiles/htdocs/Google-Solution-Challenge-2023/hope/application/models/output.txt");
            $elapsed_time = time()-$cur_time;
            if($elapsed_time > 10)
                break;
        }
        if($new_output == 'session ended###')
            file_put_contents("/Applications/XAMPP/xamppfiles/htdocs/Google-Solution-Challenge-2023/hope/application/models/input.txt","hi###");
        return substr($new_output,0,-3);
    }
    public function get_chat_json($filename)
    {
        $file = "./data/".$filename;
        $data = json_decode(file_get_contents($file),true);
        while(sizeof($data['chat'])>10) // passes only last 10 conversations
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