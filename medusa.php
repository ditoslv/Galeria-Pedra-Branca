<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Medusas</title>
    <link rel="stylesheet" href= "edits.css?time=<?php echo time();  ?>">
    <script src="script.js?time=<?php echo time(); ?>"></script>
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
                        <li class="nav-item"><a class="nav-link" href="exposicoes.php"><u>EXPOSIÇÕES</u></a></li>
                        <li class="nav-item"><a class="nav-link" href="historia.php">HISTÓRIA</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">ENTRAR</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

<!--  BANNER   -->   
    <div class="image-container">
        <img src="img/capas/medusa(exp).png" class="img" alt="Imagem responsiva">
        <!-- Texto "Medusa" acima do botão -->
        <div id="texto_img_titulo_lateral" class="branca"><b>Medusa</b></div>
    </div>

<!--  texto   -->
    <div class="container">
       <p class="desk">  Medusa - A performance teatral tem como base a versão grega do mito da Medusa, a sacerdotisa do Templo de Atena, 
        que atraiu o desejo de Poseidon, deus dos mares e dos rios, que a violou. Em cena, a atriz protesta contra o feminicídio. "Uma maneira 
        de despertar sobretudo nos mais jovens, a urgência de modificar a violência cruel e antiga sobre as mulheres, e transformar a dor em cura", 
        diz a organização do evento em nota.</p>


        <p class="desk"> "São muitas Medusas. Cada vez que entro em cena são as vozes de todas nós, mulheres violadas, 
        que eu defendo. E reafirmo: esta violência precisa estancar", destaca a atriz Fabiana Pirro, 
        que também é encenadora e produtora da performance.
        </p>
    </div>


    <div class="carousel-obras">
                <div class="carousel">
                    <div class="carousel-slide">
                        <figure> <img class = "imghis" src="img/fotosexp/medusa1.jpg" alt="Foto 1">    <figcaption> Medusa </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <figure> <img src="img/fotosexp/medusa2.jpg" alt="Foto 2">   <figcaption> Medusa </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="img/fotosexp/medusa3.jpg" alt="Foto 3"> <figcaption> Medusa </figcaption> </figure>
                    </div>
            </div>
                <button class="prev">&#10094;</button>
                <button class="next">&#10095;</button>
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
        
   
    
    <div>
        
    </div>
</body>