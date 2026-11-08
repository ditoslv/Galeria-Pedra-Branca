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
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cadastro</title>
    <link rel="stylesheet" href= "edits.css?time=<?php echo time();  ?>">
    <link rel="icon" href="img/logos/LOGO.jpg" type="image/x-icon">

    <style>
        /* Custom styles to reduce spacing */
        body {
            padding-top: 0px;
            padding-bottom: 10px;
        }
        .container.topo {
            margin-bottom: 10px;
        }
        footer {
            margin-top: 50px;
        }
        .esp{
            top: 0%; /* centralizar verticalmente */
              left: 15%; /* centralizar horizontalmente */
        }
    </style>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conectar ao banco de dados
        require_once('conexao.php');

        // Receber os dados do formulário
        $nome = $conn->real_escape_string($_POST['nome']);
        $email = $conn->real_escape_string($_POST['email']);
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha

        // Inserir os dados na tabela
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        if ($conn->query($sql) === TRUE) {
            // Redirecionar para login.php se a inserção for bem-sucedida
            header("Location: login.php");
            exit();
        } else {
            echo "<div class='alert alert-danger text-center' role='alert'>Erro: " . $sql . "<br>" . $conn->error . "</div>";
        }

        $conn->close();
    }
    ?>
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
                            <li class="nav-item"><a class="nav-link" href="logout.php">SAIR</a></li>
                        <?php
                        }else{
                            ?>
                            <li class="nav-item"><a class="nav-link" href="login.php"><u>ENTRAR</u></a></li>

                      <?php  } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="pstn esp" action="registro.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control caixa_txt" placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Endereço de email</label>
                        <input type="email" name="email" class="form-control caixa_txt" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" name="senha" class="form-control caixa_txt" id="exampleInputPassword1" placeholder="Senha" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn_cadastro">Cadastrar</button>
                    
                </form>
            </div>
        </div>
    </div>
    </br> </br> </br></br></br></br></br> </br></br> </br></br>
    <footer class="container mt-5">
        <div class="row">
            <div class="col-sm">
                <div class="rodape">
                    <br><br><br><br>    
                    <img src="img/logos/LOGO.jpg" alt="" class="rounded mx-auto d-block">
                    <ul class="nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/casapedrabranca/" target="_blank">
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/instagramLogo.png">
                            </div></a></li>
                        <li class="nav-item"><a class="nav-link" href="https://www.google.com/maps/place/Praça+Antonio+Ferraz,+144+-+Floresta,+PE,+56400-000" target="_blank">
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/localizacaoLogo.png">
                            </div></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="https://api.whatsapp.com/send/?phone=5587999837085&text&type=phone_number&app_absent=0" target="_blank">
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/whatsLogo.png">
                            </div></a>
                        </li>
                        <li class="nav-item">
                            <div class="col-sm-3">
                                <img class="foto" src="img/logos/copyrigth.png">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
