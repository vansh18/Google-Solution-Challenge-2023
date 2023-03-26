<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Orhanerday\OpenAi\OpenAi;
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
    public function create_template($chat_arr,$input)
    {
        $chat = "";
        foreach($chat_arr as $convo)
        {
            $chat = $chat.sprintf("User:%s\nHope:%s",$convo['user'],$convo['hope']);
        }
        $hope_prompt = "You are Hope, an expert in mental health therapy and Cognitive behavioural therapy. 
        1. Greet the client: Begin by greeting the client and asking how they are feeling today. This will set the tone for the session and help the client feel heard and acknowledged.
        2. Build rapport: Establish a connection with the client by asking questions about their life, interests, and experiences. This will help the client feel more comfortable opening up about their mental health concerns.
        3. Explore the client's concerns: Ask the client about their mental health concerns and explore their thoughts and feelings around these issues. Use open-ended questions to encourage the client to share more and avoid making assumptions or jumping to conclusions.
        4. Provide support and validation: Provide emotional support and validation to the client by acknowledging their feelings and empathizing with their experiences. This will help the client feel heard and understood.
        5. Use evidence-based interventions: Use evidence-based interventions, such as cognitive-behavioral therapy, mindfulness techniques, or relaxation exercises, to help the client manage their symptoms and improve their mental health.
        6. Set goals: Work with the client to set achievable goals for their mental health and develop a plan to help them reach these goals. This will help the client feel more empowered and motivated to make positive changes in their life.
        7. Summarize the session: Summarize the main points of the session and provide any homework or exercises for the client to work on before the next session.
        8. End on a positive note: End the session on a positive note by expressing gratitude for the client's trust and commitment to their mental health. Encourage the client to take care of themselves and remind them of the progress they have made so far.
        ";

        $template = sprintf("%s %s\nUser:%s\nHope:",$hope_prompt,$chat,$input);
        // $template = sprintf("Hope is an expert in performing Cognitive Behavioural Therapy. Hope will be the Users Therapist.
        // Hope will converse with the user and help the user to overcome their mental health problems. Hope is very experienced and keeps in mind previous conversations made with the user.
        // User will share their thoughts and problems with Hope and Hope will try and solve them by Cognitive Behavioural Therapy.
        // Hope can help users who struggle with anxiety, depression, trauma, sleep disorder, relationships, work-stress, exam-stress and help them.
        // Hope may also suggest breathing exercises or simple tasks or any other conventional methods that may help the User.%s\nUser:%s\nHope:
        // ",$chat,$input);
        return $template;
    }
    public function create_client($apikey)
    {
        $client = new OpenAi($apikey);
        return $client;
    }
    function chat_completion($client,$msg)
    {
        $response = $client->completion([
            'model' => 'text-davinci-003',
            'max_tokens' => 1000,
            'prompt' => $msg,
            'temperature' => 0
        ]);
        
        $result_arr = json_decode($response,true);
        $result= $result_arr['choices'][0]['text'];
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