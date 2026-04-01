FACILITA! - Digitou, clicou, achou!

O FACILITA! é uma plataforma web simplificada desenvolvida para conectar prestadores de serviços (profissionais liberais, autônomos) a clientes de forma direta via WhatsApp. O sistema permite o cadastro de profissionais, busca por categoria e gerenciamento de perfis.

Funcionalidades

Busca Inteligente: Filtre profissionais por área de atuação (ex: Eletricista, Encanador).
Integração com WhatsApp: Botão direto para iniciar conversa com o profissional sem precisar salvar o número.
Sistema de Login e Cadastro: Segurança para profissionais gerenciarem seus dados.
Painel Administrativo (CRUD): Usuários logados podem editar ou excluir seus anúncios de serviço.
Interface Responsiva: Desenvolvido com Bootstrap 5 para funcionar perfeitamente em celulares e computadores.


Tecnologias Utilizadas

Frontend: HTML5, CSS3 (Customizado), JavaScript (Máscaras de input).
Framework CSS:** [Bootstrap 5](https://getbootstrap.com/).
Backend: PHP 8.x.
Banco de Dados: MySQL/MariaDB.
Segurança:* Criptografia de senhas com `password_hash` e proteção contra SQL Injection via `Prepared Statements`.


Estrutura de Arquivos

```text
├── config.php          # Lógica principal (Conexão, Login, Cadastro, CRUD)
├── config.example.php  # Modelo de configuração para novos ambientes
├── index.php           # Interface principal do usuário
├── database.sql        # Script de criação do banco de dados
├── style.css           # Estilizações visuais e background dinâmico
├── script.js           # Máscaras de telefone e comportamento do formulário
└── .gitignore          # Proteção de arquivos sensíveis (ex: senhas)



Como Instalar e Rodar

1. Requisitos
Você precisará de um servidor local como **XAMPP**, **WAMP** ou **Laragon** com PHP 7.4+ e MySQL.

2. Configurando o Banco de Dados
1.  Abra o seu gerenciador de banco de dados (phpMyAdmin).
2.  Crie um banco chamado `facilita_db`.
3.  Importe o conteúdo do arquivo `database.sql` para criar as tabelas necessárias.

3. Configurando o Projeto
1.  Clone ou baixe este repositório para a pasta `htdocs` ou `www` do seu servidor.
2.  Renomeie o arquivo `config.example.php` para `config.php`.
3.  Edite o `config.php` com as suas credenciais locais:
    php
    $host = 'localhost';
    $user = 'seu_usuario'; 
    $pass = 'sua_senha';    
    $db   = 'facilita_db';
    

4. Acesso
Abra o navegador e digite: `http://localhost/nome-da-sua-pasta`


Segurança e Boas Práticas

Senhas: Nunca são salvas em texto puro. O sistema utiliza o algoritmo `BCRYPT`.
Proteção de Dados: O arquivo `config.php` está no `.gitignore` para evitar o vazamento de credenciais em repositórios públicos.
Tratamento de Input: Todas as entradas de busca e cadastro passam por sanitização para evitar scripts maliciosos.

Autor

Desenvolvimento: DanieleJulio/GitHub
Design: Bootstrap & Custom CSS



