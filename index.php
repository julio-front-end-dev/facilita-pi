<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilita!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container py-5" style="max-width: 500px;">
        <header class="text-center text-white mb-4">
            <h1 class="display-3 fw-bold">FACILITA!</h1>
            <p class="lead">Digitou, clicou, achou!</p>
        </header>

        <ul class="nav nav-pills nav-fill bg-dark bg-opacity-75 p-1 rounded-4 mb-4" id="pills-tab">
            <li class="nav-item">
                <button class="nav-link active rounded-3 fw-bold" data-bs-toggle="pill" data-bs-target="#section-buscar">Buscar</button>
            </li>
            <?php if (isset($_SESSION['logado'])): ?>
                <li class="nav-item">
                    <button class="nav-link rounded-3 fw-bold" data-bs-toggle="pill" data-bs-target="#section-cadastrar">Cadastro</button>
                </li>
                <li class="nav-item">
                    <a href="index.php?logout=1" class="nav-link text-warning fw-bold">Sair</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <button class="nav-link rounded-3 fw-bold" data-bs-toggle="pill" data-bs-target="#section-login">Log in</button>
                </li>
            <?php endif; ?>
        </ul>

        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="section-buscar">
                <div class="card border-0 shadow-lg rounded-4 p-4">
                    <h2 class="h4 mb-3">Buscar Profissional</h2>
                    <form action="index.php" method="GET" class="input-group mb-4">
                        <input type="text" name="busca" class="form-control" placeholder="Ex: Eletricista..." required value="<?php echo $_GET['busca'] ?? ''; ?>">
                        <button type="submit" class="btn btn-primary px-4">Buscar</button>
                    </form>
                    <div id="listaResultados">
                        <?php if (isset($_GET['busca'])): ?>
                            <?php if (count($resultados) > 0): ?>
                                <?php foreach ($resultados as $p): ?>
                                    <div class="card mb-3 border-start border-primary border-4 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="mb-0 fw-bold"><?php echo htmlspecialchars($p['nome']); ?></h6>
                                            <p class="text-muted small mb-2"><?php echo strtoupper(htmlspecialchars($p['profissao'])); ?> | <?php echo htmlspecialchars($p['cidade']); ?></p>
                                            <div class="d-flex gap-2">
                                                <a href="https://wa.me/55<?php echo $p['whatsapp']; ?>" target="_blank" class="btn btn-success btn-sm flex-fill">WhatsApp</a>
                                                <?php if (isset($_SESSION['logado'])): ?>
                                                    <a href="index.php?excluir=<?php echo $p['id']; ?>" onclick="return confirm('Excluir?')" class="btn btn-outline-danger btn-sm">X</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-center text-muted">Nenhum resultado.</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if (!isset($_SESSION['logado'])): ?>
            <div class="tab-pane fade" id="section-login">
                <div class="card border-0 shadow-lg rounded-4 p-4">
                    <h2 class="h4 mb-4">Acesso Restrito</h2>
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <input type="text" name="usuario" class="form-control" placeholder="Usuário" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                        </div>
                        <?php if(isset($erro_login)) echo "<p class='text-danger small'>$erro_login</p>"; ?>
                        <button type="submit" name="btn_login" class="btn btn-primary w-100 py-2 fw-bold">Entrar</button>
                    </form>
                </div>
            </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['logado'])): ?>
            <div class="tab-pane fade" id="section-cadastrar">
                <div class="card border-0 shadow-lg rounded-4 p-4">
                    <h2 class="h4 mb-4" id="titulo-form">Novo Cadastro</h2>
                    <form action="index.php" method="POST" id="meuForm">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nome Completo</label>
                            <input type="text" name="nome" id="f_nome" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Profissão</label>
                            <input type="text" name="profissao" id="f_profissao" class="form-control" required>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small fw-bold">Cidade/UF</label>
                                <input type="text" name="cidade" id="f_cidade" class="form-control" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-bold">WhatsApp</label>
                                <input type="text" name="whatsapp" id="f_whatsapp" class="form-control" onkeyup="maskWhatsApp(this)" required>
                            </div>
                        </div>
                        <button type="submit" name="btn_salvar" class="btn btn-success w-100 py-2 fw-bold">Salvar</button>
                        </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-dark bg-opacity-75 text-white text-center">
        <div class="container"><span class="small">Projeto Integrador | Grupo 18 | Univesp - 2026</span></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>