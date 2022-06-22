<?php

$curl_handle = curl_init();
curl_setopt($curl_handle,CURLOPT_URL, "https://www.securehubservices.com/home/send-notifications");
curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER, 0);
$result = curl_exec($curl_handle);
curl_close($curl_handle);