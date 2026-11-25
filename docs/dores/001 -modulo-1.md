Uma linha quebrada no composer.json travou a instalação

Quando fui instalar o PHPUnit, o Composer avisou que não conseguiu atualizar as dependências. Pela primeira mensagem, eu não sabia o que precisava corrigir. Só quando rodei `composer update` apareceu uma pista mais clara: havia um erro na primeira linha do `composer.json`.

Ao conferir o arquivo, vi que o campo `name` estava quebrado. o que me ajudou foi saber qual arquivo abrir e qual trecho conferir. Depois da correção, rodei `composer validate` e apareceu `./composer.json is valid`. Ainda havia um aviso sobre a licença, mas ele não impediu a instalação.

O que me deu trabalho foi descobrir por onde começar. O problema apareceu quando eu tentava instalar um pacote, mas a causa estava no formato do arquivo. Aprendi a usar o `composer validate` depois de editar o `composer.json`. Assim consigo conferir se o Composer entende o arquivo antes de tentar instalar as dependências.