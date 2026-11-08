<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Ilha</title>
    <!--
    <style>
        .texto{
            font-family: Georgia;
            font-size: 25px;
            margin-left: 300px;
            margin-right: 300px;
        }
    </style>
    -->
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
    
    <div class="img-container">
        <div class="image-container">
            <img src="img/capas/ilha_cover.png"class="img" alt="Imagem responsiva">
            <div id="texto_img_titulo_centro" class="branca"><b>Ilha</b></div>
            <div id="texto_img_centro" class="branca"><b>ILHA é uma exposição do fotógrafo e artista visual Gilvan Barreto pensada especialmente para ser montada na Galeria Casa Pedra Branca, na cidade de Floresta, entre os dias 22 de dezembro de 2021 e 22 de fevereiro de 2022. Na ILHA que Gilvan Barreto traz especialmente para o público florestano tem “Cartas Náuticas”. Performance realizada no Rio de Janeiro, onde o artista reside. O trabalho consiste em cartas que Gilvan escreveu nadando no mar aberto com um GPS conectado ao corpo. O nado traçou linhas que formaram palavras reveladas em um trabalho que é simultaneamente físico e digital.
</b></div>
        </div>
    </div>


   <div class="container">
       <p class="desk">  Dentre os muitos fenômenos geográficos, as ilhas são dos que mais se prestam a metaforizar sensações humanas. 
        Quando falamos - ilha, pensamos em isolamento, solidão, fuga; mas também podemos pensar em paraísos terrestres, relaxamento e prazer. 
        Essa capacidade de evocar sentimentos diversos e contraditórios fez do conceito "ilha" - tomado aqui como territorialidade capaz de 
        espelhar nossos sentimentos arquetípicos - o lugar teórico ideal de onde pariu a curadoria desta mostra. Na ILHA que Gilvan Barreto 
        traz para o público florestano, vemos um arquipélago de obras, a maioria inéditas, que nos proporcionam sensações as mais 
        diversas - indo do puro prazer estético ao mais sufocante mergulho. Tudo é fruto da vivência do artista! Ele nos convida 
        a refletir sobre a necessidade de continuarmos criando novos e improváveis territórios - como uma ilha em pleno sertão - e de seguirmos buscando 
        significados menos óbvios, sempre embutidos nas mensagens que nos chegam a todo instante.</p>


        <p class="desk"> Com esta exposição a Galeria Casa Pedra Branca celebra a continuidade do nosso propósito de trazer a 
        Floresta o que de melhor se produz em arte contemporânea no Brasil, atualmente.
        </p>
    </div>

   <div class="carousel-obras">
                <div class="carousel">
                    <div class="carousel-slide">
                        <figure> <img class = "imghis" src="uploads/obra5.jpg" alt="Foto 1">    <figcaption> Nada de novo </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <figure> <img src="uploads/obra4.jpg" alt="Foto 2">   <figcaption> São lagrimas </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra6.jpg" alt="Foto 3"> <figcaption> Saudade do Brasil </figcaption> </figure>
                    </div>
                    <div class="carousel-slide">
                        <img src="uploads/obra9.jpg" alt="Foto 3"> <figcaption> FlorEssência </figcaption> </figure>
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