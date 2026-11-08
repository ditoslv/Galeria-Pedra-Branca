<?php
session_start(); // Inicia a sessão
$mensagem_carrinho = false;
if (isset($_GET['from']) && $_GET['from'] == 'carrinho') {
    $mensagem_carrinho = true;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados
    require_once('conexao.php');

    // Receber os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar e executar a consulta
    $stmt = $conn->prepare("SELECT id, nome, senha, is_admin FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Verificar a senha
        $stmt->bind_result($id, $nome, $hashed_password, $is_admin);
        $stmt->fetch();
        
        if (password_verify($senha, $hashed_password)) {
            // Armazenar informações do usuário na sessão
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['nome'] = $nome;
            $_SESSION['is_admin'] = $is_admin;

            echo "<div class='alert alert-success text-center' role='alert'>Login bem-sucedido!</div>";
            // Redirecionar para a página inicial ou uma página protegida
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger text-center' role='alert'>Senha incorreta.</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center' role='alert'>Nenhum usuário encontrado com esse e-mail.</div>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="edits.css?time=<?php echo time(); ?>">
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
        .esp {
            top: 0%; /* centralizar verticalmente */
            left: 15%; /* centralizar horizontalmente */
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
                    <li class="nav-item"><a class="nav-link" href="login.php"><u>ENTRAR</u></a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<?php if ($mensagem_carrinho): ?>
    <div class="alert alert-info text-center" role="alert">
        É necessário login para acessar o carrinho!
    </div>
<?php endif; ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <form class="pstn esp" action="login.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de email</label>
                    <input type="email" name="email" class="form-control caixa_txt" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" name="senha" class="form-control caixa_txt" id="exampleInputPassword1" placeholder="Senha" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn_cadastro w-100">Entrar</button>
            </form>
            </br> </br> </br></br></br></br></br> </br></br> </br></br>
            <div class="text-center mt-3">
                <a href="registro.php">Não tem conta? Cadastre-se</a>
            </div>
        </div>
    </div>
</div>

<footer class="container mt-3">
    <div class="row">
        <div class="col-sm">
            <div class="rodape">
                <br><br>    
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