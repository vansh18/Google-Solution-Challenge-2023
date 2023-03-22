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
}   

?>