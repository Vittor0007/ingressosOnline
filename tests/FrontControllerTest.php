<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Response.php';

final class FrontControllerTest extends TestCase
{
    public function testPaginaInicialStatus200(): void
    {
        $resposta = new Response();
        $resultado = $resposta->init('/', 'teste');

        $this->assertSame(200, $resultado['status']);
    }

    public function testDesconhecidoStatus404(): void
    {
        $resposta = new Response();
        $resultado = $resposta->init('/caminhoNaoExiste', 'teste');

        $this->assertSame(404, $resultado['status']);
    }

    public function testSaudeStatus200(): void
    {
        $resposta = new Response();
        $resultado = $resposta->init('/saude?origem=teste', 'teste');

        $this->assertSame(200, $resultado['status']);

        $this->assertSame(
            ['status' => 'ok', 'versao' => 'teste'],
            $resultado['body']
        );
    }
}