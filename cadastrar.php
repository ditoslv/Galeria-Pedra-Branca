<?php
require_once('conexao.php');

// Recebe os dados do formulário
$nome = $_POST['nome'];
$autor = $_POST['autor'];
$data_obra = $_POST['data_obra'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];

// Trata o upload da foto
$foto = $_FILES['foto']['name'];
$foto_tmp = $_FILES['foto']['tmp_name'];
$foto_path = 'uploads/' . basename($foto);

// Cria o diretório se não existir
if (!is_dir('uploads')) {
    mkdir('uploads', 0755, true);
}

// Move o arquivo para o diretório de uploads
if (move_uploaded_file($foto_tmp, $foto_path)) {
    $sql = "INSERT INTO obras (nome, autor, data_obra, valor, descricao, foto) 
            VALUES ('$nome', '$autor', '$data_obra', '$valor', '$descricao', '$foto')";

    if ($conn->query($sql) === TRUE) {
        echo "Obra cadastrada com sucesso!";
        header("Location: listagem.php"); 
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Erro ao enviar a foto.";
}

$conn->close();
?>