<?php
$url = "https://www.virtualizor.com/updates.php?version=" . $_GET["version"] . "&tree=" . $_GET["tree"] . "&patch=" . $_GET["patch"]
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'Softaculous');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$file = curl_exec($ch);
curl_close($ch);
echo $file;