<?php

$host = 'mysql';
$username = 'root';
$password = 'toor';
$db = 'test';

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
if (isset($url["host"], $url["user"], $url["pass"], $url["path"])) {
    $host = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . $host . ';dbname=' . $db,
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
