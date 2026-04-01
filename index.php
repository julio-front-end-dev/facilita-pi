<?php include('config.php'); ?>
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
            <h2>Digitou, clicou, achou!<h2>
        </header>

        <ul class="nav nav-pills nav-fill bg-dark p-1 rounded-4 mb-4">
            <li class="nav-item"><button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-busca">Buscar</button></li>
            <?php if(isset($_SESSION['logado'])): ?>
                <li class="nav-item"><a href="config.php?logout=1" class="nav-link text-danger">Sair</a></li>
            <?php else: ?>
                <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-login">Login</button></li>
                <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-cadastro">Cadastrar</button></li>
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
                        <b><?php echo $p['nome']; ?></b>
                        <small><?php echo $p['profissao']; ?> - <?php echo $p['cidade']; ?></small>
                        <a href="https://wa.me/55<?php echo $p['whatsapp']; ?>" class="btn btn-success btn-sm mt-2">WhatsApp</a>
                        <?php if(isset($_SESSION['logado'])): ?>
                            <a href="config.php?excluir=<?php echo $p['id']; ?>" class="text-danger small mt-2" onclick="return confirm('Excluir?')">Excluir</a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="tab-pane fade" id="tab-login">
                <form action="config.php" method="POST" class="card p-4 shadow">
                    <input type="text" name="login_whatsapp" class="form-control mb-2" placeholder="Digite seu whatsApp" required>
                    <input type="password" name="login_senha" class="form-control mb-3" placeholder="Digite sua senha" required>
                    <button type="submit" name="btn_login" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>

            <div class="tab-pane fade" id="tab-cadastro">
                <form action="config.php" method="POST" class="card p-4 shadow">
                    <input type="text" name="novo_usuario" class="form-control mb-2" placeholder="Nome Completo" required>
                    <input type="text" name="nova_profissao" class="form-control mb-2" placeholder="Sua Profissão" required>
                    <input type="text" name="nova_cidade" class="form-control mb-2" placeholder="Sua Cidade" required>
                    <input type="text" name="novo_whatsapp" class="form-control mb-2" placeholder="Seu WhatsApp" required>
                    <input type="password" name="nova_senha" class="form-control mb-3" placeholder="Crie sua senha" required>
                    <button type="submit" name="btn_registrar" class="btn btn-success w-100">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
