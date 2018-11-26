<?php
header('Content-type: text/html;charset=utf-8');
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";

//inserire in $text la risposta
//Smessage['text'] contiene il messaggio dell'utente
//CODICE:

$messaggio = “L”.urldecode(“%E2%80%99″).”invincibile Hulk”.urldecode(“%E2%80%A6”);

$messaggio = urlencode ($messaggio);

$url = "https://api.telegram.org/bot721091766:AAGx0egXiQu1ja-huaWdVoD_cpmPDHnZSOU/sendMessage?chat_id=".$chatId."&parse_mode=HTML&text=".$messaggio;
header($url);

//FINE CODICE, INVIO MESSAGGIO

$text = trim($text);
$text = strtolower($text);

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
