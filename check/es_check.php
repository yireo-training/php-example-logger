<?php

use GuzzleHttp\Client;

$config = include 'config.php';

$host = $config['es']['host'];
$port = $config['es']['port'];

if (gethostbyname($host) === $host) {
    logThis("Unable to resolve host '$host'");
}

$client = new Client();
$response = $client->request('GET', 'http://' . $host . ':' . $port);
if ($response->getStatusCode() !== 200) {
    logThis("HTTP status is not 200: ".$response->getReasonPhrase());
}

$result = $response->getBody();
$data = json_decode($result, true);
if (empty($data)) {
    logThis("Failed to decode JSON");
}

if (!isset($data['version']['number'])) {
    logThis("Failed to see a version");
}

echo "Connected to ES: " . $data['version']['number'];

// @todo: Create an appllication that is making use of MySQL and ElasticSearch with everything that we can imagine
