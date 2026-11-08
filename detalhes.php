<?php
require_once('conexao.php');

// Obtém o ID da obra a partir da URL
$id = intval($_GET['id']);

$sql = "SELECT * FROM obras WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Obra</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .detalhes {
            max-width: 600px;
            margin: 0 auto;
        }
        .detalhes img {
            max-width: 100%;
            height: auto;
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container detalhes">
        <?php
        if ($row) {
            echo '<h1>' . htmlspecialchars($row["nome"]) . '</h1>';
            echo '<img src="uploads/' . htmlspecialchars($row["foto"]) . '" alt="' . htmlspecialchars($row["nome"]) . '">';
            echo '<p><strong>Autor:</strong> ' . htmlspecialchars($row["autor"]) . '</p>';
            echo '<p><strong>Data:</strong> ' . htmlspecialchars($row["data_obra"]) . '</p>';
            echo '<p><strong>Valor:</strong> R$ ' . htmlspecialchars($row["valor"]) . '</p>';
            echo '<p><strong>Descrição:</strong> ' . nl2br(htmlspecialchars($row["descricao"])) . '</p>';
        } else {
            echo '<p>Obra não encontrada.</p>';
        }
        $conn->close();
        ?>
        <a href="listagem.php" class="btn btn-primary btn-back">Voltar para a Listagem</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
