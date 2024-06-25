<?php
// Your client ID and secret key
$client_id = '53644';
$secret_key = 'iLh6cq5uuWVK';

// Encode the client ID and secret key in base64
$base64_credentials = base64_encode("$client_id:$secret_key");

// The URL to make the request to
$url = 'https://ipay.ge/opay/api/v1/oauth2/token';

// The headers for the request
$headers = [
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic ' . $base64_credentials
];

// The data to be sent in the request body
$data = http_build_query([
    'grant_type' => 'client_credentials'
]);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request and get the response
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    // Print the response
    echo $response;
}

// Close the cURL session
curl_close($ch);
?>
