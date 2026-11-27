<?php

header('Content-Type: application/json; charset=utf-8');

try {
    require_once __DIR__ . '/../src/Response.php';

    $resposta = new Response();
    $resultado = $resposta->init($_SERVER['REQUEST_URI'], getenv('APP_VERSAO'));

    http_response_code($resultado['status']);
    echo json_encode($resultado['body'], JSON_PRETTY_PRINT);
} catch (\Throwable $erro) {
    error_log((string) $erro);
    http_response_code(500);

    echo json_encode([
        'status' => 'error',
        'message' => 'Erro interno do servidor.',
    ], JSON_PRETTY_PRINT);
}