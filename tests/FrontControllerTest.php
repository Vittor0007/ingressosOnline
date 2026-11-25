<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/responder.php';

class FrontControllerTest extends TestCase

{
    public function testPaginaInicialStatus200(): void
    {
    $resultado = responder('/', 'teste');
    $this->assertSame(200, $resultado['status']);
    }

    public function testDesconhecidoStatus404(): void
    {

    $resultado = responder('/caminhoNaoExiste', 'teste');
    $this->assertSame(404, $resultado['status']);
    }

    public function testSaudeStatus200(): void
    {
        $resultado = responder('/saude', 'teste');
        $this->assertSame(200, $resultado['status']);
        $this->assertSame(['status' => 'ok', 'versao' => 'teste'],
            json_decode($resultado['corpo'], true)
        );
    }
}
