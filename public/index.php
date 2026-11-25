<?php

require_once __DIR__ . '/../src/responder.php';

try {
    $caminho = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $versao = getenv('APP_VERSAO');

    if (!is_string($caminho) || $versao === false) {
        throw new RuntimeException('Não achei o caminho correto');
    }

    $resposta = responder($caminho, $versao);

    http_response_code($resposta['status']);

    if ($caminho === '/saude') {
        header('Content-Type: application/json; charset=utf-8');
    } else {
        header('Content-Type: text/html; charset=utf-8');
    }

    echo $resposta['corpo'];
} catch (Throwable $erro) {
    error_log((string) $erro);

    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Erro interno do servidor.';
}