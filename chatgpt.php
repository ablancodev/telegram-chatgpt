<?php
/**
 * Función para llamar a ChatGPT
 * Version: 0.1
 * Author: ablancodev
 */
function call_chatgpt( $text, $nombre = '' ) {
    $valor = '';

    
    // ChatGPT
    // le pasamos el log del alumno a chatgpt para que lo analize

    $url = 'https://api.openai.com/v1/chat/completions';

    // Pedimos sentimiento
    $curl = curl_init();
    $fields = array(
        'model' => 'gpt-3.5-turbo',
        "messages" => array(
            array("role" => "system", "content" => 'Eres Papa Noel, amable y simpático. ' . $nombre . ' te dice: ' . $text . ' ¿Qué le contestas?'
            )
        ),
        'max_tokens' => 250,
        'temperature' => 0.3
    );
    $json_string = json_encode($fields);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, TRUE);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json_string);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: Bearer sk-XXXXXXXXXXXXXXXX'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
    $data = curl_exec($curl);
    curl_close($curl);

    // guardamos en en fichero log.txt el contenido de la variable $data
    file_put_contents("log.txt", print_r($data, true));

    $data = json_decode($data, true);
    $valor = $data['choices'][0]['message']['content'];

    return $valor;
}