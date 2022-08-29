<?php
$config = include 'config.php';

$host = $config['mysql']['host'];
$user = $config['mysql']['username'];
$password = $config['mysql']['password'];
$database = $config['mysql']['database'];

if (gethostbyname($host) === $host) {
    logThis("Unable to resolve host '$host'");
}

try {
    $connection = new MySQLi($host, $user, $password, $database);
} catch(\Throwable $error) {
    logThis("Fatal error occupied: ".$error->getMessage());
}

echo "Connected to MySQL: " . $connection->get_server_info();
echo "<br/>";