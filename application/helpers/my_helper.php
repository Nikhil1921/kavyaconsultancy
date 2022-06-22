<?php defined('BASEPATH') OR exit('No direct script access allowed');

function my_crypt($string, $action = 'e' )
{
    $secret_key = md5(APP_NAME).'_key';
    $secret_iv = md5(APP_NAME).'_iv';

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }

    return $output;
}

function re($array='')
{
    $CI =& get_instance();
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    exit;
}

function flashMsg($success,$succmsg,$failmsg,$redirect)
{
    $CI =& get_instance();
    if ( $success ){
        $CI->session->set_flashdata('success',$succmsg);
    }else{
        $CI->session->set_flashdata('error', $failmsg);
    }
    return redirect($redirect);
}

function e_id($id)
{
    return 41254 * $id;
}

function d_id($id)
{
    return $id / 41254;
}

function admin($uri='')
{
    return 'adminPanel/'.$uri;
}

if ( ! function_exists('convert_webp'))
{
    function convert_webp($path, $image, $name) {
        imagepalettetotruecolor($image);
        imagealphablending($image, true);
        imagesavealpha($image, true);
        imagewebp($image, "$path$name.webp", 100);
        imagedestroy($image);
    }
}

if ( ! function_exists('check_ajax'))
{
    function check_ajax()
    {
        $CI =& get_instance();
        if (!$CI->input->is_ajax_request())
            die;
    }
}

if ( ! function_exists('check_access'))
{
    function check_access($name, $operation)
    {
        $CI =& get_instance();
        
        if ($CI->user->role === 'Admin')
            return true;
        else
            return $CI->main->check('permissions', ['nav' => $name, 'role' => $CI->user->role, 'operation' => $operation], 'operation') ? true : redirect(admin('forbidden'));
    }
}

if ( ! function_exists('verify_access'))
{
    function verify_access($name, $operation)
    {
        $CI =& get_instance();
        if ($CI->user->role === 'Admin')
            return true;
        else
            return $CI->main->check('permissions', ['nav' => $name, 'role' => $CI->user->role, 'operation' => $operation], 'operation');
    }
}

if ( ! function_exists('send_sms'))
{
    function send_sms($contact, $sms, $template)
    {
        if($_SERVER['HTTP_HOST'] != 'localhost'){
            $from = 'SCURHB';
            $key = '4623BFB34ECE4E';
    
            $url = "key=".$key."&campaign=13149&routeid=7&type=text&contacts=".$contact."&senderid=".$from."&msg=".urlencode($sms)."&template_id=".$template;
    
            $base_URL = 'http://densetek.tk/app/smsapi/index?'.$url;
    
            $curl_handle = curl_init();
            curl_setopt($curl_handle,CURLOPT_URL,$base_URL);
            curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
            curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
            $result = curl_exec($curl_handle);
            curl_close($curl_handle);
            return $result;
        }
    }
}

if ( ! function_exists('send_notification'))
{
    function send_notification($title, $body, $token)
	{
        $url = "https://fcm.googleapis.com/fcm/send";

        $serverKey = 'AAAACkvWavY:APA91bFUJFQHoheRzofZEuEbeBVYsqKv31_75LYxAkJXjxZ0LeUQbjqHUdCnoBzuBsUroyyWabJn2KQlpYDg7EqwyhDZvHc-NO5-lWH3gDIarNJ0_MjZVODAga7ILrz1GYMSNSdTpfA5';
        
        $notification = array('title' => $title, 'body' => $body, 'sound' => 'default', 'badge' => '1');
        $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority'=>'high');
        $json = json_encode($arrayToSend);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key='.$serverKey;
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_exec($ch);
        curl_close($ch);
        
        return;
	}
}