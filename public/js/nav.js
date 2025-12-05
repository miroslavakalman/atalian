document.addEventListener('DOMContentLoaded', function() {
    const navItems = document.querySelectorAll('.nav-item.has-dropdown');
    let closeTimeout;

    navItems.forEach(item => {
        const dropdown = item.querySelector('.fullscreen-dropdown');

        item.addEventListener('mouseenter', function() {
            clearTimeout(closeTimeout);
            if (dropdown) dropdown.style.display = 'block';
        });

        item.addEventListener('mouseleave', function(e) {
            const related = e.relatedTarget;
            if (related && !dropdown.contains(related)) {
                closeTimeout = setTimeout(() => {
                    if (dropdown) dropdown.style.display = 'none';
                }, 300);
            }
        });

        if (dropdown) {
            dropdown.addEventListener('mouseenter', () => clearTimeout(closeTimeout));
            dropdown.addEventListener('mouseleave', () => {
                closeTimeout = setTimeout(() => dropdown.style.display = 'none', 300);
            });
        }
    });
});
