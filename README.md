# Sistema de Autenticação e CRUD - Laravel

Este projeto é a migração do Projeto 1 (Node.js/Express) para a stack **Laravel + Tailwind CSS + MySQL**, conforme solicitado na trilha de estágio.

## Tecnologias Utilizadas

*   **Backend:** PHP 8.5 / Laravel 12
*   **Frontend:** Blade, Tailwind CSS, Boxicons
*   **Banco de Dados:** MySQL (MariaDB)
*   **Bundler:** Vite

## Funcionalidades

- Cadastro de usuários com validação de CPF (Front-end e Back-end).
- Criptografia de senhas nativa do Laravel (Bcrypt).
- Autenticação de usuários (Login/Logout) com sessões seguras.
- Proteção de rotas com Middleware `auth`.
- Dashboard com listagem de usuários (Read).
- Exclusão de usuários (Delete).
- Layout responsivo e estilizado com Tailwind CSS.

## Como rodar o projeto localmente

### Pré-requisitos
Você vai precisar ter instalado na sua máquina:
*   PHP (>= 8.2)
*   Composer
*   Node.js & NPM
*   MySQL ou MariaDB

### Passo a passo

1. **Clone o repositório:**
   bash:
   git clone https://github.com/SEU_USUARIO/NOME_DO_REPO.git
   cd NOME_DO_REPO

2. **Instale as dependências do PHP e do Node:**
    bash:
    composer install
    npm install

3. **Configure o ambiente:**
    Renomeie o arquivo .env.example para .env:
    
    bash:
    cp .env.example .env
    
    Gere a chave da aplicação:

    bash:
    php artisan key:generate

4. **Configure o banco de dados:**
    No arquivo .env altere as credenciais para o banco local:

    env:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_db
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha

    Crie o banco no MySQL e rode as migrações:

    bash:
    php artisan migrate

5. **Rode as aplicações:**
    Abra dois terminais. Em um, rode o servidor PHP:

    bash:
    php artisan serve

    No outro, rode o Vite para compilar o Tailwind:

    bash:
    npm run dev

6. **Acesse http://127.0.0.1:8000**


Desenvolvido por Matheus durante o estágio em Desenvolvimento na PMM.