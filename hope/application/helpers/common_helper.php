<?php
function user_login() //fuunction to check if restaurant is logged in
{
    $ci =& get_instance();		
    if(!($ci->session->userdata('status')=='loggedin'))
    {
        redirect('login');
    }
}
?>