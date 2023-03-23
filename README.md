Como rodar o projeto:

1. Clonar o repositório

2. Instalar as dependências do composer
    > composer install

3. Copiar o arquivo .env.example para .env
    > cp .env.example .env

4. Criar um banco de dados MySQL e configurar o arquivo .env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco
   DB_USERNAME=root
   DB_PASSWORD=

5. Instalar as dependências do npm
    > npm install

6. Rodar os comandos do Laravel
    > php artisan key:generate
    > php artisan storage:link
    > php artisan migrate

7. Rodar o projeto (cada comando em uma aba do terminal)
    > npm run dev
    > php artisan serve 

8. Acessar o projeto: http://localhost:8000, login: test@example.com, senha: password
