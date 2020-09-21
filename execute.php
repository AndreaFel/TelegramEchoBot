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

if(isset($message['text'])){
	if(substr($message['text'], 0, 6 )=="/posta"){
		$text = substr($message['text'], 6, strlen($message['text'])-6);
	}else{
		$text = "mmh ok";
	}
}

//FINE CODICE, INVIO MESSAGGIO

$text = trim($text);
$text = strtolower($text);

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
