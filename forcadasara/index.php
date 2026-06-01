<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["logado"])) {
    header("Location: login.php");
    exit;
}

// LISTA DE PALAVRAS
$palavras = ["php", "html", "css", "mysql", "java", "python", "linux"];

// SORTEIO ALEATÓRIO
$indice = array_rand($palavras);
$palavra = $palavras[$indice];

$mensagem = "";
$letra = $_POST["letra"] ?? "";

// LIMPEZA DA LETRA
$letra = trim($letra);
$letra = strtolower($letra);
$letra = substr($letra, 0, 1);

// VERIFICAÇÃO
if ($letra !== "") {
    if (strpos($palavra, $letra) !== false) {
        $mensagem = "Acertou! A letra existe na palavra.";
    } else {
        $mensagem = "Errou! A letra não existe na palavra.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forca PHP - Versão 0.2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h1 class="h3 mb-0">Jogo da Forca v0.2</h1>
                            <a href="logout.php" class="btn btn-danger btn-sm">Sair</a>
                        </div>

                        <p class="fs-1 text-center fw-bold">
                            <?php
                            for ($i = 0; $i < strlen($palavra); $i++) {
                                echo "_ ";
                            }
                            ?>
                        </p>

                        <form method="post">
                            <div class="mb-3">
                                <label for="letra" class="form-label">Digite uma letra</label>
                                <input type="text" id="letra" name="letra" maxlength="1" class="form-control form-control-lg text-center">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Verificar</button>
                        </form>

                        <?php if ($mensagem !== ""): ?>
                            <div class="alert alert-info mt-3 text-center">
                                <?= htmlspecialchars($mensagem) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>