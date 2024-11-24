import { Carousel } from 'flowbite';

// Selección del contenedor del carrusel
const carouselElement = document.getElementById('categories-carousel');

// Lista de elementos del carrusel
const items = Array.from(document.querySelectorAll('[data-carouselC-item]')).map((el, index) => ({
    position: index,
    el: el,
}));

// Configuración del carrusel
const options = {
    defaultPosition: 0,
    interval: null, // Desactivamos el intervalo automático de Flowbite
    onNext: () => console.log('Siguiente diapositiva'),
    onPrev: () => console.log('Diapositiva anterior'),
    onChange: (currentSlide) => console.log(`Diapositiva actual: ${currentSlide}`),
};

// Inicializamos el carrusel
const carousel = new Carousel(carouselElement, items, options);

// Configuración del desplazamiento automático
let autoSlideInterval;

const startAutoSlide = () => {
    stopAutoSlide(); // Evita múltiples intervalos
    autoSlideInterval = setInterval(() => {
        carousel.next(); // Cambia a la siguiente diapositiva
    }, 15000); // Cambia cada 15 segundos
};

const stopAutoSlide = () => {
    if (autoSlideInterval) {
        clearInterval(autoSlideInterval);
    }
};

// Inicia el auto-desplazamiento al cargar la página
startAutoSlide();

// Reinicia el auto-desplazamiento tras cualquier interacción manual
document.querySelectorAll('[data-carouselC-prev], [data-carouselC-next]').forEach((control) => {
    control.addEventListener('click', () => {
        stopAutoSlide(); // Detiene el desplazamiento automático
        startAutoSlide(); // Reinicia el auto-desplazamiento
    });
});
