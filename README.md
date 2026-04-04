FACILITA! é uma plataforma web simplificada desenvolvida para conectar prestadores de serviços 
(profissionais liberais e autônomos) a clientes de forma direta via WhatsApp. Este projeto faz 
parte do Projeto Integrador do Grupo 18 - Univesp.

** Funcionalidades **
Busca Inteligente: Filtro de profissionais por área de atuação (ex: Eletricista, Encanador).
Integração com WhatsApp: Botão direto para iniciar conversas sem precisar salvar o número na agenda.
Gestão de Perfil (CRUD): Sistema de login e cadastro para profissionais gerenciarem, editarem ou 
excluírem seus anúncios.
Segurança: Criptografia de senhas com `password_hash` e proteção contra SQL Injection via 
`Prepared Statements`.
Interface Responsiva: Desenvolvido com Bootstrap 5 para adaptação em dispositivos móveis e desktops.

** Tecnologias Utilizadas **
Frontend:** HTML5, CSS3 (Customizado) e JavaScript.
Framework CSS:** [Bootstrap 5](https://getbootstrap.com/).
Backend: PHP 8.x.
Banco de Dados: MySQL/MariaDB.

** Estrutura de Arquivos **
`config.php`: Lógica central (conexão, login, cadastro e operações de banco).
`index.php`: Interface principal do usuário e modais de interação.
`database.sql`: Script de criação das tabelas `usuarios` e `profissionais`.
`style.css`: Estilização visual com background dinâmico e efeitos de transparência.
`.gitignore`: Proteção de arquivos sensíveis para evitar o envio de senhas ao servidor.

** Como Instalar **
Servidor Local: Utilize XAMPP, WAMP ou Laragon (PHP 7.4+ e MySQL).
Banco de Dados:** * Crie um banco chamado `facilita_db`.
Importe o arquivo `database.sql`.
Configuração:
Renomeie `config.example.php` para `config.php`.
Insira suas credenciais do MySQL no arquivo.
Acesso: Coloque a pasta no diretório `htdocs` ou `www` e acesse via `localhost`.
Para abrir a página copie e cole em seu browser: http://localhost/facilita/index.php

** Passo a Passo no GitHub Desktop **

Preparar a Pasta do Projeto
Organização Local
Certifique-se de que todos os arquivos enviados (index.php, config.php, style.css, etc.) estejam 
dentro 
de uma única pasta no seu computador (ex: uma pasta chamada facilita-pi).

Criar um Novo Repositório
No GitHub Desktop
Abra o GitHub Desktop e vá em File > New Repository.

Name: facilita-pi

Local Path: Escolha a pasta onde seus arquivos estão.

Git Ignore: Como você já tem um arquivo .gitignore na pasta, pode deixar como "None" ou selecionar "PHP".

Clique em Create Repository.

Verificar o .gitignore
Segurança de Dados
Antes de fazer qualquer "Commit", verifique a aba Changes na lateral esquerda. O arquivo config.php NÃO deve 
aparecer na lista 
de arquivos para subir, pois ele está listado no seu .gitignore. Se ele aparecer, o GitHub Desktop ainda não 
reconheceu o ignore; certifique-se de que o arquivo chama-se exatamente .gitignore.

Fazer o Primeiro Commit
Snapshot Local
No campo "Summary" (obrigatório), escreva algo como Initial Commit - Versão Integrador. Clique no botão Commit 
to main. Isso salva uma versão dos arquivos no seu PC.

Publicar no GitHub
Sincronização com a Nuvem
Clique no botão Publish repository no topo da tela.

Mantenha a opção Keep this code private marcada se não quiser que outras pessoas vejam o código agora.

Clique em Publish Repository. Seu código agora está no site do GitHub.

** O papel do config.example.php **

Como o seu config.php real está bloqueado pelo .gitignore para sua segurança, outros desenvolvedores 
(ou seus professores) usarão o config.example.php que você criou para configurar o ambiente deles.

** Banco de Dados **
Lembre-se que o GitHub guarda o código, mas não os dados do seu banco MySQL. Sempre que fizer uma alteração 
na estrutura das tabelas, atualize o seu arquivo database.sql para que outras pessoas consigam recriar 
o banco corretamente.

** Segurança e Boas Práticas **

Senhas: Nunca são salvas em texto puro. O sistema utiliza o algoritmo `BCRYPT`.
Proteção de Dados: O arquivo `config.php` está no `.gitignore` para evitar o vazamento de credenciais 
em repositórios públicos.
Tratamento de Input: Todas as entradas de busca e cadastro passam por sanitização para evitar scripts maliciosos.

Desenvolvedores: Daniel e Julio / Eixo da Computação - Grupo 18 - Univesp


