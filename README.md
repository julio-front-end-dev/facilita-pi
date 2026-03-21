**README.md** formatado para o seu projeto. Ele é essencial para o controle de versão, pois explica para o seu grupo (ou para o seu professor) como rodar o sistema e qual a função ---

# FACILITA! - Projeto Integrador (Grupo 18)

O **Facilita!** é uma plataforma simples e eficiente para conectar prestadores de serviço a clientes locais. O sistema permite a busca pública de profissionais por categoria e uma área administrativa restrita para gestão de cadastros.

## Tecnologias Utilizadas
* **PHP 8.x**: Lógica de backend e conexão com banco de dados.
* **MySQL**: Armazenamento de dados de usuários e profissionais.
* **Bootstrap 5**: Interface responsiva e moderna.
* **JavaScript**: Máscaras de entrada e manipulação de formulários.
* **CSS3**: Estilização personalizada com backgrounds dinâmicos.

## Estrutura do Projeto
* `index.php`: Interface principal com abas de busca, login e cadastro.
* `config.php`: Arquivo central de configuração, sessões e lógica de banco de dados (Protegido com Prepared Statements).
* `script.js`: Funções de máscara de WhatsApp e limpeza de campos.
* `style.css`: Definições visuais e layout flexível.
* `.gitignore`: Impede que arquivos de configuração sensíveis sejam enviados ao repositório.

## Como Instalar
1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seu-usuario/facilita.git
   ```
2. **Configure o Banco de Dados:**
   * Importe o banco de dados `facilita_db`.
   * Crie as tabelas `usuarios` (id, usuario, senha) e `profissionais` (id, nome, profissao, cidade, whatsapp).
3. **Configure o PHP:**
   * Renomeie o arquivo `config.example.php` para `config.php`.
   * Insira suas credenciais locais do MySQL (host, user, pass).
4. **Acesse no navegador:**
   * `http://localhost/facilita`

## Segurança Implementada
O projeto utiliza **Prepared Statements** em todas as interações com o banco de dados para prevenir ataques de **SQL Injection**, garantindo a integridade dos dados e do acesso administrativo.

**Univesp - 2026**

