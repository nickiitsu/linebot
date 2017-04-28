<?php
$access_token = 'v/baFtGSSqmZMSCp3QMaBvISXj5G0wegrPyDLUyF9WNHCPrCWDNKlQfVXD4uJUWH1fNhX+QcDgg8fyTb7JM6lEKHWIbBrPQRKEOC5izS5sdAVVffJWWSFVlkYOAZNFiCEV25DrPHJYuoI6GxUQxhJwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
