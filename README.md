# Sistema de Biblioteca

Esse sistema foi desenvolvido como trabalho da disciplina de Banco de dados II do curso de Análise e Desenvolvimento do sistema do IFPI de Pedro II. O objeto de sistema é criar o gerenciamento simples de uma biblioteca. Sendo possível gerenciar livros e usuários e fazer reserva e empréstimos de livros.

## Integrantes do grupo

- Victor Castro
- Kauan Portela
- Isaias Filho
- Danilo Brandão
- Elielson Oliveira

## Tecnologias utilizas

- PHP
- Bootstrap
- Mysql

## Como rodar o projeto

Instale o PHP 7.0 ou uma versão mais recente e o mysql 14.14, ou uma versão mais recente no seu computador.
Execute o arquivo `script.sql` com o seu mysql.
Faça uma cópia do arquivo `example_config.php` e renomeie o novo arquivo para `config.php`
Edite o conteúdo do arquivo `config.php` com as informações do seu ambiente.

```php
<?php
$_ENV["USER_DATABASE"] = "Usuário do seu banco de dados";
$_ENV["PASSWORD_DATABASE"] = "Senha do seu usuário do seu banco de dados";
$_ENV["NAME_DATABASE"] = "Nome da tabela do seu banco de dados";
$_ENV["HOST_DATABASE"] = "Endereço do seu banco de dados";
```

Abra a sua linha de comando e acesse a pasta do projeto. Em seguida inicie o servidor PHP.

`php -S localhost:8080`

Abra o seu navegador e acesse `http://localhost:8080` e o projeto devera ser executado.

Dashboard utilizada no sistema:
https://github.com/themesberg/simple-bootstrap-5-dashboard
