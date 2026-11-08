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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $autor = $_POST['autor'];
    $data_obra = $_POST['data_obra'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $foto = $_POST['foto'];

    $sql = "UPDATE obras SET nome = '$nome', autor = '$autor', data_obra = '$data_obra', valor = $valor, descricao = '$descricao', foto = '$foto' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Obra atualizada com sucesso.";
        header("Location: listagem.php");

    } else {
        echo "Erro ao atualizar obra: " . $conn->error;
    }
}

$sql = "SELECT * FROM obras WHERE id = $id";
$result = $conn->query($sql);
$obra = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Obra</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Editar Obra</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($obra['nome']); ?>" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" class="form-control" id="autor" name="autor" value="<?php echo htmlspecialchars($obra['autor']); ?>" required>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" class="form-control" id="valor" name="valor" value="<?php echo htmlspecialchars($obra['valor']); ?>" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="4" required><?php echo htmlspecialchars($obra['descricao']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="text" class="form-control" id="foto" name="foto" value="<?php echo htmlspecialchars($obra['foto']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

