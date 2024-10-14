<?php

function googleTranslate($text, $targetLang = 'en', $sourceLang = 'auto') {
    // URL encode the text to be translated
    $text = urlencode($text);

    // Build the Google Translate URL
    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl={$sourceLang}&tl={$targetLang}&dt=t&q={$text}";

    // Get the translation response (Google will return a JSON array)
    $response = file_get_contents($url);

    // Parse the JSON response
    $responseArray = json_decode($response, true);

    // Extract and return the translated text
    return $responseArray[0][0][0];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the JSON payload
    $data = json_decode(file_get_contents('php://input'), true);
    // var_dump($data);
    echo googleTranslate($data['text'],$data['lang']);
}