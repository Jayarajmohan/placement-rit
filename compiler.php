<?php
// Get the code and language from the POST request
$code = $_POST["code"];
$language = $_POST["language"];

// Define the API endpoint for different languages
$api_endpoints = [
    "c" => "https://api.codex.jaagrav.in",
    "cpp" => "https://api.codex.jaagrav.in",
    "java" => "https://api.codex.jaagrav.in",
    "python" => "https://api.codex.jaagrav.in",
];

// Check if the selected language is supported
if (!array_key_exists($language, $api_endpoints)) {
    echo "Selected language is not supported.";
    exit;
}

// Send a POST request to the respective API endpoint
$api_url = $api_endpoints[$language];
$data = ["code" => $code];
$options = [
    "http" => [
        "method" => "POST",
        "header" => "Content-type: application/x-www-form-urlencoded",
        "content" => http_build_query($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($api_url, false, $context);

if ($result === false) {
    echo "Error in compilation.";
} else {
    echo $result;
}
?>
