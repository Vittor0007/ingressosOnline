
 Não consegui acessar a rota `/saude`

Tentei acessar `http://localhost:8081/saude?origem=teste` usando `curl -i`, mas o terminal mostrou `curl: (7) Failed to connect`. Eu tinha acabado de rodar os testes do PHPUnit e todos tinham passado. Minha dúvida foi: se os testes passaram, por que eu não conseguia acessar a rota?

Consegui achar quando rodei `docker compose ps -a` para conferir os dois serviços. O `php` aparecia como `Up`, mas o `nginx` estava como `Exited (0)`. Aí entendi por que os testes tinham passado: o PHPUnit chamou a função `responder()` diretamente dentro do contêiner PHP. Já o pedido que fiz com o `curl` precisava passar pelo Nginx, porque é ele que recebe as conexões na porta `8081`.

O que aprendi:

Agora entendo a diferença entre testar a função e acessar a aplicação pela rede. Se o `curl` mostrar `Failed to connect` de novo, minha primeira verificação será olhar o estado dos contêineres e a porta publicada. Neste caso, bastou iniciar o Nginx para a rota voltar a responder.