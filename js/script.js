document.addEventListener('DOMContentLoaded', function() {
    const hero = document.querySelector('.hero');
    hero.classList.add('animate');

    // Tambahkan animasi lain jika diperlukan
});

const mobileMenu = document.getElementById('mobile-menu');
const navLinks = document.querySelector('nav ul');

mobileMenu.addEventListener('click', () => {
    navLinks.classList.toggle('active'); // Toggle class active pada menu
});
