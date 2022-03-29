<?php

/* create telegram bot webhook */

$data = file_get_contents('https://www.digiassetindo.com/api/v2/exchange/coinmarketcap/summary');
$json = json_decode($data, true);
$TOKEN = "5214120025:AAG1NVOak-IjFkxlq6C51TtKN5tLtcxwWfg";
$apiURL = "https://api.telegram.org/bot$TOKEN";
$update = json_decode(file_get_contents("php://input"), TRUE);
$chatID = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$token = $message;

for ($a = 0; $a < count($json); $a++) {
  print "<tr>";
  // penomeran otomatis
  //print $a . " ";
  // menayangkan 
  // print $json[$a]["trading_pairs"] . "</br>";
  if ($json[$a]["trading_pairs"] === $token) {
    $harga = $json[$a]["last_price"] . " " . $json[$a]["quote_currency"];
    file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=Harga " . $message . " di Digiasset saat ini adalah " . $harga);
  }
}

//if (strpos($message, "/BTCIDR") === 0) {
//  $hargacoin = file_get_contents('https://www.digiassetindo.com/api/v2/exchange/coinmarketcap/summary');
//  $json = json_decode($hargacoin, TRUE);
//  $keterangan = $json[0]["trading_pairs"];
//  $price = $json[0]["last_price"];
//  file_get_contents($apiURL . "/sendmessage?chat_id=" . $chatID . "&text=Harga " . $keterangan . " di Digiasset saat ini adalah " . $price);
//}
