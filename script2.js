document.addEventListener("DOMContentLoaded", function () {
    // Seleciona todos os containers de carrossel
    const carousels = document.querySelectorAll('.carousel-container');
    
    carousels.forEach(carousel => {
        let index = 0;
        const slides = carousel.querySelectorAll('.carousel-slide');
        const totalSlides = slides.length;

        // Função para mover o slide
        function moveSlide(step) {
            index += step;

            if (index >= totalSlides) index = 0;
            if (index < 0) index = totalSlides - 1;

            const offset = -index * 100;
            carousel.querySelector('.carousel').style.transform = `translateX(${offset}%)`;
        }

        // Adiciona eventos de clique aos botões de navegação
        carousel.querySelector('.prev').addEventListener('click', function () {
            moveSlide(-1);
        });

        carousel.querySelector('.next').addEventListener('click', function () {
            moveSlide(1);
        });

        // Adiciona eventos de teclado para navegação
        document.addEventListener('keydown', function(event) {
            if (event.key === 'ArrowLeft') {
                moveSlide(-1);
            } else if (event.key === 'ArrowRight') {
                moveSlide(1);
            }
        });
    });
});
