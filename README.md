FACILITA! - Digitou, clicou, achou!

FACILITA! é uma plataforma web simplificada desenvolvida para conectar prestadores de serviços (profissionais liberais e autônomos) a clientes de forma direta via WhatsApp. 
Este projeto faz parte do Projeto Integrador do Grupo 18 - Univesp.

Funcionalidades
Busca Inteligente: Filtro de profissionais por área de atuação (ex: Eletricista, Encanador).
Integração com WhatsApp: Botão direto para iniciar conversas sem precisar salvar o número na agenda.
Gestão de Perfil (CRUD): Sistema de login e cadastro para profissionais gerenciarem, editarem ou excluírem seus anúncios.
Segurança: Criptografia de senhas com `password_hash` e proteção contra SQL Injection via `Prepared Statements`.
Interface Responsiva: Desenvolvido com Bootstrap 5 para adaptação em dispositivos móveis e desktops.

Tecnologias Utilizadas
Frontend:** HTML5, CSS3 (Customizado) e JavaScript.
Framework CSS:** [Bootstrap 5](https://getbootstrap.com/).
Backend: PHP 8.x.
Banco de Dados: MySQL/MariaDB.

Estrutura de Arquivos
`config.php`: Lógica central (conexão, login, cadastro e operações de banco).
`index.php`: Interface principal do usuário e modais de interação.
`database.sql`: Script de criação das tabelas `usuarios` e `profissionais`.
`style.css`: Estilização visual com background dinâmico e efeitos de transparência.
`.gitignore`: Proteção de arquivos sensíveis para evitar o envio de senhas ao servidor.

Como Instalar
Servidor Local: Utilize XAMPP, WAMP ou Laragon (PHP 7.4+ e MySQL).
Banco de Dados:** * Crie um banco chamado `facilita_db`.
Importe o arquivo `database.sql`.
Configuração:
Renomeie `config.example.php` para `config.php`.
Insira suas credenciais do MySQL no arquivo.
Acesso: Coloque a pasta no diretório `htdocs` ou `www` e acesse via `localhost`.

Segurança e Boas Práticas

Senhas: Nunca são salvas em texto puro. O sistema utiliza o algoritmo `BCRYPT`.
Proteção de Dados: O arquivo `config.php` está no `.gitignore` para evitar o vazamento de credenciais em repositórios públicos.
Tratamento de Input: Todas as entradas de busca e cadastro passam por sanitização para evitar scripts maliciosos.

Autores
Desenvolvimento: Daniel e Julio / GitHub
Instituição: Univesp - Grupo 18.





