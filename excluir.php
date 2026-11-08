<?php
session_start();
require_once('conexao.php');

// Verificar se o usuário é um administrador
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT is_admin FROM usuarios WHERE id = $user_id");
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($user['is_admin'] != 1) {
        header("Location: listagem.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "DELETE FROM obras WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Obra excluída com sucesso.";
    } else {
        echo "Erro ao excluir obra: " . $conn->error;
    }
    header("Location: listagem.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Obra</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Excluir Obra</h2>
    <p>Você tem certeza que deseja excluir esta obra?</p>
    <form method="get" action="">
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="listagem.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
