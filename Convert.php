<?php
$Live = $_GET['ID'];
$ch = curl_init('https://api.mp3youtube.cc/v2/sanity/key');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_ENCODING, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.mp3youtube.cc',
'Connection: keep-alive',
'User-Agent: okhttp/4.10.0',
'Content-Type: application/json',
'Accept: */*',
'Origin: https://x2download.is',
'Referer: https://x2download.is/',
'Accept-Encoding: gzip, deflate',
'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7',
));
$site = curl_exec($ch);
curl_close ($ch);
preg_match('#"key":"(.*?)"#',$site,$icerik);
$Token = $icerik[1];

$ch1 = curl_init('https://api.mp3youtube.cc/v2/converter');
curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_ENCODING, false);
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, "link=https://www.youtube.com/watch?v=$Live&format=mp4&audioBitrate=128&videoQuality=1080&vCodec=h264");
curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
'Host: api.mp3youtube.cc',
'Connection: keep-alive',
"key: $Token",
'User-Agent: okhttp/4.10.0',
'Accept: */*',
'Content-Type: application/x-www-form-urlencoded',
'Origin: https://x2download.is',
'Referer: https://x2download.is/',
'Accept-Encoding: gzip, deflate',
'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7',
));
$site1 = curl_exec($ch1);
curl_close ($ch1);
preg_match('#"url":"(.*?)"#',$site1,$icerik);
$Link = $icerik[1];
header ("Location: $Link");
?>