# API Ranking Tecnofit

### Tópicos 

:small_blue_diamond: [Descrição do projeto](#descrição-do-projeto)

:small_blue_diamond: [Funcionalidades](#funcionalidades)

:small_blue_diamond: [Endpoints](#endpoints)

:small_blue_diamond: [Pré-requisitos](#pré-requisitos)

:small_blue_diamond: [Como rodar a aplicação](#configuração)

:small_blue_diamond: [Testes](#testes)

:small_blue_diamond: [Outros](#outros)

## Descrição do projeto

<p align="justify">
  Este projeto é uma aplicação para demonstrar o Ranking ou pontuação de certos usuários de acordo com o movimento especificado na consulta utilizando uma API em REST no PHP e Bootstrap para o front. 
</p>

## Funcionalidades
- Login de usuário;
- Logout de usuário;
- Cadastro de um novo usuário;
- Listagem de ranking;

## Pré-requisitos
:warning: [PHP 8.1](https://windows.php.net/download#php-8.1)
:warning: [MySQL](https://www.mysql.com/downloads/)

## Configuração

1. No terminal, clone o repositório: 
  ```
  git clone https://github.com/gabrifilla/teste_Tecnofit.git
  ```
2. Navegue até a pasta do repositório clonado
  ```
  cd teste_Tecnofit
  ```
3. Rode o comando de inicialização
  ```
  docker compose up -d --build
  ```
4. Acesse a aplicação em `http://localhost`

Ao fazer a inicialização do projeto, conta padrão de acesso será:

username: admin
senha: admin

e

username: user
senha: user

*Necessário fazer login para entrar na dashboard, onde o Ranking(pontuação) fica.* *

## Endpoints

### `GET e POST /login`
Envia e recebe as informações do usuário e carrega a página de dashboard caso sucesso.

### `/logout`
Desconecta o usuário, fazendo retornar para a página de login.

### `GET e POST /register`
Recebe as informações de cadastro de usuário e faz o cadastro.

### `/dashboard`
Página inicial com as informações de média do periodo selecionado e o gráfico de apresentação.

### `GET /ranking`
Busca as informações no banco de acordo com o movimento especificado.

**Payload exemplo:**
```json
{

}
```

## Testes

## Outros
