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
<link rel="stylesheet" href= "edits.css?time=<?php echo time(); ?>">
<link rel="icon" href="img/logos/LOGO.jpg" type="image/x-icon">
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
        <a href="carrinho.php" class="btn btn-primary btn-back">Voltar para o carrinho</a>
    </div>
    <footer class="container">
        <div class="row">
            <div class="col-sm">
                <div class="rodape">
                </br>  </br>  </br>  </br>    
                <img src="img/logos/LOGO.jpg" alt="" class="rounded mx-auto d-block ">
                    <ul class="nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/casapedrabranca/" target="_blank">
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/instagramLogo.png">
                            </div></a></li>
                        <li class="nav-item"><a class="nav-link" href="https://www.google.com/maps/place/Pra%C3%A7a+Antonio+Ferraz,+144+-+Floresta,+PE,+56400-000/@-8.6027588,-38.5697614,17z/data=!3m1!4b1!4m5!3m4!1s0x709f49dec339429:0xd169835b1b0aaa7e!8m2!3d-8.6027588!4d-38.5697614?entry=ttu" target="_blank">
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/localizacaoLogo.png">
                            </div></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="https://api.whatsapp.com/send/?phone=5587999837085&text&type=phone_number&app_absent=0" target="_blank">
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/whatsLogo.png">
                            </div></a>
                        </li>
                        <li class="nav-item"><a >
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/copyrigth.png">
                            </div></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
