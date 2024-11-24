import { Carousel } from 'flowbite';

const carouselElement = document.getElementById('indicators-carousel');

const items = Array.from(document.querySelectorAll('[data-carousel-item]')).map((el, index) => ({
    position: index,
    el: el,
}));


const options = {
    defaultPosition: 0,
    interval: 5000,
    indicators: {
        activeClasses: 'bg-white dark:bg-gray-800',
        inactiveClasses: 'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
    },
    onNext: () => {
        console.log('Siguiente diapositiva');
    },
    onPrev: () => {
        console.log('Diapositiva anterior');
    },
    onChange: (currentSlide) => {
        console.log(`Diapositiva actual: ${currentSlide}`);
    },
};

// Inicializa el carrusel
const carousel = new Carousel(carouselElement, items, options);

// Función para iniciar el desplazamiento automático
let autoSlideInterval;
const startAutoSlide = () => {
    stopAutoSlide(); // Asegura que no haya múltiples intervalos activos
    autoSlideInterval = setInterval(() => {
        carousel.next(); // Cambia a la siguiente diapositiva
    }, 5000); // Intervalo de 5 segundos
};

// Función para detener el desplazamiento automático
const stopAutoSlide = () => {
    if (autoSlideInterval) {
        clearInterval(autoSlideInterval);
    }
};

// Inicia el desplazamiento automático al cargar la página
startAutoSlide();

// Reinicia el intervalo automático tras cualquier interacción manual
document.querySelectorAll('[data-carousel-prev], [data-carousel-next], [data-carousel-slide-to]').forEach((control) => {
    control.addEventListener('click', () => {
        stopAutoSlide(); // Detén el intervalo actual
        startAutoSlide(); // Reinicia el intervalo después de la interacción
    });
});
