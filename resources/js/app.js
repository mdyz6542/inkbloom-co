import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Scroll reveal
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            revealObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.1 });

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
});

// Cart icon bounce when item added
window.bounceCart = () => {
    document.querySelectorAll('[data-cart-count]').forEach(el => {
        const icon = el.closest('a');
        if (!icon) return;
        icon.classList.remove('cart-bounce');
        void icon.offsetWidth;
        icon.classList.add('cart-bounce');
        icon.addEventListener('animationend', () => icon.classList.remove('cart-bounce'), { once: true });
    });
};
