document.addEventListener('DOMContentLoaded', function() {
    const vacCards = document.querySelectorAll('.vac-card.vac-hidden-mobile');
    const showMoreBtn = document.getElementById('show-more-btn');

    if (window.innerWidth <= 768 && vacCards.length > 0) {
        showMoreBtn.style.display = 'inline-block';
    }

    showMoreBtn?.addEventListener('click', function() {
        vacCards.forEach(card => card.classList.remove('vac-hidden-mobile'));
        showMoreBtn.style.display = 'none';
    });
});
