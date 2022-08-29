<?php
$config = include 'config.php';

$host = $config['es']['host'];
$port = $config['es']['port'];

if (gethostbyname($host) === $host) {
    logThis("Unable to resolve host '$host'");
}

$headers = ['Content-Type: application/json'];
$curl = curl_init('http://' . $host . ':' . $port);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);

if (empty($result)) {
    logThis("Not connected to ES: ".curl_error($curl));
}

$data = json_decode($result, true);
if (empty($data)) {
    logThis("Failed to decode JSON");
}

if (!isset($data['version']['number'])) {
    logThis("Failed to see a version");
}

echo "Connected to ES: " . $data['version']['number'];
curl_close($curl);

// @todo: Create an appllication that is making use of MySQL and ElasticSearch with everything that we can imagine
