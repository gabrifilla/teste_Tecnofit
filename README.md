# API Ranking Tecnofit

## Sumário

- [Descrição do Projeto](#descrição-do-projeto)
- [Funcionalidades](#funcionalidades)
- [Pré-requisitos](#pré-requisitos)
- [Instalação e Inicialização](#instalação-e-inicialização)
- [Documentação da API](#documentação-da-api)
  - [Autenticação](#autenticação)
  - [Cadastro e Redefinição de Senha](#cadastro-e-redefinição-de-senha)
  - [Ranking](#ranking)
- [Uso da Aplicação Web](#uso-da-aplicação-web)
- [Testes](#testes)
- [Outros](#outros)

---

## Descrição do Projeto

Este projeto é uma aplicação desenvolvida em PHP com Laravel que demonstra o gerenciamento de ranking (pontuação) de usuários. A aplicação conta com:

- Uma API REST para autenticação (login/logout), cadastro e recuperação de senha utilizando **Sanctum**.
- Uma interface web para acesso às funcionalidades de login, cadastro e visualização do ranking, utilizando sessões.

O objetivo é permitir que a aplicação seja facilmente configurada e executada em qualquer ambiente para testes e verificações.

---

## Funcionalidades

- **Login/Logout:** Fluxos separados para API (token) e Web (sessão).
- **Cadastro de Usuário:** Registro de novos usuários.
- **Redefinição de Senha:** Permite a recuperação da senha do usuário.
- **Ranking:** Exibição dos rankings conforme o movimento especificado.
- **Dashboard:** Visualização da pontuação (na interface web).

---

## Pré-requisitos

- [PHP 8.1](https://windows.php.net/download#php-8.1)
- [MySQL](https://www.mysql.com/downloads/)
- [Docker](https://docs.docker.com/get-docker/)
- [Composer](https://getcomposer.org/)

---

## Instalação e Inicialização

### Utilizando Docker

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/gabrifilla/teste_Tecnofit.git
   ```
2. **Navegue até a pasta do projeto:**
  ```bash
  cd teste_Tecnofit
  ```
3. **Inicialize o projeto com Docker:**
  ```bash
  docker compose up -d --build
  ```
  Após a inicialização, a aplicação ficará disponível em http://localhost.
4. **Entre no container docker:**
  ```bash
  docker ps 
  docker exec -it {laravel-app} bash
  ```
5. **Execute as migrações:**
  Execute as migrations caso o banco ainda não tenha sido criado;
  ```bash
  php artisan migrate
  ```
5. **Execute as seeds:**
  Execute as seeds caso o banco ainda não tenha sido populado;
  ```bash
  php artisan db:seed
  ```

## Documentação da API
Todos os endpoints da API possuem o prefixo /api.

#### Autenticação

```http
  POST /api/login
```
Realiza o login via API e retorna um token de autenticação.
Request Payload:
| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `email` | `string` | **Obrigatório**. email de login |
| `password` | `string` | **Obrigatório**. sua senha de login |

Resposta (sucesso):
  ```json
  {
    "message": "Login sucedido",
    "token": "seu_token_aqui"
  }
  ```

```http
  POST /api/logout
```
Efetua o logout revogando os tokens do usuário autenticado.
Header:
| Parâmetro   | Valor       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {seu_token}` | **Obrigatório**. Token adquirido ao realizar login. |

Resposta:
```json
{
  "message": "Logout sucedido"
}
```

#### Cadastro e Redefinição de Senha
```http
  POST /api/register
```
Registra um novo usuário via API.
Header:
| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `name` | `string` | **Obrigatório**. Nome do usuário |
| `email` | `string` | **Obrigatório**. Email do usuário |
| `password` | `string` | **Obrigatório**. Senha do usuário |
| `password_confirmation` | `string` | **Obrigatório**. Confirmação da senha do usuário |

Request Payload:
```json
{
  "name": "Seu Nome",
  "email": "seuemail@exemplo.com",
  "password": "sua_senha",
  "password_confirmation": "sua_senha"
}
```

```http
  POST /api/reset-password
```
Redefine a senha do usuário.
Header:
| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `email` | `string` | **Obrigatório**. Email do usuário |
| `password` | `string` | **Obrigatório**. Senha do usuário |
| `password_confirmation` | `string` | **Obrigatório**. Senha do usuário |

Request Payload:
```json
{
  "email": "seuemail@exemplo.com",
  "password": "nova_senha",
  "password_confirmation": "nova_senha"
}
```

#### Ranking
```http
  GET /api/ranking/{movementId}
```
Retorna os dados do ranking para o movimento especificado.

Header:
| Parâmetro   | Valor       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {seu_token}` | **Obrigatório**. Token adquirido ao realizar login |

Parâmetros:
movementId – Identificador do movimento (ex.: 1, 2, etc.)

Resposta (exemplo):
```json
{
  "ranking": [
    {
      "id": 1,
      "name": "Usuário 1",
      "score": 150
    },
    {
      "id": 2,
      "name": "Usuário 2",
      "score": 120
    }
  ]
}
```

## Uso da Aplicação Web
A aplicação web utiliza rotas que não possuem o prefixo /api e funcionam com sessões:

```http
  GET /login
```
Exibe a página de login.

```http
  POST /login
```
Processa os dados de login e redireciona para a dashboard em caso de sucesso.

```http
  GET /register
```
Exibe a página de cadastro.

```http
  POST /register
```
Processa o cadastro de um novo usuário.

```http
  GET /records
```
Página inicial que exibe as informações do ranking (acesso restrito; exige login).

```http
  GET /logout
```
Efetua o logout, invalidando a sessão e redirecionando para a página de login.

## Testes
### API:
Utilize ferramentas como o Postman para testar os endpoints da API conforme descrito na Documentação da API.

### Web:
Acesse as rotas via navegador e verifique se as funcionalidades de login, cadastro e visualização do ranking estão funcionando corretamente.

## Outros
Configurações Adicionais:
Consulte o arquivo .env.example para verificar todas as variáveis de ambiente necessárias.

#### Caso queira, existe um arquivo chamado Teste.postman_collection.json com as rotas de login, logout e de consulta
