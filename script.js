document.addEventListener("DOMContentLoaded", function () {
    // Seleciona todos os carrosséis
    const carousels = document.querySelectorAll('.carousel-obras');
    // Seleciona os elementos do modal
    const fullscreenContainer = document.getElementById('fullscreen-container');
    const fullscreenImage = document.getElementById('fullscreen-image');
    const fullscreenCaption = document.getElementById('fullscreen-caption');
    const closeFullscreen = document.getElementById('close-fullscreen');
    const prevFullscreen = document.querySelector('.prev-fullscreen');
    const nextFullscreen = document.querySelector('.next-fullscreen');

    // Itera sobre cada carrossel
    carousels.forEach(carousel => {
        let index = 0; // Índice da imagem atual
        const slides = carousel.querySelectorAll('.carousel-slide'); // Seleciona as imagens
        const totalSlides = slides.length; // Total de imagens

        // Função para mover o carrossel
        function moveSlide(step) {
            index += step; // Atualiza o índice

            // Ajusta o índice se estiver fora dos limites
            if (index >= totalSlides) index = 0;
            if (index < 0) index = totalSlides - 1;

            const offset = -index * 100; // Calcula o deslocamento
            carousel.querySelector('.carousel').style.transform = `translateX(${offset}%)`; // Aplica o deslocamento
        }

        // Função para abrir o modal com a imagem e legenda
        function openFullscreen(src, caption) {
            fullscreenContainer.style.display = 'flex'; // Exibe o modal
            fullscreenImage.src = src; // Define a imagem do modal
            fullscreenCaption.textContent = caption; // Define a legenda do modal
        }

        // Função para fechar o modal
        function closeFullscreenHandler() {
            fullscreenContainer.style.display = 'none'; // Oculta o modal
        }

        // Adiciona evento de clique às imagens no carrossel
        carousel.querySelectorAll('.carousel-slide').forEach(slide => {
            const img = slide.querySelector('img');
            const caption = slide.querySelector('figcaption').textContent;

            img.addEventListener('click', function () {
                openFullscreen(this.src, caption); // Abre o modal com a imagem e legenda clicadas
            });
        });

        // Adiciona evento de clique ao botão de fechar
        closeFullscreen.addEventListener('click', closeFullscreenHandler);

        // Adiciona evento de clique ao contêiner do modal
        fullscreenContainer.addEventListener('click', function (event) {
            // Fecha o modal se o clique for fora da imagem
            if (event.target === fullscreenContainer) {
                closeFullscreenHandler();
            }
        });

        // Adiciona evento de clique ao botão de navegação anterior
        prevFullscreen.addEventListener('click', function () {
            const currentIndex = Array.from(carousel.querySelectorAll('.carousel-slide img')).findIndex(img => img.src === fullscreenImage.src);
            const newIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            const newSlide = carousel.querySelectorAll('.carousel-slide')[newIndex];
            fullscreenImage.src = newSlide.querySelector('img').src;
            fullscreenCaption.textContent = newSlide.querySelector('figcaption').textContent;
        });

        // Adiciona evento de clique ao botão de navegação seguinte
        nextFullscreen.addEventListener('click', function () {
            const currentIndex = Array.from(carousel.querySelectorAll('.carousel-slide img')).findIndex(img => img.src === fullscreenImage.src);
            const newIndex = (currentIndex + 1) % totalSlides;
            const newSlide = carousel.querySelectorAll('.carousel-slide')[newIndex];
            fullscreenImage.src = newSlide.querySelector('img').src;
            fullscreenCaption.textContent = newSlide.querySelector('figcaption').textContent;
        });

        // Adiciona evento de clique aos botões de navegação do carrossel
        carousel.querySelector('.prev').addEventListener('click', function () {
            moveSlide(-1);
        });

        carousel.querySelector('.next').addEventListener('click', function () {
            moveSlide(1);
        });
    });
});
