<?php
/**
 * ARQUIVO DE EXEMPLO - FACILITA!
 * Instruções: 
 * 1. Copie este arquivo e renomeie para 'config.php'.
 * 2. Preencha as variáveis de host, user e pass com seus dados do MySQL local.
 * 3. O arquivo 'config.php' é ignorado pelo Git para sua segurança.
 */

session_start();

// CONFIGURAÇÕES DO BANCO DE DADOS (Edite aqui)
$host = 'localhost';
$user = 'SEU_USUARIO_AQUI'; // Geralmente 'root'
$pass = 'SUA_SENHA_AQUI';    // Geralmente vazio '' no XAMPP
$db   = 'facilita_db';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// LÓGICA DE LOGIN (PROTEGIDA CONTRA SQL INJECTION)
if (isset($_POST['btn_login'])) {
    $user_login = $_POST['usuario'];
    $pass_login = $_POST['senha'];

    // Usando Prepared Statements
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario=? AND senha=?");
    $stmt->bind_param("ss", $user_login, $pass_login);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $_SESSION['logado'] = true;
        header("Location: index.php");
        exit();
    } else {
        $erro_login = "Usuário ou senha inválidos!";
    }
}

// LOGOUT
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// OPERAÇÕES PROTEGIDAS (Apenas para usuários logados)
if (isset($_SESSION['logado'])) {
    
    // Cadastro de Profissionais
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_salvar'])) {
        $nome = $_POST['nome'];
        $profissao = strtolower($_POST['profissao']);
        $cidade = $_POST['cidade'];
        $whatsapp = preg_replace('/\D/', '', $_POST['whatsapp']);

        $stmt = $conn->prepare("INSERT INTO profissionais (nome, profissao, cidade, whatsapp) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $profissao, $cidade, $whatsapp);
        
        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        }
    }

    // Exclusão de Profissionais
    if (isset($_GET['excluir'])) {
        $id = (int)$_GET['excluir'];
        $stmt = $conn->prepare("DELETE FROM profissionais WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header("Location: index.php");
        exit();
    }
}

// BUSCA PÚBLICA (Lógica de pesquisa por profissão)
$resultados = [];
if (isset($_GET['busca'])) {
    $termo = "%" . strtolower($_GET['busca']) . "%";
    $stmt = $conn->prepare("SELECT * FROM profissionais WHERE profissao LIKE ? ORDER BY nome ASC");
    $stmt->bind_param("s", $termo);
    $stmt->execute();
    $res = $stmt->get_result();
    while($row = $res->fetch_assoc()) {
        $resultados[] = $row;
    }
}
?>