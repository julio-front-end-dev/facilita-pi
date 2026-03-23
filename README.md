Este documento destaca a arquitetura de segurança implementada e as instruções de configuração.

# FACILITA! - Conectando Profissionais e Clientes

O **FACILITA!** é uma plataforma web desenvolvida para simplificar a busca e o contato com prestadores de serviços locais. O sistema oferece uma interface pública de busca rápida e um painel administrativo restrito para a gestão segura da base de dados.

## Funcionalidades

* **Busca Pública:** Localização de profissionais por categoria/profissão.
* **Integração com WhatsApp:** Botão direto que utiliza o protocolo `wa.me` para iniciar conversas com os profissionais.
* **Painel Administrativo:** Área restrita com login para gerenciamento do sistema.
* **Gestão de Cadastros:** Interface para adição e exclusão de profissionais cadastrados.
* **Máscaras Dinâmicas:** Formatação automática de campos de telefone via JavaScript.

## Tecnologias Utilizadas

* **Backend:** PHP 8.x.
* **Banco de Dados:** MySQL.
* **Segurança:** Utilização de *Prepared Statements* para mitigação de SQL Injection.
* **Frontend:** Bootstrap 5 (Responsivo) e CSS3 com backgrounds dinâmicos.
* **Scripts:** JavaScript Vanilla para manipulação de DOM e máscaras.

## Estrutura de Arquivos

* `index.php`: Interface principal com sistema de abas para Busca, Login e Cadastro.
* `config.php`: Centraliza a conexão com o banco de dados e lógica de sessão (arquivo protegido).
* `config.example.php`: Modelo de configuração para novos ambientes.
* `database.sql`: Script de criação das tabelas `usuarios` e `profissionais`.
* `script.js`: Funções de interface e limpeza de formulários ao carregar a página.
* `style.css`: Estilização personalizada e layout flexível.
* `.gitignore`: Filtro para impedir o envio de credenciais sensíveis ao Git[cite: 1].

## Como Instalar e Rodar

1.  **Clonar o Repositório:**
    ```bash
    git clone https://github.com/seu-usuario/facilita.git
    ```

2.  **Configurar o Banco de Dados:**
    * Importe o arquivo `database.sql` no seu gerenciador MySQL (ex: phpMyAdmin).
    * Isso criará o banco `facilita_db` e as tabelas necessárias.

3.  **Configurar o Ambiente PHP:**
    * Renomeie o arquivo `config.example.php` para `config.php`.
    * Edite o `config.php` com as credenciais do seu servidor local (`host`, `user`, `pass`).

4.  **Acessar o Sistema:**
    * Certifique-se de que a pasta está no diretório do servidor (ex: `htdocs`).
    * Acesse: `http://localhost/facilita`.

## Segurança Implementada

O projeto prioriza a integridade dos dados através de:
* **Prepared Statements:** Todas as consultas ao banco utilizam `prepare()` e `bind_param()` para evitar ataques de injeção de SQL.
* **Gestão de Sessão:** Acesso às funções de cadastro e exclusão protegido por `session_start()`.
* **Proteção de Credenciais:** Uso de `.gitignore` para o arquivo `config.php`[cite: 1].

**Projeto Integrador | Grupo 18 | Univesp - 2026**



