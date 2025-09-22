// Initialize AOS only once on page load
AOS.init({
    duration: 400,
    easing: 'ease-in-out',
    once: true,
    offset: 50,
    disable: 'mobile' // Disable on mobile to prevent performance issues
});

document.addEventListener('DOMContentLoaded', function () {
    const sidebarItems = document.querySelectorAll('.sidebar-item');

    // Simple active state management without animations
    sidebarItems.forEach(item => {
        const href = item.getAttribute('href');
        if (href && window.location.pathname === href) {
            item.classList.add('active');
        }
    });
});