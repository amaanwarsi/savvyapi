<?php
header('Content-Type: text/json; charset=UTF-8');

function curl_get_contents($url){
$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);

$data = curl_exec($ch);
curl_close($ch);

return $data;
}

$url = $_GET["country"]?"https://newsapi.org/v2/top-headlines?country=".$_GET["country"]."&category=".$_GET["category"]."&apiKey=".$_GET["api"]:"https://newsapi.org/v2/top-headlines?category=".$_GET["category"]."&apiKey=".$_GET["api"];

$json = json_decode(curl_get_contents($url), true);

$rows = $json["articles"];

echo json_encode($rows);
?>
