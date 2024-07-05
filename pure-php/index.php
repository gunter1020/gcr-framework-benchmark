<?php
header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'status' => 'pong',
    'server' => [
        'time' => (new DateTimeImmutable())->format('Y-m-d H:i:s'),
    ],
    'user' => [
        'ip' => $_SERVER['REMOTE_ADDR'],
        'agent' => $_SERVER['HTTP_USER_AGENT'],
    ],
]);