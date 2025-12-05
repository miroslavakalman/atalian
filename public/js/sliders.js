function initSlider() {
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const slider = document.querySelector('.slides-container');

    if (slides.length === 0) {
        console.warn('Слайдер: нет .slide — пропускаем');
        return;
    }

    let currentSlide = 0;
    let startX = 0;
    let currentX = 0;
    let isDragging = false;

    function showSlide(n) {
        currentSlide = (n + slides.length) % slides.length;

        slides.forEach(s => s.classList.remove('active'));
        dots.forEach(d => d.classList.remove('active'));

        slides[currentSlide]?.classList.add('active');
        dots[currentSlide]?.classList.add('active');
    }

    function nextSlide() { showSlide(currentSlide + 1); }
    function prevSlide() { showSlide(currentSlide - 1); }

    if (slider) {
        slider.style.cursor = 'grab';

        slider.addEventListener('mousedown', e => {
            isDragging = true;
            startX = e.pageX;
            slider.style.cursor = 'grabbing';
        });

        slider.addEventListener('mousemove', e => {
            if (!isDragging) return;
            currentX = e.pageX;
        });

        slider.addEventListener('mouseup', () => {
            if (!isDragging) return;
            isDragging = false;
            slider.style.cursor = 'grab';

            const diff = startX - currentX;
            if (diff > 50) nextSlide();
            if (diff < -50) prevSlide();
        });

        slider.addEventListener('touchstart', e => {
            startX = e.touches[0].clientX;
        });

        slider.addEventListener('touchmove', e => {
            currentX = e.touches[0].clientX;
        });

        slider.addEventListener('touchend', () => {
            const diff = startX - currentX;
            if (diff > 50) nextSlide();
            if (diff < -50) prevSlide();
        });
    }

    let slideInterval = setInterval(nextSlide, 5000);

    if (slider) {
        slider.addEventListener('mouseenter', () => clearInterval(slideInterval));
        slider.addEventListener('mouseleave', () => {
            slideInterval = setInterval(nextSlide, 5000);
        });
    }
}

// Переключение вакансионного слайдера
document.getElementById('vac-prev')?.addEventListener('click', () => {
    document.getElementById('vac-slider').scrollBy({ left: -300, behavior: "smooth" });
});
document.getElementById('vac-next')?.addEventListener('click', () => {
    document.getElementById('vac-slider').scrollBy({ left: 300, behavior: "smooth" });
});
