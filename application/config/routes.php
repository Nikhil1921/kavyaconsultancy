<?php defined('BASEPATH') OR exit('No direct script access allowed');
$admin = 'adminPanel';

$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_404';
$route['translate_uri_dashes'] = TRUE;

$rs = [
    ['from' => 'become-partner', 'to' => 'home/become_partner',],
    ['from' => 'contact-us', 'to' => 'home/contact', 'type' => 'get'],
    ['from' => 'contact-us', 'to' => 'home/contact_post', 'type' => 'post'],
    ['from' => 'about-us', 'to' => 'home/about_us', 'type' => 'get'],
    ['from' => 'mission-vision', 'to' => 'home/mission_vision', 'type' => 'get'],
    ['from' => 'gallery', 'to' => 'home/gallery', 'type' => 'get'],
    ['from' => 'achievements', 'to' => 'home/achievements', 'type' => 'get'],
    ['from' => 'news-blog', 'to' => 'home/news_blog', 'type' => 'get'],
    ['from' => 'news-blog/(:any)', 'to' => 'home/news/$1', 'type' => 'get'],
    ['from' => 'motor/(:any)', 'to' => 'home/motor/$1', 'type' => 'get'],
    ['from' => 'motor/(:any)', 'to' => 'home/motor_post/$1', 'type' => 'post'],
    ['from' => 'life/(:any)', 'to' => 'home/life/$1', 'type' => 'get'],
    ['from' => 'life/(:any)', 'to' => 'home/life_post/$1', 'type' => 'post'],
    ['from' => 'other(/:any)?', 'to' => 'home/other$1', 'type' => 'get'],
    ['from' => 'other/(:any)', 'to' => 'home/other_post/$1', 'type' => 'post'],
    ['from' => 'health/(:any)', 'to' => 'home/health/$1', 'type' => 'get'],
    ['from' => 'health/(:any)', 'to' => 'home/health_post/$1', 'type' => 'post'],
    ['from' => 'career', 'to' => 'home/career', 'type' => 'get'],
    ['from' => 'career', 'to' => 'home/career_post', 'type' => 'post'],
    ['from' => 'privacy-policy', 'to' => 'home/privacy'],
    ['from' => 'terms-of-use', 'to' => 'home/terms'],
    ['from' => 'refund-policy', 'to' => 'home/refund'],
    ['from' => 'downloads/(:any)', 'to' => 'home/downloads/$1', 'type' => 'get'],
];

foreach ($rs as $r => $f) 
    if(isset($f['type']))
        $route[$f['from']][$f['type']] = $f['to'];
    else
        $route[$f['from']] = $f['to'];

$route["$admin/forgot-password"] = "$admin/login/forgot_password";
$route["$admin/check-otp"] = "$admin/login/check_otp";
$route["$admin/change-password"] = "$admin/login/change_password";