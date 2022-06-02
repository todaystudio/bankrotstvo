<?php

// Токен телеграм бота
$tg_bot_token = "5224867240:AAGAg-wK1IznB4zcJxTGRHKeHo3gLofiQkU";
// ID Чата
$chat_id = "-621201231";

$text = '';

foreach ($_POST as $key => $val) {
    $text .= $key . ": " . $val . "\n";
}

$param = [
    "chat_id" => $chat_id,
    "text" => $text
];

$url = "https://api.telegram.org/bot" . $tg_bot_token . "/sendMessage?" . http_build_query($param);
file_get_contents($url);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, ["chat_id" => $chat_id, "document" => $document]);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$out = curl_exec($ch);

curl_close($ch);

unlink($file['name']);

die('1');

  
?>
