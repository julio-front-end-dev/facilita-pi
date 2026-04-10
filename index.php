<?php 
include('config.php'); 

// Inicia vazio
$resultados = [];

// Só busca se existir o parâmetro e se ele não for apenas espaços
if (isset($_GET['busca']) && !empty(trim($_GET['busca']))) {
    $busca = "%" . $_GET['busca'] . "%";
    $stmt = $conn->prepare("SELECT * FROM profissionais WHERE profissao LIKE ? OR nome LIKE ?");
    $stmt->bind_param("ss", $busca, $busca);
    $stmt->execute();
    $resultados = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>FACILITA!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container py-5" style="max-width: 500px;">
        <header class="text-center text-white mb-4">
            <h1 class="display-3 fw-bold">FACILITA!</h1>
            <p class="lead">Digitou, clicou, achou!</p>
       </header>

       <?php if (isset($_GET['erro']) && $_GET['erro'] == 'whatsapp_duplicado'): ?>
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
        <strong>Erro:</strong> Este número já está cadastrado!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

        <ul class="nav nav-pills nav-fill bg-dark p-1 rounded-4 mb-4">
            <li class="nav-item"><button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-busca">Encontrar Profissional</button></li>
            <?php if(isset($_SESSION['logado'])): ?>
                <li class="nav-item"><a href="config.php?logout=1" class="nav-link text-danger">Sair</a></li>
            <?php else: ?>
                <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-login">Fazer Login</button></li>
                <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-cadastro">Cadastre-se!</button></li>
            <?php endif; ?>
            
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-busca">
                
                <form action="index.php" method="GET" class="input-group mb-3">
                    <input type="text" name="busca" class="form-control" placeholder="Digite uma profissão...">
                    <button class="btn btn-primary">Buscar</button>
                </form>
                
                <?php foreach($resultados as $p): ?>
                    <div class="card p-3 mb-2 shadow-sm">
                        <b><?php echo htmlspecialchars($p['nome']); ?></b>
                        <small><?php echo htmlspecialchars($p['profissao']); ?> - <?php echo htmlspecialchars($p['cidade']); ?></small>
                        <a href="https://wa.me/55<?php echo $p['whatsapp']; ?>" class="btn btn-success btn-sm mt-2">WhatsApp</a>
                        
                        <?php if (isset($_GET['erro']) && $_GET['erro'] == 'whatsapp_duplicado'): ?>
    <div class="alert alert-danger alert-dismissible fade show container mt-3" role="alert">
        <strong>Erro:</strong> Este número de WhatsApp já está cadastrado!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?> 
                        <?php if(isset($_SESSION['logado'])): ?>
                            <div class="mt-2 border-top pt-2">
                                <a href="index.php?editar=<?php echo $p['id']; ?>" class="text-primary small me-3 text-decoration-none fw-bold">Editar</a>
                                <a href="config.php?excluir=<?php echo $p['id']; ?>" class="text-danger small text-decoration-none" onclick="return confirm('Excluir?')">Excluir</a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="tab-pane fade" id="tab-login">
                <form action="config.php" method="POST" class="card p-4 shadow">
                    <input type="text" name="login_whatsapp" class="form-control mb-2" placeholder="WhatsApp" required>
                    <input type="password" name="login_senha" class="form-control mb-3" placeholder="Senha" required>
                    <button type="submit" name="btn_login" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>

            <div class="tab-pane fade" id="tab-cadastro">
                <form action="config.php" method="POST" class="card p-4 shadow">
                    <input type="text" name="novo_usuario" class="form-control mb-2" placeholder="Nome Completo" required>
                    <input type="text" name="nova_profissao" class="form-control mb-2" placeholder="Profissão" required>
                    <input type="text" name="nova_cidade" class="form-control mb-2" placeholder="Cidade/UF" required>
                    <input type="text" name="novo_whatsapp" class="form-control mb-2" onkeyup="maskWhatsApp(this)" placeholder="WhatsApp" required>
                    <input type="password" name="nova_senha" class="form-control mb-3" placeholder="Crie sua senha" required>
                    <button type="submit" name="btn_registrar" class="btn btn-success w-100">Cadastrar</button>
                </form>
            </div>
        </div>

        <?php if (isset($_GET['editar']) && isset($_SESSION['logado'])): 
            $id_edit = (int)$_GET['editar'];
            $stmt_edit = $conn->prepare("SELECT * FROM profissionais WHERE id = ?");
            $stmt_edit->bind_param("i", $id_edit);
            $stmt_edit->execute();
            $dados = $stmt_edit->get_result()->fetch_assoc();
        ?>
            <div class="position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); z-index: 1050;">
                <div class="card p-4 shadow-lg w-100 m-3" style="max-width: 400px;">
                    <h5 class="mb-3">Editar Profissional</h5>
                    <form action="config.php" method="POST">
                        <input type="hidden" name="id_profissional" value="<?php echo $dados['id']; ?>">
                        <input type="text" name="edit_nome" class="form-control mb-2" value="<?php echo htmlspecialchars($dados['nome']); ?>" required>
                        <input type="text" name="edit_profissao" class="form-control mb-2" value="<?php echo htmlspecialchars($dados['profissao']); ?>" required>
                        <input type="text" name="edit_cidade" class="form-control mb-2" value="<?php echo htmlspecialchars($dados['cidade']); ?>" required>
                        <input type="text" name="edit_whatsapp" class="form-control mb-3" value="<?php echo $dados['whatsapp']; ?>" onkeyup="maskWhatsApp(this)" required>
                        <div class="d-flex gap-2">
                            <button type="submit" name="btn_atualizar" class="btn btn-primary w-100">Salvar</button>
                            <a href="index.php" class="btn btn-secondary w-100">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>

    </div>
    </div>
    
    <div class="text-center mb-4">
    <span class="text-white">Saiba mais sobre o Facilita!</span>
    <a href="#" class="text-info fw-bold" data-bs-toggle="modal" data-bs-target="#modalSobre">Clique aqui!</a>
</div>

    <footer class="footer mt-auto py-4 text-center">
        <span class="text-white-50 shadow-sm">
            Projeto Integrador I | Eixo da Computação - Grupo 18 | Univesp
        </span>
    </footer>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="script.js"></script>

    <div class="modal fade" id="modalSobre" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white border-secondary">
            <div class="modal-header border-secondary">
                <h5 class="modal-title">Sobre o FACILITA!</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Diferente de listas telefônicas antigas ou buscas genéricas na internet, 
                    o Facilita foi desenhado para ser direto:</p>
                <ul class="text-start">
                    <li>Ao digitar a profissão (como "Eletrecista" ou "Pintor") você visualiza instantaneamente 
                        dados relevantes dos profissionais disponíveis.</li>
                    <li>Com um único clique, você abre uma conversa no WhatsApp do profissional, sem precisar 
                        salvar o número na sua agenda de contatos.</li>
                    <li>O profissional consegue criar o seu perfil em segundos, ficando visível para novos clientes 
                        e tendo total controle para editar ou excluir seus dados quando desejar. 
                        Para logar basta digitar o seu WhatsApp e a senha que criou ao realizar o cadastro.
                    </li>
                </ul>
                </div>
            <div class="modal-footer border-secondary">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entendido!</button>
            </div>
        </div>
    </div>
</div>

</body>

 </html>
