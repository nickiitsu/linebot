<?php
$access_token = 'v/baFtGSSqmZMSCp3QMaBvISXj5G0wegrPyDLUyF9WNHCPrCWDNKlQfVXD4uJUWH1fNhX+QcDgg8fyTb7JM6lEKHWIbBrPQRKEOC5izS5sdAVVffJWWSFVlkYOAZNFiCEV25DrPHJYuoI6GxUQxhJwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			if($text=='ดี' || $text=='สวัสดี'  || $text=='หวัดดี'  || $text=='ดีงับ'  || $text=='ดีจ้า'){
				$text =  'ดีก้าบ';
			}else{
				$text = 'ไม่ตอบหรอก อิอิ ฝากเพจด้วยจิ:https://www.facebook.com/Thara.Betta.TH/';
			}
			$messages = [
				'type' => 'text',
				'text' => $text
				
			];
			

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
