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
<script src="script.js"></script>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>História</title>
    <link rel="stylesheet" type="text/css" href= "edits.css?time=<?php echo time(); ?>">
    <link rel="icon" href="img/logos/LOGO.jpg" type="image/x-icon">
    <script src="script2.js?time=<?php echo time(); ?>"></script> 
    
    <script>
    let currentSlideHistoria = 0;

    function moveSlideHistoria(n) {
        const slides = document.querySelectorAll('.carousel-obras .carousel-slide');
        currentSlideHistoria = (currentSlideHistoria + n + slides.length) % slides.length;

        slides.forEach((slide, index) => {
            slide.style.display = (index === currentSlideHistoria) ? 'block' : 'none';
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        const slides = document.querySelectorAll('.carousel-obras .carousel-slide');
        slides.forEach((slide, index) => {
            slide.style.display = (index === 0) ? 'block' : 'none';
        });
    });
</script>
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
                        <li class="nav-item"><a class="nav-link" href="exposicoes.php">EXPOSIÇÕES</a></li>
                        <li class="nav-item"><a class="nav-link" href="historia.php"><u>HISTÓRIA</u></a></li>
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
        <div>


            <h1 class = "title">História da Galeria Casa Pedra Branca</h1>
            <img src="img/fotos_historia/frentegaleria.png" alt="Imagem Interna">
            <p class = "texthis" >      A Galeria Casa Pedra Branca foi inaugurada em 2010 com o intuito de promover e preservar a cultura e a arte da região de Floresta, no Sertão de Pernambuco. O projeto nasceu da iniciativa de um grupo de entusiastas da cultura local que queriam criar um espaço dedicado à expressão artística e à valorização das tradições da região. O nome "Casa Pedra Branca" é uma homenagem à pedra branca típica da região, uma rocha calcária que caracteriza a paisagem local. Essa escolha reflete a conexão entre a galeria e o ambiente natural e cultural de Floresta. A Casa Pedra Branca realiza uma variedade de exposições, incluindo mostras de pintura, escultura, fotografia e artesanato. A galeria dá destaque a artistas locais e regionais, proporcionando uma plataforma para a exposição de novos talentos e obras inovadoras. Além das exposições de arte contemporânea, a galeria também promove exposições temáticas que exploram a história e a cultura da região.</p>
            <div class="carousel-container">
                <div class="carousel">
                <div class="carousel-slide">
                    <img class = "imghis" src="img/fotos_historia/imagem.png" alt="Foto 1">
                </div>
                <div class="carousel-slide">
                    <img src="img/fotos_historia/imagem (1).png" alt="Foto 2">
                </div>
                <div class="carousel-slide">
                    <img src="img/fotos_historia/imagem (2).png" alt="Foto 3">
                </div>
                <div class="carousel-slide">
                    <img src="img/fotos_historia/imagem (3).png" alt="Foto 3">
                </div>
                <div class="carousel-slide">
                    <img src="img/fotos_historia/imagem (4).png" alt="Foto 3">
                </div>
            </div>
            <button class="prev" onclick="moveSlideHistoria(-1)">&#10094;</button>
<button class="next" onclick="moveSlideHistoria(1)">&#10095;</button>

            </div>
            
            <p class = "texthis" ></br>     “Muitos artistas contemporâneos têm encontrado em aspectos da realidade imediata a ‘matéria-prima’ para suas criações. A revelação do insólito que se abriga dentro de acontecimentos aparentemente triviais, a relação inesperada que se pode estabelecer entre dois fatos corriqueiros ou um entendimento desviante daquele aceito pelo senso comum, têm garantido o fluxo constante de criação de obras e de carreiras artísticas na contemporaneidade.</br>Assim como os artistas, os galeristas também podem, e devem, lançar mão de novas estratégias para dinamizar a difusão e o comércio das artes visuais.</p>
            
            
            

            <div class="carousel-container">
                <div class="carousel">
                    <div class="carousel-slide">
                        <img class = "imghis" src="img/fotos_historia/imagem (6).png" alt="Foto 1">
                    </div>
                    <div class="carousel-slide">
                        <img src="img/fotos_historia/imagem (7).png" alt="Foto 2">
                    </div>
                    <div class="carousel-slide">
                        <img src="img/fotos_historia/imagem (8).png" alt="Foto 3">
                    </div>
                </div>
                <div>
                    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                    <button class="next" onclick="moveSlide(1)">&#10095;</button>
                </div>
            </div>
            <p class = "texthis" >      A galeria realiza exposições anualmente e desempenha um papel importante na divulgação da arte contemporânea local. Com isso, a arte ganha maior visibilidade, uma vez que a galeria é bem conhecida na região. Ela promove exposições em parceria com galerias de cidades como Petrolina e Olinda, além de reunir artistas de todo o Brasil.</p>
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