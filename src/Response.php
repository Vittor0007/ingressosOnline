<?php

class Response
{
    public function init(string $uri, string|false $versao): array
    {
        if ($versao === false) {
            throw new RuntimeException('A variável APP_VERSAO não foi definida.');
        }

        $caminho = parse_url($uri, PHP_URL_PATH);

        if ($caminho === '/') {
            return ['status' => 200, 'body' => 'Página inicial'];
        }

        if ($caminho === '/saude') {
            return [
                'status' => 200,
                'body' => ['status' => 'ok', 'versao' => $versao],
            ];
        }

        return ['status' => 404, 'body' => 'Página não encontrada.'];
    }
}