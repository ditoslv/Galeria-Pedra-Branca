
<?php
session_start();
require_once('conexao.php');
// Verificar se o usuário está logado e é um administrador
$is_admin = false;
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $result = $conn->query("SELECT is_admin FROM usuarios WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $is_admin = $user['is_admin'] == 1;
    }
}

$sql = "SELECT id, nome, foto FROM obras";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="stylesheet" href= "edits.css?time=<?php echo time(); ?>">
<link rel="icon" href="img/logos/LOGO.jpg" type="image/x-icon">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Obras</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            object-fit: cover;
            width: 100%;
            height: 200px; /* Altura fixa para padronizar o tamanho das imagens */
        }
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-body {
            flex-grow: 1;
        }
    </style>
</head>
<body>
<header class="container topo">
        <div class="row">
            <div class="col-sm-3">
            <a href="index.php"> <img src="img/logos/LOGO.jpg" alt=""> </a>
            </div>
            <div class="col-sm-9">
                <nav class="menu">
                <ul class="nav justify-content-end">
                    <li class="nav-item"><a class="nav-link" href="index.php">PÁGINA INICIAL</a></li>
                        <li class="nav-item"><a class="nav-link" href="listagem.php">ACERVO</a></li>
                        <li class="nav-item"><a class="nav-link" href="exposicoes.php">EXPOSIÇÕES</a></li>
                        <li class="nav-item"><a class="nav-link" href="historia.php">HISTÓRIA</a></li>
                        <li class="nav-item"><a class="nav-link" href="carrinho.php">CARRINHO</a></li>
                        <?php if ($is_admin){ ?>
                            <li class="nav-item"><a class="nav-link" href="cadastro_obras.php"><u>CADASTRAR OBRAS</u></a></li>
                            <li class="nav-item"><a class="nav-link" href="logout.php">SAIR</a></li>
                        <?php
                        }else{
                            ?>
                            <li class="nav-item"><a class="nav-link" href="login.php">ENTRAR</a></li>

                      <?php  } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="container">
    <h1>Cadastro de Obras</h1>
    <form action="cadastrar.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome da obra:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="autor">Autor da obra:</label>
        <input type="text" id="autor" name="autor" required><br><br>
        
        <label for="valor">Valor da obra:</label>
        <input type="number" id="valor" name="valor" step="0.01" required><br><br>
        
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"></textarea><br><br>
        
        <label for="foto">Foto da obra:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>
        
        <input type="submit" value="Cadastrar Obra">
    </form>
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
