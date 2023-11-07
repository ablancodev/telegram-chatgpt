<?php
/**
 * Script para recibir mensajes de Telegram y responder con una respuesta de ChatGPT
 * Version: 0.1
 * Author: ablancodev
 */

require_once 'chatgpt.php';

// Sustituye el valor por tu token real
define('BOT_TOKEN', '5817262589:AAF0fleEXXXXXXXXXXXX');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

// Lee el cuerpo de la solicitud
$content = file_get_contents("php://input");
// Decodifica el JSON
$update = json_decode($content, true);

// Comprueba si es un mensaje de texto
if(isset($update["message"])) {
    $message = $update["message"];
    
    if(isset($message["text"])) {
        $chatId = $message["chat"]["id"];
        $text = $message["text"];

        // llamamos a nuestra función call_chatgpt() para obtener la respuesta
        $response = call_chatgpt($text, $message["from"]["first_name"]);


        // Aquí procesarías el mensaje y construirías una respuesta
        //$response = "Eco: " . $text;

        // Envía la respuesta al chat
        file_get_contents(API_URL."sendMessage?chat_id=".$chatId."&text=".urlencode($response));
    }
}

// guardamos en en fichero log.txt el contenido de la variable $update
file_put_contents("log.txt", print_r($update, true));


// Para asegurarte de que el script se ejecutó correctamente, puedes devolver un "OK"
echo "OK";
?>
