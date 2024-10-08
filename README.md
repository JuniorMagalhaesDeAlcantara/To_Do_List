# To-Do List Application

Este é um projeto de aplicação de gerenciamento de tarefas (To-Do List) desenvolvido em Laravel 11. A aplicação permite que os usuários criem, visualizem, atualizem e excluam tarefas.

## Tecnologias Utilizadas

- **Laravel 11**: Framework PHP para desenvolvimento de aplicações web.
- **MySQL/PostgreSQL**: Banco de dados (conforme configuração).

## Instalação

### Clonar o Repositório
    
    ```bash
    git clone https://github.com/seu-usuario/to-do-list.git
    cd to-do-list

### Instalar Dependências
    
    ```bash composer install

## Configurar o Ambiente

1. **Copie o arquivo .env.example para um novo arquivo .env.**

   ```bash
   cp .env.example .env

2. **Gere a chave de aplicação Laravel.**

    ```bash
    php artisan key:generate

3. **Configure o banco de dados e outras variáveis de ambiente no arquivo .env.**

## Executar Migrações**

**Se você estiver usando um banco de dados, execute as migrações para criar as tabelas necessárias:**
    ```bash
    php artisan migrate

## Executar o Servidor

**Para executar o servidor de desenvolvimento Laravel, use:**
    ```bash
     php artisan serve.

**Você pode acessar a aplicação em http://localhost:8000.**

**Contribuindo**

- Contribuições são bem-vindas! Sinta-se à vontade para enviar pull requests ou reportar problemas.


**Autor**

Desenvolvido por Junior Magalhães de Alcântara.

**Licença**

Este projeto está licenciado sob a MIT License.



