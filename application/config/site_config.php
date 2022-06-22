<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['app_name'] = APP_NAME;
$config['banners'] = 'uploads/banners/';
$config['news'] = 'uploads/news/';
$config['insurance'] = 'uploads/insurance/';
$config['plans'] = 'uploads/plans/';
$config['purchase'] = 'uploads/purchase/';
$config['business'] = 'uploads/business/';
$config['document'] = 'uploads/document/';
$config['downloads'] = 'uploads/downloads/';
$config['users'] = 'uploads/users/';
$config['mobile'] = '9512137878';
$config['email'] = 'securehubservices@gmail.com';
$config['facebook'] = 'https://www.facebook.com';
$config['twitter'] = 'https://www.twitter.com';
$config['instagram'] = 'https://www.instagram.com';
$config['linkedin'] = 'https://www.linkedin.com';
$config['youtube'] = 'https://www.youtube.com';

$config['sms'] = [
    'OTP' => [
        'sms' => 'Welcome to SecureHub. Your account verification OTP is {#var#}. Valid for next 15 minutes.',
        'templete' => '1507162321973095318'
    ]
];

/* /usr/local/bin/ea-php74 /home3/labmajol/public_html/redking.live/artisan schedule:run >/dev/null 2>&1
php -d register_argc_argv=On /home3/labmajol/public_html/redking.live/artisan schedule:run > /dev/null 2>&1 */