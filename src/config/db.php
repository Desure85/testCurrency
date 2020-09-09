<?php

$server = 'mysql';
$username = 'root';
$password = 'toor';
$db = 'test';

if (getenv("CLEARDB_DATABASE_URL")) {
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"] ?? '', 1);
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . $server . ';dbname=' . $db,
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
