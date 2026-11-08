<?php
session_start();
require_once('conexao.php');

// Verificar se o usuário está logado
$logado = isset($_SESSION['email']);

$sql = "SELECT id, nome, foto FROM obras";
$result = $conn->query($sql);

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
    <title>Exposições</title>
    <link rel="stylesheet" href= "edits.css?time=<?php echo time();  ?>">
    <link rel="icon" href="img/logos/LOGO.jpg" type="image/x-icon">
</head>
<body> 
<header class="container topo">
        <div class="row">
            <div class="col-sm-3">
                <a href="index.php"><img src="img/logos/LOGO.jpg" alt=""></a>
            </div>
            <div class="col-sm-9">
                <nav class="menu">
                    <ul class="nav justify-content-end">
                        <li class="nav-item"><a class="nav-link" href="index.php">PÁGINA INICIAL</a></li>
                        <li class="nav-item"><a class="nav-link" href="listagem.php">ACERVO</a></li>
                        <li class="nav-item"><a class="nav-link" href="exposicoes.php"><u>EXPOSIÇÕES</u></a></li>
                        <li class="nav-item"><a class="nav-link" href="historia.php">HISTÓRIA</a></li>
                        <li class="nav-item"><a class="nav-link" href="carrinho.php">CARRINHO</a></li>
                        <?php if ($logado): ?>
                            <?php if ($is_admin): ?>
                                <li class="nav-item"><a class="nav-link" href="cadastro_obras.php">CADASTRAR OBRAS</a></li>
                            <?php endif; ?>
                            <li class="nav-item"><a class="nav-link" href="logout.php">SAIR</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="login.php">ENTRAR</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>


    <div class="img-container">
        <div class="image-container">
            <img src="img/capas/jcity(exp).png"class="img" alt="Imagem responsiva">
            <div id="texto_img_titulo_centro" class="branca"><b>Jungle city - 3022</b></div>
            <div id="texto_img_centro" class="branca"><b>Exposição coletiva de artistas florestanos
​</b></div>
            <!-- Botão utilizando Bootstrap -->
            <form action="junglecity3022.php" method="post">
                <button type="submit" class="btn btn-primary btn-lg btn-on-image-centro">Conheça</button>
            </form>
        </div>
    </div>    
 
    <div class="image-container">
        <img src="img/capas/medusa(exp).png" class="img" alt="Imagem responsiva">
        <!-- Texto "Medusa" acima do botão -->
        <div id="texto_img_titulo_lateral" class="branca"><b>Medusa</b></div>
        <div id="texto_img_lateral" class="branca"><b>Performance teatral com Fabiana Pirro​</b></div>
        <!-- Botão utilizando Bootstrap -->
        <form action="medusa.php" method="post">
            <button type="submit" class="btn btn-primary btn-lg btn-on-image">Conheça</button>
        </form>
    </div>
    <div class="image-container">
        <img src="img/capas/ilha_cover.png" class="img" alt="Imagem responsiva">
        <!-- Texto "Ilha" acima do botão -->
        <div id="texto_img_titulo_centro" class="branca"><b>Ilha</b></div>
        <div id="texto_img_centro" class="branca"><b>Exposição do fotógrafo e artista visual Gilvan Barreto​</b></div>
        <!-- Botão utilizando Bootstrap -->
        <form action="ilha.php" method="post">
            <button type="submit" class="btn btn-primary btn-lg btn-on-image-centro">Conheça</button>
        </form>
    </div>
</div>

<div class="image-container">
        <img src="img/capas/ceci_cover.png" class="img" alt="Imagem responsiva">
        <!-- Texto "Cecí" acima do botão -->
        <div id="texto_img_titulo_lateral" class="preta"><b>Cecí</b></div>
        <div id="texto_img_lateral" class="preta"><b>Cecí visita Floresta​</b></div>
        <!-- Botão utilizando Bootstrap -->
        <form action="ceci.php" method="post">
            <button type="submit" class="btn-primary btn-lg btn-on-image">Conheça</button>
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
    
    <div>
        
    </div>
</body>