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
    <title>Ceci</title>
    <link rel="stylesheet" type="text/css" href= "edits.css?time=<?php echo time(); ?>">
    <link rel="icon" href="img/logos/LOGO.jpg" type="image/x-icon">

    <script src="script.js?time=<?php echo time(); ?>"></script>    
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

<!--  BANNER   -->
    <div class="img" class="container">
        <div class="image-container">
            <img src="img/capas/ceci_cover.png"class="img" alt="Imagem responsiva">
            <div id="texto_img_titulo_centro"><b></b></div>
            <div id="texto_img_centro"><b></b></div>
        </div>
    </div>
<!--  texto   -->
    <div class="container">
       <p class="desk">  CECÍ VISITA GALERIA - A Cecí Galeria surgiu durante a pandemia como um espaço virtual para divulgação 
            e venda de obras de jovens artistas pernambucanos nas redes sociais. Em 2021, foi inaugurado o espaço 
            físico no Recife, que recebeu várias exposições, entre elas “Arte Erótica” com obras de Christina 
            Machado, Márcio Almeida e Xinga; “Paisagens”, com obras de Bruno Faria; “O sublime e a razão”, com 
            obras de Raul Córdula e Silvio Zancheti.</p></div>

            
    <div class="container">   
        <p class="desk">  Em 2023, mudamos o espaço físico da Cecí Galeria para Petrolina e a abertura contou com uma exposição do nosso 
            acervo, que trazia artistas de vários estados para além de Pernambuco. Na ocasião, eu e Fred Goyanna conversamos sobre possíveis 
            parcerias e como viabilizar deslocamentos para trocas de experiências e apresentar maneiras diversas 
            de usos dos nossos espaços para o público de Floresta e de Petrolina.</p>

        <p class="desk">  E assim apresentamos com muita alegria e entusiasmo a exposição Galeria visita Galeria!</p>

        <p style="font-family: Georgia; font-size: 20px; margin-left: 120px; margin-right: 120px;">CECILIA RIBEIRO PEREIRA, Galerista Cecí Galeria</p></div>
       
        <div class="carousel-obras">
                <div class="carousel">
                    <div class="carousel-slide">
                        <figure> <img class = "imghis" src="uploads/obra1.jpg" alt="Foto 1">    <figcaption> </br> </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <figure> <img src="uploads/obra14.jpg" alt="Foto 2">   <figcaption>An elephant at sunset</figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra15.jpg" alt="Foto 3"> <figcaption> </br> </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra16.jpg" alt="Foto 4"> <figcaption> </br> </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra17.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra18.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra19.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra20.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra21.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra22.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra23.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra25.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div> 
                    <div class="carousel-slide">
                        <img src="uploads/obra26.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div> 
                    <div class="carousel-slide">
                        <img src="uploads/obra27.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div> 
                    <div class="carousel-slide">
                        <img src="uploads/obra28.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div> 
                    <div class="carousel-slide">
                        <img src="uploads/obra29.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div> 
                    <div class="carousel-slide">
                        <img src="uploads/obra30.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div> 
                    <div class="carousel-slide">
                        <img src="uploads/obra31.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div> 
                    <div class="carousel-slide">
                        <img src="uploads/obra32.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div> 
                    <div class="carousel-slide">
                        <img src="uploads/obra33.jpg" alt="Foto 5"> <figcaption> </br> </figcaption> </figure>
                    </div> 




            </div>
                <button class="prev">&#10094;</button>
                <button class="next">&#10095;</button>
            </div>

            
  
    
<!--  RODAPÉ   -->
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
    
    <div id="fullscreen-container" class="fullscreen-container">
    <!-- Botão para fechar o modal -->
    <span id="close-fullscreen" class="close-fullscreen">&times;</span>
    <!-- Botão para ver a imagem anterior -->
    <button class="prev-fullscreen">&#10094;</button>
    <div class="fullscreen-image-container">
        <!-- Imagem em tela cheia -->
        <img id="fullscreen-image" src="" alt="Imagem em tela cheia">
        <!-- Legenda da imagem -->
        <div id="fullscreen-caption" class="fullscreen-caption"></div>
    </div>
    <!-- Botão para ver a imagem seguinte -->
    <button class="next-fullscreen">&#10095;</button>
</div>
   
</body>