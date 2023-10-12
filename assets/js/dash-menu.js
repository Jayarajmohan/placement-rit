const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
const navItems = document.querySelector('.nav-items');

mobileMenuToggle.addEventListener('click', () => {
    navItems.classList.toggle('active');
});
