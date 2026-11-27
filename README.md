# Ingressos Online

Projeto de venda de ingressos que estou desenvolvendo no Comitê de Arquitetura da Ipe Web. Neste módulo, usei PHP sem framework para entender como uma requisição passa pelo Nginx e chega à aplicação.

## Requisitos

Git e Docker com Docker Compose. O PHP, o Composer e o PHPUnit rodam no contêiner.

## Como subir

```bash
docker compose up -d --build
```

Abra http://localhost:8081 no navegador.

## Rotas

- `/` — página inicial.
- `/saude` — retorna o status e a versão da aplicação.
- Caminhos desconhecidos retornam `404`.

Para conferir se a aplicação está rodando:

```bash
curl -i http://localhost:8081/saude
```

A resposta esperada é `200 OK` com `{"status":"ok","versao":"dev"}`.